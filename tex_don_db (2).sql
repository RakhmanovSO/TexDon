-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 03 2019 г., 16:54
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
-- Структура таблицы `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`adminID`, `login`, `password`) VALUES
(1, 'AdminTexDonGeneral', '$2y$10$dkNf68ynkZEbaUfnkbBO1ut.wQFTkUe/a5gQYRd6t5g.tTN7TUQcK'),
(2, 'AdminTexDonFirst', '$2y$10$2i3g.1P.Hl1YBqo.UEOE7O7IVDEiiqgbVDxf2xe2miCWLN6QAXn96'),
(3, 'AdminTexDonSecond', '$2y$10$wXvm7QlCK7ihJZKMLHjsJuZVz9kp3qAU42DrtG0VHcp38o8a5JIIe');

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
(2, 'Смартфоны и мобильные телефоны', '/TexDon/assets/images/category/Phones.png'),
(3, 'Фото-видеоаппаратура', '/TexDon/assets/images/category/PhotoAndVideo.png'),
(4, 'Ноутбуки и планшеты', '/TexDon/assets/images/category/Laptops.png'),
(5, 'Бытовая техника для дома', '/TexDon/assets/images/category/TechniqueforHome.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

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
(15, 2, 18),
(16, 3, 19),
(17, 3, 20),
(18, 3, 21),
(19, 1, 22),
(20, 5, 23),
(21, 5, 24);

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
(1, '<p>Интернет-магазин TexDon.com (Донецк). Один из первых интернет-магазинов который предлагает поставку в течение 10 дней в города и ПГТ  ДНР и ЛНР компьютерной и бытовой техники от двух наших Российских партнеров dns-shop.ru и citilink.ru с гарантией от наших партнеров.</p>\r\n<p>Как мы работаем:</p>\r\n<p>1. Вы оформляете заказ на определенный товар в нашем интернет-магазине с указанием контактных данных для связи с Вами.</p>\r\n<p>2. Наши операторы, приняв и обработав заказ свяжутся с Вами по указанным контактным данным за 2-3 дня до доставки товара и сообщат дату и примерное время доставки товара по указанному адресу, от Вас необходимо будет подтверждение доставки и оплаты товара.</p>\r\n<p>Если по оставленным Вами контактам не будет ответа на протяжении 10-12 часов – заказ будет аннулирован.</p>\r\n<p>3. После получения Вами товара вы проверяете его в присутствии курьера и оплачиваете товар. В наличии с товаром будет гарантия на товар.</p>\r\n<p>В настоявший момент средний срок доставки товара после оформления заказа составляет от 7 до 10 дней.</p>\r\n<p>Также возможна Срочная Доставка Любого товара за 2-3 дня !!!</p>\r\n<p>Стоимость данной услуги оговаривается индивидуально в зависимости от товара и его количества.</p>', '/TexDon/assets/images/infoFirm/Log_Title_TexDon.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`newsID`, `titleNews`, `dateNews`, `textNews`, `newsTypeID`, `imagePath1`, `imagePath2`, `displayOnTheHomePage`) VALUES
(1, 'Выбери свой ноутбук HP на процессоре Intel!', '2019-03-23', 'При этом устройство должно хорошо справляться с поставленными задачами: работа с офисными приложениями, общение и сёрфинг в интернете, редактирование текстовой информации, хранение данных. Представляем повседневных помощников, которые хорошо подойдут для данных задач.', 8, '/TexDon/assets/images/news/NEWS_03.01.19.jpg', NULL, 1),
(2, 'Рассрочка или бонусы! Ноутбуки HP', '2019-03-23', 'В акции участвует большое количество моделей HP. Давно планировали заменить устройство для работы и офиса или же мечтаете об ураганных современных играх? Топовый мощный ноутбук, крепкий рабочий помощник или бюджетный девайс - решать вам!', 8, '/TexDon/assets/images/news/NEWS_03.01.19-02.jpg', NULL, 1),
(3, 'Выгодный кредит 0-10-12!', '2019-03-23', 'Порадуйте себя, своих близких и друзей новой, современной цифровой и бытовой техникой. Огромный выбор товаров на выгодных условиях от DNS сделает Ваши Новогодние хлопоты приятными! Храните угощения для праздничного стола в обновлённом холодильнике, выпекайте рождественское печенье в функциональном духовом шкафу и соберитесь с родными перед новым телевизором, ведь впереди такие долгие праздники! С Выгодным кредитом на 12 месяцев Новогодние хлопоты будут приятными.\nПокупайте здесь и сейчас, без первого взноса, сроком на 12 месяцев! \nУсловия акции: 0 рублей - первый взнос 10% на 12 месяцев Пусть Новогодние мечты сбываются с сетью магазинов цифровой и бытовой техники DNS!', 8, '/TexDon/assets/images/news/NEWS_04.01.19.jpg', NULL, 1);

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
  KEY `fk_productsId` (`productID`),
  KEY `fk_orderID` (`orderID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetailsID`, `productID`, `amountProduct`, `productPrice`, `orderID`) VALUES
(1, 1, 2, 16000, 1),
(2, 4, 1, 46000, 1),
(3, 6, 1, 44000, 1),
(4, 4, 3, 46000, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`orderID`, `userFirstAndLastName`, `userContactNumberPhone`, `userEmail`, `deliveryAddressOrder`, `commentToTheOrder`, `dateAndTimeOrder`) VALUES
(1, 'Иванов Иван', '+38071-55-00-000', 'ivanov-77@mail.ru', 'г.Донецк ул. Артема 100 кв.15', 'код от подъезда 7777 ', '2019-01-04 00:00:00'),
(2, 'Петров Константин', '+38071-77-77-777', NULL, 'г.Донецк ул. Мира дом №50 кв. №22', NULL, '2019-02-01 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productattributes`
--

