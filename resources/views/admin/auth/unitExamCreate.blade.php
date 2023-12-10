
@extends('layouts.parent_main_page.navbar');
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    
    <div class="parent-main-page">
        
        <div class="button-container">
            <form method="post" action="{{ route('store.unitexam') }}">
                @csrf
                <label for="unitid"></label>
                <input type="hidden" name="unitid" value="{{$data->id}}">
                
                <label for="title">Title:</label>
                <input type="text" name="title" id="lessonName" required>
    
                
                <label for="html_code">Description:</label>
                <textarea  name="html_code" id="editor" rows="1"></textarea>
                <label for="text_field">Title:</label>
                <input type="text" name="text_field" id="lessonName" required>
                
    
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
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/courseCreate.css') }}">
@endpush