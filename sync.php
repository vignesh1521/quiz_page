<!DOCTYPE html>
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
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"
		integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="add/java.js"></script>
	<script type="text/javascript" defer src="java.js"></script>

	<title>FriendsQuiz</title>
</head>

<body>
	<div class="body">
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
		include 'connect.php';

		if (!empty($_COOKIE['user_friend']) && !empty($_COOKIE['user_name'])) {

			$symbols = array('<', '>', '/', '=', '.', "'", '"', '(', ')', ',');
			for ($i = 0; $i < 1; $i++) {
				$user_name = str_replace($symbols, " ", $_COOKIE['user_friend']);
				$id = str_replace($symbols, " ", $_COOKIE['user_name']);
			}
			$select = "SELECT * FROM details WHERE user_id='$id'";
			$sql = mysqli_query($con, $select);
			$items = mysqli_fetch_assoc($sql);
			if (!empty($_COOKIE[$id])) {
				$cook = $_COOKIE[$id];

				if (mysqli_num_rows($sql) > 0) {
					?>
					<div class="feed">
						<div class="back">
							<p class="title">Congratulations!</p>

							<div class="con">
								<div class="p">


									<p>
										Now it's your turn
									</p>
									<p>
										Create you own Friend ship diary and send it to your firend!
									</p>
								</div>
								<div class="opt">
									<a href='index.php'>
										<input type="button" name="submit" value="Create your's Quiz "></a>


									<div class="del">
										<h2>FriendBord of <?php echo $items["name"]; ?> </h2>
									</div>
									<?php $table = "SELECT * FROM answer WHERE user_id='$id'";
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
												while ($things = mysqli_fetch_assoc($tb)) { ?>
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
						</div>
					</div>



				<?php
				} else {
					header("location:index.php");
				}


			} else if (!empty($_COOKIE['option1']) && !empty($_COOKIE['option2']) && !empty($_COOKIE['option3']) && !empty($_COOKIE['option4']) && !empty($_COOKIE['option5']) && !empty($_COOKIE['option6']) && !empty($_COOKIE['option7']) && !empty($_COOKIE['option8']) && !empty($_COOKIE['option9']) && !empty($_COOKIE['option10']) && !empty($_GET['submit'])) {
				if (mysqli_num_rows($sql) > 0) {
					$answer1 = $_COOKIE['option1'];
					$answer2 = $_COOKIE['option2'];
					$answer3 = $_COOKIE['option3'];
					$answer4 = $_COOKIE['option4'];
					$answer5 = $_COOKIE['option5'];
					$answer6 = $_COOKIE['option6'];
					$answer7 = $_COOKIE['option7'];
					$answer8 = $_COOKIE['option8'];
					$answer9 = $_COOKIE['option9'];
					$answer10 = $_COOKIE['option10'];

					if ($answer1 == 'Rugged' || $answer1 == 'Chocolate') {
						if ($answer2 == 'Love' || $answer2 == 'Friend' || $answer2 == 'Bestie' || $answer2 == 'Cousin' || $answer2 == 'All of these') {

							if ($answer3 == 'Yes' || $answer3 == 'No' || $answer3 == 'LifeTime') {

								if ($answer4 == 'Attitude' || $answer4 == 'Caring' || $answer4 == 'Appearance' || $answer4 == "Kindness") {

									if ($answer5 == 'CareLess' || $answer5 == 'Behaviours' || $answer5 == 'Attitude' || $answer5 == 'None of these') {

										if ($answer6 == 'ChildHood' || $answer6 == 'InSchool' || $answer6 == 'InCollege' || $answer6 == 'InMyArea' || $answer6 == 'None of these') {

											if ($answer7 == 'Yes' || $answer7 == 'No' || $answer7 == 'MoreSecrets') {

												if ($answer8 == '0-5' || $answer8 == '5-7' || $answer8 == '7-8' || $answer8 == '8-9' || $answer8 == '10') {

													if ($answer9 == 'WhatsApp' || $answer9 == 'Instagram' || $answer9 == 'Facebook' || $answer9 == 'PhoneCalls' || $answer9 == 'Others') {

														if ($answer10 == 'GoingToMovies' || $answer10 == 'LongTrip' || $answer10 == "SpendingTime" || $answer10 == 'BikeRide' || $answer10 == 'others') {
															setcookie($id, $id, time() + 500 * 500 * 500);

															$insert = "INSERT INTO answer(user_id,user_friend_name,ans1,ans2,ans3,ans4,ans5,ans6,ans7,ans8,ans9,ans10) values('$id','$user_name','$answer1','$answer2','$answer3','$answer4','$answer5','$answer6','$answer7','$answer8','$answer9','$answer10')";
															$ansins = mysqli_query($con, $insert);

															?>
																<div class="feed">
																	<div class="back">
																		<p class="title">Congratulations!</p>

																		<div class="con">
																			<div class="p">
																				<p>
																					Now it's your turn
																				</p>
																				<p>
																					Create you own Friend ship diary and send it to your firend!
																				</p>
																			</div>
																			<div class="opt">
																				<a href='index.php'>
																					<input type="button" name="submit" value="Create your's Quiz "></a>


																				<div class="del">
																					<h2>FriendBord of <?php echo $items["name"]; ?> </h2>
																				</div>
																			<?php $table = "SELECT * FROM answer WHERE user_id='$id'";
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
																						while ($things = mysqli_fetch_assoc($tb)) { ?>
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
																	</div>
																</div>
															<?php




														} else {
															header('location:index.php');

														}
													} else {
														header('location:index.php');

													}
												} else {
													header('location:index.php');

												}


											} else {
												header('location:index.php');

											}
										} else {
											header('location:index.php');
										}
									} else {
										header('location:index.php');
									}
								} else {
									header('location:index.php');
								}

							} else {
								header('location:index.php');
							}
						} else {
							header('location:index.php');
						}

					} else {
						header('location:index.php');
					}

				} else {
					header("location:index.php");
				}


			} else if (mysqli_num_rows($sql) > 0) {


				if ($items['gender'] == "Male") {
					$gen = 'male';

				} elseif ($items['gender'] == "Female") {
					$gen = 'female';
				}

				?>
						<div class="feed">
							<h1>Give Your Answer's For The Questions About
						<?php echo $items["name"]; ?>
							</h1>

						<?php

						$question = "SELECT *  FROM questions ";
						$base = mysqli_query($con, $question);
						$id = 1;
						//name is a rugged rugged girl or chocoloate girl
						while ($things = mysqli_fetch_assoc($base)) {
							$qn = str_replace("name", $items['name'], $things[$gen]);

							$option1 = $things['opt1'];
							$option2 = $things['opt2'];
							$option3 = $things['opt3'];
							$option4 = $things['opt4'];
							$option5 = $things['opt5'];
							?>
								<div class="back">
									<p class="title"><?php echo $items['name'] ?>'s Friendship Dare</p>
									<div class="con">
										<div class="question">
											<h3><?php
											echo $qn; ?>
											</h3>
											<div class="options" id="options">
												<form name="myform">
													<div class="form">
													<?php
													if (!empty($option1)) {

														?>
															<li><input type="radio" class="list" name="option<?php echo $id; ?>" value="<?php
															   echo $option1; ?>" id="<?php
																echo $option1; ?>">
																<label for="<?php
																echo $option1; ?>">
																<?php
																echo $option1;
																?>
															</li></label><br><?php
													}
													if (!empty($option2)) {

														?>
															<li><input type="radio" class="list" name="option<?php echo $id; ?>"
																	value="<?php echo $option2; ?>" id="<?php echo $option2; ?>">
																<label for="<?php echo $option2; ?>">
																<?php
																echo $option2;
																?>
															</li></label><br><?php
													}

													if (!empty($option3)) {

														?>
															<li><input type="radio" class="list" name="option<?php echo $id; ?>" id="<?php
															   echo $option3;
															   ?>" value="<?php
															   echo $option3;
															   ?>"><label for="<?php
															   echo $option3;
															   ?>"><?php
															   echo $option3;
															   ?></label></li><br><?php
													}
													if (!empty($option4)) {

														?>
															<li><input type="radio" class="list" name="option<?php echo $id; ?>" id="<?php
															   echo $option4;
															   ?>" value="<?php
															   echo $option4;
															   ?>"> <label for="<?php
															   echo $option4;
															   ?>"><?php
															   echo $option4;
															   ?></label></li><br><?php
													}
													if (!empty($option5)) {

														?>
															<li><input type="radio" class="list" name="option<?php echo $id; ?>" value="<?php
															   echo $option5;
															   ?>" id="<?php
															   echo $option5;
															   ?>"><label for="<?php
															   echo $option5;
															   ?>"><?php
															   echo $option5;
															   ?></label></li><br><?php

													}

													?>

														<p id='radioalert<?php echo $id ?>'></p>
													</div>
											<?php
											if ($id == 10) {
												?>
														<input type="button" onclick="res(10)" name="submit" value='Submit'>
												<?php

											} else {
												?>
														<input onclick="re(<?php echo $id;
														$id++; ?>)" type="button" name="" value='Next'>
												<?php
											}

											?>

												</form>
											</div>
										</div>
									</div>





								</div>
						<?php
						}
			} else {
				header("location:index.php");
			}





		} elseif (!empty($_COOKIE['user_name'])) {
			$id = $_COOKIE['user_name'];
			echo header("location:quiz.php?user_id=$id");
		} else {
			header("location:index.php");
		}




		?>
		</div>
</body>

</html>