<?php
    //查数据库
    require_once "../../assets/vendors/tools/my.php";
    //查询文章总数
    $sql1 = "select *from posts" ;
    //draftedCount文章草稿的数量
    $sql2 = "select *from posts where status = 'drafted' ";
    //commentsCount评论总数
    $sql3 = "select *from comments ";
    //heldCount待审核数量
    $sql4 = "select *from comments where status = 'held'";
    //catCount分类数量
    $sql5 = "select *from categories ";

    //查询文章总数
    $postsCount = count(do_select($sql1));
    //draftedCount文章草稿的数量
    $draftedCount = count(do_select($sql2));
    //commentsCount评论总数
    $commentsCount = count(do_select($sql3));
    //heldCount待审核数量
    $heldCount = count(do_select($sql4));
    //catCount分类数量
    $catCount = count(do_select($sql5));
    //拼接成json字符串返回
    $arr = [
        "postsCount" => $postsCount,
        "draftedCount" => $draftedCount,
        "commentsCount" => $commentsCount,
        "heldCount" => $heldCount,
        "catCount" => $catCount
    ];

    echo json_encode($arr);
?>