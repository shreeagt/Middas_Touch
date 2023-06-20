<?php
include('connection.php');
echo"<pre>";print_r($_FILES['Doctor_image']);echo"</pre>";echo"<pre>";print_r($_POST);echo"</pre>";echo"<pre>";print_r($_FILES['Doctor_logo']);echo"</pre>";
$array_keys=implode(', ',array_keys($_POST));
$array_keys.=",Doctor_logo,Doctor_image";//echo $array_keys;
$array_value=implode("','",$_POST);
$array_value.="','".$_FILES['Doctor_logo']['name']."','".$_FILES['Doctor_image']['name'];//echo "<br>".$array_value;
$insert="insert into sketch($array_keys)values('$array_value')";echo $insert;
if($_POST['name'] != ''){
    $name=$_POST['name'];
    $Degree_name=$_POST['Degree_name'];
    $sketch_image_pros_name= $_FILES['Doctor_image']['name'];
    $sketch_image_pros_tem_name = $_FILES['Doctor_image']['tmp_name'];
    $logo_name=$_FILES['Doctor_logo']['name'];;
    $logo_temp_name=$_FILES['Doctor_logo']['tmp_name'];;
    $insert="insert into sketch($array_keys)values('$array_value')";
    $run=mysqli_query($conn,$insert);
    if($run){
        move_uploaded_file($logo_temp_name, "image_folder_for_logo/". $logo_name);
        move_uploaded_file($sketch_image_pros_tem_name, "image_folder_for_sketch/". $sketch_image_pros_name);
        $last_id = mysqli_insert_id($conn);
        header("location:fetch_ske.php?id=$last_id"); 
    }else{
        echo"<h1>Your Page Has not Responding Please cordinate yor devloper...</h1>";
    }
    }else{
        echo"<h1>Your Page Has not Responding Please cordinate yor devloper...</h1>";
    }
    

?>