<?php
session_start();
if ($_SESSION['name'] && $_SESSION['pass']) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon"  href="img/logo.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>College upload Update </title>
  <link rel="stylesheet" href="./Admin side/bootstrap.min.css">
  <link rel="stylesheet" href="./Admin side/css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
  <?php include('include/aheader.php');?>
	
  <!--================Cart Area =================-->
  <section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>College upload update</h3>
						<form class="row login_form"  id="register_form" method="post"  enctype="multipart/form-data" name="frm">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="College name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'College Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="city" name="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
							</div>
							<div class="col-md-12 form-group">
								<input type="input" class="form-control" id="cpara" name="cpara" placeholder="Something about college" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Something about college'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="clink" name="clink" placeholder="College link" onfocus="this.placeholder = ''" onblur="this.placeholder = 'College link'">
                            </div>
							<div class="col-md-12 form-group">
                                <input type="file" class="form-control" id="email" name="photo" placeholder="Product Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product Name'">
                                <label>Photo</label>
                            </div>
							<div class="col-md-12 form-group">
								<button type="submit" value="ok" name="ok" class="button button-register w-100">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
  <?php
	  	if(isset($_POST['ok']))
		{
			include('conn.php');		
			$t=$_FILES["photo"]["name"];
		if (file_exists("upload/".$_FILES["photo"]["name"])){	
					$rand_name = md5(time());
					$rand_name=rand(0,999999999);
					$pic=$rand_name;
			$pic="upload/".$rand_name.$_FILES["photo"]["name"];
			move_uploaded_file($_FILES['photo']['tmp_name'],$pic);
		}
		else{
		$pic="upload/".$_FILES["photo"]["name"];		
		move_uploaded_file($_FILES['photo']['tmp_name'],$pic);
				}
				$id=$_REQUEST['id'];
		        $query="update collegep set cname='".$_POST['name']."',city='".$_POST['city']."',cpara='".$_POST['cpara']."',photo='$pic',link='".$_POST['clink']."' where id='$id'";
				$result= mysqli_query($conn,$query);
					if($result)
					{
						echo"<script>alert('College updated Sucessfully..')</script>";
					}
					else {
						echo"<script>alert(' Not updated due to some technical issue')</script>";
					}
				}
?>
  <!--================End Cart Area =================-->

  <!--================ Start footer Area  =================-->	
	<footer>
    <?php include ('./Admin side/includeadmin/footer.php')?>
	</footer>
	<!--================ End footer Area  =================-->

  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
<?php
}
else {
    echo "<script>window.location='login.php'</script>";
}
?>