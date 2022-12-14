<?php
session_start();
if ($_SESSION['name'] && $_SESSION['pass']) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon"  href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog upload list</title>
    <link rel="stylesheet" href="./Admin side/bootstrap.min.css">
    <link rel="stylesheet" href="./Admin side/css/style.css">
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    <?php include('include/aheader.php');?>

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr.no</th>
                                <th scope="col">Title</th>
                                <th scope="col">Date</th>
                                <th scope="col">Paragraph</th>
                                <th scope="col">link</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                <?php

                                    include('conn.php');
                                    $q="select * from blog";
                                    $r=mysqli_query($conn,$q);
                                    $n=mysqli_num_rows($r);
                                    $a=1;
                                    while ($row=mysqli_fetch_assoc($r)) {
                              ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-body">
                                            <p><?php echo $a;?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5><?php echo $row['title'];?></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <h5><?php echo $row['date'];?></h5>
                                    </div>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <h5><?php echo $row['para'];?></h5>
                                    </div>
                                </td>
                                <td>
                                    
                                    <div class="product_count">
										<h5><?php echo $row['link'];?></h5>
                                    </div>
                                </td>
                                <td>
                                <div class="product_count">
                                        <img src="<?php echo $row['img'] ?>" alt="error" width='100' height='100'
                                            srcset="">
                                    </div>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <h5><a href='admin4.2.php?id=<?php echo $row['id']; ?>' class="btn btn-primary">Edit</a></h5>
                                    </div>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <h5><a href='./Admin side/bdelete.php?id=<?php echo $row['id']; ?>'class="btn btn-primary">Delete</a></h5>
                                    </div>
                                </td>
                            </tr>
                            <?php $a++;} ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php
	  	
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