<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Tiền</title>
    <link rel="stylesheet" href="../Bai-tap-5.11/doitien.css">
</head>
<body>
    <?php
        $ti_gia = [
            'USD' => 22725,
            'AUD' => 17554.46,
            'CAD' => 17165.12,
            'EUR' => 27854.73,
            'HKD' => 2860.46,
            'JPY' => 212.65,
            'SGD' => 17135.51,
            'THB' => 715.33,
            'MYR' => 5786.67,
            'KHR' => 5.72,
            'LAK' => 2.75
        ];

        $so_tien_input = $_POST['so_tien'] ?? '';
        $don_vi_chon = $_POST['don_vi'] ?? 'USD';
        
        $so_tien_bd_str = '';
        $ti_gia_str = '';
        $tien_vnd_str = '';

        if (isset($_POST['thuc_hien'])) {
            $so_tien_raw = str_replace(',', '', trim($so_tien_input));
            $so_tien = (float)$so_tien_raw;

            if ($so_tien > 0 && isset($ti_gia[$don_vi_chon])) {
                $rate = $ti_gia[$don_vi_chon];
                $tien_vnd = $so_tien * $rate;

                $so_tien_bd_str = number_format($so_tien) . " " . $don_vi_chon;
                $ti_gia_str = number_format($rate, strpos((string)$rate, '.') !== false ? 2 : 0);
                $tien_vnd_str = number_format($tien_vnd) . " Đồng";
            }
        }
    ?>

    <form action="doitien.php" method="post">
        <h2>ĐỔI TIỀN</h2>

        <table>
            <tr>
                <td>Nhập số tiền</td>
                <td>
                    <input type="text" name="so_tien" value="<?php echo htmlspecialchars($so_tien_input); ?>" required>
                </td>
            </tr>
            <tr>
                <td>Chọn đơn vị tiền</td>
                <td>
                    <select name="don_vi">
                        <?php foreach ($ti_gia as $code => $rate): ?>
                            <option value="<?php echo $code; ?>" <?php echo ($don_vi_chon == $code) ? 'selected' : ''; ?>>
                                <?php echo $code; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="thuc_hien">Thực hiện</button>
                </td>
            </tr>
            <?php if (!empty($tien_vnd_str)): ?>
            <tr>
                <td colspan="2">
                    <p>Số tiền ban đầu: <?php echo $so_tien_bd_str; ?></p>
                    <p>Tỉ giá: <?php echo $ti_gia_str; ?></p>
                    <p>Tiền việt nam: <?php echo $tien_vnd_str; ?></p>
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </form>
</body>
</html>