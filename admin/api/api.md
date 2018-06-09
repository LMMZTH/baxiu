## 登录接口

1. 接口地址
    api/doLogin.php

2. 请求方式
    post

3. 请求参数
    userEmail
    userPass

4. 响应体
    json

5. 响应示例：
        登录成功
            {"msg":"登录成功","status":"ok"}
        登录失败
            {"msg":"账号或密码错误","status":"fail"}


## 判断是否有登录过
1. 接口地址
    api/checkLogin.php

2. 请求方式
    get

3. 请求参数
    无

4. 响应体
    字符串

5. 响应示例：
        有登录
            "ok"
        没有登录
            "nook"


## 获取登录用户信息的接口
1. 接口地址
    api/getUserInfo.php

2. 请求方式
    get

3. 请求参数
    无

4. 响应体
    json对象

5. 响应示例：
       {"id":1,"slug":"admin","email":"admin@heima.me","password":"123456","nickName":"管理员","avatar":"/uploads/avatar.jpg"}


## 退出登录接口
1. 接口地址
    api/logout.php

2. 请求方式
    get

3. 请求参数
    无

4. 响应体
    字符串

5. 响应示例：
       ok
       nook



## 获得统计数据接口
1. 接口地址
    api/getWebInfo.php

2. 请求方式
    get

3. 请求参数
    无

4. 响应体
    json

5. 响应示例：
       {"postsCount":5,"draftedCount":2,"commentsCount":10,"heldCount":1,"catCount":4}
       说明:postsCount代表文章总数
            draftedCount文章草稿的数量
            commentsCount评论总数
            heldCount待审核数量
            catCount分类数量



## 获得所有评论数据的接口
1. 接口地址
    api/getComments.php

注意:不要把所有数据一下子查询出来,因为评论数据可能成千上万条,一下子查出来数据量很大
而且返回给浏览器的时候也慢,网络资源耗的流量也大

应该分页查询(比如说一次只查10条)
既然要分页查了,那么后端肯定需要前端告诉它查第几页,最好也让每页显示多少条也让前端告诉你

2. 请求方式
    get

3. 请求参数
    pageIndex(要查第几页)
    pageCount(每页多少条)

4. 响应体
    json

除了返回本页的（10）条数据外，还应该告诉我一共有多少页
5. 响应示例：
       [

        data : [
           {"id":"1","author":"\u5c0f\u5468","email":"w@zce.me","created":"2017-07-04 12:00:00","content":"\u8fd9\u662f\u4e00\u6761\u6d4b\u8bd5\u8bc4\u8bba\uff0c\u6b22\u8fce\u5149\u4e34","status":"approved","post_id":"1","parent_id":null},

           {"id":"2","author":"\u563f\u563f","email":"ee@gmail.com","created":"2017-07-05 09:10:00","content":"\u60f3\u77e5\u9053\u9999\u6e2f\u56de\u5f52\u7684\u60ca\u4eba\u5185\u5e55\u5417\uff1f\u5feb\u5feb\u4e0e\u6211\u53d6\u5f97\u8054\u7cfb","status":"rejected","post_id":"1","parent_id":null},

           {"id":"3","author":"\u5c0f\u53f3","email":"www@gmail.com","created":"2017-07-06 14:10:00","content":"\u4f60\u597d\u554a\uff0c\u4ea4\u4e2a\u670b\u53cb\u597d\u5417\uff1f","status":"held","post_id":"1","parent_id":null}
           ],

         totalPage: 51
       ]


## 删除评论的接口
1. 接口地址
    api/deleteComments.php

2. 请求方式
    post

3. 请求参数
    ids
        如果只删一个,就传一个id
            例:ids=10
        如果要删多个,就传多个id,每个id用,隔开
            例:ids=10,11,12

4. 响应体
    string

5. 响应示例：
       ok
       nook


## 修改评论状态的接口
1. 接口地址
    api/updateComments.php

2. 请求方式
    post

3. 请求参数
    ids
        如果只改一个,就传一个id
            例:ids=10
        如果要改多个,就传多个id,每个id用,隔开
            例:ids=10,11,12

    status:
        传需要修改成什么样的状态
            例:status = "approved"

4. 响应体
    string

5. 响应示例：
       ok
       nook



## 获取所有文章的接口
1. 接口地址
    api/getPosts.php

2. 请求方式
    get

