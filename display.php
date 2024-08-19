<!DOCTYPE html >
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="add/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<script type="text/javascript" src='https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js'></script>
<script src="https://kit.fontawesome.com/3ba83ce4df.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


	<title>FriendsQuiz</title>
</head>
<body>
	<div class="body">
<h2 class="title">Friends Quiz</h2>
<div class="menu" onclick="menu()">
<i class="fa-solid fa-bars"></i></div>


<div class="menu-items" id='menu'>
<ul><li><a>Create Your Own Quiz</a><span>X</span></li></ul>
<ul><li><a>To Create Web Pages</a><span>X</span></li></ul>
<ul><li><a>Contact us</a><span>X</span></i></li></ul>


</div>

 <?php

include 'connect.php';

if(!empty($_GET['user_name']) && !empty($_GET['user_friend'])){
		$id=$_GET['user_name'];
		$user_friend=$_GET['user_friend'];
		$select ="SELECT * FROM details WHERE user_id='$id'";
		$sql=mysqli_query($con,$select);
		$items=mysqli_fetch_assoc($sql);
		if(mysqli_num_rows($sql)>0){
			$ans="SELECT * FROM answer WHERE user_id='$user_friend'";
			$sql1=mysqli_query($con,$ans);
			$question="SELECT *  FROM questions ";
			$base=mysqli_query($con,$question);
			if( $items['gender']=="Male"){
				$gen='male';
		
			}
			elseif ($items['gender']=="Female") {
				$gen='female';
			}
			if(mysqli_num_rows($sql1)>0){
				
				$it=mysqli_fetch_assoc($sql1);
				$x=1;
				?><div class="con3">
				<h2>Feedback From <?php echo $it['user_friend_name']?></h2><?php
				if($it['user_id']==$id){
					while($things=mysqli_fetch_assoc($base)){
						$qn=  str_replace("name",$items['name'], $things[$gen]);

						?>
						<p></p>
						<div class="qn">
							<p class="qnd">Q.<?php echo $qn; ?></p>
							<buuton class="qna"> Ans:<?php echo $it["ans$x"]; ?></button>
						</div>

						<?php
						$x++;
					}
					
				
				}else{
					header('location:index.php');
				}
			}
			else{
				header("location:index.php");
			}
		}


		else{
			header('location:index.php');
		}
}
else{
	header('location:index.php');
}



  ?>




</div>
</div>
</body>
</html>