<html>
<head>
<meta charset="utf-8">

<title>kamisama</title></head>
<body>
<?php

$fileopen = fopen('result.csv', 'r+');
if ($fileopen === false) {
    die('ファイルを開けませんでした.');
}
if ($fileopen){

if (flock($fileopen, LOCK_EX)) {

$filegats = fgets($fileopen);
if ($filegats === false) {
    file_put_contents("result.csv", "0,0,0");
    $filegats = "0,0,0";
}
$result = explode(',', $filegats);

$AI = mt_rand(0, 2);
$hand=$_GET['hand'];
if (!isset($_GET['hand']) || $_GET['hand'] === '') {
    print "戦績<br/>";
    print ($result[0]."勝:".$result[1]."敗:".$result[2]."分け");
}
else if ($hand==$AI) {
    if($AI==0){ print "相手は，，グー！<br/>";}
    else  if($AI==1){ print "相手は，，チョキ！<br/>";}
    else  if($AI==2){ print "相手は，，パァ！<br/>";}
    print "おあいこだね<br/>";
    $newresult=(int)$result[2];
    $newresult++;
    file_put_contents("result.csv", $result[0].",".$result[1].",".$newresult);
    print ($result[0]."勝:".$result[1]."敗:".$newresult."分け");
}
else if($hand==0&&$AI==1){
    print "相手は，，チョキ！<br/>";
    
    print "君のかち<br/>";
    $newresult=(int)$result[0];
    $newresult++;
    file_put_contents("result.csv", $newresult.",".$result[1].",".$result[2]);
    print ($newresult."勝:".$result[1]."敗:".$result[2]."分け");
}
else if($hand==1&&$AI==2){
    print "相手は，，パァ！<br/>";
    print "ユーのかち<br/>";
    $newresult=(int)$result[0];
    $newresult++;
    file_put_contents("result.csv", $newresult.",".$result[1].",".$result[2]);
    print ($newresult."勝:".$result[1]."敗:".$result[2]."分け");
}
else if($hand==2&&$AI==0){
    print "相手は，，グー！<br/>";
    print "あなたのかち<br/>";
    $newresult=(int)$result[0];
    $newresult++;
    file_put_contents("result.csv", $newresult.",".$result[1].",".$result[2]);
    print ($newresult."勝:".$result[1]."敗:".$result[2]."分け");
}
else {
    if($AI==0){ print "相手は，，グー！<br/>";}
    else  if($AI==1){ print "相手は，，チョキ！<br/>";}
    else  if($AI==2){ print "相手は，，パァ！<br/>";}
    print "おまえのまけw <br/>";
    $newresult=(int)$result[1];
    $newresult++;
    file_put_contents("result.csv", $result[0].",".$newresult.",".$result[2]);
    print ($result[0]."勝:".$newresult."敗:".$result[2]."分け");
}
 
 flock($fileopen, LOCK_UN);
} 
}
fclose($fileopen);

?>
</body>
</html> 