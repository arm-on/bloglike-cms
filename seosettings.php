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
$nowseopage = file_get_contents('private/seo.php');
$nowseo=json_decode($nowseopage);
echo'<title>'.$nowseo->{'title'};if(contains("post",$actual_link)) echo ' '.str_replace("-"," ",$_GET['title']);echo'</title>';
echo'<meta name="description" content="'.$nowseo->{'description'}.'"/>';
echo'<meta property="og:title" content="'.$nowseo->{'ogtitle'}.'"/>';
echo'<meta property="og:type" content="'.$nowseo->{'ogtype'}.'"/>';
echo'<meta property="og:image" content="'.$nowseo->{'ogimage'}.'"/>';
echo'<meta property="og:url" content="'.$nowseo->{'ogurl'}.'"/>';
echo'<meta property="og:description" content="'.$nowseo->{'ogdescription'}.'"/>';
echo'<meta property="twitter:card" content="'.$nowseo->{'twittercard'}.'"/>';
echo'<meta property="twitter:description" content="'.$nowseo->{'twitterdescription'}.'"/>';
echo'<meta property="twitter:image" content="'.$nowseo->{'twitterimage'}.'"/>';
?>