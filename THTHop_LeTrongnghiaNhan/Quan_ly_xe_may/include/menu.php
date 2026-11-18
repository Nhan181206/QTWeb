<div id="menu">
<?php
if ($trang != "index") echo "<a href='index.php' class='btn'>Trang chủ</a>";
if ($trang != "them") echo "<a href='them-xe.php' class='btn'>Thêm</a>";
if ($trang != "sua") echo "<a href='sua-xe.php' class='btn'>Sửa</a>";
if ($trang != "xoa") echo "<a href='xoa.php' class='btn'>Xóa</a>";
if ($trang != "multi") echo "<a href='xoa-multi.php' class='btn'>Xóa - Multiple</a>";
?>
</div>
