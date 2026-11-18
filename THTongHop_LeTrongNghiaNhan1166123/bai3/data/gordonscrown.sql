-- Backup CSDL gordonscrown (website London-2011)
CREATE DATABASE IF NOT EXISTS gordonscrown CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE gordonscrown;

DROP TABLE IF EXISTS binhchon;
DROP TABLE IF EXISTS monan;
DROP TABLE IF EXISTS nhom;

-- Nhóm món ăn (thutu = thứ tự trong mục Jump to...)
CREATE TABLE nhom (
  manhom int(11) NOT NULL,
  tennhom varchar(50) NOT NULL,
  hinh varchar(100) DEFAULT NULL,
  thutu int(11) NOT NULL,
  PRIMARY KEY (manhom)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE monan (
  mamon int(11) NOT NULL AUTO_INCREMENT,
  tenmon varchar(100) NOT NULL,
  manhom int(11) NOT NULL,
  gia decimal(6,2) NOT NULL,
  mota text,
  PRIMARY KEY (mamon),
  FOREIGN KEY (manhom) REFERENCES nhom(manhom)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE binhchon (
  id int(11) NOT NULL AUTO_INCREMENT,
  mamon int(11) NOT NULL,
  diem int(1) NOT NULL,
  ngay datetime NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (mamon) REFERENCES monan(mamon) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO nhom (manhom, tennhom, hinh, thutu) VALUES
(1, 'Starters', 'starters.svg', 1),
(2, 'Soups', 'soups.svg', 2),
(3, 'Salads', 'salads.svg', 3),
(4, 'Local Favourites', 'local.svg', 4),
(5, 'Desserts', 'desserts.svg', 5);

INSERT INTO monan (tenmon, manhom, gia, mota) VALUES
('Garlic Mushrooms', 1, 4.95, 'Button mushrooms pan-fried in garlic butter, served with crusty bread.'),
('Scotch Egg', 1, 4.50, 'Free-range egg wrapped in sausage meat and breadcrumbs, with piccalilli.'),
('Prawn Cocktail', 1, 5.95, 'Atlantic prawns in Marie Rose sauce on crisp lettuce.'),
('Whitebait', 1, 5.25, 'Lightly floured and fried, served with lemon and tartare sauce.'),
('Tomato & Basil Soup', 2, 4.25, 'Slow-cooked tomatoes with fresh basil, served with a warm roll.'),
('Leek & Potato Soup', 2, 4.50, 'Creamy soup of English leeks and potatoes.'),
('Soup of the Day', 2, 3.95, 'Ask your server for today''s freshly made soup.'),
('Caesar Salad', 3, 6.95, 'Cos lettuce, parmesan, croutons and Caesar dressing.'),
('Goat''s Cheese Salad', 3, 7.25, 'Warm goat''s cheese on mixed leaves with beetroot and walnuts.'),
('Fish & Chips', 4, 10.95, 'Beer-battered cod with chunky chips and mushy peas.'),
('Steak & Ale Pie', 4, 11.50, 'Beef slow-cooked in ale, topped with flaky pastry.'),
('Bangers & Mash', 4, 9.75, 'Cumberland sausages on creamy mash with onion gravy.'),
('Sunday Roast Beef', 4, 12.95, 'Roast beef with Yorkshire pudding, roast potatoes and seasonal vegetables.'),
('Sticky Toffee Pudding', 5, 5.25, 'Warm date sponge with toffee sauce and vanilla ice cream.'),
('Apple Crumble', 5, 4.95, 'Bramley apples under a buttery crumble, served with custard.'),
('Eton Mess', 5, 5.50, 'Strawberries, meringue and whipped cream.');

INSERT INTO binhchon (mamon, diem, ngay) VALUES
(1, 4, NOW()), (1, 5, NOW()), (2, 3, NOW()), (10, 5, NOW()), (10, 4, NOW()), (10, 5, NOW()),
(14, 5, NOW()), (5, 4, NOW());
