<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.87.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- CSRF Token -->
      @stack('title')
      <!-- css file -->
      <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('theme/css/dashbord_navitaion.css')}}">
      <!-- Responsive stylesheet -->
      <link rel="stylesheet" href="{{asset('theme/css/responsive.css')}}">
      <link rel="stylesheet" href="{{asset('theme/css/home.css')}}">
      <!-- Favicon -->
      <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
      <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
   </head>
   <body>

      <style>
        .banner_text h1 {
            font-size: 25px;
            color:#ffffff;
        }

        .image-container {
      position: relative;
      display: inline-block;
    }

    .image-container:hover {
      border: 2px solid red; /* Change the border style as desired */
    }

    /* .image-container img {
      display: block;
      width: 100%;
      height: auto;
    } */

    .image-container {
    position: relative;
    width: 35vh;
    height: 50vh;
    /* border: 1px dashed  #362d5f;
    display: inline-block; */

}

.disabled{
  pointer-events: none;
    opacity: 0.5;
}

.image-container {
    display: flex;
    position: relative;
    align-items: center;
    justify-content: center;
    /* display: inline-block; */
    border: 2px dashed ;
    transition: border-color 0.5s;
}

    .image-container.highlight {
      border-color: #102a83; /* Change the border color to highlight */
    }

    /* .image-container img {
      display: block;
      width: 100%;
      height: auto;
    } */

    .image-container img {
      display: block;
      width: auto;
      height: 100%;
    }

    
    .hidden {
      display: none; /* Hide the element */
    }

    @media screen and (max-width:600px){
      .banner_text h1 {
            font-size: 21px;
        }

        .image-container {
            width: 80vw;
            height: 56vh;
        }
    }
      </style>
