-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.29 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5958
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных fghcom
CREATE DATABASE IF NOT EXISTS `fghcom` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `fghcom`;

-- Дамп структуры для таблица fghcom.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы fghcom.categories: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category`) VALUES
	(1, 'Обед'),
	(2, 'Ужин'),
	(3, 'Завтрак'),
	(4, 'Закуски'),
	(5, 'Бизнес ланч');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица fghcom.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `comment` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_id` int(10) unsigned DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_comments_posts` (`post_id`),
  KEY `FK_comments_comments` (`comment_id`),
  CONSTRAINT `FK_comments_comments` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  CONSTRAINT `FK_comments_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы fghcom.comments: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `post_id`, `comment`, `login`, `email`, `comment_id`, `date`) VALUES
	(1, 1, 'Шкварки ниче так, но собачку жалко', 'estet', 'estet@gmail.com.ua', NULL, '2020-12-01 18:34:35'),
	(2, 1, 'Или котенка, бегал он себе мяукал. и добегался :)', 'helper', 'helper@gmail.com.ua', 1, '2020-12-01 18:34:35'),
	(3, 1, 'Да ладно вам, шутники. Это обычное генномодифицированное мясо.', 'estet', 'estet@gmail.com.ua', NULL, '2020-12-01 18:34:35'),
	(4, 1, 'Никто моего тузика не видел? Породы ТузикШпаниэль.', 'master', 'master@gmail.com.ua', 1, '2020-12-01 18:34:35'),
	(44, 1, '&lt;script&gt;\nwindow.alert(\'1555555\')\n&lt;/script&gt;', 'asdasd', 'fjghj g', NULL, '2020-12-07 20:50:10'),
	(45, 1, '&lt;script&gt;\nwindow.alert(\'1555555\')\n&lt;/script&gt;', 'asdasd', 'fjghj g', NULL, '2020-12-07 20:50:10'),
	(46, 1, '&lt;script&gt;\nwindow.alert(\'1555555\')\n&lt;/script&gt;', 'asdasd', 'fjghj g', NULL, '2020-12-07 20:50:53'),
	(47, 1, 'Comment', 'Name', 'Enter email', NULL, '2020-12-07 20:52:15'),
	(48, 1, 'Comment', 'Name', 'Enter email', NULL, '2020-12-07 20:52:33'),
	(49, 1, 'Comment', 'Name', 'Enter email', NULL, '2020-12-07 20:53:47'),
	(50, 1, 'Comment', 'Name', 'Enter email', NULL, '2020-12-07 20:54:57'),
	(51, 1, 'Comment', 'Name', 'Enter email', NULL, '2020-12-07 20:56:05'),
	(52, 1, 'comment plus', 'name plus', 'enter plus', NULL, '2020-12-07 20:56:55'),
	(53, 1, 'asdasdasd', 'asdasd', 'asdasd', NULL, '2020-12-07 20:57:39'),
	(54, 1, 'sdf sdf sdf sdfsdf sdf sdf', 'rjjvtsdfsdf', 'sdf sdf', 44, '2020-12-07 20:57:59'),
	(55, 1, 'SDF SDF', 'SR FSDF', 'S DF SD', NULL, '2020-12-07 21:05:57');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Дамп структуры для таблица fghcom.navigation
CREATE TABLE IF NOT EXISTS `navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_col` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_navigation_navigation` (`parent_id`),
  CONSTRAINT `FK_navigation_navigation` FOREIGN KEY (`parent_id`) REFERENCES `navigation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы fghcom.navigation: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `navigation` DISABLE KEYS */;
INSERT INTO `navigation` (`id`, `title`, `href`, `order_col`, `parent_id`) VALUES
	(1, 'Главная', '/', 1, NULL),
	(2, 'Блог', '/post', 2, NULL),
	(3, 'Природа', '/nature', 1, 2),
	(4, 'Новости', '/news', 2, 2),
	(5, 'Архив', '/arhive', 3, 2),
	(6, 'О нас', '/about', 3, NULL),
	(7, 'Контакты', '/contacts', 1, 6),
	(8, 'Карта', '/google', 2, 6);
/*!40000 ALTER TABLE `navigation` ENABLE KEYS */;

