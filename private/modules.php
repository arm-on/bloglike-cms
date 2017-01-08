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
                if(BL_USER_IS_LOGGED()&&BL_USER_IS_ADMIN(BL_USER_NAME()))
                {
                    $hmpp=10;//how many posts per page
                    $hmp=(BL_PAGE_COUNT()%$hmpp==0)?BL_PAGE_COUNT()/$hmpp:BL_PAGE_COUNT()/$hmpp+1;//how many pages
                    $hmpts=7;//how many pages to show
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">ماژول ها / پلاگین ها</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                        echo'<a href="menus.bl" class="btn btn-primary" style="margin-right:20px;width:200px;">منو ها</a>';
                        echo'<a href="uploader.bl" class="btn btn-warning" style="margin-right:20px;width:200px;">آپلود</a>';
                    echo'</div></div>
                    </div>';
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