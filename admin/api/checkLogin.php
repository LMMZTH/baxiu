<?php
  //打开session
  session_start();
  if(isset($_SESSION['userInfo'])){
    echo "ok";
  }else{
    echo "nook";
  }
  
?>