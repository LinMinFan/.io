<?php
$do = $_GET['do'];
include "../base.php";


if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
            $$do->del($id);
        }else {
            $data=$$do->find($id);
            switch ($do) {
            case 'nav':
                $data['text']=$_POST['text'][$key];
                $data['href']=$_POST['href'][$key];
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
            case 'work':
                $data['text']=$_POST['text'][$key];
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
            case 'link':
                $data['title']=$_POST['title'][$key];
                $data['text']=$_POST['text'][$key];
                $data['href']=$_POST['href'][$key];
                break;    
            default:
                break;
            }
            $$do->save($data);
        }
    }
}        

    






to("../back.php?do=$do");
