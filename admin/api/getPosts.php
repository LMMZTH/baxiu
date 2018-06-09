<?php
    //引入
    require_once  "../../assets/vendors/tools/my.php";
    //获取用户传过来的数据
    //获取当前页码
    $pageIndex = $_GET['pageIndex'];
    //获取页容量
    $pageCount = $_GET['pageCount'];
    //获取分类
    $category = $_GET['category'];
    //获取状态
    $status = $_GET['status'];
    //计算除开始的下标
    $startIndex = ($pageIndex-1)*$pageCount;
    //准备sql语句
    $sql = "select p.id,p.title,u.nickname,c.name,p.created,p.status
            from posts p
            inner join
            categories c
            on c.id = p.category_id
            inner join users u
            on u.id = p.user_id
            where true " ;
    $sql2 = "select *from posts where true";
//    判断分类是否为空
    if($category != ""){
        $sql .= " and p.category_id = $category";
        $sql2 .= " and category_id = $category";
    }
//     判断状态是否为空
    if($status != ""){
        $sql .= " and p.status = '$status' ";
        $sql2 .= " and status = '$status' ";
    }
    $sql .= " limit $startIndex,$pageCount";

    $data =do_select($sql);
    //查询数据的总个数
    $count = count(do_select($sql2));
    //查询到的总页数
    $totalPage = ceil($count/$pageCount);

//    $arr = array(
//        "data" => $data,
//        "totalPage" => $totalPage
//    );
     $arr = [
            "data" => $data,
            "totalPage" => $totalPage
        ];

    echo json_encode($arr);

?>