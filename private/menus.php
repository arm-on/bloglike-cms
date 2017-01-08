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
                   if(!isset($_GET['do'])&&BL_USER_MENU_NEW(BL_USER_NAME()))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">فهرست منو ها</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    if(isset($_POST['newmenu']))
                    {
                        BL_MOI_NEW($_POST['title'],$_POST['des'],$_POST['father'],$_POST['priority']);
                        echo'منوی جدید با موفقیت ایجاد شد';
                    }
                    echo'<form method="post" style="text-align:center">
                    <label class="txt label-st-1">عنوان آیتم</label>
                        <input type="text" class="form-control input-st-1" name="title">
                    <br><br><label class="txt label-st-1">محتویات آیتم</label>
                        <textarea class="form-control input-st-1" name="des" style="direction:ltr;text-align:left"></textarea>
                    <br><br><br><br><label class="txt label-st-1">اولویت</label>
                        <input type="text" class="form-control input-st-1" name="priority">
                        ';
                    echo'<br><br><label class="txt label-st-1">شاخه اصلی</label>
                                     <select name="father" class="form-control input-st-2">';
                                         for($i=1;$i<=BL_MOI_COUNT();$i++)
                                         {
                                             echo'<option value="'.BL_MOI_TITLE($i,"return").'">'.BL_MOI_TITLE($i,"return").'</option>';
                                         }
                                     echo'</select>';
                    echo'<br><br><input type="submit" class="btn btn-primary" role="button" style="margin-left:25%" value="ایجاد منوی جدید" name="newmenu">';
                    echo'
                    <br><br>
                            <div class="table-responsive" style="float:right;margin-right:5%;width:90%;direction: rtl">          
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th style="text-align:center" class="active">عنوان منو</th>
                                  <th style="text-align:center" class="active">شاخه اصلی</th>
                                  <th style="text-align:center" class="active">اولویت</th>
                                  <th style="text-align:center" class="active">شماره در پایگاه داده</th>
                                  <th style="text-align:center" class="active">شماره در سیستم</th>
                                </tr>
                              </thead>
                              <tbody>';           
                                                for($i=1;($i<=BL_MOI_COUNT());$i++)
                                                {
                                                 echo '<tr><td class="col-sm-4 active">'.'<a href="menus.bl?do=edit&id='.$i.'">'.BL_MOI_TITLE($i,"return").'</a></td>';
                                                 echo '<td class="col-sm-2 active">'.BL_MOI_FATHER($i,"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.BL_MOI_PRIORITY($i,"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.BL_MOI_ID($i,"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.$i.'</td></tr>';
                                                }
                                                echo'</tr>';
                                                echo'
                                                </tbody>
                                                </table></div>';
                    
                    echo'</div></div>
                    </div>';
                   }
                   elseif($_GET['do']=="edit"&&isset($_GET['id'])&&BL_USER_MENU_EDIT(BL_USER_NAME()))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">ویرایش منو</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                     if(isset($_POST['editmenu']))
                    {
                        BL_MOI_EDIT($_POST['title'],$_POST['des'],$_POST['father'],$_POST['priority'],BL_MOI_ID($_GET['id'],"return"));
                        echo'منو با موفقیت ویرایش شد';
                    }
                    if(isset($_POST['deletemenu']))
                    {
                        BL_MOI_DELETE_BY_ID(BL_MOI_ID($_GET['id'],"return"));
                        echo'منو با موفقیت حذف شد';
                    }
                    echo'<form method="post" style="text-align:center"><label class="txt label-st-1">عنوان آیتم</label>
                        <input type="text" class="form-control input-st-1" name="title" value="'.BL_MOI_TITLE($_GET['id'],"return").'"><br>';
                    echo'<br><label class="txt label-st-1">محتویات آیتم</label>
                        <textarea class="form-control input-st-1" name="des" style="direction:ltr;text-align:left">'.BL_MOI_DES($_GET['id'],"return").'</textarea>';
                    echo'<br><br><br><br><label class="txt label-st-1">اولویت</label>
                        <input type="text" class="form-control input-st-1" name="priority" value="'.BL_MOI_PRIORITY($_GET['id'],"return").'"><br>';
                        echo'<br><label class="txt label-st-1">شاخه اصلی</label>
                                     <select name="father" class="form-control input-st-2"><option value="'.BL_MOI_FATHER($_GET['id'],"return").'">'.BL_MOI_FATHER($_GET['id'],"return");echo'</option>';
                                         for($i=1;$i<=BL_MOI_COUNT();$i++)
                                         {
                                             if(BL_MOI_FATHER($_GET['id'],"return")!=BL_MOI_TITLE($i,"return"))
                                             {echo'<option value="'.BL_MOI_TITLE($i,"return").'">';BL_MOI_TITLE($i,"return");echo'</option>';}
                                         }
                                     echo'</select>';
                        echo'<br><br>';
                    echo' <input type="submit" class="btn btn-success" role="button" style="margin-left:25%" value="ویرایش منو" name="editmenu">';
                    echo' <input type="submit" class="btn btn-danger" role="button" value="حذف منو" name="deletemenu"><br>&nbsp;<br>';
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