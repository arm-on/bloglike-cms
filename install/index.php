<html>
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BL INSTALL</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <link rel="stylesheet/less" href="styles.less" type="text/css">
        <script src="less.min.js"></script>
        
  </head>
  <body>
    <div class="col-sm-2"></div>
    <div class="col-sm-8 main">
      
      <div class="row">
        
        <div class="col-sm-12">
           <div class="progress" style="margin-top:10px;">
              <?php if(!isset($_GET['step'])) echo'
              <div class="progress-bar progress-bar-striped active progress-bar-info" role="progressbar"
              aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
              20%
              </div>';
              elseif($_GET['step']==2) echo'
              <div class="progress-bar progress-bar-striped active progress-bar-info" role="progressbar"
              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
              40%
              </div>';
              elseif($_GET['step']==3) echo'
              <div class="progress-bar progress-bar-striped active progress-bar-info" role="progressbar"
              aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
              60%
              </div>';
              elseif($_GET['step']==4) echo'
              <div class="progress-bar progress-bar-striped active progress-bar-info" role="progressbar"
              aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
              80%
              </div>';
              elseif($_GET['step']==5) echo'
              <div class="progress-bar progress-bar-striped active progress-bar-info" role="progressbar"
              aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
              100%
              </div>';
              ?>
           </div>
           <div class="row contain">
            <?php if(!isset($_GET['step']))
            echo'
              <div class="header">
                  <h1>شروع نصب بلاگ لایک</h1>
                  <h2>از انتخاب شما سپاسگزاریم ...</h2><br>
                  <h3>کمی بیشتر راجع به بلاگ لایک بدانید...</h3><br>
                  <h4 style="text-align: justify">بلاگ لایک یک سیستم مدیریت محتوای متن باز است. هدف این پروژه ، کمک به وبمسترهای ایرانی جهت ایجاد یک وبسایت کاملا ایرانی است. سیستم های مدیریت محتوای بسیاری در حال حاضر موجود هستند که هر کدام ویژگی های خاص خود را دارند . مزیت های هر سیستم مدیریت محتوا منحضر به فرد است. پس ما هم در بلاگ لایک ، مزیت هایی قرار دادیم تا موجب شود افراد بیشتری به سمت این سیستم گرایش پیدا کنند . تیم مدیریت بلاگ لایک ، هنوز از نظر تعداد کم هستند و نیاز به کمک برنامه نویسان و طراحان حرفه ای داریم . اگر شما مایل به همکاری با ما هستید ، می توانید از طریق وبسایت bloglike.ir با ما در ارتباط باشید. مسلما مشکلاتی در این نرم افزار وجود دارند و شما می توانید با اطلاع رسانی آنها به ما ، در رفع آنها سهیم باشید.بلاگ لایک به حمایت مالی نیاز ندارد و اگر قصد کمک به ما را دارید ، این نرم افزار رایگان را به دوستانتان معرفی کنید.</h4>
                  <h5>توجه : اگر بلاگ لایک را نصب کرده اید و دوباره این صفحه را مشاهده می کنید ، به معنی آن است که پوشه install را حذف نکرده اید.</h5>
                  <br><center><a href="?step=2" class="btn btn-info btn-lg">مرحله بعدی</a></center>
              </div>
              ';
            elseif($_GET['step']==2)
            {
              echo'
              <div class="header">
                  <h1>اساسنامه بلاگ لایک</h1>
                  <h2>بلاگ لایک و تعهدات آن ...</h2><br>
                  <h3>آیا قوانین ما را می پذیرید؟</h3><br>
                  <h4 style="text-align: justify">
                  1. بلاگ لایک رایگان است و رایگان می ماند. مگر در طراحی قالب و یا ماژول های افزودنی<br>
                  2. سایت هایی که از این سیستم استفاده می کنند ، موظف هستند کپی رایت ما را در قالب خود قرار دهند .<br>
                  3. سایت هایی که محتوای مغایر با قوانین جمهوری اسلامی ایران را منتشر کنند ، از خدمات پشتیبانی محروم خواهند بود.<br>
                  4. بلاگ لایک وابسته به هیچ نهادی نیست<br>
                  5. تنها هدف بلاگ لایک ، کمک به وب ایرانی است و مقاصد دیگری را دنبال نمی کند.<br>
                  6. متخلفین ، از پشتیبانی محروم می شوند.
                  </h4>
                  <br><center><a href="?step=3" class="btn btn-info btn-lg">می پذیرم ، برو به مرحله بعدی</a>&nbsp;&nbsp;<a href="index.php" class="btn btn-warning btn-lg">مرحله قبلی</a></center>
              </div>
              ';  
            }
            elseif($_GET['step']==3)
            {
              echo'
              <div class="header">
                  <h1>نیازمندی ها ، قابلیت ها</h1><br>
                  <h2>آنچه برای نصب بلاگ لایک به آن نیازمند هستید</h2>
                  <h2>و آنچه پس از نصب آن ، بدست می آورید ...</h2><br>
                  <h3>نیازمندی ها</h3>
                  <h4 style="text-align: justify">
                  1. پی اچ پی ورژن 5.2 به بالا<br>
                  2. مای اس کیو ال
                  </h4>
                  <h3>قابلیت ها</h3>
                  <h4 style="text-align: justify">
                  1. ایجاد مطالب با قابلیت موضوع بندی<br>
                  2. ایجاد صفحات جدا<br>
                  3. سیستم مدیریت نظرات<br>
                  4. امکان ایجاد سطوح کاربری<br>
                  5. بهینه سازی شده با معیارهای گوگل<br>
                  6. امکان ماژول نویسی<br>
                  7. آمارگیر با نمودار و تفکیک به 5 بازه زمانی<br>
                  8. امکان ساخت قالب به سادگی ساخت قالب های وبلاگ
                  </h4>
                  <br><center><a href="?step=4" class="btn btn-info btn-lg">مرحله بعدی</a>&nbsp;&nbsp;<a href="?step=2" class="btn btn-warning btn-lg">مرحله قبلی</a></center>
              </div>
              ';  
            }
            elseif($_GET['step']==4)
            {
              echo'
              <div class="header">
                  <h1>کمربندها را محکم ببندید</h1><br>
                  <form method="post" action="?step=5">
                  <label>هاست : </label><input type="text" class="form-control" name="host">
                  <label>نام پایگاه داده : </label><input type="text" class="form-control" name="database">
                  <label>نام کاربری پایگاه داده : </label><input type="text" class="form-control" name="dbuser">
                  <label>رمز عبور : </label><input type="text" class="form-control" name="dbuserpass"> </hr>
                  <label>نام کاربری مدیر : </label><input type="text" class="form-control" name="admin">
                  <label>رمز عبور مدیر : </label><input type="text" class="form-control" name="adminpass">
                  <label>ایمیل مدیر : </label><input type="text" class="form-control" name="adminmail">
                  <h2>آیا مطمئن هستید؟</h2>
                  <h3>اگر شرایط نصب بلاگ لایک را دارید و قوانین ما را هم پذیرفته اید ، با خیال راحت "نصب" را بزنید</h3>
                  <br><center><input type="submit" class="btn btn-info btn-lg" value="نصب">&nbsp;&nbsp;<a href="?step=3" class="btn btn-warning btn-lg">مرحله قبلی</a></center>
                  </form>
              </div>
              ';  
            }
            elseif($_GET['step']==5)
            {
              $adminlevel='مدیر کل';
              $firstmenu='بی شاخه';
              $firstcat='اخبار';
              $myfile = fopen("../framework.php", "r") or die("Unable to open file!");
              $framework=fread($myfile,filesize("../framework.php"));
              fclose($myfile);
              $framework=str_replace('$host="localhost"','$host="'.$_POST['host'].'"',$framework);
              $framework=str_replace('$dbname="mycms"','$dbname="'.$_POST['database'].'"',$framework);
              $framework=str_replace('$username="root"','$username="'.$_POST['dbuser'].'"',$framework);
              $framework=str_replace('$pass=""','$pass="'.$_POST['dbuserpass'].'"',$framework);
              $myfile = fopen("../framework.php", "w") or die("Unable to open file!");
              fwrite($myfile, $framework);
              fclose($myfile);
              $myfile = fopen("framework.php", "r") or die("Unable to open file!");
              $framework=fread($myfile,filesize("framework.php"));
              fclose($myfile);
              $framework=str_replace('$host="localhost"','$host="'.$_POST['host'].'"',$framework);
              $framework=str_replace('$dbname="mycms"','$dbname="'.$_POST['database'].'"',$framework);
              $framework=str_replace('$username="root"','$username="'.$_POST['dbuser'].'"',$framework);
              $framework=str_replace('$pass=""','$pass="'.$_POST['dbuserpass'].'"',$framework);
              $myfile = fopen("framework.php", "w") or die("Unable to open file!");
              fwrite($myfile, $framework);
              fclose($myfile);
              $myfile = fopen("../private/framework.php", "r") or die("Unable to open file!");
              $framework=fread($myfile,filesize("../private/framework.php"));
              fclose($myfile);
              $framework=str_replace('$host="localhost"','$host="'.$_POST['host'].'"',$framework);
              $framework=str_replace('$dbname="mycms"','$dbname="'.$_POST['database'].'"',$framework);
              $framework=str_replace('$username="root"','$username="'.$_POST['dbuser'].'"',$framework);
              $framework=str_replace('$pass=""','$pass="'.$_POST['dbuserpass'].'"',$framework);
              $myfile = fopen("../private/framework.php", "w") or die("Unable to open file!");
              fwrite($myfile, $framework);
              fclose($myfile);
              include('framework.php');
              try{
              $conn = new PDO('mysql:host='.$_POST['host'].';charset=utf8', $_POST['dbuser'], $_POST['dbuserpass']);
              }catch(PDOException $ex)
              {
                echo'<h3>ارتباط با پایگاه داده ناموفق بود</h3>';
                echo'<center><a href="?step=4" class="btn btn-warning btn-lg">مرحله قبلی</a></center>';
                die();
              }
              //$conn->exec("SET NAMES utf8");
              //$conn->exec("SET CHARACTER SET utf8");
              $sql='
                USE '.$_POST['database'].';
                CREATE TABLE bl_cats 
                ( 
                id int NOT NULL AUTO_INCREMENT, 
                nm varchar(50) NOT NULL, 
                PRIMARY KEY (id) 
                ) ENGINE=InnoDB;
                CREATE TABLE bl_levels 
                ( 
                id int NOT NULL AUTO_INCREMENT, 
                dpl varchar(50) NOT NULL, 
                pst int NOT NULL, 
                usr int NOT NULL, 
                vst int NOT NULL, 
                pgs int NOT NULL, 
                mns int NOT NULL, 
                PRIMARY KEY (id) 
                ) ENGINE=InnoDB;
                CREATE TABLE bl_mct
                ( 
                id int NOT NULL AUTO_INCREMENT, 
                des text NOT NULL, 
                type varchar(60) NOT NULL, 
                dt varchar(10) NOT NULL, 
                tm varchar(5) NOT NULL, 
                frm varchar(30) NOT NULL, 
                too varchar(30) NOT NULL, 
                PRIMARY KEY (id) 
                ) ENGINE=InnoDB;
                CREATE TABLE bl_menus
                ( 
                id int NOT NULL AUTO_INCREMENT, 
                ttl text NOT NULL, 
                des text NOT NULL, 
                fdr text NOT NULL, 
                prr int NOT NULL, 
                PRIMARY KEY (id) 
                ) ENGINE=InnoDB;
                CREATE TABLE bl_pages
                ( 
                id int NOT NULL AUTO_INCREMENT, 
                ttl text NOT NULL, 
                des text NOT NULL, 
                aut varchar(40) NOT NULL, 
                img text NOT NULL, 
                PRIMARY KEY (id) 
                ) ENGINE=InnoDB;
                CREATE TABLE bl_posts
                ( 
                id int NOT NULL AUTO_INCREMENT, 
                ttl varchar(100) NOT NULL, 
                des text NOT NULL, 
                img text NOT NULL,
                aut varchar(40) NOT NULL, 
                dt varchar(10) NOT NULL, 
                tm varchar(5) NOT NULL, 
                lks int NOT NULL, 
                dls int NOT NULL, 
                vus int NOT NULL, 
                tgs text NOT NULL, 
                ct varchar(20) NOT NULL, 
                PRIMARY KEY (id) 
                ) ENGINE=InnoDB;
                CREATE TABLE bl_statistics
                ( 
                id int NOT NULL AUTO_INCREMENT, 
                yer smallint(6) NOT NULL, 
                mns tinyint(4) NOT NULL, 
                day tinyint(4) NOT NULL, 
                bfs int NOT NULL, 
                stt int NOT NULL, 
                tts int NOT NULL, 
                sto int NOT NULL, 
                otf int NOT NULL, 
                PRIMARY KEY (id) 
                ) ENGINE=InnoDB;
                CREATE TABLE bl_users
                ( 
                id int NOT NULL AUTO_INCREMENT, 
                unm varchar(25) NOT NULL, 
                ps varchar(60) NOT NULL, 
                vld int NOT NULL, 
                avt varchar(80) NOT NULL, 
                pt int NOT NULL, 
                eml text NOT NULL, 
                rdt varchar(10) NOT NULL, 
                bdt varchar(10) NOT NULL, 
                nm varchar(50) NOT NULL, 
                prm varchar(20) NOT NULL, 
                cat text NOT NULL, 
                PRIMARY KEY (id) 
                ) ENGINE=InnoDB;
                INSERT INTO bl_levels (dpl,pst,usr,pgs,vst,mns) VALUES ("'.$adminlevel.'","3","3","3","1","3");
                INSERT INTO bl_users (unm,ps,prm,eml) VALUES ("'.$_POST['admin'].'","'.md5($_POST['adminpass']).'","'.$adminlevel.'","'.$_POST['adminmail'].'");
                INSERT INTO bl_menus (ttl,prr) VALUES ("'.$firstmenu.'","0");
                INSERT INTO bl_cats (nm) VALUES ("'.$firstcat.'");
                ';
              $conn->exec($sql);
              $conn=null;
              echo'
              <div class="header">
                  <h1>بلاگ لایک نصب شد</h1><br>
                  <h2>ورود شما به جمع بلاگ لایکی ها را خوش آمد می گوییم</h2>
                  <h3>لینک های زیر را چک کنید و در صورتی که مشکلی وجود نداشت ، به محل نصب بلاگ لایک بروید و پوشه install را حذف نمایید.</h3>
                  <br><center><a href="../private/login.php" class="btn btn-info btn-lg">ورود به کنترل پنل مدیریت</a>&nbsp;&nbsp;<a href="../index.php" class="btn btn-warning btn-lg">ورود به سایت</a></center>
              </div>
              ';  
            }
            ?>
           </div>
        </div>
            
        </div>
        
        
        <div class="col-sm-12">
          <footer>
            <h4>تمامی حقوق برای سیستم مدیریت محتوای بلاگ لایک محفوظ است</h4></footer>
        </div>  
      
    </div>
    <div class="col-sm-2"></div>
  </body>
</html>