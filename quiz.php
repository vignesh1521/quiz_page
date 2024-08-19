<!DOCTYPE html>
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
		<i class="fa-solid fa-bars"></i>
	</div>


	<div class="menu-items" id='menu'>
		<ul>
			<li><a>Create Your Own Quiz</a><span>X</span></li>
		</ul>
		<ul>
			<li><a>To Create Web Pages</a><span>X</span></li>
		</ul>
		<ul>
			<li><a>Contact us</a><span>X</span></i></li>
		</ul>


	</div>
	<?php
	include "connect.php";


	if (!empty($_GET['user_id'])) {
		$id = $_GET['user_id'];
		$select = "SELECT * FROM details WHERE user_id='$id'";
		$sql = mysqli_query($con, $select);
		$items = mysqli_fetch_assoc($sql);
		if (!empty($_COOKIE[$id])) {
			header('location:sync.php');
		}
		if (isset($_COOKIE['user_id'])) {
			if (mysqli_num_rows($sql) > 0) {
				if ($items['gender'] == "Male") {
					$gen = 'Boy';
				} else {
					$gen = 'Girl';
				}
				if ($_COOKIE['user_id'] == $id) {

					?>
					<div class="header">
						<h2>Congrats <?php echo $items['name'] ?> Your Page Is Ready </h2>
					</div>
					<div class="link">
						<p>Now Share The Link With Your Friends</p>
						<p>Check Their Feedback About You </p>
						<div class="linkbox" id='sell'>
							http://localhost/loginform/quiz.php?user_id=<?php echo $id ?>
						</div><br>
						<span id='copied'></span>
						<div class='copy'>
							<p>Copy Link</p>

						</div>
						<div class="status">

							<a
								href="whatsapp://send?text=🙋‍♀_<?php echo $items['name'] ?> Is Chocolate <?php echo $gen ?> Or Rugged <?php echo $gen ?> ?_ 🙋‍♂%0A*Answer my FriendsQuiz* 🖊📘 %0A😇👇👇👇👇👇😇%0Ahttp://localhost/loginform/quiz.php?user_id=<?php echo $id ?>">
								<p><i class="fa-brands fa-square-whatsapp"></i>Set Status</p>
							</a>

						</div>
						<div class="score">
							<h3>This is Your Score Bord</h3>
							<?php
							$table = "SELECT * FROM answer WHERE user_id='$id'";
							$tb = mysqli_query($con, $table);
							?>
							<div class="board">
								<table class="table">
									<thead>
										<tr>
											<th>
												Name
											</th>
											<th>Answers</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($things = mysqli_fetch_assoc($tb)) {

											?>
											<tr>
												<td id="<?php echo $things['user_id'] ?>">
													<?php echo $things['user_friend_name'] ?>
												</td>
												<td><a
														href="display.php?user_friend=<?php echo $things['user_id'] ?>&user_name=<?php echo $id ?>"><i
															class="fa-regular fa-eye"></i></a></td>
											</tr>
										<?php } ?>
									</tbody>


								</table>
							</div>

						</div>
					</div>


					<?php
				} else {
					?>
					<div class="header">

						<h2>Give Your Answer's For The Questions About <?php echo $items["name"]; ?></h2>
					</div>
					<div class="ins1">
						<h3>Instructions:</h3>
						<ul class="list">
							<li>Enter your name.</li>
							<li>Answer The Questions About Your Friend.</li>
							<li>Dont't Cheat.</li>
							<li>Check Answers In The Score Board.</li>
						</ul>

						<div class="input">
							<h1>Enter Your Name</h1>
							<form method="POST">

								<input type="text" name="user_friend" placeholder="Enter Your Name " autocomplete="off">
								<?php
								if (isset($_POST['submit'])) {
									$user_friend = $_POST['user_friend'];
									if (empty($user_friend)) {
										echo "<p>Please Enter Your Name</p>";
									} else {
										setcookie("user_friend", $user_friend, time() + 60 * 60 * 7);
										setcookie("user_name", $id, time() + 100 * 100 * 100);

										header("location:sync.php");
									}
								}





								?>
								<input type="submit" name="submit" value="submit">

							</form>

						</div>

						<div class=" score">
							<h3>Answer's By Other Friends</h3>

						</div>




						<?php
				}
			} 
			else {

				header("location:index.php");


			}
		} else {
			if (mysqli_num_rows($sql) > 0) {
				?>
					<div class="header">

						<h2>Give Your Answer's For The Questions About <?php echo $items["name"]; ?></h2>
					</div>
					<div class="ins1">
						<h3>Instructions:</h3>
						<ul class="list">
							<li>Enter your name.</li>
							<li>Answer The Questions About Your Friend.</li>
							<li>Dont't Cheat.</li>
							<li>Check Answers In The Score Board.</li>
						</ul>

						<div class="input">
							<h1>Enter Your Name</h1>
							<form method="POST">

								<input type="text" name="user_friend" placeholder="Enter Your Name " autocomplete="off">
								<?php
								if (isset($_POST['submit'])) {
									$user_friend = $_POST['user_friend'];
									if (empty($user_friend)) {
										echo "<p>Please Enter Your Name</p>";
									} else {
										setcookie("user_friend", $user_friend, time() + 500 * 500 * 500);
										setcookie("user_name", $id, time() + 500 * 500 * 500);
										header("location:sync.php");
									}
								}





								?>
								<input type="submit" name="submit" value="submit">

							</form>

						</div>





						<?php
			} else {
				header("location:index.php");

			}



		}

	} else {
		header("location:index.php");
	}


	?>



</body>

</html>