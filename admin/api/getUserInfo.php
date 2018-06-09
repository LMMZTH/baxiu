<?php
//打开session
  session_start();
  $data = $_SESSION['userInfo'];


  echo json_encode($data);



?>