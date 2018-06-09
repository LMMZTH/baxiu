<?php
  $email = $_POST['userEmail'];
  $pass = $_POST['userPass'];
//echo $pass;
//exit;
  $link = mysqli_connect('127.0.0.1','root','root','baixiu');
  $sql = "select *from users where email ='$email' and password = '$pass'" ;
  $res = mysqli_query($link,$sql);
  $data = mysqli_fetch_all($res,1);

  if(count($data) > 0){
    echo '{"msg":"登陆成功","status":"ok"}';
    //登陆成功  保存session
    //打开session
    session_start();
    //保存session
    $_SESSION['userInfo'] = $data[0];

  }else{
    echo '{"msg":"登陆失败","status":"fail"}';
  }
?>