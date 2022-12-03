if(isset($_POST['exit']))//退出登录
{
  unset($_SESSION['username']);
  echo "<script>location.href='index.php'</script>";
}

if(isset($_POST['submit'])) //提交
{        
  if(isset($_POST['text']))
  {
    if(!isset($_SESSION['username'])) //未登录
    {
      echo "<script>alert('请先登录！');location.href='index.php';</script>";
    }
    else
    {
      if($_POST['text']=="")
      {
        echo "<script>alert('提交内容为空');location.href='index.php';</script>";
      }
      elseif($_POST['text']!="")
      {
        include("conn.php");	// 数据库连接
 
        $text = $_POST['text'];//输入文本
        $username = $_SESSION['username'];//输入者的用户名
        //查询数据库中最大的id，在加一
        $id = mysqli_query($conn,"select max(id) id from messages");
        $row = mysqli_fetch_array($id);
        $id = $row['id']+1;
 
        $sql1 = "insert into messages(name,time,text,id)".
                "values('$username',now(),'$text','$id')";
        $retval = mysqli_query( $conn, $sql1 );	//写入数据
        
        if(! $retval )
        {
          die('发表失败: ' . mysqli_error($conn));
        }
        else
        {
          echo "<script>alert('发表成功');location.href='index.php';</script>";
        }
      }
    }
  }
}