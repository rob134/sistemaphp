<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simulado QEnade</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>

<body>

<!--header start-->
<div class="row header">
<div class="col-lg-6">
<span class="logo">QEnade</span></div>
<div class="col-md-2">
</div>
<div class="col-md-4">
<?php
 include_once 'conexao.php';
session_start();
  if((!isset($_SESSION['email']))){
echo '<a href="#" class="pull-right sub1 btn title3" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;Entrar</a>&nbsp;';}
else
{
echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Sair</a>&nbsp;';}
?>

<a href="index.php" class="pull-right btn sub1 title3"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a>&nbsp;
</div></div>

<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">LogIn</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Digite seu email" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Digite sua senha" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

<!--header end-->

<div class="bg1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:430px;">
<h2 align="center" style="font-family:'typo'; color:#000066">FEEDBACK/Opiniões sobre o Sistema:</h2>
<div style="font-size:14px">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo' 
Você pode enviar seu feedback através dos endereços de email:<br />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<a href="robson.muniz1000@gmail.com" style="color:#000000"></a><br /><br />
</div><div class="col-md-1"></div></div>
<p>Ou enviar pelos formulários abaixo:-</p>
<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Name:</b><br /><br /><br /><b>Assunto:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Digite seu nome" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Digite o assunto no qual quer abordar" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>Endereço de email:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Digite seu email" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Escreva seu email aqui:"></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Enviar" class="btn btn-primary" />
</div>
</form>';}?>
</div><!--col-md-6 end-->
<div class="col-md-3"></div></div>
</div></div>
</div><!--container end-->


<!--Footer start-->
<div class="row footer">
<div class="col-md-3 box">
<a href="#" target="_blank">Sobre nós</a>
</div>


<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#developers">Desenvolvedores</a>
</div>

<div class="col-md-3 box">
<a href="feedback.php" target="_blank">Feedback</a></div></div>

<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">fechar</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:white">Desenvolvedores</span></h4>
      </div>
    
      <div class="modal-body">
        <p>
    <div class="row">
    <div class="col-md-4">
     <img src="image/CAM00121.jpg" width=100 height=100 alt="IFSP" class="img-rounded">
     </div>
     <div class="col-md-5">
    <a href="#" style="color:#202020; font-family:'typo' ; font-size:18px" title="Acesse o site">http://btv.ifsp.edu.br</a>
    <h4 style="color:black; font-family:'typo' ;font-size:16px" class="title1"> (15) 3363-8610</h4>
    <h4 style="font-family:'typo' "></h4>
    <h4 style="font-family:'typo' ">IFSP - Instituto Federal de São Pulo ,Boituva</h4></div></div>
    </p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal for admin login-->
   <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">LOGIN</span></h4>
      </div>
      <div class="modal-body title1">

      

      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->


</body>
</html>

