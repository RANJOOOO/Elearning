@extends('layouts.parent_main_page.navbar');
@section('content')
  
    <form method="post" action="{{ route('course.unitnow') }}">
        @csrf
        <label for="unitid"></label>
        <input type="hidden" name="unitid" id="" value="{{$data}}">
        <label for="unitName">unit Name:</label>
        <input type="text" name="unitName" id="course_title" required>

        <label for="unitTitle">Title:</label>
        <input type="text" name="unitTitle" id="courseTitle" required>
        <label for="description">description:</label>
        {{-- <input type="text" name="description" id="courseTitle" required>--}}
        <textarea id="description" name="description" rows="4" required></textarea>
        <label for="order">order:</label>
        <input type="number" name="order" id="order" required>
        

        <button type="submit">Create Course</button>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/courseCreate.css') }}">
@endpush
