<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thao tác mảng</title>
    <link rel="stylesheet" href="../Bai-tap-5.3/mang.css">
</head>
<body>
    <?php
        $mang = [];
        $kq = "";
        $tong = 0;
        $tbc = 0;

        if (isset($_POST['okay'])) {
            $dayso = $_POST['txt'] ?? '';
            $mang = explode(',', $dayso);
            $n = count($mang);

            foreach ($mang as $motpt) {
                $tong += (float)$motpt;
            }

            $tbc = $n > 0 ? $tong / $n : 0;
            $kq = implode(' ', array_filter($mang, fn($motpt) => (float)$motpt >= 0));
        }
    ?>
    <form method="post">
        <div class="container">
            <div class="header">
                <h1>THAO TÁC MẢNG</h1>
            </div>
            <table class="content">
                <tr>
                    <td>Nhập dãy số</td>
                    <td><input type="text" name="txt" value="<?php echo htmlspecialchars($_POST['txt'] ?? ''); ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="okay" class="btn">Tính</button></td>
                </tr>
                <tr>
                    <td>Mảng đã nhập</td>
                    <td><input type="text" disabled="disabled" value="<?php echo htmlspecialchars($kq); ?>"></td>
                </tr>

                <tr>
                    <td>Tổng các số trong mảng</td>
                    <td><input type="text" disabled="disabled" value="<?php echo htmlspecialchars((string)$tong); ?>"></td>
                </tr>

                <tr>
                    <td>TBC các số trong mảng</td>
                    <td><input type="text" disabled="disabled" value="<?php echo htmlspecialchars((string)$tbc); ?>"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>