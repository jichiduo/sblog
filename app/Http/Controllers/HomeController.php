<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    /**
     * Show the application terms and conditions.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        return view('terms');
    }
    /**
     * Show the application about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }
    /**
     * Show the application about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function gen()
    {
        $d_a = array();
        $d_b = array();
        $token = 120;
        for($i=0;$i<$token;$i++){
            $d_a[] = rand(11,99);
            $d_b[] = rand(11,99);
        }
        return view('generator.index')->with('d_a', $d_a)->with('d_b',$d_b)->with('token',$token);
    }
}
