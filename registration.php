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
<td>email</td>
<td> <input type="text" name="email"></td>
</tr>
<tr>
<td>phoneno</td>
<td> <input type="text" name="phoneno" size=12></td>
</tr>
<tr>
<td>address</td>
<td> <input type="text" name="address"></td>
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

<tr>
<td>language</td>
<td>
		
            <input type="radio" id="gujarati" name="language" value="gujarati" >
            <label for="gujarati">gujarati</label>
            <input type="radio" id="hindi" name="language" value="hindi" >
            <label for="hindi">hindi</label>
            <input type="radio" id="english" name="language" value="english" >
            <label for="english">english</label>
			
 
</td>
</tr>

<tr>
<td>survey</td>
<td>
  <input type="checkbox" id="normal" name="survey[]" value="normal"> 
  <label for="normal">normal</label>
  <input type="checkbox" id="sever" name="survey[]" value="sever"> 
  <label for="sever">sever</label>
  <input type="checkbox" id="mild" name="survey[]" value="mild" >
  <label for="mild">mild</label>
  
</td>
</tr>




<td> img: </td>
<td><input type="file" name="img" />
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
	$nameErr = $emailErr = $addressErr = $cityErr = $languageErr = $surveyErr = "";
	$name = $email = $address = $city = $language = $survey ="";
	


	function validate_phone_no($phoneno){
		
		if(preg_match('/^[0-9]{10}+$/', $phoneno)) {
			return true;
		} else {
			echo " Invalid Phone Number";exit;
			return false;
		}
	}

	function validate_email($email)
    {
		if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[ a-z ]{2,3})+$/', $email)) {
			return true;
		} else {
			echo " Invalid email";exit;
			return false;
		}
	}

	function validate_name($name)
	{      
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			return $name;
			//$name = $_POST["name"];
		} 
	}

	function validate_address($address)
	{
		if (empty($_POST["address"])) {
			$addressErr = "address is required";
		} else {
			return $address;
		} 
	}


/*	function validate_language($name)
	{      
		if (empty($_POST["language"])) {
			$languageErr = "language is required";
		} else {
			return $language;
		} 
	}*/

	function validate_survey($survey)
	{
		if (empty($_POST["survey"])) {
			$surveyErr = "survey is required";
		} else {
			return $survey;	
		} 
	}

/*	function validate_survey($name)
	{if (isset($_POST['submit'])) {
		//checking facilities
		$survey = $_POST['survey'];
		  if(empty($survey)) 
		  {
			$msg_survey = "You must select survey";
		  } 
		 
		 if(!empty($_POST['survey'])) {
			$no_checked = count($_POST['survey']);
			if($no_checked<2)
			$msg2_survey = "Select at least two options";
			}
		}
	}	*/



		
	
	if(isset($_REQUEST['Submit'])){
		
		$name 			=$_POST['name'];
		$email 			=$_POST['email'];
		$phoneno		=$_POST['phoneno'];
		$address		=$_POST['address'];
		$city			=$_POST['s1'];
	//	$language		=$_POST['language'];
		
		
		if(validate_phone_no($phoneno)){
		}else{
			echo "Invalid Phone No" ; exit;
		}

		if(validate_email($email)){
		}else{
			echo "Invalid Email" ; exit;
		}

		if(validate_name($name)){
		}else{
			echo " Name is required" ; exit;
		}

		if(validate_address($address)){
		}else{
			echo " address is required" ; exit;
		}

	/*	if(validate_language($language)){
		}else{
			echo " language is required" ; exit;
		}*/

	/*	if(validate_city($city)){
		}else{
			echo " city is required" ; exit;
		}*/

		$img=$_FILES['img']['name'];
		$target_dir="./img/";
		$imgs=$target_dir.basename($img);
		move_uploaded_file($_FILES['img']['tmp_name'],$imgs);

		
		$survey="";  
		foreach($_POST['survey'] as $chk1)  
		{  
			$survey .= $chk1.",";  
		}  

		if(validate_survey($survey)){
		}else{
			echo " survey is required" ; exit;
		}

							
				
		$iquery="insert into registration(id,name,email,phoneno,address,city,language,survey,img)
		values(NULL,'".$name."','".$email."','".$phoneno."','".$address."','".$city."','".$language."','".$survey."','".$img."')"; 
		 
		$p1=mysqli_query($db,$iquery);
		if($p1=1){
			header("location:admin/covidlist.php?msg1=inserted"); 
		}
		if($p1=0){
			echo"not inserted";
		}

		exit;
	}

	
 ?>
 
 