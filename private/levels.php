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
                   if(!isset($_GET['do']))
                   {
                    echo'<div class="col-sm-12 box-all">
                    <div class="row">
                        <div class="box-top">
                                <div class="fix-all">فهرست درجات کاربری</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                    if(isset($_POST['newlevel']))
                    {
                        BL_LEVEL_NEW($_POST['name'],$_POST['posts'],$_POST['users'],$_POST['pages'],$_POST['visit'],$_POST['menus']);
                        echo'سطح کاربری جدید با موفقیت ایجاد شد';
                    }
                    echo'<form method="post" style="text-align:center"><label class="txt label-st-1">عنوان سطح</label>
                        <input type="text" class="form-control input-st-2" id="title" name="name"><br><br>
                        <label class="txt label-st-1">سطح دسترسی به مطالب</label>
                        <select class="form-control input-st-2" name="posts">
                        <option value="0">ندارد</option>
                        <option value="1">ایجاد</option>
                        <option value="2">ایجاد و ویرایش</option>
                        <option value="3">ایجاد ، ویرایش و حذف</option>
                        </select><br><br>
                        <label class="txt label-st-1">سطح دسترسی به کاربران</label>
                        <select class="form-control input-st-2" name="users">
                        <option value="0">ندارد</option>
                        <option value="1">ایجاد</option>
                        <option value="2">ایجاد و ویرایش</option>
                        <option value="3">ایجاد ، ویرایش و حذف</option>
                        </select><br><br>
                        <label class="txt label-st-1">سطح دسترسی به صفحات</label>
                        <select class="form-control input-st-2" name="pages">
                        <option value="0">ندارد</option>
                        <option value="1">ایجاد</option>
                        <option value="2">ایجاد و ویرایش</option>
                        <option value="3">ایجاد ، ویرایش و حذف</option>
                        </select><br><br>
                        <label class="txt label-st-1">سطح دسترسی به منوها</label>
                        <select class="form-control input-st-2" name="menus">
                        <option value="0">ندارد</option>
                        <option value="1">ایجاد</option>
                        <option value="2">ایجاد و ویرایش</option>
                        <option value="3">ایجاد ، ویرایش و حذف</option>
                        </select><br><br>
                        <label class="txt label-st-1">دسترسی به محتوای سایت</label>
                        <select class="form-control input-st-2" name="visit">
                        <option value="1">دارد</option>
                        <option value="0">ندارد</option>
                        </select><br><br>
                        ';
                    echo'<div style="padding-right:3%"> <input type="submit" class="btn btn-primary" role="button" style="float:right;" value="ایجاد سطح کاربری جدید" name="newlevel"></div>';
                    echo'
                    <br><br>
                            <div class="table-responsive" style="float:right;margin-right:5%;width:90%;direction: rtl">          
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th style="text-align:center" class="active">نام سطح</th>
                                  <th style="text-align:center" class="active">شماره در پایگاه داده</th>
                                  <th style="text-align:center" class="active">شماره در سیستم</th>
                                  <th style="text-align:center" class="active">مطالب</th>
                                  <th style="text-align:center" class="active">کاربران</th>
                                  <th style="text-align:center" class="active">صفحات</th>
                                  <th style="text-align:center" class="active">منوها</th>
                                </tr>
                              </thead>
                              <tbody>';           
                                                for($i=1;($i<=BL_LEVEL_COUNT());$i++)
                                                {
                                                 echo '<tr><td class="col-sm-1 active">'.'<a href="levels.bl?do=edit&id='.$i.'">'.BL_LEVEL_NAME($i,"return").'</a></td>';
                                                 echo '<td class="col-sm-1 active">'.BL_LEVEL_ID(BL_LEVEL_NAME($i,"return")).'</td>';
                                                 echo '<td class="col-sm-1 active">'.$i.'</td>';
                                                 echo '<td class="col-sm-1 active">'.BL_LEVEL_POST(BL_LEVEL_NAME($i,"return")).'</td>';
                                                 echo '<td class="col-sm-1 active">'.BL_LEVEL_USERS(BL_LEVEL_NAME($i,"return")).'</td>';
                                                 echo '<td class="col-sm-1 active">'.BL_LEVEL_PAGES(BL_LEVEL_NAME($i,"return")).'</td>';
                                                 echo '<td class="col-sm-1 active">'.BL_LEVEL_MENUS(BL_LEVEL_NAME($i,"return")).'</td></tr>';
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
                     if(isset($_POST['editlevel']))
                    {
                        BL_LEVEL_EDIT($_POST['name'],$_POST['posts'],$_POST['users'],$_POST['pages'],$_POST['visit'],BL_LEVEL_ID(BL_LEVEL_NAME($_GET['id'],"return")),$_POST['menus']);
                        echo'سطح با موفقیت ویرایش شد';
                    }
                    if(isset($_POST['deletelevel']))
                    {
                        BL_LEVEL_DELETE(BL_LEVEL_ID(BL_LEVEL_NAME($_GET['id'],"return")));
                        echo'سطح با موفقیت حذف شد';
                    }
                    echo'<form method="post">
                                  <label for="name" class="txt label-st-1"> عنوان سطح</label>
                                  <input type="text" class="form-control input-st-2" name="name" id="name" value="'.BL_LEVEL_NAME($_GET['id'],"return").'"><br><br>
                                  <label for="posts" class="txt label-st-1">سطح دسترسی به مطالب</label>
                                  <select name="posts" class="form-control input-st-2">';
                                  echo'<option value="'.BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return")).'">';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))==0) echo'ندارد';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))==1) echo'ایجاد';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))==2) echo'ایجاد و ویرایش';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))==3) echo'ایجاد ، ویرایش و حذف';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))!=0)echo'<option value="0">ندارد</option>';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))!=1)echo'<option value="1">ایجاد</option>';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))!=2)echo'<option value="2">ایجاد و ویرایش</option>';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))!=3)echo'<option value="3">ایجاد ، ویرایش و حذف</option>';
                                  echo'</select><br><br>
                                  <label for="users" class="txt label-st-1">سطح دسترسی به کاربران</label>
                                  <select name="users" class="form-control input-st-2">';
                                  echo'<option value="'.BL_LEVEL_USERS(BL_LEVEL_NAME($_GET['id'],"return")).'">';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))==0) echo'ندارد';
                                  if(BL_LEVEL_USERS(BL_LEVEL_NAME($_GET['id'],"return"))==1) echo'ایجاد';
                                  if(BL_LEVEL_USERS(BL_LEVEL_NAME($_GET['id'],"return"))==2) echo'ایجاد و ویرایش';
                                  if(BL_LEVEL_USERS(BL_LEVEL_NAME($_GET['id'],"return"))==3) echo'ایجاد ، ویرایش و حذف';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))!=0)echo'<option value="0">ندارد</option>';
                                  if(BL_LEVEL_USERS(BL_LEVEL_NAME($_GET['id'],"return"))!=1)echo'<option value="1">ایجاد</option>';
                                  if(BL_LEVEL_USERS(BL_LEVEL_NAME($_GET['id'],"return"))!=2)echo'<option value="2">ایجاد و ویرایش</option>';
                                  if(BL_LEVEL_USERS(BL_LEVEL_NAME($_GET['id'],"return"))!=3)echo'<option value="3">ایجاد ، ویرایش و حذف</option>';
                                  echo'</select><br><br>
                                  <label for="pages" class="txt label-st-1">سطح دسترسی به صفحات</label>
                                  <select name="pages" class="form-control input-st-2">';
                                  echo'<option value="'.BL_LEVEL_PAGES(BL_LEVEL_NAME($_GET['id'],"return")).'">';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))==0) echo'ندارد';
                                  if(BL_LEVEL_PAGES(BL_LEVEL_NAME($_GET['id'],"return"))==1) echo'ایجاد';
                                  if(BL_LEVEL_PAGES(BL_LEVEL_NAME($_GET['id'],"return"))==2) echo'ایجاد و ویرایش';
                                  if(BL_LEVEL_PAGES(BL_LEVEL_NAME($_GET['id'],"return"))==3) echo'ایجاد ، ویرایش و حذف';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))!=0)echo'<option value="0">ندارد</option>';
                                  if(BL_LEVEL_PAGES(BL_LEVEL_NAME($_GET['id'],"return"))!=1)echo'<option value="1">ایجاد</option>';
                                  if(BL_LEVEL_PAGES(BL_LEVEL_NAME($_GET['id'],"return"))!=2)echo'<option value="2">ایجاد و ویرایش</option>';
                                  if(BL_LEVEL_PAGES(BL_LEVEL_NAME($_GET['id'],"return"))!=3)echo'<option value="3">ایجاد ، ویرایش و حذف</option>';
                                  echo'</select><br><br>
                                  <label for="menus" class="txt label-st-1">سطح دسترسی به منوها</label>
                                  <select name="menus" class="form-control input-st-2">';
                                  echo'<option value="'.BL_LEVEL_MENUS(BL_LEVEL_NAME($_GET['id'],"return")).'">';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))==0) echo'ندارد';
                                  if(BL_LEVEL_MENUS(BL_LEVEL_NAME($_GET['id'],"return"))==1) echo'ایجاد';
                                  if(BL_LEVEL_MENUS(BL_LEVEL_NAME($_GET['id'],"return"))==2) echo'ایجاد و ویرایش';
                                  if(BL_LEVEL_MENUS(BL_LEVEL_NAME($_GET['id'],"return"))==3) echo'ایجاد ، ویرایش و حذف';
                                  if(BL_LEVEL_POST(BL_LEVEL_NAME($_GET['id'],"return"))!=0)echo'<option value="0">ندارد</option>';
                                  if(BL_LEVEL_MENUS(BL_LEVEL_NAME($_GET['id'],"return"))!=1)echo'<option value="1">ایجاد</option>';
                                  if(BL_LEVEL_MENUS(BL_LEVEL_NAME($_GET['id'],"return"))!=2)echo'<option value="2">ایجاد و ویرایش</option>';
                                  if(BL_LEVEL_MENUS(BL_LEVEL_NAME($_GET['id'],"return"))!=3)echo'<option value="3">ایجاد ، ویرایش و حذف</option>';
                                  echo'</select><br><br>
                                  <label for="visit" class="txt label-st-1">دسترسی به محتوای سایت</label>
                                  <select name="visit" class="form-control input-st-2">';
                                  echo'<option value="'.BL_LEVEL_VISITS(BL_LEVEL_NAME($_GET['id'],"return")).'">'.(BL_LEVEL_VISITS(BL_LEVEL_NAME($_GET['id'],"return"))=="1"?'دارد':'ندارد').'</option>';
                                  if(BL_LEVEL_VISITS(BL_LEVEL_NAME($_GET['id'],"return"))=="1") echo'<option value="0">ندارد</option>';
                                  elseif(BL_LEVEL_VISITS(BL_LEVEL_NAME($_GET['id'],"return"))!="1")echo'<option value="1">دارد</option>';
                                  echo'</select><br><br><br>
                                  <br><div style="padding-right:2%">
                                  <input type="submit" class="btn btn-danger" name="deletelevel" value="حذف سطح">
                                  <input type="submit" class="btn btn-success" name="editlevel" value="ویرایش سطح">
                                  </div><br><br></form>';
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