3. 请求参数
    pageIndex:查第几页
    pageCount:页容量
    category:分类
    status:状态

4. 响应体
    json

5. 响应示例：

   {

        data : [
           {"id":"1","author":"\u5c0f\u5468","email":"w@zce.me","created":"2017-07-04 12:00:00","content":"\u8fd9\u662f\u4e00\u6761\u6d4b\u8bd5\u8bc4\u8bba\uff0c\u6b22\u8fce\u5149\u4e34","status":"approved","post_id":"1","parent_id":null},

           {"id":"2","author":"\u563f\u563f","email":"ee@gmail.com","created":"2017-07-05 09:10:00","content":"\u60f3\u77e5\u9053\u9999\u6e2f\u56de\u5f52\u7684\u60ca\u4eba\u5185\u5e55\u5417\uff1f\u5feb\u5feb\u4e0e\u6211\u53d6\u5f97\u8054\u7cfb","status":"rejected","post_id":"1","parent_id":null},

           {"id":"3","author":"\u5c0f\u53f3","email":"www@gmail.com","created":"2017-07-06 14:10:00","content":"\u4f60\u597d\u554a\uff0c\u4ea4\u4e2a\u670b\u53cb\u597d\u5417\uff1f","status":"held","post_id":"1","parent_id":null}
           ],

         totalPage: 51
   }


## 获取所有分类的接口
1. 接口地址
    api/getCategories.php

2. 请求方式
    get

3. 请求参数


4. 响应体
    json

5. 响应示例：
    [
        {"id":"1","slug":"uncategorized","name":"\u672a\u5206\u7c7b"},
        {"id":"2","slug":"funny","name":"\u5947\u8da3\u4e8b"},
        {"id":"3","slug":"living","name":"\u4f1a\u751f\u6d3b"},
        {"id":"4","slug":"travel","name":"\u7231\u65c5\u884c"}
    ]


## 废弃文章接口
1. 接口地址
    api/doTrashPosts.php

2. 请求方式
    post

3. 请求参数
    ids:一个或多个id

4. 响应体
    Ok



## 添加文章接口
1. 接口地址
    api/addPosts.php

2. 请求方式
    post

3. 请求参数
    title
    content
    slug
    feature
    category_id
    created
    status

4. 响应体
    Ok
    nook




## 修改个人信息接口
1. 接口地址
    api/editSelf.php

2. 请求方式
    post

3. 请求参数
    avatar
    slug
    nickname
    bio

4. 响应体
    Ok
    nook


## 修改个人信息接口
1. 接口地址
    api/changePassword.php

2. 请求方式
    post

3. 请求参数
    oldPass
    newPass

4. 响应体
    "旧密码核对失败,请重新输入"
    "修改成功"

## 获取单个文章详情的接口

1. 接口地址
    api/getPostsDetail.php

2. 请求方式
    get

3. 请求参数
        id

4. 响应体
        json对象



## 修改某篇文章的接口

1. 接口地址
    api/updatePostsById.php

2. 请求方式
    post

3. 请求参数
        id

4. 响应体
        ok
        nook


## 添加分类接口

1. 接口地址
    api/addCategory.php

2. 请求方式
    post

3. 请求参数
        slug
        name

4. 响应体
        ok
        nook


## 修改分类的接口
1. 接口地址
    api/updateCategory.php

2. 请求方式
    post

3. 请求参数
        slug
        name
        id

4. 响应体
        ok
        nook


## 删除分类的接口
1. 接口地址
    api/deleteCategory.php

2. 请求方式
    post

3. 请求参数
        id

4. 响应体
        ok
        nook


## 删除分类的接口
1. 接口地址
    api/getSliders.php

2. 请求方式
    get

3. 请求参数


4. 响应体
        json对象
        [{"image":"/uploads/slide_1.jpg","text":"轮播项一","link":"https://zce.me"},{"image":"/uploads/slide_2.jpg","text":"轮播项二","link":"https://zce.me"}]



## 上传图片的接口
1. 接口地址
    api/uploadImg.php

2. 请求方式
    post

3. 请求参数
    image

4. 响应体
        字符串:返回的就是上传后图片的路径



## 修改轮播图的接口

1. 接口地址
    api/updateSliders.php

2. 请求方式
    post

3. 请求参数
    修改后的内容
        value

4. 响应
        ok nook

