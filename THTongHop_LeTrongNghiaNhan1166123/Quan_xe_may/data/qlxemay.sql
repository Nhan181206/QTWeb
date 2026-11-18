-- Backup CSDL qlxemay
CREATE DATABASE IF NOT EXISTS qlxemay CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE qlxemay;

DROP TABLE IF EXISTS xe;
DROP TABLE IF EXISTS hangxe;

CREATE TABLE hangxe (
  mahang varchar(10) NOT NULL,
  tenhang varchar(50) NOT NULL,
  PRIMARY KEY (mahang)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE xe (
  maxe varchar(10) NOT NULL,
  tenxe varchar(100) NOT NULL,
  mahang varchar(10) NOT NULL,
  namsx int(4) NOT NULL,
  mota text,
  hinh varchar(100) DEFAULT NULL,
  PRIMARY KEY (maxe),
  FOREIGN KEY (mahang) REFERENCES hangxe(mahang)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO hangxe (mahang, tenhang) VALUES
('HD', 'Honda'),
('YM', 'Yamaha'),
('SY', 'SYM'),
('SZ', 'Suzuki'),
('PG', 'Piaggio');

INSERT INTO xe (maxe, tenxe, mahang, namsx, mota, hinh) VALUES
('X01', 'Wave Alpha', 'HD', 2024, 'Xe số tiết kiệm nhiên liệu, bền bỉ.', 'xe1.svg'),
('X02', 'Exciter 155', 'YM', 2025, 'Xe côn tay thể thao, động cơ 155cc.', 'xe2.svg'),
('X03', 'Attila Venus', 'SY', 2023, 'Xe tay ga thiết kế sang trọng.', 'xe3.svg'),
('X04', 'Vision', 'HD', 2025, 'Xe tay ga nhỏ gọn, phù hợp đi phố.', 'xe4.svg'),
('X05', 'Raider R150', 'SZ', 2024, 'Xe underbone mạnh mẽ.', 'xe5.svg');
