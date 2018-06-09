<?php
    //引入
    require_once  "../../assets/vendors/tools/my.php";
    //拿到传递过来的页码
    $pageIndex = $_GET['pageIndex'];
    //拿到传递过来的页容量
    $pageCount = $_GET['pageCount'];
    /*
    如果页容量为10
    页码1 开始位置0 （1-1）*10 = 0
    页码2 开始位置1  （2-1）*10 = 10
    起始位置=（页码-1）*页容量
    */
    $start = ($pageIndex - 1) * $pageCount;
    //连表查询
    $sql = "select c.id,c.author,c.content,p.title,c.created,c.status
    from comments c
    inner join
    posts p
    on
    c.post_id = p.id
    limit $start,$pageCount " ;
    $data = do_select($sql);
    //查询评论表的所有数据
    $sql2 = "select *from comments";
    //得到数据的总数
    $dataCount = count(do_select($sql2));
    //总页数 = 总数据/页容量 天花版函数
    $totalPage = ceil($dataCount / $pageCount);

    $arr = [
        "data" => $data,
        "totalPage" => $totalPage
    ];

    echo json_encode($arr);
?>