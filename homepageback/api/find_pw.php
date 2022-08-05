<?php
include "../base.php";

$chk_user=$user->find(['acc'=>$_GET['findpw']]);

if (!empty($chk_user)) {
    echo "您的密碼為:".$chk_user['pw'];
}else {
    echo "查無此資料";
}

?>