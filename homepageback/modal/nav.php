<?php
$do = $_GET['do'];
include "../base.php";
$str = new str($do);
$data=$$do->find(1);
?>
<div class="modalbox">
    <h2 style="text-align:center;margin:30px"><?=$str->ahd;?></h2>
    <hr>
    <form action="./api/add.php?do=<?=$do;?>" enctype="multipart/form-data" method="POST">
    <table style="margin:20px auto;">
        <tr>
            <td><?=$str->atd[0];?></td>
            <td><input type="text" name="text"></td>
        </tr>
        <tr>
            <td><?=$str->atd[1];?></td>
            <td><input type="text" name="href"></td>
        </tr>
        
    </table>
    <div style="display:flex;justify-content: space-evenly;width:50%;margin:auto">
        <input type="submit" value="送出">
        <input type="reset" value="重填">
    </div>
    </form>
</div>