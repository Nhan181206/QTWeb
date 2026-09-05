<html>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            font-size: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            text-align: center;
        }

        td:first-child,
        td:nth-child(3),
        td:nth-child(4) {
            text-align: center;
        }

        a {
            color: black;
        }
    </style>
</head>

<body>

<h1 style="text-align: center;">DANH SÁCH LỚP CT15CD31</h1>

<table>
    <tr>
        <th>STT</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Phái</th>
        <th>Email</th>
    </tr>

    <?php
        $danhSach = [
            [
                "ho" => "Dương Vũ Ngọc",
                "ten" => "Ân",
                "phai" => "Nam",
                "email" => "ngocan@gmail.com"
            ],
            [
                "ho" => "Trần Ngọc",
                "ten" => "Đạt",
                "phai" => "Nam",
                "email" => "ngocdat@yahoo.com"
            ],
            [
                "ho" => "Đào Nguyễn Ngọc",
                "ten" => "Linh",
                "phai" => "Nữ",
                "email" => "ngoclinh@gmail.com"
            ]
        ];

        $stt = 1;

        foreach ($danhSach as $sinhVien) {
            echo "<tr>";
            echo "<td>" . $stt . "</td>";
            echo "<td>" . $sinhVien["ho"] . "</td>";
            echo "<td>" . $sinhVien["ten"] . "</td>";
            echo "<td>" . $sinhVien["phai"] . "</td>";
            echo "<td><a href='mailto:" . $sinhVien["email"] . "'>"
                    . $sinhVien["email"] .
                 "</a></td>";
            echo "</tr>";

            $stt++;
        }
    ?>

    <tr>
        <td>...</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

</body>
</html>