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
                   if(!isset($_GET['do'])&&BL_USER_POST_NEW(BL_USER_NAME()))
                   {
                    $hmpp=10;//how many posts per page
                    $hmp=(BL_POST_COUNT("return")%$hmpp==0)?BL_POST_COUNT("return")/$hmpp:BL_POST_COUNT("return")/$hmpp+1;//how many pages
                    $hmpts=7;//how many pages to show
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">فهرست مطالب</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    echo' <a href="posts.bl?do=new" class="btn btn-primary" role="button" style="margin-right:2%">ایجاد مطلب جدید</a><br><br>';
                        if(!isset($_GET['page'])||$_GET['page']=="1")
                        {
                            echo'
                            <div class="table-responsive" style="float:right;margin-right:5%;width:90%;direction: rtl">          
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th style="text-align:right" class="active">عنوان مطلب</th>
                                  <th style="text-align:right" class="active">تاریخ ثبت</th>
                                  <th style="text-align:right" class="active">زمان ثبت</th>
                                  <th style="text-align:right" class="active">شماره در پایگاه داده</th>
                                  <th style="text-align:right" class="active">شماره در سیستم</th>
                                </tr>
                              </thead>
                              <tbody>';           
                                                for($i=1;($i<=$hmpp)&&($i<=BL_POST_COUNT("return"));$i++)
                                                {
                                                 echo '<tr><td class="col-sm-4 active">'.'<a href="posts.bl?do=edit&id='.$i.'">'.BL_POST_TITLE($i,"return").'</a></td>';
                                                 echo '<td class="col-sm-2 active">'.BL_POST_DATE($i,"return").'</td>';
                                                 echo'<td class="col-sm-2 active">'.BL_POST_TIME($i,"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.BL_POST_ID($i,"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.$i.'</td></tr>';
                                                }
                                                echo'</tr>';
                                                echo'
                                                </tbody>
                                                </table></div>';
                                                echo'<ul class="pagination" style="margin-right:2%">';
                                                for($i=1;($i<=$hmpts)&&($i<=$hmp);$i++)
                                                if($i==1)echo'<li class="active"><a href="posts.bl?page='.$i.'">'.$i.'</li>';
                                                else echo'<li><a href="posts.bl?page='.$i.'">'.$i.'</li>';
                                                echo'</ul>';
                        }
                        elseif($_GET['page']!=1 &&BL_USER_POST_NEW(BL_USER_NAME()))
                        {
                            echo'
                            <div class="table-responsive" style="float:right;margin-right:5%;width:90%;direction: rtl">          
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th style="text-align:right" class="active">عنوان مطلب</th>
                                  <th style="text-align:right" class="active">تاریخ ثبت</th>
                                  <th style="text-align:right" class="active">زمان ثبت</th>
                                  <th style="text-align:right" class="active">شماره در پایگاه داده</th>
                                  <th style="text-align:right" class="active">شماره در سیستم</th>
                                </tr>
                              </thead>
                              <tbody>';           
                            for($i=($_GET['page']-1)*$hmpp+1;($i<=$_GET['page']*$hmpp)&&($i<=BL_POST_COUNT("return"));$i++)
                            {
                                echo '<tr><td class="col-sm-4 active">'.'<a href="posts.bl?do=edit&id='.$i.'">'.BL_POST_TITLE($i,"return").'</a></td>';
                                echo '<td class="col-sm-2 active">'.BL_POST_DATE($i,"return").'</td>';
                                echo '<td class="col-sm-2 active">'.BL_POST_TIME($i,"return").'</td>';
                                echo '<td class="col-sm-2 active">'.BL_POST_ID($i,"return").'</td>';
                                echo '<td class="col-sm-2 active">'.$i.'</td></tr>';
                            }
                            echo'</tr>';
                            echo'
                                </tbody>
                                </table></div>';
                            echo'<ul class="pagination" style="padding-right:2%">';
                                    echo'<li><a href="posts.bl?page=1">1</a></li>';
                                    for($i=$_GET['page'],$j=1;($j<=$hmpts)&&($i<$hmp);$i++)
                                    if($i==$_GET['page'])echo'<li class="active"><a href="posts.bl?page='.$i.'">'.$i.'</li>';
                                    else echo'<li><a href="posts.bl?page='.$i.'">'.$i.'</li>';
                            echo'</ul>';
                        }
                    echo'</div></div>
                    </div>';
                   }
                   elseif($_GET['do']=="new"&&!isset($_POST['newpost'])&&BL_USER_POST_NEW(BL_USER_NAME()))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">ایجاد مطلب جدید</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    echo'<form method="post" style="text-align:center"><label class="txt label-st-1">عنوان مطلب</label>
                        <input type="text" class="form-control input-st-1" id="title" name="title">
                    <br><br>
                        <label class="txt label-st-1">آدرس تصویر</label>
                        <input type="text" class="form-control input-st-1" id="img" name="img"><br><br>                    
                        <label class="txt label-st-1">کلمات کلیدی</label>
                        <input type="text" class="form-control input-st-1" id="title" name="tags"><br><br>';
                        echo'
                         <div class="form-group">
                        <label class="txt label-st-1">موضوع</label>
                              <select class="form-control input-st-1" name="cat">';
                                         for($i=1;$i<=BL_CAT_COUNT();$i++)
                                         {
                                             echo'<option value="';BL_CAT_NAME($i);echo'">';BL_CAT_NAME($i);echo'</option>';
                                         }
                        echo'</select></div>';
                                     echo'<br><br><label class="txt label-st-2">متن مطلب</label><br><br>';
                    BL_CKEDITOR_BODY(80,10,"des","des","");BL_CKEDITOR_ENABLE("des");
                    echo'<br><br><input type="submit" class="btn btn-success" value="ثبت مطلب جدید" name="newpost"><br>&nbsp;';
                    echo'</div></div>
                    </div>';
                   }
                   elseif(isset($_POST['newpost']))
                   {
                    BL_POST_NEW($_POST['title'],$_POST['des'],$_POST['cat'],$_POST['tags'],$_POST['img']);
                    echo'<div class="alert alert-success">
                          مطلب با موفقیت ثبت شد
                          </div>';
                   }
                   elseif($_GET['do']=="edit"&&isset($_GET['id'])&&BL_USER_POST_EDIT(BL_USER_NAME()))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">ویرایش مطلب</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    if(isset($_POST['editpost']))
                    {
                     BL_POST_EDIT(BL_POST_ID($_GET['id'],"return"),$_POST['title'],$_POST['des'],$_POST['cat'],$_POST['tags'],$_POST['img']);
                     echo'<div class="alert alert-success">
                          مطلب با موفقیت ویرایش شد
                          </div>';
                    }
                    if(isset($_POST['deletepost'])&&BL_USER_POST_DELETE(BL_USER_NAME()))
                    {
                     BL_POST_DELETE(BL_POST_ID($_GET['id'],"return"));
                     echo'<div class="alert alert-success">
                          مطلب با موفقیت حذف شد
                          </div>';
                    }
                    echo'<form method="post" style="text-align:center"><label class="txt label-st-1">عنوان مطلب</label>
                        <input type="text" class="form-control input-st-1" id="title" name="title" value="'.BL_POST_TITLE($_GET['id'],"return").'">
                    <br><br>
                        <label class="txt label-st-1">آدرس تصویر</label>
                        <input type="text" class="form-control input-st-1" id="img" name="img" value="'.BL_POST_IMG($_GET['id'],"return").'"><br><br>                    
                        <label class="txt label-st-1">کلمات کلیدی</label>
                        <input type="text" class="form-control input-st-1" id="title" name="tags" value="'.BL_POST_TAGS($_GET['id'],"return").'"><br><br>';
                        echo'
                         <div class="form-group">
                        <label class="txt label-st-1">موضوع</label>
                              <select class="form-control input-st-1" name="cat">';
                              echo'<option value="'.BL_POST_CAT($_GET['id'],"return").'">'.BL_CAT_NAME_BY_REAL_ID(BL_POST_CAT($_GET['id'],"return")).'</option>';
                                         for($i=1;$i<=BL_CAT_COUNT();$i++)
                                         {
                                             if(BL_CAT_ID_BY_MYID($i,"return")!=BL_POST_CAT($_GET['id'],"return"))
                                             echo'<option value="'.BL_CAT_ID_BY_MYID($i,"return");echo'">';BL_CAT_NAME($i);echo'</option>';
                                         }
                        echo'</select></div>';
                                     echo'<br><br><label class="txt label-st-2">متن مطلب</label><br><br>';
                    BL_CKEDITOR_BODY(80,10,"des","des",BL_POST_DESCRIPTION($_GET['id'],"return"),"");BL_CKEDITOR_ENABLE("des");
                    echo'<br><br><input type="submit" class="btn btn-success" value="ویرایش مطلب" name="editpost">
                    <input type="submit" class="btn btn-danger" value="حذف مطلب" name="deletepost">
                    <br>&nbsp;';
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