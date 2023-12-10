

@extends('layouts.parent_main_page.navbar');
@section('content')
  
    <<form method="POST" action="{{ route('unit.update', ['id' => $unit->id]) }}">
        @csrf
        @method('PUT') <!-- Use PUT method for updates -->
    
        <!-- Display current course details -->
        <label for="unitTitle">Unit Title:</label>
        <input type="text" name="unitTitle" value="{{$unit->unitTitle}}"  required>
        <label for="unitName">Unit Name:</label>
        <input type="text" name="unitName" value="{{$unit->unitName}}" required>
        <label for="description">description:</label>
        {{-- <input type="text" name="description" id="courseTitle" required>--}}
        <textarea id="description" name="description" rows="4" required>{{$unit->description}}</textarea>
        <!-- Other fields and details for editing -->
        <label for="order">order:</label>
        <input type="number" name="order" value="{{$unit->order}}" required>
        
    
        <button type="submit">Update Course</button>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/AdminStyling/courseCreate.css') }}">
@endpush













