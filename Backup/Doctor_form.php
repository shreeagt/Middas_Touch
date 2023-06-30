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
         <img src="images/ajanta-logo.png" alt="logo" class="logo logoposition">
         <div class="container h-lg-100">
            <div class="row justify-content-center align-items-center h-lg-100">
               <div class="col-lg-6  h-lg-100">
                  <div class="img-shree-cover  h-lg-100">

                     <img src="images/home/mob_images.png" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid  d-block d-lg-none" alt="docs">
                     <img src="images/home/doc.png" style="-webkit-animation: bounceHero 5s ease-in-out infinite;" class="img-fluid d-none d-lg-block" alt="docs">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="">
                     <div class="banner_text ">

                     <form id='doctor_form' action="insert_doctor.php" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="form-group col-lg-6">
                        <label for="Dispensary_Name_Pro">Dispensary Name:-</label>
                            <input type="text" name="Dispensary_Name" id="Dispensary_Name_Pro" class="Dispensary_Name form-control" placeholder="Dispensary Name" required>
                        </div>

                    <div class="form-group col-lg-6">
                        <label for="Doctor_Name_pro">Doctor Name :-</label>
                         <input type="text" name="Doctor_Name_pro" id="doctor_name_pro" class="form-control" placeholder="Doctor Name" required>
                    </div>

                    <div class="form-group col-lg-6">
                           <label for="Degree_pro">Degree :-</label>
                         <input type="text" name="Degree_name" id="Degree_pro" class="form-control" placeholder="Doctor Name" required>
                     </div>

                    <div class="form-group col-lg-6">
                         <label for="select_language_pro">Select Language</label>
                         <select name="select_language" class="form-control" id="select_language_pro" required>
                            <option value="">Select language</option>
                            <option value="1">English</option>
                            <option value="2">Hindi</option>
                            <option value="3">Marathi</option>
                            <option value="4">Gujrati</option>
                        </select>
                     </div>

                     <div class="form-group col-lg-6">
                        <label for="Designation_pro">Designation:-</label>
                         <input type="text" name="Designation" id="Designation_pro" class="form-control" placeholder="Designation" required>
                     </div>

                     <div class="form-group col-lg-6">
                         <label for="Location_pro">Location</label>
                         <input type="text" name="Location" id="location_pro" class="form-control" placeholder="Designation" required>
                        </div>

                     <div class="form-group col-lg-6">
                          <label for="Doctor_logo_pro" >Select Logo Image</label>
                         <input type="file" name="Doctor_logo" id="doctor_logo_pro" class="form-control" placeholder="Designation" required>
                      </div>

          

                     <div class="form-group col-lg-6">
                     <label for="Doctor_image_pro" >Select Hand Print Image</label>
                        <input type="file" name="Doctor_image" id="Doctor_image_pro" class="form-control Docotr_image" placeholder="Select Image" required>

                    </div>


                           <!-- <div class="drop-zone">
                              <span class="drop-zone__prompt">Drop file here or click to upload</span>
                              <input type="file" name="myFile" class="drop-zone__input">
                           </div> -->
                        <div class="form-group col-lg-6">
                           <button type="submit" class="btn btn-primary mt-3" id='sub' >Submit</button>
                        </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script>
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
               
      </script>
      <script>
         function validateForm(event) {
           event.preventDefault(); // Prevent the default form submission
         
           const fileInput = document.querySelector('.drop-zone__input');
           const allowedExtensions = ['mp4', 'avi', 'mov']; // Allowed video file extensions
           const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
         
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
      </script>

    <!-- <form id='doctor_form' action="insert_doctor.php" method="post" enctype="multipart/form-data">
        <label for="Dispensary_Name_Pro">Dispensary Name:-</label>
        <input type="text" name="Dispensary_Name" id="Dispensary_Name_Pro" class="Dispensary_Name" required><br><br>
        <label for="Doctor_Name_pro">Doctor Name :-</label>
        <input type="text" id="Doctor_Name_pro" name="name" class="name" required><br><br>
        <label for="Degree_pro">Degree :-</label>
        <input type="Text" id="Degree_pro" name="Degree_name" class="Degree_name" required><br><br>
        <label for="select_language_pro">Select Language</label>
        <select name="select_language" id="select_language_pro" required>
            <option value="">Select language</option>
            <option value="1">English</option>
            <option value="2">Hindi</option>
            <option value="3">Marathi</option>
            <option value="4">Gujrati</option>
        </select><br><br>
        <label for="Designation_pro">Designation:-</label>
        <input type="text" name="Designation" id="Designation_pro" class="Designation" required><br><br>
        <label for="Location_pro">Location</label>
        <input type="text" name="Location" id="Location_pro" class="Location" required><br><br>
        <label for="Doctor_logo_pro" class="hide">Select Image</label>
        <input type="file" name='Doctor_logo' id="Doctor_logo_pro" class="Doctor_logo" required><br><br>
        <label for="Doctor_image_pro" class="hide">Select Image</label>
        <input type="file" name='Doctor_image' id="Doctor_image_pro" class="Docotr_image" required><br><br>
        <input type="submit" id='sub' class='submitt'> -->
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>