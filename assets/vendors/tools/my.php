<?php
        function do_select($sql){
            //打开数据库
            $link = mysqli_connect('127.0.0.1','root','root','baixiu');
            //操作
            // $sql = "select *from hero_recycle where isDelete='no'" ;
            $res = mysqli_query($link,$sql);
            $data = mysqli_fetch_all($res,1);
            //关闭数据库
            mysqli_close($link);
            return $data;
        }

        function my_zsg($sql){
            $link = mysqli_connect('127.0.0.1','root','root','baixiu');
            //操作
            //$pata = "imgs/icon/$oldName" ;
            // $sql = "update hero_recycle set heroName='$name',heroSkill='$skill',heroIcon='$pata' where id=$id";
            mysqli_query($link,$sql);
            $rows = mysqli_affected_rows($link);
            mysqli_close($link);
            return $rows;
        }
?>