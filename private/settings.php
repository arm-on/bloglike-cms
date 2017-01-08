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
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/chart.css">
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
                                <div class="fix-all">تنظیمات</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                                        if(isset($_POST['seosubmit']))
                                        {
                                            $seo=array('title'=>$_POST['title'],'description'=>$_POST['description'],'ogtitle'=>$_POST['ogtitle'],'ogsitename'=>$_POST['ogsitename']
                                            ,'oglocale'=>$_POST['oglocale'],'ogtype'=>$_POST['ogtype'],'ogimage'=>$_POST['ogimage'],'ogurl'=>$_POST['ogurl']
                                            ,'ogdescription'=>$_POST['ogdescription'],'twittercard'=>$_POST['twittercard'],'twitterurl'=>$_POST['twitterurl'],'twitterdescription'=>$_POST['description'],'twitterimage'=>$_POST['twitterimage']);
                                            $myfile = fopen("seo.php", "w") or die("Unable to open file!");
                                            fwrite($myfile, json_encode($seo));
                                            fclose($myfile);
                                        }
                                        $nowseopage = file_get_contents('seo.php');
                                        $nowseo=json_decode($nowseopage);
                                        echo'<form method="post" style="direction:rtl">
                                        <label class="txt label-st-1">عنوان سایت</label>
                                        <input type="text" class="form-control input-st-2" name="title" value="'.$nowseo->{'title'}.'"><br><br>
                                        <label class="txt label-st-1">توضیحات سایت</label>
                                        <textarea class="form-control input-st-2" name="description">'.$nowseo->{'description'}.'</textarea><br>&nbsp;<br><br><br>
                                        <label class="txt label-st-1">تگ og:title در فیسبوک</label>
                                        <input type="text" class="form-control input-st-2" name="ogtitle" value="'.$nowseo->{'ogtitle'}.'"><br><br>
                                        <label class="txt label-st-1">تگ og:site_name در فیسبوک</label>
                                        <input type="text" class="form-control input-st-2" name="ogsitename" value="'.$nowseo->{'ogsitename'}.'"><br><br>
                                        <label class="txt label-st-1">تگ og:locale در فیسبوک</label>
                                        <input type="text" class="form-control input-st-2" name="oglocale" value="'.$nowseo->{'oglocale'}.'"><br><br>
                                        <label class="txt label-st-1">تگ og:type در فیسبوک</label>
                                        <input type="text" class="form-control input-st-2" name="ogtype" value="'.$nowseo->{'ogtype'}.'"><br><br>
                                        <label class="txt label-st-1">تگ og:image در فیسبوک</label>
                                        <input type="text" class="form-control input-st-2" name="ogimage" value="'.$nowseo->{'ogimage'}.'"><br><br>
                                        <label class="txt label-st-1">تگ og:url در فیسبوک</label>
                                        <input type="text" class="form-control input-st-2" name="ogurl" value="'.$nowseo->{'ogurl'}.'"><br><br>
                                        <label class="txt label-st-1">تگ og:description در فیسبوک</label>
                                        <input type="text" class="form-control input-st-2" name="ogdescription" value="'.$nowseo->{'ogdescription'}.'"><br><br>
                                        <label class="txt label-st-1">تگ twitter:card در توئیتر</label>
                                        <input type="text" class="form-control input-st-2" name="twittercard" value="'.$nowseo->{'twittercard'}.'"><br><br>
                                        <label class="txt label-st-1">تگ twitter:url در توئیتر</label>
                                        <input type="text" class="form-control input-st-2" name="twitterurl" value="'.$nowseo->{'twitterurl'}.'"><br><br>
                                        <label class="txt label-st-1">تگ twitter:description در توئیتر</label>
                                        <input type="text" class="form-control input-st-2" name="twitterdescription" value="'.$nowseo->{'twitterdescription'}.'"><br><br>
                                        <label class="txt label-st-1">تگ twitter:image در توئیتر</label>
                                        <input type="text" class="form-control input-st-2" name="twitterimage" value="'.$nowseo->{'twitterimage'}.'"><br><br>
                                        <input type="submit" class="btn btn-success" value="ثبت کن" style="margin-right:20px;margin-bottom:10px" name="seosubmit">
                                        </form>';
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