<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
function contains($substring, $string) {
        $pos = strpos($string, $substring);
 
        if($pos === false) {
                // string needle NOT found in haystack
                return false;
        }
        else {
                // string needle found in haystack
                return true;
        }
 
}
echo'<ul class="list-group">';
                       echo'<li class="list-group-item';if(contains('index',$actual_link))echo' item-act';else echo' item';echo' dashboard"><a href="index.bl">داشبورد</a></li>';
                       echo'<li class="list-group-item';if(contains('stats',$actual_link))echo' item-act';else echo' item';echo' stats"><a href="stats.bl">آمار بازدیدها</a></li>';
                       echo'<li class="list-group-item';if(contains('posts',$actual_link)||contains('cats',$actual_link))echo' item-act';else echo' item';echo' posts"><a href="posts.bl">مطالب</a> و <a href="cats.bl">موضوعات</a></li>';
                       //echo'<li class="list-group-item item links">پیوندها</li>';
                       echo'<li class="list-group-item';if(contains('pages',$actual_link))echo' item-act';else echo' item';echo' pages"><a href="pages.bl">صفحات</a></li>';
                       echo'<li class="list-group-item';if(contains('comments',$actual_link))echo' item-act';else echo' item';echo' comments"><a href="comments.bl">نظرات</a></li>';
                       echo'<li class="list-group-item';if(contains('template',$actual_link))echo' item-act';else echo' item';echo' template"><a href="templates.bl">قالب ها</a></li>';
                       echo'<li class="list-group-item';if(contains('users',$actual_link))echo' item-act';else echo' item';echo' users"><a href="users.bl">کاربران</a></li>';
                       echo'<li class="list-group-item';if(contains('settings',$actual_link))echo' item-act';else echo' item';echo' settings"><a href="settings.bl">تنظیمات</a></li>';
                       //echo'<li class="list-group-item item secure">سیستم امنیتی</li>';
                       echo'<li class="list-group-item';if(contains('modules',$actual_link))echo' item-act';else echo' item';echo' modules"><a href="modules.bl">ماژول ها / پلاگین ها</a></li>';
                       echo'<li class="list-group-item item exit"><a href="logout.bl">خروج</a></li> 
                    </ul>';
?>