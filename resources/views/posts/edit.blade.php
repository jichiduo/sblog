@extends('layouts.app') @section('title', '| Edit Post') @section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Edit Post</h1>
        <hr> {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }} {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br> {{ Form::label('author', 'Author') }} {{ Form::text('author', null, array('class' => 'form-control')) }}
            <br> {{ Form::label('email', 'Email') }} {{ Form::text('email', null, array('class' => 'form-control')) }}
            <br> {{ Form::label('body', 'Content') }} {{ Form::textarea('body', null, array('class' => 'form-control', 'id' => 'post_body')) }}
            <br> {{ Form::submit('Save', array('class' => 'btn btn-primary')) }} {{ Form::close() }}
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#post_body').summernote({
        height: 300,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture','hr']],
        ],
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
            link: [
                ['link', ['linkDialogShow', 'unlink']]
            ]
        }
    });
    $('.dropdown-toggle').dropdown();
});
</script>
@endsection