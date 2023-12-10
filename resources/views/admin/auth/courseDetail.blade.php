@extends('layouts.parent_main_page.navbar');
@section('content')
    {{-- Your specific content for the parent main page goes here --}}
    {{-- <form method="post" action="{{ route('adminMainCourse') }}"> --}}
    <div class="parent-main-page">
        <h1>Courses</h1>
        <div class="button-container">
            <a href="{{ route('course.create', ['admin' => $admin->id]) }}" class="blue-button">Create New Course</a>



            <h1>Existing courses</h1>
            @foreach ($data as $course)
            <a href="{{ route('course.checkSection', ['course' => $course->id]) }}" class="blue-button">
            
                {{ $course->courseName }}-{{$course->courseTitle}}
            @endforeach
        </a>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/AdminMain.css') }}">
@endpush