-- Дамп структуры для таблица fghcom.options
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE,
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы fghcom.options: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` (`id`, `name`, `value`) VALUES
	(1, 'Город', 'Полтава');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;

-- Дамп структуры для таблица fghcom.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(384) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_src` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_alt` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_published` datetime NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int(10) unsigned NOT NULL DEFAULT '1',
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_posts_poststatuses` (`status_id`),
  KEY `FK_posts_categories` (`category_id`),
  CONSTRAINT `FK_posts_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_posts_poststatuses` FOREIGN KEY (`status_id`) REFERENCES `poststatuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы fghcom.posts: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `slogan`, `img_src`, `img_alt`, `content`, `date_published`, `date_created`, `status_id`, `category_id`) VALUES
	(1, 'Шкварки по-английски к пиву', 'К пиву нужно подавать не креветки или сухарики, как в России, а свиные шкварки и картофельные чипсы.', '/static/img/posts/post_1.jpg', 'шкварки', 'Наверное смысл такой жирной закуски, чтобы меньше хмелеть и не стремиться уйти из паба поужинать. Рецепт этих шкварок (Pork scratchings) прост. Но есть и небольшие ухищрения, чтобы шкварки выглядели эстетичней. Даже мишленовские повара Британии имеют в своих коллекциях рецепты этих шкварок. Блюдо старинное, интересное, но после него, если плохая духовка, кухня будет в дыму и придется протирать духовку. Не полезно, но с пивом эти шкварки хороши! Хранить можно пару дней в закрытом контейнере, так что можно брать с собой на пикники. А из растопленного жира можно сделать ароматизированный жир для готовки.', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 4),
	(2, 'Джерки из говядины или мясные чипсы', 'Короткий рецепт - как сделать джерки своими руками в домашних условиях в сушилке для овощей. это и потрясающий перекус у вас в холодильнике и еда для похода и офигенная закуска к пиву.', '/static/img/posts/post_2.jpg', 'джерки', 'Я расскажу, как приготовить джерки из семги в духовке, но если у вас есть сушилка для овощей и фруктов, можно также воспользоваться ею. Чтобы рыбка была насыщенной и ароматной, обязательно предварительно ее нужно замариновать. Специи вы можете выбрать те, что вам больше по душе. Попробуйте, такая закуска уж точно в сто раз лучше покупных чипсов или сухариков. Подробнее: https://povar.ru/recipes/djerki_iz_semgi-64131.html', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 4),
	(3, 'Ребра к пиву', 'Их замечательно злоупотреблять к пиву и прочим хмельным напиткам, запивать томатным соком да и вообще.', '/static/img/posts/post_3.jpg', 'ребра', 'Здравствуй, честной народ. Без лишних слов и долгих прелюдий хочу показать вам старый и проверенный способ готовить мягкие, разваливающиеся во рту ребра. Их замечательно злоупотреблять к пиву и прочим хмельным напиткам, запивать томатным соком да и вообще.\r\n\r\nПопробовал я их больше 7 лет назад и с тех пор периодически готовлю с небольшими вариациями, о которых скажу позже', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 4),
	(4, 'Крабовые палочки с сыром в кляре', ' Я решил приготовить Крабовые палочки с сыром в кляре. Получилось очень вкусно, и аппетитно! Эту лучшую закуску можно приготовить к просмотру фильма, так же к пиву. Всем спасибо за внимание! Всем хорошего настроения! ', '/static/img/posts/post_4.jpg', 'палочки', 'Перед вами прекрасный вариант, как приготовить крабовые палочки в кляре с сыром. Сам процесс не только несложный, но и довольно быстрый. Подавать такую закуску к столу лучше со сковороды, однако даже в холодном виде она остается вкусной. Что касается кляра, то тут вы можете экспериментировать со специями, чтобы он получился ароматным, пикантным, пряным. Чудесный вариант для разнообразия, согласны?) Подробнее: https://povar.ru/recipes/krabovye_palochki_v_klyare_s_syrom-49878.html', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 4),
	(5, 'Шубка для сосиски', 'Сытная запеканка на ужин, с хрустящей корочкой и нежными сосисками. Вам она непременно понравится! Запоминаем и записываем рецепт сосисок в картофельной шубке', '/static/img/posts/post_5.jpg', 'шубка для сосиски', 'Для меня этот рецепт - более упрощенный вариант сосисок в картофельной шубе, когда их еще запекать надо. Для приготовления сосисок в картофельной шубке для начала отварите картошку. Также лаваш вам понадобится тонкий, мы его разделим на полоски. Смотрим рецепт. Подробнее: https://povar.ru/recipes/sosiski_v_kartofelnoi_shubke-23915.html', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 4),
	(6, 'Запеканка с сосиской и картошкой ', 'Такой вариант запеканки самый простой и экономичный, вы всегда можете использовать в этом блюде оставшийся после ужина отварной картофель, а еще добавить в запеканку различные овощи на ваш вкус. ', '/static/img/posts/post_6.jpg', 'запеканка', 'Несмотря на всю простоту и незатейливость этого рецепта приготовления запеканки с сосиской и картошкой, скажу вам честно, само блюдо получается замечательное. Мои родные всегда встречают его на ура и за считанные минуты опустошают свои тарелки. А еще в этом простой рецепте запеканки с сосиской и картошкой мне очень нравится то, что все необходимые для него продукты всегда есть в холодильнике, поэтому я знаю, что приготовить быстрый и вкусный ужин для своих домашних мне не составит особого труда. Подробнее: https://povar.ru/recipes/zapekanka_s_sosiskoi_i_kartoshkoi-27020.html', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 4),
	(7, 'Кролик по-цыгански ', 'Многие не любят мясо кролика, а у меня оно самое любимое! Диетическое, нежирное, вкусное! Не пробовали еще цыганских блюд? Тогда заходите и смотрите, как приготовить кролика по-цыгански! Очень просто! ', '/static/img/posts/post_7.jpg', 'кролик', 'Мясо кролика — самое полезное мясо! К тому же, оно еще и очень вкусное! Я — многодетная мама, и как раз ради детей взялась за разведение кроликов, поэтому готовим мы их часто. А этот рецепт приготовления кролика — самый любимый! Он нравится и взрослым, и детям! Кролик тушится в белом вине (но пусть вас это не пугает, весь алкоголь выпарится при готовке. Затем добавляются консервированные томаты в собственном соку, оливки и чеснок, потом все тушится еще, но уже с добавлением бульона, поэтому мясо получается очень нежным и мягким! Всем советую приготовить это блюдо! Подробнее: https://povar.ru/recipes/krolik_po-cyganski-65285.html', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 4),
	(8, 'Грудинка, варенная в луковой шелухе', 'Делюсь с вами простым рецептом, как приготовить грудинку, варенную в луковой шелухе. Мясо по вкусу больше напоминает копченое, да и красивый румяный цвет никого не оставит равнодушным! Вкусно! ', '/static/img/posts/post_8.jpg', 'грудинка', 'Это очень простой рецепт, но результат меня неизменно радует. Пока мясо маринуется в луке и соли, вокруг него как будто бы появляется защитный слой, вследствие чего при варке все соки мяса не уходят в бульон. Так что румяная, вкусная и нежная закуска вам обеспечена! Подробнее: https://povar.ru/recipes/grudinka_varennaya_v_lukovoi_sheluhe-40010.html', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 4),
	(9, 'Тестовое 1', 'К пиву нужно подавать не креветки или сухарики, как в России, а свиные шкварки и картофельные чипсы.', '/static/img/posts/post_0.jpg', 'шкварки', 'Наверное смысл такой жирной закуски, чтобы меньше хмелеть и не стремиться уйти из паба поужинать. Рецепт этих шкварок (Pork scratchings) прост. Но есть и небольшие ухищрения, чтобы шкварки выглядели эстетичней. Даже мишленовские повара Британии имеют в своих коллекциях рецепты этих шкварок. Блюдо старинное, интересное, но после него, если плохая духовка, кухня будет в дыму и придется протирать духовку. Не полезно, но с пивом эти шкварки хороши! Хранить можно пару дней в закрытом контейнере, так что можно брать с собой на пикники. А из растопленного жира можно сделать ароматизированный жир для готовки.', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 5),
	(10, 'Тестовое 2', 'К пиву нужно подавать не креветки или сухарики, как в России, а свиные шкварки и картофельные чипсы.', '/static/img/posts/post_0.jpg', 'шкварки', 'Наверное смысл такой жирной закуски, чтобы меньше хмелеть и не стремиться уйти из паба поужинать. Рецепт этих шкварок (Pork scratchings) прост. Но есть и небольшие ухищрения, чтобы шкварки выглядели эстетичней. Даже мишленовские повара Британии имеют в своих коллекциях рецепты этих шкварок. Блюдо старинное, интересное, но после него, если плохая духовка, кухня будет в дыму и придется протирать духовку. Не полезно, но с пивом эти шкварки хороши! Хранить можно пару дней в закрытом контейнере, так что можно брать с собой на пикники. А из растопленного жира можно сделать ароматизированный жир для готовки.', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 5),
	(11, 'Тестовое 3', 'К пиву нужно подавать не креветки или сухарики, как в России, а свиные шкварки и картофельные чипсы.', '/static/img/posts/post_0.jpg', 'шкварки', 'Наверное смысл такой жирной закуски, чтобы меньше хмелеть и не стремиться уйти из паба поужинать. Рецепт этих шкварок (Pork scratchings) прост. Но есть и небольшие ухищрения, чтобы шкварки выглядели эстетичней. Даже мишленовские повара Британии имеют в своих коллекциях рецепты этих шкварок. Блюдо старинное, интересное, но после него, если плохая духовка, кухня будет в дыму и придется протирать духовку. Не полезно, но с пивом эти шкварки хороши! Хранить можно пару дней в закрытом контейнере, так что можно брать с собой на пикники. А из растопленного жира можно сделать ароматизированный жир для готовки.', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 5),
	(12, 'Тестовое 4', 'К пиву нужно подавать не креветки или сухарики, как в России, а свиные шкварки и картофельные чипсы.', '/static/img/posts/post_0.jpg', 'шкварки', 'Наверное смысл такой жирной закуски, чтобы меньше хмелеть и не стремиться уйти из паба поужинать. Рецепт этих шкварок (Pork scratchings) прост. Но есть и небольшие ухищрения, чтобы шкварки выглядели эстетичней. Даже мишленовские повара Британии имеют в своих коллекциях рецепты этих шкварок. Блюдо старинное, интересное, но после него, если плохая духовка, кухня будет в дыму и придется протирать духовку. Не полезно, но с пивом эти шкварки хороши! Хранить можно пару дней в закрытом контейнере, так что можно брать с собой на пикники. А из растопленного жира можно сделать ароматизированный жир для готовки.', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 5),
	(13, 'Тестовое 5', 'К пиву нужно подавать не креветки или сухарики, как в России, а свиные шкварки и картофельные чипсы.', '/static/img/posts/post_0.jpg', 'шкварки', 'Наверное смысл такой жирной закуски, чтобы меньше хмелеть и не стремиться уйти из паба поужинать. Рецепт этих шкварок (Pork scratchings) прост. Но есть и небольшие ухищрения, чтобы шкварки выглядели эстетичней. Даже мишленовские повара Британии имеют в своих коллекциях рецепты этих шкварок. Блюдо старинное, интересное, но после него, если плохая духовка, кухня будет в дыму и придется протирать духовку. Не полезно, но с пивом эти шкварки хороши! Хранить можно пару дней в закрытом контейнере, так что можно брать с собой на пикники. А из растопленного жира можно сделать ароматизированный жир для готовки.', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 5),
	(14, 'Тестовое 6', 'К пиву нужно подавать не креветки или сухарики, как в России, а свиные шкварки и картофельные чипсы.', '/static/img/posts/post_0.jpg', 'шкварки', 'Наверное смысл такой жирной закуски, чтобы меньше хмелеть и не стремиться уйти из паба поужинать. Рецепт этих шкварок (Pork scratchings) прост. Но есть и небольшие ухищрения, чтобы шкварки выглядели эстетичней. Даже мишленовские повара Британии имеют в своих коллекциях рецепты этих шкварок. Блюдо старинное, интересное, но после него, если плохая духовка, кухня будет в дыму и придется протирать духовку. Не полезно, но с пивом эти шкварки хороши! Хранить можно пару дней в закрытом контейнере, так что можно брать с собой на пикники. А из растопленного жира можно сделать ароматизированный жир для готовки.', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 5),
	(15, 'Тестовое 7', 'К пиву нужно подавать не креветки или сухарики, как в России, а свиные шкварки и картофельные чипсы.', '/static/img/posts/post_0.jpg', 'шкварки', 'Наверное смысл такой жирной закуски, чтобы меньше хмелеть и не стремиться уйти из паба поужинать. Рецепт этих шкварок (Pork scratchings) прост. Но есть и небольшие ухищрения, чтобы шкварки выглядели эстетичней. Даже мишленовские повара Британии имеют в своих коллекциях рецепты этих шкварок. Блюдо старинное, интересное, но после него, если плохая духовка, кухня будет в дыму и придется протирать духовку. Не полезно, но с пивом эти шкварки хороши! Хранить можно пару дней в закрытом контейнере, так что можно брать с собой на пикники. А из растопленного жира можно сделать ароматизированный жир для готовки.', '2020-11-26 19:00:18', '2020-11-26 19:00:21', 2, 5);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Дамп структуры для таблица fghcom.poststatuses
CREATE TABLE IF NOT EXISTS `poststatuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы fghcom.poststatuses: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `poststatuses` DISABLE KEYS */;
INSERT INTO `poststatuses` (`id`, `status`) VALUES
	(1, 'created'),
	(2, 'published'),
	(4, 'archival');
/*!40000 ALTER TABLE `poststatuses` ENABLE KEYS */;

-- Дамп структуры для таблица fghcom.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы fghcom.roles: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role`) VALUES
	(3, 'ADMIN'),
	(2, 'EDITOR'),
	(1, 'READER');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Дамп структуры для таблица fghcom.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_users_roles` (`role_id`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы fghcom.users: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `login`, `password`, `role_id`) VALUES
	(1, 'admin@admin.com', 'admin', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
