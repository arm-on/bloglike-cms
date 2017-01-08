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
                   if(!isset($_GET['do'])&&BL_USER_PAGE_NEW(BL_USER_NAME()))
                   {
                    $hmpp=10;//how many posts per page
                    $hmp=(BL_PAGE_COUNT()%$hmpp==0)?BL_PAGE_COUNT()/$hmpp:BL_PAGE_COUNT()/$hmpp+1;//how many pages
                    $hmpts=7;//how many pages to show
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">فهرست صفحات</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    echo' <a href="pages.bl?do=new" class="btn btn-primary" role="button" style="margin-right:2%">ایجاد صفحه جدید</a><br><br>';
                        if(!isset($_GET['page'])||$_GET['page']=="1")
                        {
                            echo'
                            <div class="table-responsive" style="float:right;margin-right:5%;width:90%;direction: rtl">          
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th style="text-align:right" class="active">عنوان صفحه</th>
                                  <th style="text-align:right" class="active">شماره در پایگاه داده</th>
                                  <th style="text-align:right" class="active">شماره در سیستم</th>
                                </tr>
                              </thead>
                              <tbody>';           
                                                for($i=1;($i<=$hmpp)&&($i<=BL_PAGE_COUNT());$i++)
                                                {
                                                 echo '<tr><td class="col-sm-4 active">'.'<a href="pages.bl?do=edit&id='.$i.'">'.BL_PAGE_TITLE($i,"return").'</a></td>';
                                                 echo '<td class="col-sm-2 active">'.BL_PAGE_ID($i,"return").'</td>';
                                                 echo '<td class="col-sm-2 active">'.$i.'</td></tr>';
                                                }
                                                echo'</tr>';
                                                echo'
                                                </tbody>
                                                </table></div>';
                                                echo'<ul class="pagination" style="margin-right:2%">';
                                                for($i=1;($i<=$hmpts)&&($i<=$hmp);$i++)
                                                if($i==1)echo'<li class="active"><a href="pages.bl?page='.$i.'">'.$i.'</li>';
                                                else echo'<li><a href="pages.bl?page='.$i.'">'.$i.'</li>';
                                                echo'</ul>';
                        }
                        elseif($_GET['page']!=1 &&BL_USER_PAGE_NEW(BL_USER_NAME()))
                        {
                            echo'
                            <div class="table-responsive" style="float:right;margin-right:5%;width:90%;direction: rtl">          
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th style="text-align:right" class="active">عنوان صفحه</th>
                                  <th style="text-align:right" class="active">شماره در پایگاه داده</th>
                                  <th style="text-align:right" class="active">شماره در سیستم</th>
                                </tr>
                              </thead>
                              <tbody>';           
                            for($i=($_GET['page']-1)*$hmpp+1;($i<=$_GET['page']*$hmpp)&&($i<=BL_PAGE_COUNT());$i++)
                            {
                                echo '<tr><td class="col-sm-4 active">'.'<a href="pages.bl?do=edit&id='.$i.'">'.BL_PAGE_TITLE($i,"return").'</a></td>';
                                echo '<td class="col-sm-2 active">'.BL_PAGE_ID($i,"return").'</td>';
                                echo '<td class="col-sm-2 active">'.$i.'</td></tr>';
                            }
                            echo'</tr>';
                            echo'
                                </tbody>
                                </table></div>';
                            echo'<ul class="pagination" style="padding-right:2%">';
                                    echo'<li><a href="pages.bl?page=1">1</a></li>';
                                    for($i=$_GET['page'],$j=1;($j<=$hmpts)&&($i<$hmp);$i++)
                                    if($i==$_GET['page'])echo'<li class="active"><a href="pages.bl?page='.$i.'">'.$i.'</li>';
                                    else echo'<li><a href="pages.bl?page='.$i.'">'.$i.'</li>';
                            echo'</ul>';
                        }
                    echo'</div></div>
                    </div>';
                   }
                   elseif($_GET['do']=="new"&&!isset($_POST['newpage'])&&BL_USER_PAGE_NEW(BL_USER_NAME()))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">ایجاد صفحه جدید</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    echo'<form method="post" style="text-align:center"><label class="txt label-st-1">عنوان صفحه</label>
                        <input type="text" class="form-control input-st-1" id="title" name="title">
                    ';
                        echo'
                         <div class="form-group">';
                        echo'</div>';
                                     echo'<br><br><label class="txt label-st-2">متن صفحه</label><br><br>';
                    BL_CKEDITOR_BODY(80,10,"des","des","");BL_CKEDITOR_ENABLE("des");
                    echo'<br><br><input type="submit" class="btn btn-success" value="ثبت صفحه جدید" name="newpage"><br>&nbsp;';
                    echo'</div></div>
                    </div>';
                   }
                   elseif(isset($_POST['newpage']))
                   {
                    BL_PAGE_NEW($_POST['title'],$_POST['des']);
                    echo'<h4 style="color:white">'.'صفحه با موفقیت ثبت شد'.'</h4>';
                   }
                   elseif($_GET['do']=="edit"&&isset($_GET['id'])&&BL_USER_PAGE_EDIT(BL_USER_NAME()))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">ویرایش صفحه</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    if(isset($_POST['editpage']))
                    {
                     BL_PAGE_EDIT($_POST['title'],$_POST['des'],BL_PAGE_ID($_GET['id'],"return"));
                     echo'<h4 style="color:white">'.'مطلب با موفقیت ویرایش شد'.'</h4>';    
                    }
                    if(isset($_POST['deletepage'])&&BL_USER_PAGE_DELETE(BL_USER_NAME()))
                    {
                     BL_PAGE_DELETE(BL_PAGE_ID($_GET['id'],"return"));
                     echo'<h4 style="color:white">'.'صفحه با موفقیت حذف شد'.'</h4>';    
                    }
                    echo'<form method="post" style="text-align:center"><label class="txt label-st-1">عنوان صفحه</label>
                        <input type="text" class="form-control input-st-1" id="title" name="title" value="'.BL_PAGE_TITLE($_GET['id'],"return").'">';
                        echo'
                         <div class="form-group">';
                        echo'</div>';
                                     echo'<br><br><label class="txt label-st-2">متن صفحه</label><br><br>';
                    BL_CKEDITOR_BODY(80,10,"des","des",BL_PAGE_DES($_GET['id'],"return"),"");BL_CKEDITOR_ENABLE("des");
                    echo'<br><br><input type="submit" class="btn btn-success" value="ویرایش صفحه" name="editpage">
                    <input type="submit" class="btn btn-danger" value="حذف صفحه" name="deletepage">
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