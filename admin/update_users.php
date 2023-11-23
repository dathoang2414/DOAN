
                <!DOCTYPE html>
                <html lang="en">
              
                <?php


session_start();
error_reporting(0);
include("../connection/connect.php");

if(isset($_POST['submit'] ))
{
    if(empty($_POST['uname']) ||
   	    empty($_POST['fname'])|| 
		empty($_POST['lname']) ||  
		empty($_POST['email'])||
		empty($_POST['password'])||
		empty($_POST['phone']))
		{
			$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Tất cả các trường bắt buộc!</strong>
															</div>';
		}
	else
	{
		

	
	
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
       	$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>email không hợp lệ!</strong>
															</div>';
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Mật khẩu phải >=6!</strong>
															</div>';
	}
	
	elseif(strlen($_POST['phone']) < 10)
	{
		$error = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong> điện thoại không hợp lệ!</strong>
															</div>';
	}
	
	else{
       
	
	$mql = "update users set username='$_POST[uname]', f_name='$_POST[fname]', l_name='$_POST[lname]',email='$_POST[email]',phone='$_POST[phone]',password='".md5($_POST['password'])."' where u_id='$_GET[user_upd]' ";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Người dùng đã cập nhật!</strong></div>';
	
    }
	}

}

?>
              

                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="">
                    <meta name="author" content="">
                    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
                    <title>Cập nhật người dùng</title>
                    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
                    <link href="css/helper.css" rel="stylesheet">
                    <link href="css/style.css" rel="stylesheet">
                </head>
              

                <body class="fix-header">
                    <div class="preloader">
                        <svg class="circular" viewBox="25 25 50 50">
                            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                        </svg>
                    </div>
                    <div id="main-wrapper">

                        <div class="header">
                            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="dashboard.php">

                                        <span><img src="images/icn.png" alt="homepage" class="dark-logo" /></span>
                                    </a>
                                </div>
                                <div class="navbar-collapse">

                                    <ul class="navbar-nav mr-auto mt-md-0">

                                    </ul>

                                    <ul class="navbar-nav my-lg-0">

                                     


                                                                    <li class="nav-item dropdown">

                                <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                    <ul>
                                        <li>
                                            <div class="drop-title">Thông báo</div>
                                        </li>

                                        <li>
                                            <a class="nav-link text-center" href="javascript:void(0);"> <strong>Kiểm tra tất cả các thông báo</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                                </li>


                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                    <ul class="dropdown-user">

                                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                                    </ul>
                                </div>
                                </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                      

                        <div class="left-sidebar">

                            <div class="scroll-sidebar">

                                <nav class="sidebar-nav">
                                    <ul id="sidebarnav">
                                    <li class="nav-devider"></li>
                                        <li class="nav-label">Trang chủ</li>
                                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Bảng điều khiển</span></a></li>
                                        <li class="nav-label">Nhật ký</li>
                                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Người dùng</span></a></li>
                                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Nhà hàng</span></a>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="all_restaurant.php">Tất cả nhà hàng</a></li>
                                                <li><a href="add_category.php">Thêm quốc gia</a></li>
                                                <li><a href="add_restaurant.php">Thêm nhà hàng</a></li>

                                            </ul>
                                        </li>
                                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="all_menu.php">Tất cả thực đơn</a></li>
                                                <li><a href="add_menu.php">Thêm thực đơn</a></li>

                                            </ul>
                                        </li>
                                        <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Đơn đặt hàng</span></a></li>


                                    </ul>
                                </nav>

                            </div>

                        </div>

                        <div class="page-wrapper" style="height:1200px;">
                            <div style="padding-top: 10px;">
                            <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a> là chủ sở hữu duy nhất của tập lệnh này. Nó không phù hợp cho sử dụng cá nhân. Và phát hành nó trong phiên bản demo. Ngoài ra, nó chỉ được cung cấp miễn phí từ <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a>. Đối với bất kỳ vấn đề nào của bạn, hãy liên hệ với chúng tôi trên <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a> facebook group / page or message <a href="https://www.facebook.com/dev.mhrony">META</a> trên Facebook. Cảm ơn vì đã ở bên <a href="https://www.youtube.com/@codecampbdofficial">Mã Trại BD</a>.</marquee>
                            </div>

                            <div class="row page-titles">
                                <div class="col-md-5 align-self-center">
                                    <h3 class="text-primary">Bảng điều khiển</h3>
                                </div>

                            </div>
                         

                            <div class="container-fluid">

                                <div class="row">



                                    <div class="container-fluid">



                                        <?php  
									        echo $error;
									        echo $success; 
											
											
											
											?>




                                        <div class="col-lg-12">
                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white">Cập nhật người dùng</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php $ssql ="select * from users where u_id='$_GET[user_upd]'";
													$res=mysqli_query($db, $ssql); 
													$newrow=mysqli_fetch_array($res);?>
                                                    <form action='' method='post'>
                                                        <div class="form-body">

                                                            <hr>
                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Tên tài khoản</label>
                                                                        <input type="text" name="uname" class="form-control" value="<?php  echo $newrow['username']; ?>" placeholder="Tên tài khoản">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">Tên</label>
                                                                        <input type="text" name="fname" class="form-control form-control-danger" value="<?php  echo $newrow['f_name'];  ?>" placeholder="jon">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                          

                                                            <div class="row p-t-20">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Họ </label>
                                                                        <input type="text" name="lname" class="form-control" placeholder="doe" value="<?php  echo $newrow['l_name']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group has-danger">
                                                                        <label class="control-label">Email</label>
                                                                        <input type="text" name="email" class="form-control form-control-danger" value="<?php  echo $newrow['email'];  ?>" placeholder="example@gmail.com">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                      

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Mật khẩu</label>
                                                                        <input type="text" name="password" class="form-control form-control-danger" value="<?php  echo $newrow['password'];  ?>" placeholder="Mật khẩu">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Điện thoại</label>
                                                                        <input type="text" name="phone" class="form-control form-control-danger" value="<?php  echo $newrow['phone'];  ?>" placeholder="Điện thoại">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                   


                                                        </div>
                                                </div>
                                                <div class="form-actions">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Lưu">
                                                    <a href="all_users.php" class="btn btn-inverse">Hủy bỏ</a>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                  


                                </div>

                            </div>

                            <?php include "include/footer.php" ?>

                        </div>

                    </div>

                    <script src="js/lib/jquery/jquery.min.js"></script>
                    <script src="js/lib/bootstrap/js/popper.min.js"></script>
                    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
                    <script src="js/jquery.slimscroll.js"></script>
                    <script src="js/sidebarmenu.js"></script>
                    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
                    <script src="js/custom.min.js"></script>

                </body>

                </html>
