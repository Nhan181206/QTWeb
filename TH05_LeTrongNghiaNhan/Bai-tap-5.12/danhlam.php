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
                "https://tinviettravel.com.vn/uploads/cam-nang-du-lich/2024_08/bai-dai-nha-trang.jpg",
                "Nha Trang, thuộc tỉnh Khánh Hòa, là thành phố du lịch biển nổi tiếng nhất của Việt Nam. Các bãi biển dọc chiều dài thành phố và trên các đảo thuộc Vịnh Nha Trang như Hòn Tre, Hòn Tằm, Hòn Mun, Hòn Chồng – Vợ đều là những thắng cảnh tuyệt vời thu hút du khách trong và ngoài nước."
            ],
            [
                "dl",
                "Thành phố Đà Lạt",
                "https://media.thuonghieucongluan.vn/uploads/2024/08/25/dinh-huong-phat-trien-tp-da-lat-mo-rong-1724579384.jpg",
                "Đà Lạt là thành phố trực thuộc tỉnh Lâm Đồng nằm trên Cao nguyên Lâm Viên thuộc vùng Tây Nguyên của nước Việt Nam. Đi sâu vào thành phố Đà Lạt, du khách sẽ khám phá một 'bảo tàng' của các thác nước, những hồ đẹp, thung lũng hoa và đồi thông."
            ],
            [
                "dn",
                "Đà Nẵng",
                "https://vcdn1-dulich.vnecdn.net/2022/06/03/cau-vang-jpeg-mobile-4171-1654247848.jpg?w=0&h=0&q=100&dpr=2&fit=crop&s=j3QYvAWY_um91TZftAPXxw",
                "Đà Nẵng nằm giữa ba di sản thế giới: cố đô Huế, phố cổ Hội An và thánh địa Mỹ Sơn. Đà Nẵng còn có nhiều danh thắng tuyệt đẹp say lòng du khách như Ngũ Hành Sơn, Bà Nà, bán đảo Sơn Trà, đèo Hải Vân, sông Hàn thơ mộng và cầu quay Sông Hàn."
            ],
            [
                "hl",
                "Vịnh Hạ Long",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4twNwguJu7oi9J8LkFENxft3_hNHu02ZvQMkKwhh2pWTD5jm5HPL8_B8&s=10",
                "Vịnh Hạ Long là một vịnh nhỏ thuộc phần tây bờ Vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam, bao gồm vùng biển đảo của thành phố Hạ Long, thành phố Cẩm Phả và một phần huyện đảo Vân Đồn thuộc tỉnh Quảng Ninh."
            ],
            [
                "pt",
                "Biển Phan Thiết",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSgIOCGyfQUcOpnZnaOeFWo0d6_wTiFqHaJCVfxFNiquYSCJ-SOR9i8o1q&s=10",
                "Phan Thiết là tỉnh lỵ, trung tâm chính trị, kinh tế, văn hóa và khoa học kỹ thuật của tỉnh Bình Thuận. Phan Thiết nằm trên quốc lộ 1A, nổi tiếng với những đồi cát bay thơ mộng và bãi biển Mũi Né."
            ],
            [
                "ht",
                "Biển Hà Tiên",
                "https://statics.vinpearl.com/bien-ha-tien-10_1634279791.jpg",
                "Hà Tiên là một thành phố thuộc tỉnh Kiên Giang, nằm ở phía tây bắc của tỉnh. Hà Tiên là mảnh đất cuối cùng của miền Tây Nam Bộ, nổi tiếng với 'Hà Tiên thập cảnh'."
            ],
            [
                "pq",
                "Đảo Phú Quốc",
                "https://mia.vn/media/uploads/blog-du-lich/dao-ngoc-phu-quoc-thien-duong-nghi-duong-tai-phuong-nam-1754534991.jpg",
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