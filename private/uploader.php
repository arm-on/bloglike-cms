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
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="upload-page">آپلود فایل</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    echo'<div class="wrapper" style="margin-bottom:20px">
                         <div class="upload-console">
                             <h2 class="upload-console-header">آپلود</h2>
                             <div class="upload-console-body">
                                 <br><br><h3 style="float:right">فایل ها را از کامپیوترتان انتخاب کنید</h3><br>&nbsp;<br>&nbsp;<br>&nbsp;
                                 <form action="upload.php" method="post" enctype="multipart/form-data">
                                     <input type="file" class="form-control" name="files[]" id="standard-upload-files" multiple>
                                     <input type="submit" class="form-control btn-primary" style="width:40%;margin-left:30%;margin-top:5px" value="آپلود را شروع کن" id="standard-upload">
                                 </form>
                                 <h3>یا آنها را در قسمت پایین بکشید و رها کنید</h3>
                                 <div class="upload-console-drop" id="drop-zone" style="font-size:14pt">
                                     محل رهاسازی فایل ها
                                 </div>
                                 <div class="bar">
                                     <div class="bar-fill" id="bar-fill">
                                         <div class="bar-fill-text" id="bar-fill-text"></div>
                                     </div>
                                 </div>
                                 <!--class="hidden"-->
                                 <div id="uploads-finished" class="hidden">
                                     <h3>Processed files</h3>
                                     <!--<div class="upload-console-upload">
                                         <a href="">filename.jpg</a>
                                         <span>Success</span>
                                     </div>-->
                                 </div>
                             </div>
                         </div>
                     </div>
                    </div></div></div>
                     <script src="js/global.js"></script>
                     <script src="js/upload.js"></script>';
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