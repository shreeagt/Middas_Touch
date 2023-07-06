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
            <div class="form-group">
                <label for="mci">Mci Registration Number</label>
                <input type="mci" name="mci" id="mci" class="form-control" value="{{ $doctor->mci }}">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control" value="logo">
            </div>
            <div class="form-group">
                <label for="photo">Dr. Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" value="photo">
            </div>
            <div class="form-group">
                <label for="speciality">Speciality</label>
                <select name="speciality" id="speciality" class="form-control">
                    <option value="">Select Speciality</option>
                    <option value="General Opthamologist" {{ $doctor->speciality == 'General Opthamologist' ? 'selected' : '' }}>General Opthamologist</option>
                    <option value="Retina Specialist" {{ $doctor->speciality == 'Retina Specialist' ? 'selected' : '' }}>Retina Specialist</option>
                    <option value="Cornea Specialist" {{ $doctor->speciality == 'Cornea Specialist' ? 'selected' : '' }}>Cornea Specialist</option>
                    <option value="Glaucoma Specialist" {{ $doctor->speciality == 'Glaucoma Specialist' ? 'selected' : '' }}>Glaucoma Specialist</option>
                    <option value="Optometrist" {{ $doctor->speciality == 'Optometrist' ? 'selected' : '' }}>Optometrist</option>
                </select>
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