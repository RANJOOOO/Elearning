@extends('layouts.parent_main_page.navbar');
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    
    <div class="parent-main-page">
        
        <div class="button-container">
            <form method="post" action="{{ route('store.quizmultiplechoices') }}">
                @csrf
                <label for="quizmultiplechoices"></label>
                <input type="hidden" name="quizmultiplechoices" value="{{$data}}">
                <label for="page_type"></label>
                <input type="hidden" name="page_type"  value="quizmultiplechoices" required>
                <label for="Title">Title:</label>
                <input type="text" name="Title" id="lessonName" required>
    
                
                <label for="html_code">Description:</label>
                <textarea  name="html_code" id="editor" rows="1"></textarea>
                
                <label for="order">Order:</label>
                <input type="number" name="order" id="order" required>
                <label for="">Please select from 4 options </label>
                <input type="text" name="choice1" id="lessonName" required>
                <input type="text" name="choice2" id="lessonName" required>
                <input type="text" name="choice3" id="lessonName" required>
                <input type="text" name="choice4" id="lessonName" required>


                <label for="order">Answer:</label>
                <input type="number" name="Answer" id="order" required>
                
    
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