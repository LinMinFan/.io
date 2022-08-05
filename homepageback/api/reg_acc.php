<?php
include "../base.php";

$chk=$user->math('count','id',['acc'=>$_POST['newacc']]);
if ($chk>0) {
    echo 1;
}else {
    $data=[];
    $data['acc']=$_POST['newacc'];
    $data['pw']=$_POST['newpw'];
    $user->save($data);
    echo 0;
}


?>