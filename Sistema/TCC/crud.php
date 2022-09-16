<?php
include_once 'conexao.php';
session_start();
$email=$_SESSION['email'];

if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key']=='sunny7785068889') {
$id=@$_GET['fdid'];
$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error');
header("location:dados.php?q=3");
}
}


if(isset($_SESSION['key'])){
if(@$_GET['demail'] && $_SESSION['key']=='sunny7785068889') {
$demail=@$_GET['demail'];
$r1 = mysqli_query($con,"DELETE FROM ranking WHERE email='$demail' ") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM historico WHERE email='$demail' ") or die('Error');
$result = mysqli_query($con,"DELETE FROM usuario WHERE email='$demail' ") or die('Error');
header("location:dados.php?q=1");
}
}

if(isset($_SESSION['key'])){
if(@$_GET['q']== 'rmquiz' && $_SESSION['key']=='sunny7785068889') {
$eid=@$_GET['eid'];
$result = mysqli_query($con,"SELECT * FROM questoes WHERE eid='$eid' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];
$r1 = mysqli_query($con,"DELETE FROM opcoes WHERE qid='$qid'") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM reposta WHERE qid='$qid' ") or die('Error');
}
$r3 = mysqli_query($con,"DELETE FROM questoes WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM simulado WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM historico WHERE eid='$eid' ") or die('Error');

header("location:dados.php?q=5");
}
}


if(isset($_SESSION['key'])){
if(@$_GET['q']== 'addquiz' && $_SESSION['key']=='sunny7785068889') {
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$total = $_POST['total'];
$sahi = $_POST['right'];
$wrong = $_POST['wrong'];
$time = $_POST['time'];
$tag = $_POST['tag'];
$desc = $_POST['desc'];
$id=uniqid();
$q3=mysqli_query($con,"INSERT INTO simulado VALUES  ('$id','$name' , '$sahi' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

header("location:dados.php?q=4&step=2&eid=$id&n=$total");
}
}


if(isset($_SESSION['key'])){
if(@$_GET['q']== 'addqns' && $_SESSION['key']=='sunny7785068889') {
$n=@$_GET['n'];
$eid=@$_GET['eid'];
$ch=@$_GET['ch'];

for($i=1;$i<=$n;$i++)
 {
 $qid=uniqid();
 $qns=$_POST['qns'.$i];
$q3=mysqli_query($con,"INSERT INTO questoes VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
  $oaid=uniqid();
  $obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($con,"INSERT INTO opcoes VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($con,"INSERT INTO opcoes VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($con,"INSERT INTO opcoes VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($con,"INSERT INTO opcoes VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($con,"INSERT INTO resposta VALUES  ('$qid','$ansid')");

 }
header("location:dados.php?q=0");
}
}


if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$ans=$_POST['ans'];
$qid=@$_GET['qid'];
$q=mysqli_query($con,"SELECT * FROM resposta WHERE qid='$qid' " );
while($row=mysqli_fetch_array($q) )
{
$ansid=$row['ansid'];
}
if($ans == $ansid)
{
$q=mysqli_query($con,"SELECT * FROM simulado WHERE eid='$eid' " );
while($row=mysqli_fetch_array($q) )
{
$sahi=$row['sahi'];
}
if($sn == 1)
{
$q=mysqli_query($con,"INSERT INTO historico VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
}
$q=mysqli_query($con,"SELECT * FROM historico WHERE eid='$eid' AND email='$email' ")or die('Error115');

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$r=$row['sahi'];
}
$r++;
$s=$s+$sahi;
$q=mysqli_query($con,"UPDATE `historico` SET `score`=$s,`level`=$sn,`sahi`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');

} 
else
{
$q=mysqli_query($con,"SELECT * FROM simulado WHERE eid='$eid' " )or die('Error129');

while($row=mysqli_fetch_array($q) )
{
$wrong=$row['wrong'];
}
if($sn == 1)
{
$q=mysqli_query($con,"INSERT INTO historico VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
}
$q=mysqli_query($con,"SELECT * FROM historico WHERE eid='$eid' AND email='$email' " )or die('Error139');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
}
$w++;
$s=$s-$wrong;
$q=mysqli_query($con,"UPDATE `historico` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');
}
if($sn != $total)
{
$sn++;
header("location:contausuario.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152');
}
else if( $_SESSION['key']!='sunny7785068889')
{
$q=mysqli_query($con,"SELECT score FROM historico WHERE eid='$eid' AND email='$email'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"SELECT * FROM ranking WHERE email='$email'" )or die('Error161');
$rowcount=mysqli_num_rows($q);
if($rowcount == 0)
{
$q2=mysqli_query($con,"INSERT INTO ranking VALUES('$email','$s',NOW())")or die('Error165');
}
else
{
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$s+$sun;
$q=mysqli_query($con,"UPDATE `ranking` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
}
header("location:contausuario.php?q=result&eid=$eid");
}
else
{
header("location:contausuario.php?q=result&eid=$eid");
}
}

if(@$_GET['q']== 'quizre' && @$_GET['step']== 25 ) {
$eid=@$_GET['eid'];
$n=@$_GET['n'];
$t=@$_GET['t'];
$q=mysqli_query($con,"SELECT score FROM historico WHERE eid='$eid' AND email='$email'" )or die('Error156');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
}
$q=mysqli_query($con,"DELETE FROM `historico` WHERE eid='$eid' AND email='$email' " )or die('Error184');
$q=mysqli_query($con,"SELECT * FROM ranking WHERE email='$email'" )or die('Error161');
while($row=mysqli_fetch_array($q) )
{
$sun=$row['score'];
}
$sun=$sun-$s;
$q=mysqli_query($con,"UPDATE `ranking` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
header("location:contausuario.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}

?>



