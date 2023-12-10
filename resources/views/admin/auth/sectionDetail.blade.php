@extends('layouts.parent_main_page.navbar');
@section('content')
    {{-- Your specific content for the parent main page goes here --}}
    {{-- <form method="post" action="{{ route('adminMainCourse') }}"> --}}
    <div class="parent-main-page">
        
        <h1>{{$data->courseName}}</h1>
        <p>{{$data->description}}</p>
        <h1>Sections</h1>
        <div class="button-container">
            <a href="{{ route('section.create', ['data' => $data->id]) }}" class="blue-button">Create New Section</a> 
            <a href="{{ route('course.edit', ['data' => $data->id]) }}" class="blue-button">Edit Course</a> 

            <h1>Existing Sections</h1>
            @foreach ($info as $section)
            <a href="{{ route('section.checkUnit', ['section' => $section->id]) }}" class="blue-button">
            
                {{ $section->sectionName }}-{{$section->sectionTitle}}
            </a>
            @endforeach

            


        
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/AdminMain.css') }}">
@endpush