@extends('layouts.parent_main_page.navbar');
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    
    <div class="parent-main-page">
        
        <div class="button-container">
            <form method="post" action="{{ route('store.singletextfield') }}">
                @csrf
                <label for="pagesingletextfieldid"></label>
                <input type="hidden" name="pagesingletextfieldid" value="{{$data}}">
                <label for="page_type"></label>
                <input type="hidden" name="page_type" id="lessonName" value="SingleTextField" required>
                <label for="Title">Title:</label>
                <input type="text" name="Title" id="lessonName" required>
    
                
                <label for="html_code">Description:</label>
                <textarea  name="html_code" id="editor" rows="1"></textarea>
                
                <label for="order">Order:</label>
                <input type="number" name="order" id="order" required>
                <label for="textFieldTitle">Text Field:</label>
                <input type="text" name="textFieldTitle" id="textFieldTitle" required>
    
                <button type="submit">Create Page</button>
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
<link rel="stylesheet" href="{{ asset('css/AdminStyling/AdminMain.css') }}">

@endpush