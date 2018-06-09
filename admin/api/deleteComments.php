<?php
    //引入
    require_once  "../../assets/vendors/tools/my.php";
    //获取用户传过来的id
    $ids = $_POST['ids'];
    $sql = "delete from comments where id in($ids)";

    //执行
    $row = my_zsg($sql);

    echo "ok";
?>