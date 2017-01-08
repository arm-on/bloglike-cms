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
                if(BL_USER_IS_LOGGED()&&BL_USER_IS_ADMIN(BL_USER_NAME())&&BL_USER_POST_DELETE(BL_USER_NAME()))
                {
                   if(!isset($_GET['do']))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">فهرست موضوعات</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    if(isset($_POST['newcat']))
                    {
                        BL_CAT_NEW($_POST['name']);
                        echo'موضوع جدید با موفقیت ایجاد شد';
                    }
                    echo'<form method="post" style="text-align:center"><label class="txt label-st-1">عنوان موضوع</label>
                        <input type="text" class="form-control input-st-1" id="title" name="name">';
                    echo' <input type="submit" class="btn btn-primary" role="button" style="margin-left:25%" value="ایجاد موضوع جدید" name="newcat">';
                    echo'
                    <br><br>
                            <div class="table-responsive" style="float:right;margin-right:5%;width:90%;direction: rtl">          
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th style="text-align:center" class="active">عنوان مطلب</th>
                                  <th style="text-align:center" class="active">شماره در پایگاه داده</th>
                                  <th style="text-align:center" class="active">شماره در سیستم</th>
                                </tr>
                              </thead>
                              <tbody>';           
                                                for($i=1;($i<=BL_CAT_COUNT());$i++)
                                                {
                                                 echo '<tr><td class="col-sm-4 active">'.'<a href="cats.bl?do=edit&id='.$i.'">'.BL_CAT_NAME($i,"return").'</a></td>';
                                                 echo '<td class="col-sm-2 active">'.BL_CAT_ID_BY_MYID($i,"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.$i.'</td></tr>';
                                                }
                                                echo'</tr>';
                                                echo'
                                                </tbody>
                                                </table></div>';
                    
                    echo'</div></div>
                    </div>';
                   }
                   elseif($_GET['do']=="edit"&&isset($_GET['id']))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">فهرست موضوعات</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                     if(isset($_POST['editcat']))
                    {
                        BL_CAT_EDIT($_POST['name'],BL_CAT_ID(BL_CAT_NAME($_GET['id'],"return")));
                        echo'موضوع با موفقیت ویرایش شد';
                    }
                    if(isset($_POST['deletecat']))
                    {
                        BL_CAT_DELETE(BL_CAT_NAME($_GET['id'],"return"));
                        echo'موضوع با موفقیت حذف شد';
                    }
                    echo'<form method="post" style="text-align:center"><label class="txt label-st-1">عنوان موضوع</label>
                        <input type="text" class="form-control input-st-1" id="title" name="name" value="'.BL_CAT_NAME($_GET['id'],"return").'"><br><br>';
                    echo' <input type="submit" class="btn btn-success" role="button" style="margin-left:25%" value="ویرایش موضوع" name="editcat">';
                    echo' <input type="submit" class="btn btn-danger" role="button" value="حذف موضوع" name="deletecat">';
                    echo'</div></div>
                    </div>';
                   }
                   
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