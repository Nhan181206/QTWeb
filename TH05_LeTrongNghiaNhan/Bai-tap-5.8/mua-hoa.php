<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua Hoa</title>
    <link rel="stylesheet" href="../Bai-tap-5.8/mua-hoa.css">
</head>
<body>
    <?php
        $gio_hang = $_POST['gio_hang'] ?? '';
        $chon_hoa = $_POST['chon_hoa'] ?? '';

        function tim_hoa($ten_hoa, $mang_hoa) {
            $n = count($mang_hoa);
            $kq = 0;
            for ($i = 0; $i < $n; $i++) {
                if (strcasecmp(trim($ten_hoa), trim($mang_hoa[$i])) == 0) {
                    $kq = 1;
                    break;
                }
            }
            return $kq;
        }

        if (isset($_POST['them'])) {
            if (!empty($chon_hoa)) {
                if (empty(trim($gio_hang))) {
                    $gio_hang = "-- " . $chon_hoa;
                } else {
                    $mang_hoa = explode('--', $gio_hang);

                    if (tim_hoa($chon_hoa, $mang_hoa) == 1) {
                        echo "<script>alert('Hoa \"$chon_hoa\" đã có trong giỏ hoa!');</script>";
                    } else {
                        $gio_hang .= " -- " . $chon_hoa;
                    }
                }
            }
        }

        $ds_hoa = [
            'Hồng đỏ',
            'Hồng trắng',
            'Lys trắng',
            'Kim thuỷ tùng',
            'Baby',
            'Salem',
            'Lá măng'
        ];
    ?>

    <form action="mua-hoa.php" method="post">
        <div class="container">
            <h2>MUA HOA</h2>
        </div>
        <table>
            <tr>
                <td>Loại hoa bạn chọn: </td>
                <td>
                    <select name="chon_hoa">
                        <?php
                            foreach ($ds_hoa as $hoa) {
                                $selected = ($hoa == $chon_hoa) ? 'selected' : '';
                                echo "<option value='$hoa' $selected>$hoa</option>";
                            }
                        ?>
                    </select>
                </td>
                <td>
                    <button type="submit" name="them" class="btn">Thêm vào giỏ hoa</button>
                </td>
            </tr>
            <tr>
                <td colspan="3">Giỏ hoa của bạn đã có: </td>
            </tr>
            <tr>
                <td colspan="3">
                    <textarea name="gio_hang" ><?php echo htmlspecialchars($gio_hang); ?></textarea>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>