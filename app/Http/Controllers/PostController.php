<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Purifier;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $this->validate($request, [
            'title' => 'required|max:100',
            'body'  => 'required',
        ]);

        $title = $request['title'];
        $body  = CloseTags($request['body']);
        //save img
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($body, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);  //this needes at least libxml2.2.7.8  
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            if(strpos($data,";")!== false){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $filedata = base64_decode($data);
                $image_name= "/upload/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $filedata);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }        
        //save        
        $body = $dom->saveHTML();

        //$post = Post::create($request->only('title', 'body'));
        $post = new Post;
        $post->title = $title;
        $post->body  = $body;
        //purify the user input 
        $post->body = Purifier::clean($post->body);
        //save to db
        $post->save();

        //Display a successful message upon save
        return redirect()->route('posts.index')
            ->with('flash_message', 'Article,
             ' . $post->title . ' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id); //Find post of id = $id

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:100',
            'body'  => 'required',
        ]);

        $post        = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $body = CloseTags($post->body);
        //save img
        $dom = new \DomDocument();
        libxml_use_internal_errors(true); //supress the warning of loadHtml https://stackoverflow.com/questions/11819603/dom-loadhtml-doesnt-work-properly-on-a-server
        $dom->loadHtml(mb_convert_encoding($body,  'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            if(strpos($data,";")!== false){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $filedata = base64_decode($data);
                $image_name= "/upload/" . time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $filedata);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        /* 
        //example for howto remove all script from user input    
        $scripts = $dom->getElementsByTagName('script');    
        $remove = [];
        foreach($scripts as $item)
        {
          $remove[] = $item;
        }

        foreach ($remove as $item2)
        {
          $item2->parentNode->removeChild($item2); 
        }
        */
        $post->body = $dom->saveHTML();
        $post->body = mb_convert_encoding($post->body, 'UTF-8' , 'HTML-ENTITIES');
        //purify the user input 
        $post->body = Purifier::clean($post->body);
        //save
        $post->save();

        return redirect()->route('posts.show',
            $post->id)->with('flash_message',
            'Article, ' . $post->title . ' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('flash_message',
                'Article successfully deleted');

    }
}
