<?php
include "../base.php";
$do = $_GET['do'];

$data=[];

if (isset($_FILES['img'])) {
    $name=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/$name");
    $data['img']=$name;
    switch ($do) {
        case 'work':
            $data['text']=$_POST['text'];
            $data['sh']=1;
            break;
        
        default:
            break;
    }
    $$do->save($data);
}else {

    switch ($do) {
        case 'nav':
            $data['text']=$_POST['text'];
            $data['href']=$_POST['href'];
            $data['sh']=1;
            break;
        case 'link':
            $data['title']=$_POST['title'];
            $data['text']=$_POST['text'];
            $data['href']=$_POST['href'];
            break;
        
        default:
            break;
    }

    $$do->save($data);
}




to("../back.php?do=$do");

?>