<?php

$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
//接続


$sql="CREATE TABLE dtb"
."("
."id INT AUTO_INCREMENT PRIMARY KEY,"
."name char(32),"
."comment TEXT,"
."pass char(32),"
."date char(100)"
.");";
$stmt = $pdo->query($sql);



if(!empty($_POST['editNo']))
   {
$sql='SELECT*FROM dtb';
$results=$pdo->query($sql);
foreach($results as $row){
   if($_POST["editNo"]==$row['id'] and $_POST["epass"]==$row['pass']){
    $dia=$row['name'];
    $ghost=$row['comment'];
    $phos=$_POST['epass'];
   }}}


if(!empty($_POST['editNoo'])){
if(!empty($_POST['comment']) and !empty($_POST['name'])){
$sql='SELECT*FROM dtb';
$results=$pdo->query($sql);
foreach($results as $row){
   if($row['id']==$_POST['editNoo'] and $_POST['pass']==$row['pass']){
echo 'ナナナ';
$id=$_POST['editNoo'];
$nm=$_POST['name'];
$kome=$_POST['comment'];
$sql="update dtb set name='$nm',comment='$kome'where id =$id";
$result=$pdo->query($sql);
                              }                         }}}
//編集


if(empty($_POST['editNoo'])){
if(!empty($_POST['comment']) and !empty($_POST['name'])){
if (!empty($_POST['pass'])){
echo "国産シイタケ";
//名前、コメントが無記入の場合なにも書き込まない。
$name=$_POST['name'];
$comment=$_POST['comment'];
$pass=$_POST['pass'];
$date=date('Y年m月d日 H時i分s秒');
$id=$row['id'];
$sql=$pdo->prepare("INSERT INTO dtb(id,name,comment,pass,date)VALUES(:id,:name,:comment,:pass,:date)");
$sql->bindParam(':id',$id,PDO::PARAM_STR);
$sql->bindParam(':name',$name,PDO::PARAM_STR);
$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
$sql->bindParam(':pass',$pass,PDO::PARAM_STR);
$sql->bindParam(':date',$date,PDO::PARAM_STR);

$sql->execute();


                          }
                            }
                                                       }
 if(isset($_POST['delete'])){
 if(!empty($_POST['dpass'])){
$sql='SELECT*FROM dtb';
$results=$pdo->query($sql);
foreach($results as $row){
if($row['id']==$_POST['delete'] and $_POST['dpass']==$row['pass']){
$id=$_POST['delete'];
$sql="delete from dtb where id =$id";
$result=$pdo->query($sql);
                            }}}
                            }
//削除
?>


<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<lang="ja"> 
<body>
<form action="mission4-1.php"method="post">
<td><align="center">
<input type="text" name ="name" value="<?php echo $dia;?>"placeholder="名前"></td><br/>
<td><align="center">
<input type="text" name ="comment" value="<?php echo $ghost;?>"placeholder="コメント"></td>
<td><input type="hidden" name ="editNoo" value="<?php echo $_POST["editNo"]?>"><br/>
<input type="text" name="pass"value="<?php echo $phos?>"placeholder="パスワード">
<imput type="text"><button name="submit" type="submit"> 送信</button></form>
</td>
<br/>

<br/>
<form action="mission4-1.php"method="post">
<input type="text" name="delete"placeholder="削除対象番号"><br/>
<input type="text" name="dpass"placeholder="パスワード">
 <input type="submit" name="deleteNo" value="送信"></form>
<form action="mission4-1.php"method="post">

<input type="text" name="editNo" placeholder="編集対象番号"> <br/>
 <input type="text" name="epass" placeholder="パスワード">
 <input type="submit" name="editbutton" value="送信" ></form>
<?php
$sql='SELECT*FROM dtb';
$results=$pdo->query($sql);
foreach($results as $row){
//$rowの中にはテーブルのカラム名が入る
echo $row['id'].',';
echo $row['name'].',';
echo $row['comment'].',';
echo $row['date'].'<br>';
}
?>


<br/>
</body>
</html>
