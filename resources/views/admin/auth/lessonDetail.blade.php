@extends('layouts.parent_main_page.navbar');
@section('content')
    {{-- Your specific content for the parent main page goes here --}}
    {{-- <form method="post" action="{{ route('adminMainCourse') }}"> --}}
    <div class="parent-main-page">
        
        <h1>{{$data->unitName}}</h1>
        <p>{{$data->description}}</p>
        <h1>Lesson</h1>
        <div class="button-container">
             <a href="{{ route('lesson.create', ['data' => $data->id]) }}" class="blue-button">Create New Lesson<a> 
            <a href="{{ route('unit.edit', ['data' => $data->id]) }}" class="blue-button">Edit Unit</a> 

            <h1>Existing Lessons</h1>
            @foreach ($new as $lesson)
            {{-- <a href="{{ route('unit.checkLesson', ['lesson' => $lesson->id]) }}" class="blue-button"> --}}
            <a href="{{ route('lesson.pageDetail', ['lesson' => $lesson->id]) }}" class="blue-button">
                {{ $lesson->lessonName }}-{{$lesson->lessonTitle}}
            </a>
            @endforeach

            <a href="{{ route('unit.checkLesson', ['unit' => $data->id]) }}" class="blue-button">Unit Exam</a>
                

        
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/AdminMain.css') }}">
@endpush