<?php
    //引入
        require_once  "../../assets/vendors/tools/my.php";
        //获取用户传过来的数据
        $ids = $_POST['ids'];
        $sql = "update posts set status = 'trashed' where id in ($ids) " ;

        //执行语句
        $data = my_zsg($sql);

        echo "ok";
?>