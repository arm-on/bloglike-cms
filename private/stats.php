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
                                <div class="fix-all">آمار بازدیدهای هفته اخیر</div>
                        </div>
                    </div>
                    <div class="row"><div class="box-bottom" style="text-align:right;padding-top:20px">';
                   echo'<div class="container">
                    <div>
                      <canvas id="canvas"></canvas>
                    </div>
                  </div>
                      <script src=\'js/Chart.min.js\'></script>
                  
                          <script>'.'var lineChartData = {
    labels: ["شش روز قبل", "پنج روز قبل", "چهار روز قبل", "سه روز قبل", "دو روز قبل", "دیروز", "امروز"],
    datasets: [{
        fillColor: "rgba(220,220,220,0)",
        strokeColor: "rgba(220,180,0,1)",
        pointColor: "rgba(220,180,0,1)",
        data: ['.BL_STATS_GET("7","sum").','.BL_STATS_GET("6","sum").','.BL_STATS_GET("5","sum").','.BL_STATS_GET("4","sum").','.BL_STATS_GET("3","sum").','.BL_STATS_GET("2","sum").','.BL_STATS_GET("1","sum").']
    }]

}

Chart.defaults.global.animationSteps = 50;
Chart.defaults.global.tooltipYPadding = 16;
Chart.defaults.global.tooltipCornerRadius = 0;
Chart.defaults.global.tooltipTitleFontStyle = "normal";
Chart.defaults.global.tooltipFillColor = "rgba(0,160,0,0.8)";
Chart.defaults.global.animationEasing = "easeOutBounce";
Chart.defaults.global.responsive = true;
Chart.defaults.global.scaleLineColor = "black";
Chart.defaults.global.scaleFontSize = 16;

var ctx = document.getElementById("canvas").getContext("2d");
var LineChartDemo = new Chart(ctx).Line(lineChartData, {
    pointDotRadius: 10,
    bezierCurve: false,
    scaleShowVerticalLines: false,
    scaleGridLineColor: "black"
});'.'</script>';
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