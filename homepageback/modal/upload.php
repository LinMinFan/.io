<?php
$do = $_GET['do'];
$id = $_GET['id'];
include "../base.php";
$str = new str($do);
$data=$$do->find(1);
?>
<div class="modalbox">
    <h2 style="text-align:center;margin:30px"><?=$str->uhd;?></h2>
    <hr>
    <form action="./api/upload.php?do=<?=$do;?>" enctype="multipart/form-data" method="POST">
    <table style="margin:20px auto;">
        <tr>
            <td><?=$str->utd;?></td>
            <td><input type="file" name="img"></td>
            <input type="hidden" name="id" value="<?=$id;?>">
        </tr>
        
    </table>
    <div style="display:flex;justify-content: space-evenly;width:50%;margin:auto">
        <input type="submit" value="送出">
        <input type="reset" value="重填">
    </div>
    </form>
</div>