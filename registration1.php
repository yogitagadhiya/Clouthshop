<html>
<body>
<h1>COVID SURVEY</h1>

<form method="post" enctype="multipart/form-data">
<table>
<tr>
<td> name</td>
<td> <input type="text" name="name"></td>
</tr>
<tr>
<td>address</td>
<td> <input type="text" name="address"></td>
</tr>
<tr>
<td>email</td>
<td> <input type="text" name="email"></td>
</tr>
<tr>
<td>phoneno</td>
<td> <input type="text" name="phoneno"></td>
</tr>

<tr>
<td>city</td>
<td>
            <select name="s1" class="s1">
				<option>rajkot</option>
				<option>surat </option>
				<option>jamnagar</option>
			</select>
</td>
</tr>

<!--<tr>
<td>gender</td>
<td>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">female</label>
 
</td>
</tr>-->
<tr>
<td>language</td>
<td>
            <input type="radio" id="gujarati" name="language" value="gujarati">
            <label for="gujarati">gujarati</label>
            <input type="radio" id=hindi" name="language" value="hindi">
            <label for="hindi">hindi</label>
            <input type="radio" id="english" name="language" value="english">
            <label for="english">english</label>
 
</td>
</tr>


<tr>
<td>survey</td>
<td>
  <input type="checkbox" id="normal" name="survey" value="normal">
  <label for="normal">normal</label>
  <input type="checkbox" id="sever" name="survey" value="sever">
  <label for="sever">sever</label>
  <input type="checkbox" id="mild" name="survey" value="mild">
  <label for="mild">mild</label>
</td>
</tr>




<!--<td> img: </td>
<td><input type="file" name="img" />-->
</td>
</tr>
<tr>
<td><input type="submit" name="Submit"><br></td>
</tr>
</table>
</form>
</body>
</html>


<?php
	include("connect.php");
	
	if(isset($_REQUEST['Submit'])){
		
			 	 $name=$_POST['name'];
                  $address=$_POST['address'];
				 $email=$_POST['email'];
				 $phoneno=$_POST['phoneno'];
				 $city=$_POST['s1'];
				 $language=$_POST['language'];
				 $survey=$_POST['survey'];
			
			/*	$img=$_FILES['img']['name'];
				$target_dir="images/";
				$imgs=$target_dir.basename($img);
				move_uploaded_file($_FILES['img']['tmp_name'],$imgs);*/
			 
				
			 $iquery="insert into registration(id,name,address,email,phoneno,city,language,survey) values(NULL,'".$name."','".$address."','".$email."','".$phoneno."','".$city."','".$language."','".$survey."')"; 
					
						
            
             $p1=mysqli_query($db,$iquery);
             if($p1==1){
                 echo '<script>alert("User Registerd Successfully")</script>';
					}
			if($p1=0){
				 echo"not inserted";
					
					}
				}

	
 ?>
 
 <?php echo $updata['language']; ?>
 <?php echo $updata['survey']; ?>