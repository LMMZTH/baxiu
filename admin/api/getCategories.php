<?php
      //引入
      require_once  "../../assets/vendors/tools/my.php";

      $sql = "select *from categories";

      $data = do_select($sql);

      echo json_encode($data);
?>