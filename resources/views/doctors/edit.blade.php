@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
        <h1>Edit Doctors</h1>
        <div class="container mt-4">
        <form action="{{ route('doctors.update', ['doctor' => $doctor->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="doctorname">Doctor Name:</label>
                <input type="text" name="doctorname" class="form-control" value="{{ $doctor->doctorname }}">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="location" name="location" class="form-control" value="{{ $doctor->location }}">
            </div>
            
            
            <!-- <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ $doctor->role }}">
            </div> -->
            
            <br><button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('doctors.show') }}" class="btn btn-primary">Back</a>
        </form>
        </div>

    </div>


@endsection