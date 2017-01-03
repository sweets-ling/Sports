<?php
//var_dump($_POST);
include_once('../../model/Sport.php');
$ds          = DIRECTORY_SEPARATOR;  //1
$type=$_POST['type'];
$storeFolder = '../../_static/uploads';   //2
if (!empty($_FILES)) {

    $filename= $_FILES['file']['name'];
    $filename =getMillisecond().substr(strrchr($filename, '.'), 0);
   // echo $filename;
    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath. $filename;  //5

    $allowed =  array('txt');

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
        echo 'error';
    }

    move_uploaded_file($tempFile,$targetFile); //6
    $conn=getContent($targetFile);
    importData($conn,$type);
    echo "<script>alert('数据导入成功！');location.href='../../view/data.php';</script>";


}
function getMillisecond() {
    list($s1, $s2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}


function getContent($targetPath){
    $file_path=$targetPath;
    $conn=file_get_contents($file_path);
//    $conn=str_replace("rn","<br/>",file_get_contents($file_path));

    return $conn;
}

function importData($conn,$type){
    $sport=new Sport(1,'sqlite:../../mydatabase.sqlite');
    $object=json_decode($conn);
    if($type){//sleep
        foreach($object as $item){
            $uid=$item->uid;
            $deep_minutes=$item->deep_minutes;
            $light_minutes=$item->light_minutes;
            $total_minutes=$item->total_minutes;
            $sleep_complete=$item->sleep_complete;
            $detail=$item->detail;
            $date=$item->date;
            $sport->importSleepData($uid,  $deep_minutes,$light_minutes,$total_minutes,$sleep_complete,$detail,$date);
        }
    }else{//sports
    foreach($object as $item){
         $uid=$item->uid;
        $calories=$item->calories;
        $meters=$item->meters;
        $steps=$item->steps;
        $minutes=$item->minutes;
        $date=$item->date;
        $sport->importSportData($uid,$calories,$meters,$steps,$minutes,$date);
    }
    }

}



