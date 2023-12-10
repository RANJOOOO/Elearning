


@extends('layouts.parent_main_page.navbar');
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    
    <div class="parent-main-page">
        
        <div class="button-container">
            <form method="post" action="{{ route('update.quizMultipleChoices',['id' => $page->id]) }}">
                <form method="post" action="{{ route('update.SingleTextarea',['id' => $page->id]) }}">
                    @csrf
                    @method('PUT')
                    <label for="Title">Title:</label>
                    <input type="text" name="Title" value="{{$page->Title}}" required>
                    <label for="html_code">Description:</label>
                    <textarea  name="html_code" id="editor" rows="1" >{{$page->html_code}}</textarea>
                    
                    <label for="order">Order:</label>
                    <input type="number" name="order" id="order" value="{{$page->order}}">
                    <label for="textAreaTitle">Text Area:</label>
                    <input type="text" name="textAreaTitle" id="textFieldTitle" value="{{$page->textAreaTitle}}" required>
        
                    <button type="submit">Update Page</button>
                </form>
        
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),
            {
                ckfinder:
                {
                    uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",

                }

            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/AdminStyling/courseCreate.css') }}">

@endpush




