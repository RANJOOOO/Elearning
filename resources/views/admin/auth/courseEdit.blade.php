






@extends('layouts.parent_main_page.navbar');
@section('content')
  
    <<form method="POST" action="{{ route('courses.update', ['id' => $course->id]) }}">
        @csrf
        @method('PUT') <!-- Use PUT method for updates -->
    
        <!-- Display current course details -->
        <label for="courseTitle">Course Title:</label>
        <input type="text" name="courseTitle"  value="{{$course->courseTitle}}" required>
        <label for="courseName">Course Name:</label>
        <input type="text" name="courseName" value="{{course->courseName}}" required>
        <label for="description">description:</label>
        {{-- <input type="text" name="description" id="courseTitle" required>--}}
        <textarea id="description" name="description" rows="4" required>{{$course->description}}</textarea>
        <!-- Other fields and details for editing -->
        <label for="order">order:</label>
        <input type="number" name="order" id="order" value="{{$course->order}}" required>
    
        <button type="submit">Update Course</button>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/courseCreate.css') }}">
@endpush













