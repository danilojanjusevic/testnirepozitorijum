<?php
session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
require_once "config.php";





  $sql = "SELECT * FROM admin WHERE username='".$_SESSION['username']."'";
  $sth = $link->query($sql);
  $result=mysqli_fetch_array($sth);
    $getit = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($getit);


  $sql3= "SELECT u.idUser,u.username FROM admin a JOIN user u ON a.idAdmin=u.idAdmin WHERE a.username= '".$_SESSION['username']."'";
	$result3 = $link->query($sql3);
	$row3 = mysqli_fetch_assoc($result3);

    


?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Phantom by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Phantom</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="logout.php">Logout</a></li>
							<li><a href="addUser.php">Add new user</a></li>
							
							
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1>This is Phantom, social network for images.</h1>
								<p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>
							</header>

							<div style="text-align: center;">
            <h1>Change informations about emoployee</h1>
            <?php
            $status = "";
            if(isset($_POST['new']) && $_POST['new']==1)
            {
            $idUser=$_REQUEST['idUser'];
            $username =$_REQUEST['username'];
            
            
            
            $update="update user set username='".$username."' where idUser='".$idUser."'";
            mysqli_query($link, $update) or die(mysqli_error($link));
            $status = "Chech changes. </br></br>
            <a href='admin.php'>Changes</a>";
            echo '<p>'.$status.'</p>';
            }else {
            ?>
            <div>
            <form name="form" method="post" action=""> 
            <input type="hidden" name="new" value="1" />
            <input name="idUser" type="hidden" value="<?php echo $row3['idUser'];?>" />
            <label>Username</label>
            <p><input  type="text" name="username" 
            required value="<?php echo $row3['username'];?>" /></p>
            
            <p><input   name="submit" type="submit" value="Change" /></p>
            
            </form>
            <?php } ?>
            </div>
            </div>
						</div>


					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
									<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
									<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
									<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: Natalija</a></li>
							</ul>
						</div>
					</footer>

			</div>

			<script>
    function myFunction() {
     
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

    
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>