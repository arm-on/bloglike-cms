<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BL ADMIN</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet/less" href="less/styles.less" type="text/css">
        <script src="js/less.min.js"></script>
        <?php include_once("framework.php");?>
            <?php BL_CKEDITOR_HEAD();?>
    </head>
    <body>
        <?php
            session_start();
            //$_SESSION['logged_user']="admin";
            ?>
        <div class="topmenu">
            <div class="col-sm-10">
                  <input type="text" class="form-control search" id="usr">
            </div>
            <div class="col-sm-2">
                <img class="img-responsive icon-menu" src="img/icon/menu.png">
                <h4>پنل مدیریت</h4>
            </div>
        </div>
        <div class="main">
            <div class="col-sm-10 boxes">
                <?php
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">ورود به پنل مدیریت</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px;direction:rtl">';
                    if(isset($_POST['loginuser'])&&isset($_POST['username'])&&isset($_POST['password']))
                    {
                        if(BL_USER_EXIST($_POST['username'],md5($_POST['password']))) {$_SESSION['logged_user']=$_POST['username'];
                        header('location:index.bl');}
                    }
                    elseif(!BL_USER_IS_LOGGED())
                    {
                        echo'
                        <form method="post"><label class="txt label-st-1">نام کاربری : </label><input type="text" name="username" class="form-control input-st-2"><br><br>
                        <label class="txt label-st-1">رمز عبور : </label><input type="password" name="password" class="form-control input-st-2"><br><br>
                        <input type="submit" class="btn btn-primary" style="margin-right:10px" name="loginuser" value="ورود به پنل"></form>
                         </div>
                        </div></div></div>';
                    }
                
                ?>
            </div>
            <div class="col-sm-2 items">
                <div class="row">
                    <?php include("sidebar.php");?>
                </div>
                
            </div>
        </div>
    </body>
</html>