<html>
  <head>
    <title>留言板</title>
    <link href="css/index.css" type="text/css" rel="stylesheet" />      
  </head>
 
  <body>
    <div id="main">
      <div id="nav">
        <h1 class="neilian">留言板首页</h1>
        <a href="login.php" class="right" id="login">登录</a>
        <?php
          session_start();
          
          if(isset($_SESSION['username']))  //如果session里存在用户名的话
          {
            $username = $_SESSION['username'];  //从session获取用户名
            echo  "<form action='temp.php' method='POST' class='right name'>".
                    "<input type='submit' name='exit' value='退出登录' class='right'/>".
                  "</form>".
                  "<p class='right'>当前账号：$username</p>";   //显示当前账号的用户名和退出登录按钮
            echo "<script>document.getElementById('login').style.display='none'</script>";//隐藏登录按钮
          }
        ?>
      </div>
      <div id="board"> <!--留言板div-->
        <?php
          include("conn.php");// 数据库连接
          $sql = 'SELECT * FROM messages';  //查询语句
          $retval = mysqli_query( $conn, $sql );  //查询数据表messages里的所有数据
          while($row = mysqli_fetch_array($retval))   //循环输出所有查询到的数据
          {
            $name = $row['name'];
            $time = $row['time'];
            $text = $row['text'];
            echo "<div class='message'>".
                    "<div class='key'>".
                      "<p class='name'>$name</p><p class='time'>$time</p>".
                    "</div>".
                    "<div class='value'>".
                      "<p class='txet'>$text</p>".
                    "</div>".
                  "</div>";
          }
        ?>
      </div>
      <form id="send" action="temp.php" method="POST">
        <input type="text" name="text" />
        <input type="submit" name="submit" value="发表"/>
      </form>
    </div>
  </body>
</html> 
