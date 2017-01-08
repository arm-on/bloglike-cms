<?php
include('framework.php');
//BL_DAY()
//BL_YEAR()
//BL_MONTH()
//BL_MINUTES()
//BL_HOUR()
BL_STATS();
//echo BL_STATS_GET(1,"sum");
print_r($_REQUEST);
//echo '<br>'.sizeof($_REQUEST);
/*
foreach($_REQUEST as $element)
{
    if($element==2) echo "attack";
}
*/
//BL_MSG_SEND("5th","4th","789");
//echo BL_MSG_RSV("frm","4th","1");
//BL_MSG_DLT("4th","3");
//BL_COMMENT_SEND("you","2","oh my goodness");
//echo BL_COMMENT_RSV("des","2","1");
//BL_COMMENT_DLT("2","7");
//BL_TICKET_SEND("person","ads","is this right or not?");
//echo BL_TICKET_RSV("des","ads","2");
//BL_TICKET_DLT("ads","11");
?>