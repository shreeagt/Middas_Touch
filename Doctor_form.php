<!DOCTYPE html>
<html lang="en">

<head>
    <title>Midars_touch</title>
    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <form id='doctor_form' action="insert_doctor.php" method="post" enctype="multipart/form-data">
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
        <input type="submit" id='sub' class='submitt'>
    </form>
</body>

</html>