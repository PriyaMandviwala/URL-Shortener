<?php

$conn=mysqli_connect("localhost","root","");

$db=mysqli_select_db($conn,"shorturl");
if(!$conn)
{
	die("Connection failed".mysqli_error());
}
if(!$db)
{
	die("Database connection failed".mysqli_error());
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	 
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="style.css">

        <title>URL Shortener</title>
    </head>
    <body>


    	
        <!--===== HEADER =====-->
        <header class="l-header">
            <nav class="nav bd-grid">
                <div>
                	<img src="./images/logo.svg"  class="nav__logo" alt="Shortly" >
                </div>
                
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>

                    <ul class="nav__list">
                        <li class="nav__item"><a href="#Features" class="nav__link active">Features</a></li>
                        <li class="nav__item"><a href="#Pricing" class="nav__link">Pricing</a></li>
                        <li class="nav__item"><a href="#Resources" class="nav__link">Resources</a></li>
                        <li class="nav__item"><a href="#LogIn" class="nav__link">LogIn</a></li>
                        <li class="nav__item"><a href="#SignUp" class="nav__link">SignUp</a></li>

                    </ul>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--===== HOME =====-->
            <section class="home" id="home">
                <div class="home__container bd-grid">
                    <div class="home__img">
                        <img src="./images/illustration-working.svg" alt="My Image" class="img-fluid"  class="float-right" class="img-responsive" class="move"  data-speed="-2">
                    </div>

                    <div class="home__data">
                        <h2 class="home__title">More than just<br> shorter links</h2>
                        <p class="home__description">Build you brand's recognition and get detailed <br> insights on how your links are performing.</p>
                        <a href="#" class="home__button">Get Started</a>
                    </div>
                </div>
            </section>
        </main>
 		<section id="bigColor" style="background-color: #bfbfbf;">
        <div class="second__container">
        	<br>
          	<img src="./images/bg-shorten-desktop.svg" alt="second Image" class="img-fluid"class="img-responsive" class="move1"  data-speed="-2">
            <div class="second__data">
            	<form method="post">
	             	<input type="url" name="urlshort" placeholder="ENter URL here..." required>
				 	<input type="submit" name="submit">
				 </form>
            </div>
        </div>
        </section>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	 <!--===== GSAP =====-->


<?php
	
if(isset($_POST['submit']))
{

	$longurl=$_POST['urlshort'];
	$shorturl=substr(md5(microtime()),rand(0,26),5);
	$insqry="insert into urlshortener(id,longurl,shorturl) values(NULL,'$longurl','$shorturl')";
	$inres=mysqli_query($conn,$insqry);

		?>
		<table class="table_cl">
			<tr>
				<td class="firstclass"><?php echo $longurl ?></td>
				<td class="secondclass" style="text-align: right;"><a href="<?php echo 'http://localhost/url_shortner/'.$shorturl ?>"><input type="
				text" name="sh" readonly="readonly" id="myshortlink" value="<?php echo 'http://localhost/url_shortner/'.$shorturl ?>"/></a></td>
				<td class="thirdclass" style="text-align: right; padding-right: 5px; "><button id="btnCopy" onclick="copytoclipboard()">Copy</button></td>
				
			</tr>
		</table>

<?php
}

if(isset($_GET["link"]))
{
	$link=$_GET["link"];
	$fetchquery= "select * from urlshortener where shorturl='$link'";
	$fetchresult=mysqli_query($conn,$fetchquery);
	while($row = mysqli_fetch_assoc($fetchresult))
	{
		$visitlongurl=$row["longurl"];
		header("Location: $visitlongurl");
		exit();
	}
}
?>
<section id="bigColor" style="background-color: #bfbfbf;">
<div class="third-container">
        	<img src="./images/bg-boost-desktop.svg" alt="third Image" class="img-fluid"class="img-responsive" class="move1"  data-speed="-2">
        	<div class="third-data">
        		<a href="#" class="third-button">Get Started</a>
        	</div>
        </div> 	
</section>

<div class="footer">
		<div class="inner-footer">
			<div class="footer-items">
				<img src="./images/logo.svg"  class="nav__logo" style="color: white;" alt="Shortly" >
			</div>

			<div class="footer-items">
				<h2>Features</h2>
				<div class="border"></div>
				<ul>
					<a href=""><li>Link Shortening</li></a>
					<a href=""><li>Branded Links</li></a>
					<a href=""><li>Analytics</li></a>
				</ul>
			</div>

			<div class="footer-items">
				<h2>Resources</h2>
				<div class="border"></div>
				<ul>
					<a href=""><li>Blogs</li></a>
					<a href=""><li>Developers</li></a>
					<a href=""><li>Support</li></a>
				</ul>
			</div>

			<div class="footer-items">
				<h2>Company</h2>
				<div class="border"></div>
				<ul>
					<a href=""><li>About</li></a>
					<a href=""><li>Our Team</li></a>
					<a href=""><li>Careers</li></a>
					<a href=""><li>Contact</li></a>
				</ul>
			</div>
			<div class="footer-items">
				<div class="social-media">
					<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
				</div>
			</div>
			
		</div>
		<div class="footer-bottom">
			Copyright &copy; Computers & Codes 2020. All rights reserved.
		</div>
	</div>
</body>
</html>	