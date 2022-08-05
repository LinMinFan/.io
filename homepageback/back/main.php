<div class="mainbox">
<h2><?=$str->hd;?></h2>
<hr>

<form action="./api/edit.php?do=<?=$do;?>" method="POST">
<table style="width:100%;">
    <tr class="tr_back">
        <td style="width:70%;"><?=$str->td;?></td>
        <td></td>
    </tr>
    <?php
    $dataall=$$do->all();
    foreach ($dataall as $key => $data) {
    ?>
    <tr class="cent">
        <td><img src="./img/<?=$data['img'];?>" width="160px" height="90px"></td>
        <td><input type="button" value="<?=$str->ubtn;?>" onclick="bk('./modal/upload.php?do=<?=$do;?>&id=<?=$data['id'];?>')"></td>
    </tr>
    <?php
    }
    ?>
</table>
</form>
<div >
</div>
</div>