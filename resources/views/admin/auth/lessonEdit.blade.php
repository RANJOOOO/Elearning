

@extends('layouts.parent_main_page.navbar');
@section('content')
  
    <<form method="POST" action="{{ route('lesson.update', ['id' => $lesson->id]) }}">
        @csrf
        @method('PUT') <!-- Use PUT method for updates -->
    
        <!-- Display current course details -->
        <label for="lessonTitle">Lesson Title:</label>
        <input type="text" name="lessonTitle" value="{{$lesson->lessonTitle}}" required>
        <label for="lessonName">Lesson Name:</label>
        <input type="text" name="lessonName" value="{{$lesson->lessonName}}" required>
        <label for="description">description:</label>
        {{-- <input type="text" name="description" id="courseTitle" required>--}}
        <textarea id="description" name="description" rows="4" required>{{$lesson->description}}</textarea>
        <!-- Other fields and details for editing -->
        <label for="order">order:</label>
        <input type="number" name="order" value="{{$lesson->order}}" required>
        
    
        <button type="submit">Update Lesson</button>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/courseCreate.css') }}">
@endpush













