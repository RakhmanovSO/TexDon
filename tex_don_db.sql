-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2019 г., 08:03
-- Версия сервера: 5.7.21
-- Версия PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tex_don_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryTitle` varchar(80) NOT NULL,
  `categoryImagePath` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`categoryID`),
  UNIQUE KEY `categoryTitle` (`categoryTitle`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryTitle`, `categoryImagePath`) VALUES
(1, 'Комплектующие для ПК', '/TexDon/assets/images/category/PC_Accessories.png'),
(2, 'Смартфоны и мобильные телефоны', '/TexDon/assets/images/category/Phones.jpg'),
(3, 'Фото-видеоаппаратура', '/TexDon/assets/images/category/PhotoAndVideo.jpg'),
(4, 'Ноутбуки и планшеты', '/TexDon/assets/images/category/Laptops.jpg'),
(5, 'Бытовая техника для дома', '/TexDon/assets/images/category/TechniqueforHome.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `categoriesandsubcategories`
--

DROP TABLE IF EXISTS `categoriesandsubcategories`;
CREATE TABLE IF NOT EXISTS `categoriesandsubcategories` (
  `categoryandsubcategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `subcategoryID` int(11) NOT NULL,
  PRIMARY KEY (`categoryandsubcategoryID`),
  KEY `fk_catID` (`categoryID`),
  KEY `fk_subcatID` (`subcategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categoriesandsubcategories`
--

INSERT INTO `categoriesandsubcategories` (`categoryandsubcategoryID`, `categoryID`, `subcategoryID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(8, 4, 11),
(13, 4, 16),
(14, 2, 17),
(15, 2, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `contactID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `viber` varchar(30) DEFAULT NULL,
  `phone1` varchar(25) NOT NULL,
  `phone2` varchar(25) DEFAULT NULL,
  `phone3` varchar(25) DEFAULT NULL,
  `phone4` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`contactID`, `email`, `skype`, `viber`, `phone1`, `phone2`, `phone3`, `phone4`) VALUES
(1, 'TexDon@gmail.com', 'TexDonSkype', '+38-050-000-00-00', '+38-062-337-00-00', '+38-071-444-44-44', '+38-071-444-44-44', '+38-050-777-77-77');

-- --------------------------------------------------------

--
-- Структура таблицы `informationdelivery`
--

DROP TABLE IF EXISTS `informationdelivery`;
CREATE TABLE IF NOT EXISTS `informationdelivery` (
  `informationdeliveryID` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(2500) NOT NULL,
  `imagePath1` varchar(350) DEFAULT NULL,
  `imagePath2` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`informationdeliveryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `informationfirm`
--

DROP TABLE IF EXISTS `informationfirm`;
CREATE TABLE IF NOT EXISTS `informationfirm` (
  `infoFirmID` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(2500) NOT NULL,
  `imagePath1` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`infoFirmID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `informationfirm`
--

INSERT INTO `informationfirm` (`infoFirmID`, `text`, `imagePath1`) VALUES
(1, 'Интернет-магазин TexDon.com (Донецк). Один из первых интернет-магазинов который предлагает поставку в течении двух недель в города и ПГТ  ДНР и ЛНР компьютерной и бытовой техники от двух наших Российских партнеров dns-shop.ru и citilink.ru с гарантией от наших партнеров.\nКак мы работаем:\n1. Вы оформляете заказ на определенный товар в нашем интернет-магазине с указанием контактных данных для связи с Вами.\n2. Наши операторы, приняв и обработав заказ свяжутся с Вами по указанным контактным данным и сообщат дату и примерное время доставки.\n3. За 2-3 дня до доставки товара мы Вам перезваниваем для подтверждения доставки и оплаты заказа. После чего привозим его по указанному адресу в заявке.\n4. После получения Вами товара вы проверяете его в присутствии курьера и оплачиваете товар. В наличии с товаром будет гарантия.\nТакже возможна Срочная Доставка Любого товара за 2-3 дня !!! \nДанная услуга стоит плюс 3000,00 рос. рублей к стоимости заказа.', '/TexDon/assets/images/infoFirm/Log_Title_TexDon.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `newsID` int(11) NOT NULL AUTO_INCREMENT,
  `titleNews` varchar(200) NOT NULL,
  `dateNews` date NOT NULL,
  `textNews` varchar(2500) NOT NULL,
  `newsTypeID` int(11) NOT NULL,
  `imagePath1` varchar(350) DEFAULT NULL,
  `imagePath2` varchar(350) DEFAULT NULL,
  `displayOnTheHomePage` tinyint(1) NOT NULL,
  PRIMARY KEY (`newsID`),
  KEY `fk_typeID` (`newsTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`newsID`, `titleNews`, `dateNews`, `textNews`, `newsTypeID`, `imagePath1`, `imagePath2`, `displayOnTheHomePage`) VALUES
(1, 'Выбери свой ноутбук HP на процессоре Intel!', '2019-01-03', 'Неважно, ученик, студент или сотрудник офиса – любой пользователь выбирает себе надёжный и удобный девайс. При этом устройство должно хорошо справляться с поставленными задачами: работа с офисными приложениями, общение и сёрфинг в интернете, редактирование текстовой информации, хранение данных. Представляем повседневных помощников, которые хорошо подойдут для данных задач:', 8, '/TexDon/assets/images/news/NEWS_03.01.19.jpg', NULL, 1),
(2, 'Рассрочка или бонусы! Ноутбуки HP', '2019-01-03', 'Оформите беспроцентный кредит* на ноутбуки HP из списка в любом магазине нашей сети или получите 8 % от стоимости покупки на бонусную карту ProZaPass.** В акции участвует большое количество моделей HP. Давно планировали заменить устройство для работы и офиса или же мечтаете об ураганных современных играх? Топовый мощный ноутбук, крепкий рабочий помощник или бюджетный девайс – решать вам!', 8, '/TexDon/assets/images/news/NEWS_03.01.19-02.jpg', NULL, 1),
(3, 'Выгодный кредит 0-10-12!', '2019-01-04', 'Поздравляем Вас с приближающимся 2019 Годом!\r\nПод Новый Год принято дарить Подарки! Порадуйте себя, своих близких и друзей новой, современной цифровой и бытовой техникой. Огромный выбор товаров на выгодных условиях от DNS сделает Ваши Новогодние хлопоты приятными! Храните угощения для праздничного стола в обновлённом холодильнике, выпекайте рождественское печенье в функциональном духовом шкафу и соберитесь с родными перед новым телевизором, ведь впереди такие долгие праздники! С Выгодным кредитом на 12 месяцев Новогодние хлопоты будут приятными.\r\nПокупайте здесь и сейчас, без первого взноса, сроком на 12 месяцев! *\r\n*Условия акции: 0 рублей - первый взнос 10% - переплата*\r\nна 12 месяцев Пусть Новогодние мечты сбываются с сетью магазинов цифровой и бытовой техники DNS!', 8, '/TexDon/assets/images/news/NEWS_04.01.19.jpg', NULL, 1),
(8, 'Test News', '2019-01-22', 'тестовый текст..!?', 10, '/TexDon/assets/images/news/Laptops.jpg', NULL, 0),
(9, 'New News', '2019-01-22', 'New News New News New News !!!!!', 2, '/TexDon/assets/images/news/Laptops 1.jpg', '/TexDon/assets/images/news/SM 2.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderDetailsID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `amountProduct` int(11) NOT NULL,
  `productPrice` double NOT NULL,
  `orderID` int(11) NOT NULL,
  PRIMARY KEY (`orderDetailsID`),
  KEY `fk_orderID` (`orderID`),
  KEY `fk_productsId` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `userFirstAndLastName` varchar(150) NOT NULL,
  `userContactNumberPhone` varchar(25) NOT NULL,
  `userEmail` varchar(45) DEFAULT NULL,
  `deliveryAddressOrder` varchar(250) NOT NULL,
  `commentToTheOrder` varchar(900) DEFAULT NULL,
  `dateAndTimeOrder` datetime NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `productattributes`
--

DROP TABLE IF EXISTS `productattributes`;
CREATE TABLE IF NOT EXISTS `productattributes` (
  `attributeID` int(11) NOT NULL AUTO_INCREMENT,
  `attributeTitle` varchar(80) NOT NULL,
  PRIMARY KEY (`attributeID`),
  UNIQUE KEY `attributeTitle` (`attributeTitle`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productattributes`
--

INSERT INTO `productattributes` (`attributeID`, `attributeTitle`) VALUES
(2, 'Количество ядер'),
(4, 'Объем видеопамяти'),
(6, 'Разрядность шины памяти'),
(1, 'Сокет'),
(5, 'Тип памяти'),
(3, 'Частота процессора (МГц)');

-- --------------------------------------------------------

--
-- Структура таблицы `productimagespath`
--

DROP TABLE IF EXISTS `productimagespath`;
CREATE TABLE IF NOT EXISTS `productimagespath` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `productImagePath` varchar(365) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_img` (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productimagespath`
--

INSERT INTO `productimagespath` (`id`, `productID`, `productImagePath`) VALUES
(1, 1, '/TexDon/assets/images/products/i5_7400-01.jpg'),
(2, 1, '/TexDon/assets/images/products/i5_7400-02.jpg'),
(3, 1, '/TexDon/assets/images/products/i5_7400-03.jpg'),
(4, 2, '/TexDon/assets/images/products/i5_7400-01.jpg'),
(5, 2, '/TexDon/assets/images/products/i5_7400-02.jpg'),
(6, 2, '/TexDon/assets/images/products/i5_7400-03.jpg'),
(7, 3, '/TexDon/assets/images/products/i5_7400-01.jpg'),
(8, 3, '/TexDon/assets/images/products/i5_7400-02.jpg'),
(9, 3, '/TexDon/assets/images/products/i5_7400-03.jpg'),
(10, 4, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-01.jpg'),
(11, 4, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-02.jpg'),
(12, 4, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-03.jpg'),
(13, 4, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-04.jpg'),
(14, 5, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-01.jpg'),
(15, 5, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-02.jpg'),
(16, 5, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-03.jpg'),
(17, 5, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-04.jpg'),
(18, 6, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-01.jpg'),
(19, 6, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-02.jpg'),
(20, 6, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-03.jpg'),
(21, 6, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-04.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productTitle` varchar(120) NOT NULL,
  `productDescription` varchar(900) NOT NULL,
  `productPrice` double NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`productID`, `productTitle`, `productDescription`, `productPrice`) VALUES
(1, 'Процессор Intel Core i5-7400 BOX', 'Процессор Intel Core i5-7400 поставляется в коробочном исполнении, поэтому вам не придется тратить время и средства на покупку кулера. Модель предназначена для установки в производительные офисные и домашние компьютеры. Совокупность технических параметров обеспечивает процессору возможность эффективно работать в составе игрового компьютера. Вас впечатлят возможности интегрированного графического ядра Intel HD Graphics 630: даже не устанавливая дискретный видеоадаптер, вы достигнете впечатляющей скорости работы.\r\n', 16000),
(2, 'Процессор Intel Core i5-7400 BOX -- 02 -- ', 'Процессор Intel Core i5-7400 поставляется в коробочном исполнении, поэтому вам не придется тратить время и средства на покупку кулера. Модель предназначена для установки в производительные офисные и домашние компьютеры. Совокупность технических параметров обеспечивает процессору возможность эффективно работать в составе игрового компьютера. Вас впечатлят возможности интегрированного графического ядра Intel HD Graphics 630: даже не устанавливая дискретный видеоадаптер, вы достигнете впечатляющей скорости работы.\r\n', 16100),
(3, 'Процессор Intel Core i5-7400 --03-- ', 'Процессор Intel Core i5-7400 поставляется в коробочном исполнении, поэтому вам не придется тратить время и средства на покупку кулера. Модель предназначена для установки в производительные офисные и домашние компьютеры. Совокупность технических параметров обеспечивает процессору возможность эффективно работать в составе игрового компьютера. Вас впечатлят возможности интегрированного графического ядра Intel HD Graphics 630: даже не устанавливая дискретный видеоадаптер, вы достигнете впечатляющей скорости работы.\r\n', 15900),
(4, 'Видеокарта GIGABYTE nVidia GeForce RTX 2070 , GV-N2070GAMING OC-8GC, 8Гб, GDDR6, OC, Ret', 'Видеокарта GeForce RTX обеспечивает лучший игровой процесс на ПК. Обладая всеми возможностями архитектуры GPU NVIDIA Turing и революционной платформы RTX, видеокарты серии RTX 20 объединяют технологии трассировки лучей в реальном времени, искусственного интеллекта и программируемые шейдеры. Это абсолютно другой игровой опыт.', 46000),
(5, '2-Видеокарта GIGABYTE nVidia GeForce RTX 2070 , GV-N2070GAMING OC-8GC, 8Гб, GDDR6, OC, Ret', 'Видеокарта GeForce RTX обеспечивает лучший игровой процесс на ПК. Обладая всеми возможностями архитектуры GPU NVIDIA Turing и революционной платформы RTX, видеокарты серии RTX 20 объединяют технологии трассировки лучей в реальном времени, искусственного интеллекта и программируемые шейдеры. Это абсолютно другой игровой опыт.', 47000),
(6, '3-Видеокарта GIGABYTE nVidia GeForce RTX 2070 , GV-N2070GAMING OC-8GC, 8Гб, GDDR6, OC, Ret', 'Видеокарта GeForce RTX обеспечивает лучший игровой процесс на ПК. Обладая всеми возможностями архитектуры GPU NVIDIA Turing и революционной платформы RTX, видеокарты серии RTX 20 объединяют технологии трассировки лучей в реальном времени, искусственного интеллекта и программируемые шейдеры. Это абсолютно другой игровой опыт.', 44000),
(10, 'новый товар', 'новый товар новый товар', 44444);

-- --------------------------------------------------------

--
-- Структура таблицы `productsandattributes`
--

DROP TABLE IF EXISTS `productsandattributes`;
CREATE TABLE IF NOT EXISTS `productsandattributes` (
  `productandattributesID` int(11) NOT NULL AUTO_INCREMENT,
  `attributeID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `value` varchar(1000) NOT NULL,
  PRIMARY KEY (`productandattributesID`),
  KEY `fk_prodID` (`productID`),
  KEY `fk_attribute` (`attributeID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productsandattributes`
--

INSERT INTO `productsandattributes` (`productandattributesID`, `attributeID`, `productID`, `value`) VALUES
(1, 1, 1, 'LGA 1151'),
(2, 2, 1, '4'),
(3, 3, 1, '3000 МГц'),
(4, 1, 2, 'LGA 1151'),
(5, 2, 2, '4'),
(6, 3, 2, '3000 МГц'),
(7, 1, 3, 'LGA 1151'),
(8, 2, 3, '4'),
(9, 3, 3, '3000 МГц'),
(10, 4, 4, '8 ГБ'),
(11, 5, 4, 'GDDR6'),
(12, 6, 4, '256 бит'),
(13, 4, 5, '8 ГБ'),
(14, 5, 5, 'GDDR6'),
(15, 6, 5, '256 бит'),
(16, 4, 4, '8 ГБ'),
(17, 5, 4, 'GDDR6'),
(18, 6, 4, '256 бит'),
(19, 4, 6, '8 ГБ'),
(20, 5, 6, 'GDDR6'),
(21, 6, 6, '256 бит');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `subcategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `subcategoryTitle` varchar(80) NOT NULL,
  `subcategoryImagePath` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`subcategoryID`),
  UNIQUE KEY `subcategoriesTitle` (`subcategoryTitle`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`subcategoryID`, `subcategoryTitle`, `subcategoryImagePath`) VALUES
(1, 'Процессоры', '/TexDon/assets/images/subcategory/Processors.jpg'),
(2, 'Видеокарты', '/TexDon/assets/images/subcategory/VideoCards.jpg'),
(4, 'Корпуса', '/TexDon/assets/images/subcategory/bodyPC.jpg'),
(11, 'Ноутбуки', '/TexDon/assets/images/subcategory/Laptops.jpg'),
(16, 'Планшеты', '/TexDon/assets/images/subcategory/Tablets 2.jpg'),
(17, 'Смартфоны', '/TexDon/assets/images/subcategory/smartphone.jpg'),
(18, 'Мобильные телефоны', '/TexDon/assets/images/subcategory/MobTel.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategoriesandproducts`
--

DROP TABLE IF EXISTS `subcategoriesandproducts`;
CREATE TABLE IF NOT EXISTS `subcategoriesandproducts` (
  `subcategoryandproductID` int(11) NOT NULL AUTO_INCREMENT,
  `subcategoryID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  PRIMARY KEY (`subcategoryandproductID`),
  KEY `fk_productID` (`productID`),
  KEY `fk_subcategoryID` (`subcategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategoriesandproducts`
--

INSERT INTO `subcategoriesandproducts` (`subcategoryandproductID`, `subcategoryID`, `productID`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(5, 2, 4),
(6, 2, 5),
(7, 2, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `typesnews`
--

DROP TABLE IF EXISTS `typesnews`;
CREATE TABLE IF NOT EXISTS `typesnews` (
  `newsTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `titleNewsType` varchar(100) NOT NULL,
  PRIMARY KEY (`newsTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `typesnews`
--

INSERT INTO `typesnews` (`newsTypeID`, `titleNewsType`) VALUES
(1, 'Акция'),
(2, 'Новость'),
(3, 'Уведомление'),
(4, 'Новая услуга'),
(5, 'Увеличение ассортимента'),
(6, 'Завоз товара'),
(7, 'Распродажа'),
(8, 'Для отображения на главной странице'),
(9, 'Реклама'),
(10, 'Разное');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categoriesandsubcategories`
--
ALTER TABLE `categoriesandsubcategories`
  ADD CONSTRAINT `fk_catID` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  ADD CONSTRAINT `fk_subcatID` FOREIGN KEY (`subcategoryID`) REFERENCES `subcategories` (`subcategoryID`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_typeID` FOREIGN KEY (`newsTypeID`) REFERENCES `typesnews` (`newsTypeID`);

--
-- Ограничения внешнего ключа таблицы `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `fk_productsId` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Ограничения внешнего ключа таблицы `productimagespath`
--
ALTER TABLE `productimagespath`
  ADD CONSTRAINT `fk_product_img` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `productsandattributes`
--
ALTER TABLE `productsandattributes`
  ADD CONSTRAINT `fk_attribute` FOREIGN KEY (`attributeID`) REFERENCES `productattributes` (`attributeID`),
  ADD CONSTRAINT `fk_prodID` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Ограничения внешнего ключа таблицы `subcategoriesandproducts`
--
ALTER TABLE `subcategoriesandproducts`
  ADD CONSTRAINT `fk_productID` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `fk_subcategoryID` FOREIGN KEY (`subcategoryID`) REFERENCES `subcategories` (`subcategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
