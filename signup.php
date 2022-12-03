<html>
  <head>
    <meta charset="UTF-8" />
    <title>注册</title>
    <style>
       #a {
         width: 200px;
         height: 200px;
         position: absolute;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         margin: auto;
       }
       #d {
         width: 100vw;
         height: 100vh;
         background: url(https://img.zcool.cn/community/0180d45647208d32f87512f642c92b.jpg@1280w_1l_2o_100sh.jpg)
           no-repeat;
         background-size: cover;
         opacity: 0.5;
       }
       * {
         /* CSS Reset */
         margin: 0;
         padding: 0;
       }
       input {
      width:320px;
      box-sizing:border-box;
      border:1px solid #ccc;
      padding:5px;
      border-radius:3px;
      font-size:14;
      font- family:"Helvetica Neue","Luxi Sans","DejaVu Sans",Tahoma,"Hiragino Sans GB","        Microsoft Yahei",sans-serif;
      }
    </style>
  </head>

  <body>
    <div id="d"></div>
    <div id="a">
      <h1>注册页面</h1>
      <form action="signup.html" method="POST">
        用户名:<input
          type="text"
          name="username"
          placehold="请输入用户名"
        /><br />
        密码:<input
          type="password"
          name="password"
          placehold="请输入密码"
        /><br />
        <input type="submit" name="submit" value="注册" />
      </form>
    </div>
  </body>
</html>

<?php
	session_start();
	include("conn.php");	// 数据库连接
 
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];	//获取用户名和密码
		$password = $_POST['password'];
		if($username=="")
		{
			echo "<script>alert('用户名为空');</script>";
		}
		else if($password=="")
		{
			echo "<script>alert('密码为空');</script>";
		}
		else	//将用户名和密码写入数据库
		{
			$sql = "INSERT INTO userdata".	//数据库插入语句
			"(name,password)".
			"VALUES".
			"('$username','$password')";
 
			$retval = mysqli_query( $conn, $sql );	//执行数据库语句
			if(! $retval )
			{
				die('无法插入数据: ' . mysqli_error($conn));
			}
			echo "<script>alert('注册成功');location.href='login.php'</script>";
		}
	}
?>