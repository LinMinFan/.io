<?php
include "../base.php";
$do = $_GET['do'];
$id = $_POST['id'];

$data=$$do->find($id);

if (isset($_FILES['img'])) {
    $name=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/$name");
    $data['img']=$name;
    $$do->save($data);
}


to("../back.php?do=$do");

?>