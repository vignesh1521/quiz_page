<!DOCTYPE html >
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="add/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/3ba83ce4df.js" crossorigin="anonymous"></script>

<script type="text/javascript" defer src="add/java.js"></script>
	<title>FriendsQuiz</title>
</head>
<body>
<h2 class="title">Friends Quiz</h2>
<div class="menu" onclick="menu()">
<i class="fa-solid fa-bars"></i></div>


<div class="menu-items" id='menu'>
	<ul><li><a>Create Your Own Quiz</a><span>X</span></li></ul>
<ul><li><a>To Create Web Pages</a><span>X</span></li></ul>
<ul><li><a>Contact us</a><span>X</span></i></li></ul>


</div>

<div class="ins">
	<h2>Find How Your Friends Think Of You ?</h2></div>

	<div class="ins1">
<h3>Instructions:</h3>
<ul class="list">
<li>Enter your name</li>
<li>Answer any 10 Questions about yourself</li>
<li>Your quiz-link will be ready</li>
<li>Share your quiz-link with your friends</li>
<li>Your friends will try to guess the right answers</li>
<li>Check the score of your friends at your quiz-link!</li>
</ul>


<div class="input">
	<h1>Create Your Quiz</h1>

	<form method="POST">
		<select name="gender">
			<option>Select Your Gender</option>
			<option>Male</option>
			<option>Female</option>
		</select>

		
	<input type="text" name="name" placeholder="Enter Your Name"  autocomplete="off">
		<?php 
		
		include 'connect.php';

	if(isset($_POST['submit'])){
		
   		$gender=$_POST['gender'];

		$symbols= array('<','>','/','=','.',"'",'"','(',')',','," ");
		for($i=0;$i<1;$i++){
			$name=str_replace($symbols, "", $_POST['name']);
			}
	
	if ($gender == 'Select Your Gender') {
	echo "<p>please Select Your Gender</P>";
	}
	elseif($gender!= "Male" && $gender!="Female"){
		echo "<p>please Select Your Gender</P>";
	}
	elseif(empty($name)){
		echo "<p>Please Enter Your Name</P>";
	}
	else{
		
		 	
		$user_id=rand(1,9999999999999999);
		$sql1="SELECT user_id FROM  details WHERE user_id='$user_id'";
		$result1=mysqli_query($con,$sql1);
		
		if(mysqli_num_rows($result1)>0){
			echo "<script>alert('Please Enter The Details Again Because Of Some Isusses ')</script>";
		}
		else{
			
			$sql="INSERT INTO details(`user_id`,`gender`,`name`) values($user_id,'$gender','$name')";
				setcookie('user_id',$user_id,time()+500*500*500);
			$result=mysqli_query($con,$sql);
			header("location:quiz.php?user_id=$user_id");
			
		}
	}
	
}

?>
	<input type="submit" name="submit" value="submit"></form>

</div>
</div>
</body>
</html>