<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Lam Thắng Cảnh</title>
    <link rel="stylesheet" href="../Bai-tap-5.12/danhlam.css">
</head>
<body>
    <a id="top"></a>
    <?php
        $danh_lam = [
            [
                "nt",
                "Biển Nha Trang",
                "../Pictures/Bien-nha-trang.webp",
                "Nha Trang, thuộc tỉnh Khánh Hòa, là thành phố du lịch biển nổi tiếng nhất của Việt Nam. Các bãi biển dọc chiều dài thành phố và trên các đảo thuộc Vịnh Nha Trang như Hòn Tre, Hòn Tằm, Hòn Mun, Hòn Chồng – Vợ đều là những thắng cảnh tuyệt vời thu hút du khách trong và ngoài nước."
            ],
            [
                "dl",
                "Thành Phố Đà Lạt",
                "../Pictures/Thanh-pho-Da-La.jpg",
                "Đà Lạt là thành phố trực thuộc tỉnh Lâm Đồng nằm trên Cao nguyên Lâm Viên thuộc vùng Tây Nguyên của nước Việt Nam. Đi sâu vào thành phố Đà Lạt, du khách sẽ khám phá một 'bảo tàng' của các thác nước, những hồ đẹp, thung lũng hoa và đồi thông."
            ],
            [
                "dn",
                "Đà Nẵng",
                "../Pictures/Da-nang.webp",
                "Đà Nẵng nằm giữa ba di sản thế giới: cố đô Huế, phố cổ Hội An và thánh địa Mỹ Sơn. Đà Nẵng còn có nhiều danh thắng tuyệt đẹp say lòng du khách như Ngũ Hành Sơn, Bà Nà, bán đảo Sơn Trà, đèo Hải Vân, sông Hàn thơ mộng và cầu quay Sông Hàn."
            ],
            [
                "hl",
                "Vịnh Hạ Long",
                "../Pictures/Vinh-ha-long.jpg",
                "Vịnh Hạ Long là một vịnh nhỏ thuộc phần tây bờ Vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam, bao gồm vùng biển đảo của thành phố Hạ Long, thành phố Cẩm Phả và một phần huyện đảo Vân Đồn thuộc tỉnh Quảng Ninh."
            ],
            [
                "pt",
                "Biển Phan Thiết",
                "../Pictures/Bien-phan-thiet.jpg",
                "Phan Thiết là tỉnh lỵ, trung tâm chính trị, kinh tế, văn hóa và khoa học kỹ thuật của tỉnh Bình Thuận. Phan Thiết nằm trên quốc lộ 1A, nổi tiếng với những đồi cát bay thơ mộng và bãi biển Mũi Né."
            ],
            [
                "ht",
                "Biển Hà Tiên",
                "../Pictures/Bien-ha-tien.webp",
                "Hà Tiên là một thành phố thuộc tỉnh Kiên Giang, nằm ở phía tây bắc của tỉnh. Hà Tiên là mảnh đất cuối cùng của miền Tây Nam Bộ, nổi tiếng với 'Hà Tiên thập cảnh'."
            ],
            [
                "pq",
                "Đảo Phú Quốc",
                "../Pictures/Dao-phu-quoc.jpg",
                "Phú Quốc là hòn đảo lớn nhất Việt Nam, nằm trong Gulf of Thailand. Đảo Phú Quốc cùng với các đảo khác tạo thành huyện đảo Phú Quốc trực thuộc tỉnh Kiên Giang."
            ]
        ];
    ?>

    <div class="wrapper">
        <div class="header-main">
            DANH LAM THẮNG CẢNH
        </div>

        <div class="content-container">
            <div class="sidebar">
                <div class="sidebar-header">Danh sách địa danh</div>
                <ul class="sidebar-list">
                    <?php foreach ($danh_lam as $item): ?>
                        <li>
                            <a href="#<?php echo $item[0]; ?>">
                                <?php echo $item[1]; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="main-content">
                <div class="main-header">Giới thiệu chi tiết các địa danh</div>
                <div class="details-container">
                    <?php foreach ($danh_lam as $item): ?>
                        <div class="dl-item" id="<?php echo $item[0]; ?>">
                            <div class="dl-title"><?php echo $item[1]; ?></div>
                            <img src="<?php echo $item[2]; ?>" alt="<?php echo $item[1]; ?>" class="dl-image">
                            <div class="dl-desc"><?php echo $item[3]; ?></div>
                            <div class="back-top">
                                <a href="#top">Quay về đầu trang</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>