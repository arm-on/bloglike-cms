<!DOCTYPE HTML>
<!--
	Elevation by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<?php include('framework.php');?><?php BL_STATS();?><?php include('seosettings.php');?><?php BL_CKEDITOR_HEAD();?>
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.html">Bloglike</a></h1>
				<nav id="nav">
					<ul style="direction: ltr">
						
						<!--<li>
							<a href="" class="icon fa-angle-down">Page Layouts</a>
							<ul>
								<li><a href="left-sidebar.html">Left Sidebar</a></li>
								<li><a href="right-sidebar.html">Right Sidebar</a></li>
								<li><a href="no-sidebar.html">No Sidebar</a></li>
								<!--<li>
									<a href="">Submenu</a>
									<ul>
										<li><a href="#">Option 1</a></li>
										<li><a href="#">Option 2</a></li>
										<li><a href="#">Option 3</a></li>
										<li><a href="#">Option 4</a></li>
									</ul>
								</li>-->
							<!--</ul>
						</li>-->
						<li><a href="elements.html">دانلود</a></li>
						<li><a href="elements.html">ارتباط با ما</a></li>
						<li><a href="elements.html">درباره ما</a></li>
						<li><a href="elements.html">تالار گفتمان</a></li>
						<li><a href="index.html">صفحه اصلی</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2>سیستم مدیریت محتوای بلاگ لایک</h2>
				<p style="text-align: center">ایده های ساده ، پیاده سازی قوی</p>
				<ul class="actions">
					<li><a href="#" class="button">راهنمای نصب بلاگ لایک</a></li>
				</ul>
			</section>

		<!-- One -->
			<div class="wrapper style1">
				<section id="main" class="container">
					
					<div class="row">
						<div class="8u important(collapse)">
						
							<!-- Content -->
								<section id="content" class="box">
							    <?php session_start();
        if($_GET['do']=="new"&&!BL_USER_IS_LOGGED()){if(isset($_POST['newuser'])){
		if(!isset($_POST['username']) || trim($_POST['username'])==='') echo'لطفا نام کاربری خود را بنویسید';
		elseif(!BL_USER_IS_LOGGED()){if($_POST['password']===$_POST['confrim']){BL_USER_NEW(htmlspecialchars($_POST['username']),md5($_POST['password']),"1",$_POST['avatar'],"0",$_POST['email'],BL_DATE("","return"),$_POST['birthdate'],htmlspecialchars($_POST['name']));header('location: users.php?do=login');}else{echo'پسورد های شما مطابقت نداشتند';}}}
          echo'<form method="post" style="direction:rtl">
          <label>نام شما : </label><input style="width:30%" type="text" class="form-control" name="name" required>
          <label>نام کاربری : </label><input style="width:30%" type="text" class="form-control" name="username">
          <label>پسورد : </label><input style="width:30%" type="password" class="form-control" name="password">
          <label>تکرار پسورد : </label><input style="width:30%" type="password" class="form-control" name="confrim">
          <label>لینک آواتار : </label><input style="width:30%" type="text" class="form-control" name="avatar">
          <label>ایمیل : </label><input style="width:30%" type="email" class="form-control" name="email">
          <label>تاریخ تولد : </label><input style="width:30%" type="text" class="form-control" name="birthdate"><br>
	  <input type="submit" name="newuser" value="ثبت نام">
          ';
        }
	elseif($_GET['do']=="edit"&&BL_USER_IS_LOGGED()){if(isset($_POST['edituser'])){if(!isset($_POST['password']) || trim($_POST['password'])===''){BL_USER_EDIT($_POST['username'],BL_USER_GET_PASS(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return"),"1",$_POST['avatar'],"0",$_POST['email'],BL_DATE("","return"),$_POST['birthdate'],$_POST['name'],BL_USER_GET_PERM(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return"),"1",BL_USER_SEARCH_GET_ID(BL_USER_NAME()));}elseif(isset($_POST['password'])&&($_POST['password']==$_POST['confrim'])){BL_USER_EDIT($_POST['username'],md5($_POST['password']),"1",$_POST['avatar'],"0",$_POST['email'],BL_DATE("","return"),$_POST['birthdate'],$_POST['name'],BL_USER_GET_PERM(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return"),"1",BL_USER_SEARCH_GET_ID(BL_USER_NAME()));}}
          echo'
	  <form method="post" style="direction:rtl">
          <label>نام شما : </label><input style="width:30%" type="text" class="form-control" name="name" value="'.BL_USER_GET_NAME(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return").'">
          <label>نام کاربری : </label><input style="width:30%" type="text" class="form-control" name="username" value="'.BL_USER_NAME().'">
          <label>پسورد : </label><input style="width:30%" type="password" class="form-control" name="password">
          <label>تکرار پسورد : </label><input style="width:30%" type="password" class="form-control" name="confrim">
          <label>لینک آواتار : </label><input style="width:30%" type="text" class="form-control" name="avatar" value="'.BL_USER_GET_AVATAR(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return").'">
          <label>ایمیل : </label><input style="width:30%" type="email" class="form-control" name="email" value="'.BL_USER_GET_EMAIL(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return").'">
          <label>تاریخ تولد : </label><input style="width:30%" type="text" class="form-control" name="birthdate" value="'.BL_USER_GET_BIRTHDATE(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID(BL_USER_NAME())),"return").'">
          <br><input type="submit" class="btn btn-primary" value="ثبت" name="edituser">
          </form>
          ';
        }
        elseif($_GET['do']=="messages"){if(!(!isset($_POST['username']) || trim($_POST['username'])==='')&&isset($_POST['sndmsg'])){BL_MSG_SEND(BL_USER_NAME(),$_POST['username'],$_POST['msg']);
            echo'<label>پیغام با موفقیت ارسال شد</label>';}
          if(isset($_GET['id'])){$i=$_GET['id'];echo'
                            <table style="direction:rtl">
                              <thead>
                                <tr>
                                  <th style="text-align:right" class="active">متن</th>
                                  <th style="text-align:right" class="active">فرستنده</th>
                                  <th style="text-align:right" class="active">زمان</th>
                                  <th style="text-align:right" class="active">تاریخ</th>
                                </tr>
                              </thead>
                              <tbody>
                              <tr><td class="col-sm-4 active">'.BL_MSG_RSV("des",BL_USER_NAME(),$i).'</td>
                            <td class="col-sm-2 active">'.BL_MSG_RSV("frm",BL_USER_NAME(),$i).'</td>
                            <td class="col-sm-2 active">'.BL_MSG_RSV("tm",BL_USER_NAME(),$i).'</td>
                            <td class="col-sm-2 active">'.BL_MSG_RSV("dt",BL_USER_NAME(),$i).'</td></tr></table>
	  ';}else{
          echo'
          <form method="post" style="direction:rtl">
          <label>گیرنده : </label><input style="width:30%" type="text" class="form-control" name="username">
          <label>متن پیغام : </label><br><textarea style="width:30%" type="text" name="msg"></textarea>
          <br><input type="submit" class="btn btn-primary" value="بفرست" name="sndmsg"><br><br></form>
	  ';BL_CKEDITOR_ENABLE("msg");
	  echo'
                            <table style="direction:rtl">
                              <thead>
                                <tr>
                                  <th style="text-align:right" class="active">ردیف</th>
                                  <th style="text-align:right" class="active">فرستنده</th>
                                  <th style="text-align:right" class="active">زمان</th>
                                  <th style="text-align:right" class="active">تاریخ</th>
                                </tr>
                              </thead>
                              <tbody>
			      ';for($i=1;$i<=BL_MSG_COUNT();$i++){echo '
					<tr><td class="col-sm-4 active"><a href="users.php?do=messages&id='.$i.'">'.$i.'</a></td>
				      <td class="col-sm-2 active">'.BL_MSG_RSV("frm",BL_USER_NAME(),$i).'</td>
				      <td class="col-sm-2 active">'.BL_MSG_RSV("tm",BL_USER_NAME(),$i).'</td>
				      <td class="col-sm-2 active">'.BL_MSG_RSV("dt",BL_USER_NAME(),$i).'</td></tr>
			      ';}
                            echo'
			    </tr>
                            </tbody>
                            </table>
			    ';}}
        elseif($_GET['do']=="login"){if(!BL_USER_IS_LOGGED()&&!isset($_POST['loginuser'])){
            echo'
	    <form method="post" style="direction:rtl">
            <label>نام کاربری : </label><input style="width:30%" type="text" name="username">
            <label>پسورد : </label><input style="width:30%" type="password" name="password">
            <br><input type="submit" class="btn btn-primary" value="ورود" name="loginuser">
            </form>
	    ';
        }else{if(!BL_USER_IS_LOGGED()){if(BL_USER_EXIST($_POST['username'],md5($_POST['password']))){$_SESSION['logged_user']=$_POST['username'];header('location:users.php?do=messages');}}}}elseif($_GET['do']=="logout"){session_destroy();header('location:users.php?do=login');}
    ?>
							</section>
								
						</div>
						<div class="4u">
						
							<!-- Sidebar -->
							<?php for($i=1;$i<=BL_MOI_SUBITEMS_COUNT("بی شاخه");$i++){echo'
								<section id="sidebar" class="box">
									<section>
										<h3 style="font-size:16pt;font-weight: 400">'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه").'</h3>
										<p style="font-size: 14pt;font-weight: 300">'.BL_MOI_GET_DES_BY_PRR_AND_FDR($i,"بی شاخه").'</p>
										';for($j=1;$j<=BL_MOI_SUBITEMS_COUNT(BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه"));$j++){echo'
										<a href="'.BL_MOI_GET_DES_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).'">
										'.BL_MOI_GET_TITLE_BY_PRR_AND_FDR($j,BL_MOI_GET_TITLE_BY_PRR_AND_FDR($i,"بی شاخه")).'</a><br>
										';}echo'
										<!--<footer>
											<ul class="actions">
												<li><a href="#" class="button small">Learn More</a></li>
											</ul>
										</footer>-->
									</section>
									<hr />
									
								</section>
							';}?>

						</div>
					</div>
				</section>
				
			</div>
		
		<!-- Two -->
			<div class="wrapper style2" style="height:150px;">
				<section class="container 75%">
					<header class="major">
						<h2>&copy;&nbsp;تمامی حقوق برای سیستم مدیریت محتوای بلاگ لایک محفوظ است</h2>
					</header>
					
					<!--<div class="row uniform">
						<div class="6u">
							<section class="box special">
								<i class="icon major alt fa-bar-chart"></i>
								<h3>Ipsum Feugiat</h3>
								<p>Aliquet ante lobortis semper gravida. quet amet posuere ac cubilia. Eu faucibus mi neque adipiscing mi lorem ipsum dolor sit amet nullam.
								Amet semper interdum nunc aliquam lobortis id lobortis.</p>
							</section>
						</div>
						<div class="6u">
							<section class="box special">
								<i class="icon major alt fa-cog"></i>
								<h3>Lorem Tempus</h3>
								<p>Aliquet ante lobortis semper gravida. quet amet posuere ac cubilia. Eu faucibus mi neque adipiscing mi lorem ipsum dolor sit amet nullam.
								Amet semper interdum nunc aliquam lobortis id lobortis.</p>
							</section>
						</div>
					</div>
					<!--<div class="row uniform">
						<div class="6u">
							<section class="box special">
								<i class="icon major alt fa-desktop"></i>
								<h3>Gravida Adipiscing</h3>
								<p>Aliquet ante lobortis semper gravida. quet amet posuere ac cubilia. Eu faucibus mi neque adipiscing mi lorem ipsum dolor sit amet nullam.
								Amet semper interdum nunc aliquam lobortis id lobortis.</p>
							</section>
						</div>
						<div class="6u">
							<section class="box special">
								<i class="icon major alt fa-check"></i>
								<h3>Ligula Magna</h3>
								<p>Aliquet ante lobortis semper gravida. quet amet posuere ac cubilia. Eu faucibus mi neque adipiscing mi lorem ipsum dolor sit amet nullam.
								Amet semper interdum nunc aliquam lobortis id lobortis.</p>
							</section>
						</div>
					</div>-->
				</section>
			</div>

		<!-- Three -->
			

		<!-- Four -->
			<!--<div class="wrapper style1">
				<section class="container 75%">
					<header class="major">
						<h2>Contact</h2>
						<p>Aliquet ante lobortis non semper gravida. Accumsan faucibus praesent ante aliquet amet posuere ac cubilia. Eu faucibus mi neque adipiscing mi lorem. Semper blandit. Amet adipiscing interdum.</p>
					</header>
					<div id="contact" class="box">
						<div class="row uniform">
							<div class="7u">
								<form method="post" action="#">
									<div class="row uniform 50%">
										<div class="12u">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>
									</div>
									<div class="row uniform 50%">
										<div class="12u">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
									</div>
									<div class="row uniform 50%">
										<div class="12u">
											<textarea name="message" id="message" placeholder="Message" rows="7"></textarea>
										</div>
									</div>
									<div class="row uniform 50%">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" value="Send" /></li>
												<li><input type="reset" class="alt" value="Reset" /></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
							<div class="5u">
								<ul class="labeled-icons">
									<li>
										<h3 class="icon fa-map-marker"><span class="label">Address</span></h3>
										Untitled Corporation<br />
										1234 Somewhere Rd. Suite 5432<br />
										Nashville, TN 00000-0000
									</li>
									<li>
										<h3 class="icon fa-phone"><span class="label">Phone</span></h3>
										(000) 000-0000 x1234
									</li>
									<li>
										<h3 class="icon fa-envelope"><span class="label">Email</span></h3>
										<a href="#">information@untitled.tld</a>
									</li>
									<li>
										<h3 class="icon fa-twitter"><span class="label">Twitter</span></h3>
										<a href="#">twitter.com/untitled-tld</a>
									</li>
									<li>
										<h3 class="icon fa-facebook"><span class="label">Facebook</span></h3>
										<a href="#">facebook.com/untitled-tld</a>
									</li>
									<li>
										<h3 class="icon fa-linkedin"><span class="label">LinkedIn</span></h3>
										<a href="#">linkedin.com/untitled-tld</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			</div>
		
		<!-- Footer -->
		<!--
			<footer id="footer">
				<ul class="menu">
					<li><a href="#">About</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>
-->
	</body>
</html>