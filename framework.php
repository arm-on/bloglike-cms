<?php
/* connection details-s */
if(is_dir("install")) header('location: install');
$host="localhost";
$dbname="mycms";
$username="root";
$pass="";
$posts_table="bl_posts";
$users_table="bl_users";
$pages_table="bl_pages";
$levels_table="bl_levels";
$cats_table="bl_cats";
$menus_table="bl_menus";
$stats_table="bl_statistics";
$mct_table="bl_mct";
/* connection details-e */
include_once('classes.php');
include_once('date.php');
/* site-title-s */
function BL_TITLE(){db_get_echo("bl_settings","ttl");}
/* site-title-s */
/* site-keywords-s */
function BL_KEYWORDS(){db_get_echo("bl_settings","kws");}
/* site-keywords-e */
/* site-description-s */
function BL_DESCRIPTION(){db_get_echo("bl_settings","des");}
/* site-description-e */
/* date & time-s */
function BL_DATE($format,$get_type="echo")
{
    if($get_type=="echo")
    {
        if($format=="yyyy/mm/dd")
        echo mds_date("Y/m/d",time(),0);
        elseif($format=="F")
        echo '<table><tr>'.'<td>'.mds_date("M ماه Y").'</td><td>'.mds_date("d").'</td></tr></table>';
    }
    elseif($get_type=="return")
    {
        $now_date=mds_date("Y/m/d");
        return $now_date;
    }
}
function BL_YEAR()
{
    date_default_timezone_set("Asia/Tehran");
    return intval(mds_date("Y"));
}
function BL_MONTH()
{
    date_default_timezone_set("Asia/Tehran");
    return intval(mds_date("m"));
}
function BL_DAY()
{
    date_default_timezone_set("Asia/Tehran");
    return intval(mds_date("d"));
}
function BL_HOUR()
{
    date_default_timezone_set("Asia/Tehran");
    return intval(mds_date("G"));
}
function BL_MINUTES()
{
    date_default_timezone_set("Asia/Tehran");
    return intval(mds_date("i"));
}
function BL_TIME($get_type="echo")
{
    date_default_timezone_set("Asia/Tehran");
    if($get_type=="echo")
    {
        echo mds_date("G:i");
    }
    if($get_type=="return")
    {
        $now_time=mds_date("G:i");
        return $now_time;
    }
}
/* date & time-e */
/* posts-s */
function BL_POST_TITLE($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","ttl",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","ttl",$lim);
}
function BL_POST_TAGS($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","tgs",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","tgs",$lim);
}
function BL_POST_DESCRIPTION($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","des",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","des",$lim);
}
function BL_POST_DATE($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","dt",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","dt",$lim);
}
function BL_POST_TIME($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","tm",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","tm",$lim);
}
function BL_POST_LIKES($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","lks",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","lks",$lim);
}
function BL_POST_DISLIKES($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","dls",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","dls",$lim);
}
function BL_POST_STATS($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","vus",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","vus",$lim);
}
function BL_POST_ID($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","id",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","id",$lim);
}
function BL_POST_CAT($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") echo db_get_record("bl_posts","ct",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","ct",$lim);
}
function BL_POST_IMG($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") echo db_get_record("bl_posts","img",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","img",$lim);
}
function BL_POST_AUT($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_posts","aut",$lim);
    elseif($get_type=="return") return db_get_record("bl_posts","aut",$lim);
}
function BL_POST_COUNT_BY_CAT($cat)
{return post_count_by_cat($cat);}
function BL_POST_COUNT($get_type="echo")
{if($get_type=="echo") db_get_rownum("bl_posts");elseif($get_type=="return") return db_get_rownum("bl_posts","return");}
function BL_POST_NEW($title,$des,$cat,$tgs,$image)
{post_make($title,$des,$cat,$tgs,$_SESSION['logged_user'],$image);}
function BL_POST_EDIT($id,$title,$des,$cat,$tgs,$image)
{post_edit($id,$title,$des,$cat,$tgs,$image);}
function BL_POST_DELETE($id)
{post_delete($id);}
function BL_POST_TITLE_BY_CAT($num,$cat)
{$lim=(string)($num-1).",1";return post_title_by_cat($cat,$lim);}
function BL_POST_DES_BY_CAT($num,$cat)
{$lim=(string)($num-1).",1";return post_des_by_cat($cat,$lim);}
function BL_POST_ID_BY_CAT($num,$cat)
{$lim=(string)($num-1).",1";return post_id_by_cat($cat,$lim);}
function BL_POST_DATE_BY_CAT($num,$cat)
{$lim=(string)($num-1).",1";return post_date_by_cat($cat,$lim);}
function BL_POST_IMG_BY_CAT($num,$cat)
{$lim=(string)($num-1).",1";return post_img_by_cat($cat,$lim);}
function BL_POST_MYID_BY_REALID($realid)
{return db_get_myid("bl_posts",$realid);}
function BL_POST_REALID_BY_TITLE($title)
{return post_realid_by_title(str_replace("-"," ",$title));}
/* posts-e */
/* pages-s */
function BL_PAGE_NEW($title,$des)
{page_new($title,$des,$_SESSION['logged_user']);}
function BL_PAGE_EDIT($title,$des,$id)
{page_edit($title,$des,$id);}
function BL_PAGE_DELETE($id)
{page_delete($id);}
function BL_PAGE_REALID_BY_TITLE($title)
{return page_realid_by_title(str_replace("-"," ",$title));}
function BL_PAGE_TITLE($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_pages","ttl",$lim);
    elseif($get_type=="return") return db_get_record("bl_pages","ttl",$lim);
}
function BL_PAGE_DES($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_pages","des",$lim);
    elseif($get_type=="return") return db_get_record("bl_pages","des",$lim);
}
function BL_PAGE_AUTHOR($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_pages","aut",$lim);
    elseif($get_type=="return") return db_get_record("bl_pages","aut",$lim);
}
function BL_PAGE_ID($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_pages","id",$lim);
    elseif($get_type=="return") return db_get_record("bl_pages","id",$lim);
}
function BL_PAGE_COUNT()
{return db_get_rownum("bl_pages","return");}
function BL_PAGE_TITLE_BY_REAL_ID($num)
{$lim=(string)($num);return db_get_record_by_real_id("bl_pages","ttl",$lim);}
function BL_PAGE_DES_BY_REAL_ID($num)
{$lim=(string)($num);return db_get_record_by_real_id("bl_pages","des",$lim);}
function BL_PAGE_AUTHOR_BY_REAL_ID($num)
{$lim=(string)$num;return db_get_record_by_real_id("bl_pages","aut",$lim);}
/* pages-e */
/* users-s */
function BL_USER_NEW($username,$password,$valid,$avatar,$points,$email,$regdate,$birthdate,$name,$category="user")
{user_new($username,$password,$valid,$avatar,$points,$email,$regdate,$birthdate,$name,$category);}
function BL_USER_EDIT($username,$password,$valid,$avatar,$points,$email,$regdate,$birthdate,$name,$permission,$category,$id)
{user_edit($username,$password,$valid,$avatar,$points,$email,$regdate,$birthdate,$name,$permission,$category,$id);}
function BL_USER_DELETE($username)
{user_delete($username);}
function BL_USER_GET_MYID($realid)
{return db_get_myid("bl_users",$realid);}
function BL_USER_GET_NAME($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_users","nm",$lim);
    elseif($get_type=="return") return db_get_record("bl_users","nm",$lim);
}
function BL_USER_GET_PASS($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_users","ps",$lim);
    elseif($get_type=="return") return db_get_record("bl_users","ps",$lim);
}
function BL_USER_GET_AVATAR($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_users","avt",$lim);
    elseif($get_type=="return") return db_get_record("bl_users","avt",$lim);
}
function BL_USER_GET_EMAIL($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_users","eml",$lim);
    elseif($get_type=="return") return db_get_record("bl_users","eml",$lim);
}
function BL_USER_GET_REGDATE($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_users","rdt",$lim);
    elseif($get_type=="return") return db_get_record("bl_users","rdt",$lim);
}
function BL_USER_GET_BIRTHDATE($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_users","bdt",$lim);
    elseif($get_type=="return") return db_get_record("bl_users","bdt",$lim);
}
function BL_USER_GET_PERM($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_users","prm",$lim);
    elseif($get_type=="return") return db_get_record("bl_users","prm",$lim);
}
function BL_USER_GET_ID($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_users","id",$lim);
    elseif($get_type=="return") return db_get_record("bl_users","id",$lim);
}
function BL_USER_SEARCH_COUNT($username)
{return user_search_count($username);}
function BL_USER_SEARCH_GET_ID($username)
{return user_search_get_id($username);}
function BL_USER_SEARCH($username,$num)
{$lim=(string)($num-1).",1";return user_search($username,$lim);}
function BL_USER_PERM($username)
{return user_get_perm($username);}
function BL_USER_EDIT_PERM($username,$permission)
{user_changeperm($username,$permission);}
function BL_USER_COUNT()
{return db_get_rownum("bl_users","return");}
function BL_USER_EXIST($username,$password)
{return user_exist($username,$password);}
function BL_USER_GET_USERNAME_BY_ID($id)
{return user_get_username_by_id($id);}
function BL_USER_POST_NEW($username)
{if(BL_LEVEL_POST_NEW(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_POST_EDIT($username)
{if(BL_LEVEL_POST_EDIT(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_POST_DELETE($username)
{if(BL_LEVEL_POST_DELETE(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_PAGE_NEW($username)
{if(BL_LEVEL_PAGE_NEW(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_PAGE_EDIT($username)
{if(BL_LEVEL_PAGE_EDIT(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_PAGE_DELETE($username)
{if(BL_LEVEL_PAGE_DELETE(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_USERS_NEW($username)
{if(BL_LEVEL_USERS_NEW(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_USERS_EDIT($username)
{if(BL_LEVEL_USERS_EDIT(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_USERS_DELETE($username)
{if(BL_LEVEL_USERS_DELETE(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_IS_BANNED($username)
{if(BL_LEVEL_VISITS(BL_USER_PERM($username))) return TRUE;return FALSE;}
function BL_USER_MENU_NEW($username)
{if(BL_LEVEL_MENUS(BL_USER_PERM($username))>=1) return TRUE;return FALSE;}
function BL_USER_MENU_EDIT($username)
{if(BL_LEVEL_MENUS(BL_USER_PERM($username))>=2) return TRUE;return FALSE;}
function BL_USER_MENU_DELETE($username)
{if(BL_LEVEL_MENUS(BL_USER_PERM($username))>=3) return TRUE;return FALSE;}
function BL_USER_IS_LOGGED()
{if(isset($_SESSION['logged_user'])) return TRUE;return FALSE;}
function BL_USER_NAME()
{return (isset($_SESSION['logged_user'])?$_SESSION['logged_user']:"notlogged");}
function BL_USER_IS_ADMIN($username)
{if(BL_USER_MENU_NEW($username)||BL_USER_PAGE_NEW($username)||BL_USER_POST_NEW($username)||BL_USER_USERS_NEW($username)) return TRUE;return FALSE;}
/* users-e */
/* permissions-s */
function BL_LEVEL_NEW($display,$posts,$users,$pages,$visit,$menu)
{level_new($display,$posts,$users,$pages,$visit,$menu);}
function BL_LEVEL_EDIT($display,$posts,$users,$pages,$visit,$id,$menu)
{level_edit($display,$posts,$users,$pages,$visit,$id,$menu);}
function BL_LEVEL_DELETE($id)
{level_delete($id);}
function BL_LEVEL_POST($display)
{return level_posts($display);}
function BL_LEVEL_PAGES($display)
{return level_pages($display);}
function BL_LEVEL_USERS($display)
{return level_users($display);}
function BL_LEVEL_VISITS($display)
{return level_visits($display);}
function BL_LEVEL_MENUS($display)
{return level_menu($display);}
function BL_LEVEL_ID($display)
{return level_id($display);}
function BL_LEVEL_POST_NEW($display)
{if(BL_LEVEL_POST($display)>=1) return TRUE;return FALSE;}
function BL_LEVEL_POST_EDIT($display)
{if(BL_LEVEL_POST($display)>=2) return TRUE;return FALSE;}
function BL_LEVEL_POST_DELETE($display)
{if(BL_LEVEL_POST($display)>=3) return TRUE;return FALSE;}
function BL_LEVEL_PAGE_NEW($display)
{if(BL_LEVEL_PAGES($display)>=1) return TRUE;return FALSE;}
function BL_LEVEL_PAGE_EDIT($display)
{if(BL_LEVEL_PAGES($display)>=2) return TRUE;return FALSE;}
function BL_LEVEL_PAGE_DELETE($display)
{if(BL_LEVEL_PAGES($display)>=3) return TRUE;return FALSE;}
function BL_LEVEL_USERS_NEW($display)
{if(BL_LEVEL_USERS($display)>=1) return TRUE;return FALSE;}
function BL_LEVEL_USERS_EDIT($display)
{if(BL_LEVEL_USERS($display)>=2) return TRUE;return FALSE;}
function BL_LEVEL_USERS_DELETE($display)
{if(BL_LEVEL_USERS($display)>=3) return TRUE;return FALSE;}
function BL_LEVEL_COUNT()
{return db_get_rownum("bl_levels","return");}
function BL_LEVEL_NAME($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_levels","dpl",$lim);
    elseif($get_type=="return") return db_get_record("bl_levels","dpl",$lim);
}
/* permissions-e */
/* cats-s */
function BL_CAT_NEW($name)
{cat_new($name);}
function BL_CAT_EDIT($name,$id)
{cat_edit($name,$id);}
function BL_CAT_DELETE($name)
{cat_delete($name);}
function BL_CAT_ID($name)
{return cat_id($name);}
function BL_CAT_COUNT()
{return db_get_rownum("bl_cats","return");}
function BL_CAT_NAME($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_cats","nm",$lim);
    elseif($get_type=="return") return db_get_record("bl_cats","nm",$lim);
}
function BL_CAT_ID_BY_MYID($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_cats","id",$lim);
    elseif($get_type=="return") return db_get_record("bl_cats","id",$lim);
}
function BL_CAT_NAME_BY_REAL_ID($id)
{return cat_name($id);}
/* cats-e */
/* moi-s */
function BL_MOI_COUNT()
{return db_get_rownum("bl_menus","return");}
function BL_MOI_NEW($title,$des,$father,$priority)
{moi_new($title,$des,$father,$priority);}
function BL_MOI_EDIT($title,$des,$father,$priority,$id)
{moi_edit($title,$des,$father,$priority,$id);}
function BL_MOI_DELETE($title)
{moi_delete($title);}
function BL_MOI_TITLE($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_menus","ttl",$lim);
    elseif($get_type=="return") return db_get_record("bl_menus","ttl",$lim);
}
function BL_MOI_DES($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_menus","des",$lim);
    elseif($get_type=="return") return db_get_record("bl_menus","des",$lim);
}
function BL_MOI_ID($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_menus","id",$lim);
    elseif($get_type=="return") return db_get_record("bl_menus","id",$lim);
}
function BL_MOI_FATHER($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_menus","fdr",$lim);
    elseif($get_type=="return") return db_get_record("bl_menus","fdr",$lim);
}
function BL_MOI_DELETE_BY_ID($id)
{moi_delete_by_id($id);}
function BL_MOI_PRIORITY($num,$get_type="echo")
{
    $lim=(string)($num-1).",1";
    if($get_type=="echo") db_get_record_echo("bl_menus","prr",$lim);
    elseif($get_type=="return") return db_get_record("bl_menus","prr",$lim);
}
function BL_MOI_GET_TITLE_BY_PRR_AND_FDR($priority,$father)
{return moi_get_title_by_priority_and_father($priority,$father);}
function BL_MOI_GET_DES_BY_PRR_AND_FDR($priority,$father)
{return moi_get_des_by_priority_and_father($priority,$father);}
function BL_MOI_SUBITEMS_COUNT($father)
{return moi_count_subitems($father);}
/* moi-e */
/* statistics-s */
function BL_STATS()
{stats_counter();}
function BL_STATS_GET($num,$when)
{
    $lim=(string)($num-1).",1";
    if($when=="bfs") return intval(db_get_record("bl_statistics","bfs",$lim));
    elseif($when=="stt") return intval(db_get_record("bl_statistics","stt",$lim));
    elseif($when=="tts") return intval(db_get_record("bl_statistics","tts",$lim));
    elseif($when=="sto") return intval(db_get_record("bl_statistics","sto",$lim));
    elseif($when=="otf") return intval(db_get_record("bl_statistics","otf",$lim));
    elseif($when=="sum") return BL_STATS_GET($num,"bfs")+BL_STATS_GET($num,"tts")+BL_STATS_GET($num,"stt")+BL_STATS_GET($num,"sto")+BL_STATS_GET($num,"otf");
}
/* statistics-e */
/* mct-s */
function BL_MSG_SEND($from,$too,$des)
{send_message($from,$too,$des);}
function BL_MSG_RSV($field,$too,$limit)
{
    $lim=(string)($limit-1).",1";
    return recieve_message($field,$too,$lim);
}
function BL_MSG_COUNT()
{
    return recieve_message("COUNT(*)",BL_USER_NAME(),"1");
}
function BL_MSG_DLT($too,$id)
{delete_message($too,$id);}
function BL_COMMENT_SEND($from,$postid,$des)
{send_comment($from,$postid,$des);}
function BL_COMMENT_RSV($field,$postid,$limit)
{
    $lim=(string)($limit-1).",1";
    return recieve_comment($field,$postid,$lim);
}
function BL_COMMENT_COUNT($postid)
{
    return recieve_comment("COUNT(*)",$postid,"1");
}
function BL_COMMENT_DLT($postid,$id)
{delete_comment($postid,$id);}
function BL_TICKET_SEND($from,$subject,$des)
{send_ticket($from,$subject,$des);}
function BL_TICKET_RSV($field,$subject,$limit)
{
    $lim=(string)($limit-1).",1";
    return recieve_ticket($field,$subject,$lim);
}
function BL_TICKET_DLT($subject,$id)
{delete_ticket($subject,$id);}
/* mct-e */
/* pages-s */
function BL_PAGE_ADDRESS()
{return $_SERVER['REQUEST_URI'];}
function BL_PAGE_REAL_ADDRESS()
{return $_SERVER['PHP_SELF'];}
/* pages-e */
/* editor-s */
function BL_EDITOR_HEAD()
{echo'<script src="texteditor/minified/jquery.sceditor.bbcode.min.js"></script><script src="texteditor/editor.js"></script>';}
function BL_EDITOR_BODY($width,$height,$name="default",$content="")
{echo'<textarea id="editor" name="'.$name.'" style="height:'.$height.'px;width:'.$width.'px;">'.$content.'</textarea>';}
function BL_CKEDITOR_BODY($cols,$rows,$id,$name,$content,$style="")
{echo'<textarea id="'.$id.'" name="'.$name.'" cols="'.$cols.'" rows="'.$rows.'" style="'.$style.'">'.$content.'</textarea>';}
function BL_CKEDITOR_HEAD()
{echo'<script src="../ckeditor/ckeditor.js"></script>';}
function BL_CKEDITOR_ENABLE($textarea)
{echo"<script>CKEDITOR.replace('".$textarea."')</script>";}
/* editor-e */
?>