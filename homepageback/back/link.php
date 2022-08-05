<div class="mainbox">
    <h2><?= $str->hd; ?></h2>
    <hr>

    <form action="./api/edit.php?do=<?= $do; ?>" method="POST">
        <table style="width:100%;">
            <tr class="tr_back">
                <td style="width:30%;"><?= $str->td[0]; ?></td>
                <td style="width:30%;"><?= $str->td[1]; ?></td>
                <td style="width:30%;"><?= $str->td[2]; ?></td>
                <td>刪除</td>
            </tr>
            <?php
            $p=($_GET['p'])??1;
            $countsall=$$do->math('count','id');
            $div=4;
            $pages=ceil(($countsall/$div));
            $start=($p-1)*$div;
            $pre=($p-1>0)?($p-1):1;
            $next=($p+1<$pages)?($p+1):$pages;
            $dataall = $$do->all(" limit $start,$div");
            foreach ($dataall as $key => $data) {
            ?>
                <tr class="cent">
                    <td><input type="text" name="title[]" value="<?= $data['title']; ?>" style="width:95%;"></td>
                    <td><textarea name="text[]" style="width:95%;height:50px;"><?= $data['text']; ?></textarea></td>
                    <td><input type="text" name="href[]" value="<?= $data['href']; ?>" style="width:95%;"></td>
                    <td><input type="checkbox" name="del[]" value="<?= $data['id']; ?>"></td>
                    <input type="hidden" name="id[]" value="<?= $data['id']; ?>">
                </tr>
            <?php
            }
            ?>
        </table>
        <div style="display:flex;justify-content: space-evenly;width:50%;margin:10px auto;">
            <input type="submit" value="送出">
            <input type="reset" value="重填">
        </div>
    </form>
    <div class="cent pagebox">
        <a href="?do=<?=$do;?>&p=<?=$pre;?>"><</a>
        <?php
        for ($i=1; $i <= $pages ; $i++) { 
        ?>
        <a href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i==$p)?"style='font-size:24px'":"";?>><?=$i;?></a>
        <?php
        }
        ?>
        <a href="?do=<?=$do;?>&p=<?=$next;?>">></a>
    </div>
    <div style="margin:20px 0;"><input type="button" value="<?= $str->abtn; ?>" onclick="bk('./modal/<?=$do;?>.php?do=<?=$do;?>')"></div>
</div>