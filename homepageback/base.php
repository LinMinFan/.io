<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class db{
    protected $table;
    protected $pdo;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=homepage";
    //protected $dsn="mysql:host=localhost;charset=utf8;dbname=s1110204";

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,"root","");
        //$this->pdo=new PDO($this->dsn,"s1110204","s1110204");
    }

    function array_str($array){
        $tmp=[];
        foreach ($array as $key => $value) {
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }

    function find($id){
        $sql="SELECT * FROM $this->table WHERE ";
        if (is_array($id)) {
            $tmp=$this->array_str($id);
            $sql.=join(" && ",$tmp);
        }else {
            $sql.="`id`=".$id;
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp=$this->array_str($arg[0]);
                $sql.=" WHERE ".join(" && ",$tmp);
            }else {
                $sql.=$arg[0];
            }
        }
        if (isset($arg[1])) {
                $sql.=$arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function del($id){
        $sql="DELETE FROM $this->table WHERE ";
        if (is_array($id)) {
            $tmp=$this->array_str($id);
            $sql.=join(" && ",$tmp);
        }else {
            $sql.="`id`=".$id;
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }

    function save($array){
        if (isset($array['id'])) {
            $sql="UPDATE $this->table SET ";
            $tmp=$this->array_str($array);
            $sql.=join(" , ",$tmp)." WHERE `id`=".$array['id'];
        }else {
            $sql="INSERT INTO $this->table (`".join("`, `",array_keys($array))."`) VALUES ('".join("','",$array)."')";
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }

    function math($math,$col,...$arg){
        $sql="SELECT $math($col) FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp=$this->array_str($arg[0]);
                $sql.=" WHERE ".join(" && ",$tmp);
            }else {
                $sql.=$arg[0];
            }
        }
        if (isset($arg[1])) {
                $sql.=$arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
}

class str{
    public $table;
    public $hd;
    public $td;
    public $abtn;
    public $ahd;
    public $atd;
    public $ubtn;
    public $uhd;
    public $utd;

    function __construct($table)
    {
        $this->table=$table;
        switch ($table) {
            case 'main':
                $this->hd="主題圖片";
                $this->td="圖片";
                $this->ubtn="更換圖片";
                $this->uhd="更換圖片";
                $this->utd="圖片：";
                break;
            case 'nav':
                $this->hd="標題管理";
                $this->td=['標題','連結網址'];
                $this->abtn="新增標題";
                $this->ahd="新增標題";
                $this->atd=['標題：','連結網址'];
                break;
            case 'work':
                $this->hd="作品集管理";
                $this->td=['縮圖','作品名稱'];
                $this->abtn="新增作品";
                $this->ahd="新增作品";
                $this->atd=['縮圖：','作品名稱：'];
                $this->ubtn="更換圖片";
                $this->uhd="更換圖片";
                $this->utd="圖片：";
                break;
            case 'link':
                $this->hd="作品集彈出視窗管理";
                $this->td=['作品名稱','作品說明','連結網址'];
                $this->abtn="新增視窗";
                $this->ahd="新增視窗";
                $this->atd=['作品名稱：','作品說明：','連結網址：'];
                break;
            
            default:
                # code...
                break;
        }
    }
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}



$user=new db('user');
$main=new db('main');
$nav=new db('nav');
$work=new db('work');
$link=new db('link');
//$user=new db('homepage_back_user');
//$main=new db('homepage_back_main');
//$nav=new db('homepage_back_nav');
//$work=new db('homepage_back_work');
//$link=new db('homepage_back_link');




?>