<html>

<head>
	<?php
	include('connection.php');
	$id = $_GET['id'];
	$sketch = mysqli_query($conn, "SELECT * FROM sketch s inner join lan l on s.select_language = l.lan_id where s.id=$id");
	$sketch_data = mysqli_fetch_assoc($sketch);
	//print_r(sketch_data);//$url = "image_folder_for_sketch/" . $sketch_data['Doctor_image']; //echo $url;
	$Doctor_img_path = "image_folder_for_sketch/" . $sketch_data['Doctor_image']; //echo $url;
	$logo_img_path ="image_folder_for_logo/".$sketch_data['Doctor_logo'];

?>
</head>
<body>
	<h1 style="color:Green;">Desprensive Name:-<?php echo $sketch_data['Dispensary_Name'];?></h1>
	<h1 style="color:Green;">Name:-<?php echo $sketch_data['name'];?></h1>
	<h1 style="color:Green;">Degree:-<?php echo $sketch_data['Degree_name'];?></h1>
	<h1 style="color:Green;">Designation:-<?php echo $sketch_data['Designation'] ;?></h1>
	<h1 style="color:Green;">Location:-<?php echo $sketch_data['Location'];?></h1>
	<p><?php echo $sketch_data['language'];?></p>
	<img src="<?php echo $Doctor_img_path ;?>" class="Doctor_image" style="filter: grayscale(100%);">
	<div style="color:Green;"><a href="downlaod.php?id=<?php echo $id; ?>" style="color:Green;">Downloade</a></div>
	<script>var value=document.getElementsByTagName("html::after");console.log(value);</script>
</body>

</html>