INSERT INTO `productattributes` (`attributeID`, `attributeTitle`) VALUES
(7, 'Год выпуска'),
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productimagespath`
--

INSERT INTO `productimagespath` (`id`, `productID`, `productImagePath`) VALUES
(1, 1, '/TexDon/assets/images/products/1032356v01.jpg'),
(2, 1, '/TexDon/assets/images/products/1032355v01.jpg'),
(4, 2, '/TexDon/assets/images/products/i5_7400-01.jpg'),
(5, 2, '/TexDon/assets/images/products/i5_7400-02.jpg'),
(6, 2, '/TexDon/assets/images/products/i5_7400-03.jpg'),
(7, 3, '/TexDon/assets/images/products/i5_7400-01.jpg'),
(8, 3, '/TexDon/assets/images/products/i5_7400-02.jpg'),
(9, 3, '/TexDon/assets/images/products/i5_7400-03.jpg'),
(10, 4, '/TexDon/assets/images/products/nVidia GeForce RTX 2070.jpg'),
(11, 4, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-02.jpg'),
(12, 4, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-03.jpg'),
(14, 5, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-01.jpg'),
(15, 5, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-02.jpg'),
(16, 5, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-03.jpg'),
(18, 6, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-01.jpg'),
(19, 6, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-02.jpg'),
(20, 6, '/TexDon/assets/images/products/nVidia GeForce RTX 2070-03.jpg'),
(27, 12, '/TexDon/assets/images/products/RYZEN_2700_BOX-01.jpg'),
(28, 11, '/TexDon/assets/images/products/RYZEN_2700_BOX-001.jpg'),
(29, 11, '/TexDon/assets/images/products/RYZEN_2700_BOX-002.jpg'),
(30, 12, '/TexDon/assets/images/products/RYZEN_2700_BOX-02.jpg'),
(31, 13, '/TexDon/assets/images/products/1060189_v01_b.jpg'),
(32, 13, '/TexDon/assets/images/products/1060189_v07_b.jpg'),
(33, 13, '/TexDon/assets/images/products/1060189_v16_b.jpg'),
(34, 14, '/TexDon/assets/images/products/1118161_v01_b.jpg'),
(35, 14, '/TexDon/assets/images/products/1118161_v02_b.jpg'),
(36, 14, '/TexDon/assets/images/products/1118161_v03_b.jpg'),
(37, 14, '/TexDon/assets/images/products/1118161_v06_b.jpg'),
(38, 15, '/TexDon/assets/images/products/1118161_v01_b.jpg'),
(39, 15, '/TexDon/assets/images/products/1133961_v01_b.jpg'),
(40, 15, '/TexDon/assets/images/products/1133961_v02_b.jpg'),
(41, 16, '/TexDon/assets/images/products/1133961_v01_b.jpg'),
(42, 16, '/TexDon/assets/images/products/1133961_v02_b.jpg'),
(43, 16, '/TexDon/assets/images/products/1118161_v01_b.jpg'),
(44, 17, '/TexDon/assets/images/products/494719_v01_b.jpg'),
(45, 17, '/TexDon/assets/images/products/494719_v02_b.jpg'),
(46, 17, '/TexDon/assets/images/products/494719_v03_b.jpg'),
(47, 18, '/TexDon/assets/images/products/494719_v02_b.jpg'),
(48, 18, '/TexDon/assets/images/products/494719_v03_b.jpg'),
(49, 18, '/TexDon/assets/images/products/494719_v01_b.jpg'),
(50, 19, '/TexDon/assets/images/products/490968_v01_b.jpg'),
(51, 19, '/TexDon/assets/images/products/490968_v02_b.jpg'),
(52, 20, '/TexDon/assets/images/products/499292_v01_b.jpg'),
(53, 20, '/TexDon/assets/images/products/499292_d01_b.jpg'),
(54, 20, '/TexDon/assets/images/products/490968_v01_b.jpg'),
(55, 20, '/TexDon/assets/images/products/490968_v02_b.jpg');

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
  `brandProduct` varchar(250) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`productID`, `productTitle`, `productDescription`, `productPrice`, `brandProduct`) VALUES
(1, 'Процессор Intel Core i5 8600 BOX', 'Процессор Intel Core i5 8600 поставляется в коробочном исполнении, поэтому вам не придется тратить время и средства на покупку кулера. Модель предназначена для установки в производительные офисные и домашние компьютеры. Совокупность технических параметров обеспечивает процессору возможность эффективно работать в составе игрового компьютера. Вас впечатлят возможности интегрированного графического ядра Intel HD Graphics 630: даже не устанавливая дискретный видеоадаптер, вы достигнете впечатляющей скорости работы.\r\n\r\n            \r\n            ', 16000, 'Intel'),
(2, 'Процессор Intel Core i5-7400 BOX ', 'Процессор Intel Core i5-7400 поставляется в коробочном исполнении, поэтому вам не придется тратить время и средства на покупку кулера. Модель предназначена для установки в производительные офисные и домашние компьютеры. Совокупность технических параметров обеспечивает процессору возможность эффективно работать в составе игрового компьютера. Вас впечатлят возможности интегрированного графического ядра Intel HD Graphics 630: даже не устанавливая дискретный видеоадаптер, вы достигнете впечатляющей скорости работы.\r\n', 16300, 'Intel'),
(3, 'Процессор Intel Core i5-7400 OEM', 'Процессор Intel Core i5-7400 поставляется в коробочном исполнении, поэтому вам не придется тратить время и средства на покупку кулера. Модель предназначена для установки в производительные офисные и домашние компьютеры. Совокупность технических параметров обеспечивает процессору возможность эффективно работать в составе игрового компьютера. Вас впечатлят возможности интегрированного графического ядра Intel HD Graphics 630: даже не устанавливая дискретный видеоадаптер, вы достигнете впечатляющей скорости работы.\r\n', 15500, 'Intel'),
(4, 'Видеокарта GIGABYTE nVidia GeForce RTX 2070 , GV-N2070GAMING OC-8GC, 8Гб, GDDR6, OC, Ret', 'Видеокарта GeForce RTX обеспечивает лучший игровой процесс на ПК. Обладая всеми возможностями архитектуры GPU NVIDIA Turing и революционной платформы RTX, видеокарты серии RTX 20 объединяют технологии трассировки лучей в реальном времени, искусственного интеллекта и программируемые шейдеры. Это абсолютно другой игровой опыт.', 46000, 'GIGABYTE'),
(5, 'Видеокарта MSI nVidia GeForce RTX 2070 , GV-N2070GAMING OC-8GC, 8Гб, GDDR6, OC, Ret', 'Видеокарта GeForce RTX обеспечивает лучший игровой процесс на ПК. Обладая всеми возможностями архитектуры GPU NVIDIA Turing и революционной платформы RTX, видеокарты серии RTX 20 объединяют технологии трассировки лучей в реальном времени, искусственного интеллекта и программируемые шейдеры. Это абсолютно другой игровой опыт.', 48000, 'MSI'),
(6, 'Видеокарта PALIT nVidia GeForce RTX 2070 , GV-N2070GAMING OC-8GC, 8Гб, GDDR6, OC, Ret', 'Видеокарта GeForce RTX обеспечивает лучший игровой процесс на ПК. Обладая всеми возможностями архитектуры GPU NVIDIA Turing и революционной платформы RTX, видеокарты серии RTX 20 объединяют технологии трассировки лучей в реальном времени, искусственного интеллекта и программируемые шейдеры. Это абсолютно другой игровой опыт.', 44000, 'PALIT'),
(11, 'Процессор AMD Ryzen 7 2700X BOX', 'Мощный восьмиядерный процессор AMD Ryzen 7 2700X, SocketAM4 BOX способен справиться с самыми сложными легко решит множество задач опытного или начинающего пользователя: от игровых до офисных или графических. \nМНОГОПОТОЧНОСТЬ И СКОРОСТЬ \nТехнологии AMD StoreMI и AMD SenseMI ускоряют устройство. В зависимости от сложности производимых операций прибор будет задействовать от 1 до 16 потоков, успевая обеспечить качественную и быструю работу всех программ и приложений. \nВНУШИТЕЛЬНЫЙ КЭШ И ЗАЩИТА ОТ ПОЛОМОК\nПроцессор AMD Ryzen 7 2700X, SocketAM4 BOX станет с 14 Мб памяти третьего уровня формата DDR4 позволяет поддерживать оптимальную скорость и производительность в режиме многозадачности. Кулер не даст устройству перенагреваться и защищает от поломок и сбоев.', 27000, 'AMD'),
(12, 'Процессор AMD Ryzen 7 2700X OEM', 'Мощный восьмиядерный процессор AMD Ryzen 7 2700X, SocketAM4 BOX способен справиться с самыми сложными легко решит множество задач опытного или начинающего пользователя: от игровых до офисных или графических. \nМНОГОПОТОЧНОСТЬ И СКОРОСТЬ \nТехнологии AMD StoreMI и AMD SenseMI ускоряют устройство. В зависимости от сложности производимых операций прибор будет задействовать от 1 до 16 потоков, успевая обеспечить качественную и быструю работу всех программ и приложений. \nВНУШИТЕЛЬНЫЙ КЭШ И ЗАЩИТА ОТ ПОЛОМОК\nПроцессор AMD Ryzen 7 2700X, SocketAM4 BOX станет с 14 Мб памяти третьего уровня формата DDR4 позволяет поддерживать оптимальную скорость и производительность в режиме многозадачности. Кулер не даст устройству перенагреваться и защищает от поломок и сбоев.', 26000, 'AMD'),
(13, 'Корпус ATX AEROCOOL Cylon', 'размер: Midi-Tower; USB 2.0 - 2шт, USB 3.0 -1шт + аудио на передней панели; внутренние 3.5- 2 шт; материал стенок - сталь, прозрачное окно, 0.5мм, видеокарта длиной, до: 371мм', 2900, 'AEROCOOL'),
(14, 'Видеокарта PALIT nVidia GeForce RTX 2060 STORMX 6Gb GDDR6 Ret', 'Palit GeForce GTX 1660 STORMX - видеокарта построена на графическом процессоре Turing. Оснащена продвинутой системой охлаждения и оптимизированной мощностью для максимальной игровой производительности.', 23200, 'Palit'),
(15, 'Видеокарта Palit GeForce GTX 1660 STORMX OC', 'Palit GeForce GTX 1660 STORMX OC - видеокарта построена на графическом процессоре Turing. Оснащена продвинутой системой охлаждения и оптимизированной мощностью для максимальной игровой производительности.', 18000, 'Palit'),
(16, 'Видеокарта Palit GeForce GTX 1660', 'Palit GeForce GTX 1660 STORMX OC - видеокарта построена на графическом процессоре Turing. Оснащена продвинутой системой охлаждения и оптимизированной мощностью для максимальной игровой производительности.', 17000, 'Palit'),
(17, 'Процессор INTEL Core i3 8100 BOX', 'Процессор Intel Core i3-8100 BOX поставляется вместе с системой охлаждения. Она обеспечивает эффективный отвод образующегося тепла. Чип обладает оптимальными характеристиками и может применяться в различных сборках.\nСокет - LGA 1151-v2. Важно учесть параметр для определения совместимости с материнской платой. Модель поддерживает работу с оперативной памятью типа DDR4. Удается поставить на материнскую плату до 64 ГБ ОЗУ. Минимальная частота памяти - 1600 МГц, максимальная - 2400.', 11000, 'Intel'),
(18, 'Процессор Intel Core i3 8100 BOX', 'Процессор Intel Core i3-8100 BOX поставляется вместе с системой охлаждения. Она обеспечивает эффективный отвод образующегося тепла. Чип обладает оптимальными характеристиками и может применяться в различных сборках.\nСокет - LGA 1151-v2. Важно учесть параметр для определения совместимости с материнской платой. Модель поддерживает работу с оперативной памятью типа DDR4. Удается поставить на материнскую плату до 64 ГБ ОЗУ. Минимальная частота памяти - 1600 МГц, максимальная - 2400.', 11000, 'Intel'),
(19, 'Процессор AMD Ryzen 3 1200 OEM', 'Процессор AMD Ryzen 3 1200 OEM, созданный на основе архитектуры Zen, имеет четыре ядра Summit Ridge и четыре канала обработки данных. Он может послужить главным компонентом для сборки мощной домашней станции, уверенно работающей даже с ресурсоемким софтом, или производительной игровой машины. Имея базовую частоту 3100 МГц, эта модель может автоматически разгоняться до 3400 МГц в случае возрастания нагрузки.\nПроцессор AMD Ryzen 3 1200 OEM обладает тепловыделением на уровне 65 Вт. Он не потребует особенно мощных и эффективных систем охлаждения: с отводом тепла от этого устройства справится стандартная активная система воздушного охлаждения с процессорным кулером. Процессор может взаимодействовать с ОЗУ типа DDR4 и поддерживает максимальный объем оперативной памяти 32 ГБ.', 6000, 'AMD'),
(20, 'Процессор AMD Ryzen 3 1200 BOX', 'Процессор AMD Ryzen 3 1200 OEM, созданный на основе архитектуры Zen, имеет четыре ядра Summit Ridge и четыре канала обработки данных. Он может послужить главным компонентом для сборки мощной домашней станции, уверенно работающей даже с ресурсоемким софтом, или производительной игровой машины. Имея базовую частоту 3100 МГц, эта модель может автоматически разгоняться до 3400 МГц в случае возрастания нагрузки.\nПроцессор AMD Ryzen 3 1200 OEM обладает тепловыделением на уровне 65 Вт. Он не потребует особенно мощных и эффективных систем охлаждения: с отводом тепла от этого устройства справится стандартная активная система воздушного охлаждения с процессорным кулером. Процессор может взаимодействовать с ОЗУ типа DDR4 и поддерживает максимальный объем оперативной памяти 32 ГБ.', 7000, 'AMD');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `productsandattributes`
--

INSERT INTO `productsandattributes` (`productandattributesID`, `attributeID`, `productID`, `value`) VALUES
(1, 1, 1, 'LGA 1151'),
(2, 2, 1, '4'),
(3, 3, 1, '3000 МГц'),
(4, 1, 2, 'LGA 1151'),
(5, 2, 2, '4'),
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
(21, 6, 6, '256 бит'),
(23, 2, 3, '4'),
(26, 1, 3, '1051'),
(29, 2, 12, '8'),
(34, 3, 2, '3200'),
(35, 7, 2, '2017'),
(36, 3, 3, '3000'),
(37, 7, 3, '2016'),
(38, 7, 4, '2018'),
(39, 2, 11, '8'),
(40, 3, 11, '3800'),
(41, 7, 11, '2019'),
(42, 1, 11, 'AM4'),
(43, 1, 12, 'AM4'),
(44, 3, 12, '3600'),
(45, 7, 12, '2019'),
(48, 7, 6, '2019'),
(49, 7, 1, '2019'),
(50, 7, 13, '2018 г.'),
(51, 4, 14, '6 Гб'),
(52, 6, 14, '192 бит'),
(53, 5, 14, 'GDDR5'),
(54, 2, 17, '4'),
(55, 3, 17, '3600 мГц'),
(56, 5, 17, 'DDR4'),
(57, 7, 17, '2019'),
(58, 2, 18, '4'),
(59, 1, 18, 'LGA 1151-v2'),
(60, 3, 18, '3600'),
(61, 5, 18, 'DDR4'),
(62, 7, 18, '2019');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`subcategoryID`, `subcategoryTitle`, `subcategoryImagePath`) VALUES
(1, 'Процессоры', '/TexDon/assets/images/subcategory/Processors.png'),
(2, 'Видеокарты', '/TexDon/assets/images/subcategory/VideoCards.png'),
(4, 'Корпуса', '/TexDon/assets/images/subcategory/bodyPC.png'),
(11, 'Ноутбуки', '/TexDon/assets/images/subcategory/Laptops.png'),
(16, 'Планшеты', '/TexDon/assets/images/subcategory/Tablets 2.png'),
(17, 'Смартфоны', '/TexDon/assets/images/subcategory/smartphone.png'),
(18, 'Мобильные телефоны', '/TexDon/assets/images/subcategory/MobTel.png'),
(19, 'Объективы', '/TexDon/assets/images/subcategory/bb90366f4989.png'),
(20, 'Вспышки', '/TexDon/assets/images/subcategory/1ef8a5ee6e96.png'),
(21, 'Штативы', '/TexDon/assets/images/subcategory/5a27263b8afd.png'),
(22, 'Мониторы', '/TexDon/assets/images/subcategory/mt.png'),
(23, 'Техника для красоты', '/TexDon/assets/images/subcategory/8b5782a7d1cf.png'),
(24, 'Техника для кухни', '/TexDon/assets/images/subcategory/cd39a1907e34.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subcategoriesandproducts`
--

INSERT INTO `subcategoriesandproducts` (`subcategoryandproductID`, `subcategoryID`, `productID`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(5, 2, 4),
(6, 2, 5),
(7, 2, 6),
(9, 11, 1),
(13, 1, 11),
(14, 1, 12),
(15, 4, 13),
(16, 2, 14),
(17, 2, 15),
(18, 2, 16),
(19, 1, 17),
(20, 1, 18),
(21, 1, 19),
(22, 1, 20);

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
  ADD CONSTRAINT `fk_orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_attribute` FOREIGN KEY (`attributeID`) REFERENCES `productattributes` (`attributeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prodID` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
