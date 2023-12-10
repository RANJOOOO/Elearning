@extends('layouts.parent_main_page.navbar');
@section('content')
    {{-- Your specific content for the parent main page goes here --}}
    {{-- <form method="post" action="{{ route('adminMainCourse') }}"> --}}
    <div class="parent-main-page">
        
        <h1>{{$data->sectionName}}</h1>
        <p>{{$data->description}}</p>
        <h1>Units</h1>
        <div class="button-container">
            <a href="{{ route('unit.create', ['data' => $data->id]) }}" class="blue-button">Create New Unit</a> 
            <a href="{{ route('section.edit', ['data' => $data->id]) }}" class="blue-button">Edit Section</a> 

            <h1>Existing units</h1>
            @foreach ($new as $unit)
            <a href="{{ route('unit.lessonDetail', ['unit' => $unit->id]) }}" class="blue-button">
            {{-- <a href="{{ route('unit.checkLesson', ['unit' => $unit->id]) }}" class="blue-button"> --}}
            {{-- <a href="#" class="blue-button"> --}}
                {{ $unit->unitName }}-{{$unit->unitTitle}}
            </a>
            @endforeach


        
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/AdminMain.css') }}">
@endpush