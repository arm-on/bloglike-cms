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
                                <div class="fix-all">کاربران</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                                        echo'<form method="post"><input type="text" class="form-control input-st-2" name="username" id="username">
                                        <input type="submit" class="btn btn-primary" style="margin-right:20px" value="جستجو" name="search"></form>';
                                        echo'<br><a href="levels.bl" class="btn btn-warning" style="margin-right:20px">سطوح کاربری</a>';
                                        if(isset($_POST['search']))
                                        {
                                            echo'<label class="label-st-1">نتایج جستجو</label><br><br>';
                                     echo'  <div class="table-responsive col-sm-10" style="float:right;direction:rtl"><table class="table table-bordered">
                                              <thead>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                <td class="col-sm-2 active">نام کاربری</td>
                                                <td class="col-sm-2 active">نام واقعی</td>
                                                <td class="col-sm-2 active">تاریخ تولد</td>
                                                <td class="col-sm-2 active">تاریخ عضویت</td>
                                                <td class="col-sm-2 active">درجه کاربری</td>
                                                <td class="col-sm-2 active">ایمیل</td>
                                                </tr>
                                                ';
                                                for($i=1;$i<=BL_USER_SEARCH_COUNT($_POST['username']);$i++)
                                                {
                                                 echo '<tr><td class="col-sm-2 active">'.'<a href="users.bl?do=edit&user='.BL_USER_SEARCH($_POST['username'],$i).'">'.BL_USER_SEARCH($_POST['username'],$i).'</a></td>';
                                                 echo '<td class="col-sm-2 active">'.BL_USER_GET_NAME(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID($_POST['username'])),"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.BL_USER_GET_BIRTHDATE(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID($_POST['username'])),"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.BL_USER_GET_REGDATE(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID($_POST['username'])),"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.BL_USER_PERM(BL_USER_SEARCH($_POST['username'],$i)).'</td>';
                                                 echo '<td class="col-sm-2 active">'.BL_USER_GET_EMAIL(BL_USER_GET_MYID(BL_USER_SEARCH_GET_ID($_POST['username'])),"return").'</td>';
                                                }
                                                echo'</tr>';
                                                echo'
                                                </tbody>
                                                </table></div>';
                                        }
                                        if(isset($_GET['do'])&&$_GET['do']=="edit"&&isset($_GET['user']))
                                        {
                                            echo'<form method="post"><br><select name="level" class="form-control input-st-2">';
                                            echo'<option value="'.BL_USER_PERM($_GET['user']).'">'.BL_USER_PERM($_GET['user']).'</option>';
                                            for($i=1;$i<=BL_LEVEL_COUNT();$i++)
                                            {
                                                if(!(BL_USER_PERM($_GET['user'])==BL_LEVEL_NAME($i,"return")))
                                                echo'<option value="'.BL_LEVEL_NAME($i,"return").'">'.BL_LEVEL_NAME($i,"return").'</option>';
                                            }
                                            echo'</select>';
                                            echo'<script>
                                            var searchbox=document.getElementById("username");
                                            var vbl="<?php echo $_GET["user"];?>";
                                            searchbox.innerHTML="<?php echo $_GET["user"];?>";
                                            </script>';
                                            echo'
                                            <input type="submit" class="btn btn-success input-st-2" style="width:150px" value="تغییر سطح دسترسی" name="changelevel">
                                            <input type="submit" class="btn btn-danger input-st-2" style="width:100px" value="حذف کاربر" name="deleteuser">
                                            </form>';
                                            if(isset($_POST['changelevel']))
                                            {
                                                BL_USER_EDIT_PERM($_GET['user'],$_POST['level']);
                                                echo'<script>
                                                window.location.href = "users.bl";
                                                </script>';
                                            }
                                            if(isset($_POST['deleteuser']))
                                            {
                                                BL_USER_DELETE($_GET['user']);
                                                echo'<script>
                                                window.location.href = "users.bl";
                                                </script>';
                                            }
                                        }
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