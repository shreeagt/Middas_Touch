@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add Doctors</h1>
        <div class="container mt-4">
            <form method="POST" action="{{route('doctors.insert')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                     <label for="dispensaryname">Dispensary Name:-</label>
                     <input type="text" name="dispensaryname" class="form-control" placeholder="Dispensary Name" required>
                </div>

                <div class="mb-3">
                  <label for="doctorname">Doctor Name :-</label>
                  <input type="text" name="doctorname" class="form-control" placeholder="Doctor Name" required>
                </div>

               
                <div class="mb-3">
                  <label for="degree">Degree :-</label>
                  <input type="text" name="degree" class="form-control" placeholder="Degree Name" required>
                </div>


                <div class="mb-3">
                  <label for="select_language_pro">Select Language</label>
                  <select name="select_language" class="form-control" required>
                     <option value="">Select language</option>
                     <option value="1">English</option>
                     <option value="2">Hindi</option>
                     <option value="3">Marathi</option>
                     <option value="4">Gujrati</option>
                 </select>
                </div>

                <div class="mb-3">
                  <label for="designation">Designation:-</label>
                  <input type="text" name="designation" class="form-control" placeholder="Designation" required>
                </div>

                <div class="mb-3">
                  <label for="location">Location</label>
                  <input type="text" name="location" class="form-control" placeholder="Location" required>
                </div>

                <div class="mb-3">
                        <label for="speciality">Speciality</label>
                        <input type="text" name="speciality" class="form-control" placeholder="Speciality" required>
                </div>

                <div class="mb-3">
                    <label for="mci">Mci Registration Number</label>
                    <input type="text" name="mci" class="form-control" placeholder="Mci Registration Number" required>
                </div>

                <div class="mb-3">
                  <label for="logo" >Select Logo Image</label>
                  <input type="file" name="logo" class="form-control" placeholder="Logo" required>
                </div>

                <div class="mb-3">
                    <label for="photo" >Dr. Photo</label>
                    <input type="file" name="photo" class="form-control" placeholder="Dr. Photo" required>
                  </div>
               

                <button type="submit" class="btn btn-success">Save Doctor</button>
                <a href="{{ route('doctors.show') }}" class="btn btn-primary">Back</a>
            </form>
        </div>

    </div>
@endsection




{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Midars_touch</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <style>
        .hide {
            display: none;
        }

    
    </style>
</head>

<body>
<div class="banner-wrapper pt-md-0 pt-5">
            <img src="{{ asset('ajanta-logo.png') }}" alt="logo" class="logo logoposition" style="width: 100px; height: auto;">
            <div class="container h-lg-100">
            <div class="row justify-content-center align-items-center h-lg-100">
               <div class="col-lg-6  h-lg-100">
                  <div class="img-shree-cover  h-lg-100">
                     <img src="{{asset('mob_images.png') }}" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid  d-block d-lg-none" alt="docs">
                     <img src="{{asset('doc.png') }}" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid d-none d-lg-block" alt="docs">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="">
                     <div class="banner_text ">

                    <form action="{{route('doctors.insert')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                        <label for="dispensaryname">Dispensary Name:-</label>
                            <input type="text" name="dispensaryname" class="form-control" placeholder="Dispensary Name" required>
                        </div>

                    <div class="form-group col-lg-6">
                        <label for="doctorname">Doctor Name :-</label>
                         <input type="text" name="doctorname" class="form-control" placeholder="Doctor Name" required>
                    </div>

                    <div class="form-group col-lg-6">
                           <label for="degree">Degree :-</label>
                         <input type="text" name="degree" class="form-control" placeholder="Degree Name" required>
                    </div>

                    <div class="form-group col-lg-6">
                         <label for="select_language_pro">Select Language</label>
                         <select name="select_language" class="form-control" required>
                            <option value="">Select language</option>
                            <option value="1">English</option>
                            <option value="2">Hindi</option>
                            <option value="3">Marathi</option>
                            <option value="4">Gujrati</option>
                        </select>
                     </div>

                     <div class="form-group col-lg-6">
                        <label for="designation">Designation:-</label>
                         <input type="text" name="designation" class="form-control" placeholder="Designation" required>
                     </div>

                     <div class="form-group col-lg-6">
                         <label for="location">Location</label>
                         <input type="text" name="location" class="form-control" placeholder="Location" required>
                     </div>

                    <div class="form-group col-lg-6">
                        <label for="speciality">Speciality</label>
                        <input type="text" name="speciality" class="form-control" placeholder="Speciality" required>
                    </div>

                     <div class="form-group col-lg-6">
                          <label for="logo" >Select Logo Image</label>
                         <input type="file" name="logo" class="form-control" placeholder="Logo" required>
                      </div>



                           <!-- <div class="drop-zone">
                              <span class="drop-zone__prompt">Drop file here or click to upload</span>
                              <input type="file" name="myFile" class="drop-zone__input">
                           </div> -->
                        <div class="form-group col-lg-6">
                           <button type="submit" class="btn btn-primary mt-3" >Submit</button>
                        </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> --}}