<div class="banner-wrapper pt-md-0 pt-5">
   <img src="{{asset('assets/images/ajantaone-logo.png')}}" alt="logo" class="logo logoposition">
   <div class="container h-lg-100">
      <div class="row justify-content-center align-items-center h-lg-100">
         {{-- <div class="col-lg-6  h-lg-100">
            <div class="img-shree-cover  h-lg-100">
               
               <img src="{{asset('mob_images.png')}}" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid  d-block d-lg-none" alt="docs">
               <img src="{{asset('doc.png')}}" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid d-none d-lg-block" alt="docs">
            </div>
         </div> --}}

         {{-- <div class="col-lg-6"> --}}
         <div class="col-lg-8">
            <div class="col-lg-12">
               <div class="banner_text ">
                  {{-- <h1> Hello  Dr.<span style="color:brown">{{ $doctor->doctorname }} </span><br>Please Upload your Handprint<span class="red" style="color:red">.</span> </h1> --}}
                  <div>
                  <h1> Hello  Dr.<span style="color:#fff">{{ $doctor->doctorname }} </span><br>Your healing hands heal millions of patients </h1>

                  <button type="submit" class="btn btn-primary mb-2" id="btnimge" onclick="showImageContainer()">Click here for Scanner</button>
                </div>
                  <div class="image-container d-none" id="imgcontainer" onclick="showImage()">
                    <p id="palm-text" style="color:#fff">Place your palm</p>
                    <input type="hidden" name="dr_id" value="{{ $doctor->id }}">
                    <img src="{{asset('hand_scanner.gif')}}" class="d-none" id="img-scanner" alt="GIF Image">
                  </div>
                  {{-- <form action="{{ route('doctors.upload') }}" method="post" enctype="multipart/form-data">
                     <div class="mt-2">
                        @include('layouts.partials.messages')
                    </div>
                     @csrf
                     <div class="drop-zone">
                     <input type="hidden" name="dr_id" value="{{ $doctor->id }}">
                     <input type="hidden" name="so_id" value="{{ $doctor->soid }}">
                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                        <input type="file" name="handprintlogo" class="drop-zone__input">
                     </div>
                     <button type="submit" class="btn btn-primary mt-3">Submit</button>
                  </form> --}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</form>

<script>
  function showImageContainer() {
    var imageContainer = document.getElementById("imgcontainer");
    imageContainer.classList.remove("d-none");
    imageContainer.classList.add("highlight");
  }
</script>

<script>
  // function showImage() {
  //   var image = document.getElementById("img-scanner");
  //   var palmText = document.getElementById("palm-text");
  //   var imageContainer = document.getElementById("imgcontainer");

  //   image.classList.remove("d-none");
  //   palmText.classList.add("hidden");
  //   imageContainer.classList.add("highlight");
  // }

  function showImage() {
      var image = document.getElementById("img-scanner");
      var palmText = document.getElementById("palm-text");
      var imageContainer = document.getElementById("imgcontainer");
      var drId = document.getElementsByName("dr_id")[0].value;

      image.classList.remove("d-none");
      palmText.classList.add("hidden");
      imageContainer.classList.add("highlight");

      setTimeout(function() {
        window.location.href = "/thank_you/" + drId;
      }, 5000); // Redirect after 2 seconds
    }

</script>

      {{-- <script>
         document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
           const dropZoneElement = inputElement.closest(".drop-zone");
         
           dropZoneElement.addEventListener("click", (e) => {
             inputElement.click();
           });
         
           inputElement.addEventListener("change", (e) => {
             if (inputElement.files.length) {
               updateThumbnail(dropZoneElement, inputElement.files[0]);
             }
           });
         
           dropZoneElement.addEventListener("dragover", (e) => {
             e.preventDefault();
             dropZoneElement.classList.add("drop-zone--over");
           });
         
           ["dragleave", "dragend"].forEach((type) => {
             dropZoneElement.addEventListener(type, (e) => {
               dropZoneElement.classList.remove("drop-zone--over");
             });
           });
         
           dropZoneElement.addEventListener("drop", (e) => {
             e.preventDefault();
         
             if (e.dataTransfer.files.length) {
               inputElement.files = e.dataTransfer.files;
               updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
             }
         
             dropZoneElement.classList.remove("drop-zone--over");
           });
         });
         
         
         function updateThumbnail(dropZoneElement, file) {
           let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
         
           
           if (dropZoneElement.querySelector(".drop-zone__prompt")) {
             dropZoneElement.querySelector(".drop-zone__prompt").remove();
           }
         
           
           if (!thumbnailElement) {
             thumbnailElement = document.createElement("div");
             thumbnailElement.classList.add("drop-zone__thumb");
             dropZoneElement.appendChild(thumbnailElement);
           }
         
           thumbnailElement.dataset.label = file.name;
         
           // Show thumbnail for image files
           if (file.type.startsWith("image/")) {
             const reader = new FileReader();
         
             reader.readAsDataURL(file);
             reader.onload = () => {
               thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
             };
           } else {
             thumbnailElement.style.backgroundImage = null;
           }
         }
               
      </script> --}}
      {{-- <script>
         function validateForm(event) {
           event.preventDefault(); // Prevent the default form submission
         
           const fileInput = document.querySelector('.drop-zone__input');
           const allowedExtensions = ['jpg', 'jpeg', 'png']; // Allowed video file extensions
           const maxSizeInBytes = 5 * 1024 * 1024; // 2MB
         
           const file = fileInput.files[0];
         
           // Check if a file is selected
           if (!file) {
             alert('Please select a file.');
             return false;
           }
         
           // Check the file extension
           const fileName = file.name;
           const fileExtension = fileName.split('.').pop().toLowerCase();
           if (!allowedExtensions.includes(fileExtension)) {
             alert('Please select a valid video file.');
             return false;
           }
         
           // Check the file size
           if (file.size > maxSizeInBytes) {
             alert('File size exceeds the limit of 2MB.');
             return false;
           }
         
           // Form is valid, submit it
           event.target.submit();
         }
         
         const form = document.querySelector('form');
         form.addEventListener('submit', validateForm);
      </script> --}}
   </body>
</html>