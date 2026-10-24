<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlnhanvien";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
$sql = "select * from nhanvien";
$rs = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh sach nhan vien</title>
</head>

<body>
<div id="wrapper">
  <a href="index.php" title="Quay về trang chủ"><header>
    </header></a>
    
    <div id="content">
    	<h1 class="tieude">DANH SÁCH NHÂN VIÊN</h1>
    	
      <?php
       if (mysqli_num_rows($rs)==0){
            echo "<h3>Không có dữ liệu</h3>";
       }
       else{
            echo '<table width="1000" border="1" cellspacing="0" cellpadding="5">
                	<tr align="center">
                	    <td width="30">STT</td>
                	    <td width="75">MãNV</td>
                	    <td width="255">Họ tên</td>
                	    <td width="50">Phái</td>
                	    <td width="75">Ngày sinh</td>
                	    <td width="325">Địa chỉ</td>
              	         </tr>';
                $stt = 1;
                while ($row = mysqli_fetch_assoc($rs))
                {
                    $gtinh = $row['phai']==1 ? "Nam" : "Nữ";
                    echo '<tr>
                    	      <td>'.$stt.'</td>
                    	      <td>'.$row["manv"].'</td>
                    	      <td>'.$row["ho"].' '.$row["ten"].'</td>
                    	      <td>'.$gtinh.'</td>
                    	      <td>'.date("d-m-Y",strtotime($row['ngaysinh'])).'</td>
                    	      <td>'.$row["diachi"].'</td>
      	                 </tr>';
                    $stt = $stt + 1;
                }
                echo '</table>';
            }
      ?>
     &nbsp;	          
    </div>
    <footer>
    	SVTH: Nguyễn Đăng Khoa - Khoa Công Nghệ Thông Tin.<br />
        Trường Cao Đẳng Nghề Đồng Nai - Số 8, Nguyễn Văn Hoa, Thống Nhất, Biên Hòa.
    </footer>
</div>
</body>
</html>
