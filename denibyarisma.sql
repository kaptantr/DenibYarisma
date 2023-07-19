-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Şub 2021, 17:04:08
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `denibyarisma`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diger_resim`
--

CREATE TABLE `diger_resim` (
  `id` int(11) NOT NULL,
  `resim_id` int(11) NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `diger_resim`
--

INSERT INTO `diger_resim` (`id`, `resim_id`, `resim`) VALUES
(20, 15, '_0014_marina0.jpg'),
(21, 15, '_0019_padisah0.jpg'),
(22, 16, '_0001_deniz0.jpg'),
(23, 16, '_0022_panama0.jpg'),
(24, 17, 'erk3.jpg'),
(25, 17, 'iH1Jdqyg.jpg'),
(26, 17, 'XZHN7S3r.jpg'),
(27, 22, '6.jpg'),
(28, 22, '2.jpg'),
(29, 23, '1.jpg'),
(30, 23, '14.jpg'),
(33, 25, '1_breather_800x600.jpg'),
(34, 25, '3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dosya`
--

CREATE TABLE `dosya` (
  `id` int(11) NOT NULL,
  `dosya_id` int(11) NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dosya`
--

INSERT INTO `dosya` (`id`, `dosya_id`, `adi`) VALUES
(8, 11, 'dosya1.pdf'),
(9, 11, 'dosya2.pdf'),
(10, 10, 'dosya1_1.pdf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `facebook` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `instagram` longtext COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`id`, `durum`, `resim`, `adi`, `aciklama`, `tarih`, `seo`, `ingadi`, `ingaciklama`, `facebook`, `twitter`, `instagram`) VALUES
(18, 1, 'clients_pic_1.png', 'Debra Rowaski', '<p>Quisque velit libero, hendrerit ut nulla et, scelerisque pellentesque arcu.</p>\r\n', '25 Temmuz 2016, 17:50', 'Debra-Rowaski', 'Rovertink Donanım L.T.D', '', NULL, NULL, NULL),
(19, 1, 'clients_pic_2.png', 'Sezo Seren', '<p>Quisque velit libero, hendrerit ut nulla et, scelerisque pellentesque arcu.</p>\r\n', '25 Temmuz 2016, 17:50', 'Sezo-Seren', 'Seren Nakliyat Sistemleri A.Ş.', '', NULL, NULL, NULL),
(25, 1, 'clients_pic_3.png', 'Kader Can', '<p>Yaygın inancın tersine, Lorem Ipsum rastgele s&ouml;zc&uuml;klerden oluşmaz.\n\n', '25 Temmuz 2016, 17:51', 'Kader-Can', 'Deneme Firma', '', NULL, NULL, NULL),
(26, 1, 'commenter_1.png', 'Cem Cemoğlu', '<p>yorum</p>\r\n', '25 Temmuz 2016, 17:54', 'Cem-Cemoglu', 'Deneme Firma', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ebulten`
--

CREATE TABLE `ebulten` (
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ebulten`
--

INSERT INTO `ebulten` (`email`, `tarih`, `ip`, `id`) VALUES
('demo@example.com', '25 Temmuz 2016, 14:25', '::1', 33);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlikler`
--

CREATE TABLE `etkinlikler` (
  `id` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `etkinlikler`
--

INSERT INTO `etkinlikler` (`id`, `durum`, `resim`, `adi`, `aciklama`, `tarih`, `seo`, `ingadi`, `ingaciklama`) VALUES
(19, 1, 'hd_5.jpg', '1', '', '22 Temmuz 2016, 18:18', '1', '', ''),
(20, 1, 'hd_6.jpg', '2', '', '22 Temmuz 2016, 18:19', '2', '', ''),
(21, 1, 'hd_7.jpg', '3', '', '22 Temmuz 2016, 18:19', '3', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeriler`
--

CREATE TABLE `galeriler` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `kod` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `begen` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galeriler`
--

INSERT INTO `galeriler` (`id`, `kategori`, `adi`, `seo`, `resim`, `durum`, `aciklama`, `tarih`, `ingaciklama`, `ingadi`, `kod`, `begen`) VALUES
(40, 47, '4', '4', 'thumb_3_1.jpg', 1, '', '25-07-2016', '', '', '', 0),
(42, 47, '6', '6', 'thumb_2_1.jpg', 1, '', '25-07-2016', '', '', '', 0),
(38, 46, '2', '2', 'thumb_2.jpg', 1, '', '25-07-2016', '', '', '', 0),
(39, 45, '3', '3', 'thumb_1.jpg', 1, '', '25-07-2016', '', '', '', 0),
(37, 47, '1', '1', 'thumb_3.jpg', 1, '', '25-07-2016', '', '', '', 0),
(43, 0, '5', '5', 'thumb_2_2.jpg', 1, '', '25-07-2016', '', '', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri_kategori`
--

CREATE TABLE `galeri_kategori` (
  `id` int(11) NOT NULL,
  `kategori_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `kategori_ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `kod` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galeri_kategori`
--

INSERT INTO `galeri_kategori` (`id`, `kategori_adi`, `resim`, `seo`, `durum`, `kategori_ingadi`, `kod`) VALUES
(46, 'Bar', '', 'Bar', 1, '', ''),
(47, 'Cafe', '', 'Cafe', 1, '', ''),
(45, 'Loby', '', 'Loby', 1, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE `haberler` (
  `id` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `durum`, `resim`, `adi`, `aciklama`, `tarih`, `seo`, `ingadi`, `ingaciklama`) VALUES
(23, 1, 'blog_side_heading_1_img.jpg', 'Haber 2', '<p>haber detayı</p>\r\n', '25 Temmuz 2016, 18:31', 'Haber-2', '', ''),
(22, 1, 'blog_heading_3_img.jpg', 'Haber 1', '<p>Haber Detayı</p>\r\n', '25 Temmuz 2016, 18:30', 'Haber-1', '', ''),
(24, 1, 'blog_side_heading_1_img_1.jpg', 'haber 3', '<p>haber detayımız</p>\r\n', '25 Temmuz 2016, 18:31', 'haber-3', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `saat` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyat` longtext COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` longtext COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `kat_on` int(11) NOT NULL,
  `kat_arka` int(11) NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `katalog`
--

INSERT INTO `katalog` (`id`, `kat_on`, `kat_arka`, `resim`, `durum`) VALUES
(13, 0, 0, '2.jpg', 1),
(14, 0, 0, '3.jpg', 1),
(16, 1, 0, '1423581433__tye.jpg', 1),
(17, 0, 1, 'slider_1.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `markalar`
--

CREATE TABLE `markalar` (
  `id` int(11) NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(3) NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `facebook` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `pinterest` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `mevki` longtext COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `markalar`
--

INSERT INTO `markalar` (`id`, `adi`, `aciklama`, `resim`, `seo`, `durum`, `ingadi`, `ingaciklama`, `facebook`, `twitter`, `pinterest`, `mevki`) VALUES
(36, 'Meryem SULTAN', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n', 'team_member_1.jpg', 'Meryem-SULTAN', 1, '', '', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.pinterset.com', 'Genel Yönetmen'),
(37, 'İsmail HAKKI', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n', 'team_member_2.jpg', 'Ismail-HAKKI', 1, '', '', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.pinterset.com', 'Genel Kordinatör'),
(42, 'İsmail sss', '', 'team_member_3.jpg', 'Ismail-sss', 1, '', '', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.instagram.com', 'Genel Yönetmen'),
(44, 'Serhat KOÇ', '', 'team_member_4.jpg', 'Serhat-KOC', 1, '', '', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.instagram.com', 'Genel Kordinatör');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projeler`
--

CREATE TABLE `projeler` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `kod` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `begen` int(11) NOT NULL,
  `firma` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `deger` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `mevki` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `alan` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `yapim` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `sorumlu` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyat` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `ozellik` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `oda` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `sabah` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `hayvan` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `wifi` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `park` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `tv` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `klima` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `spor` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `ysayi` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `yildiz` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `obanyo` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `kilit` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `oservis` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `teras` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `uyandirma` longtext COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_kategori`
--

CREATE TABLE `proje_kategori` (
  `id` int(11) NOT NULL,
  `kategori_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `kategori_ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `kod` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `proje_kategori`
--

INSERT INTO `proje_kategori` (`id`, `kategori_adi`, `resim`, `seo`, `durum`, `kategori_ingadi`, `kod`) VALUES
(39, 'Web Design', 'erk2.jpg', 'Web-Design', 1, '', ''),
(40, 'Logo', '', 'Logo', 1, '', ''),
(41, 'Broşür', '', 'Brosur', 1, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_resim`
--

CREATE TABLE `proje_resim` (
  `id` int(11) NOT NULL,
  `resim_id` int(11) NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `proje_resim`
--

INSERT INTO `proje_resim` (`id`, `resim_id`, `resim`) VALUES
(34, 23, '3.jpg'),
(33, 23, '2.jpg'),
(29, 24, 'image_2.jpg'),
(30, 24, 'image_3.jpg'),
(36, 25, '3_1.jpg'),
(40, 27, 'single_project_image_7.jpg'),
(39, 25, '6.jpg'),
(55, 34, 'cS_22.jpg'),
(54, 34, 'cS_21.jpg'),
(59, 35, 'cS_46.jpg'),
(58, 35, 'cS_45_1.jpg'),
(49, 36, 'room_image_seven.png'),
(50, 36, 'room_image_ten.jpg'),
(51, 37, 'room_image_seventeen.png'),
(52, 37, 'showcase_slider_five.jpg'),
(56, 34, 'cS_23.jpg'),
(57, 34, 'cS_45.jpg'),
(60, 38, 'thumb_1.jpg'),
(61, 38, 'thumb_2.jpg'),
(62, 38, 'thumb_3.jpg'),
(63, 39, 'thumb_4.jpg'),
(64, 39, 'thumb_5.jpg'),
(65, 39, 'thumb_6.jpg'),
(66, 54, 'news_tree.jpg'),
(67, 54, 'news_img_2.jpg'),
(68, 54, 'blog_side_heading_3_img.jpg'),
(70, 40, 'news_tree_1.jpg'),
(71, 40, 'news_img_3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rez`
--

CREATE TABLE `rez` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `telefon` text COLLATE utf8_turkish_ci NOT NULL,
  `seo` text COLLATE utf8_turkish_ci NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` text COLLATE utf8_turkish_ci NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `gel` text COLLATE utf8_turkish_ci NOT NULL,
  `git` text COLLATE utf8_turkish_ci NOT NULL,
  `oda` text COLLATE utf8_turkish_ci NOT NULL,
  `kisi` text COLLATE utf8_turkish_ci NOT NULL,
  `cocuk` text COLLATE utf8_turkish_ci NOT NULL,
  `yatak` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rez`
--

INSERT INTO `rez` (`id`, `isim`, `email`, `mesaj`, `telefon`, `seo`, `resim`, `fiyat`, `adi`, `gel`, `git`, `oda`, `kisi`, `cocuk`, `yatak`, `tarih`, `ip`) VALUES
(90, 'Ahmet CAN', 'demo@example.com', 'ddd', '05444444444', 'Kral-Dairesi-', 'cS_53.jpg', '1355', 'Kral Dairesi', '2016-7-7', '2016-8-6', '3', '3', '3', '2', '21 Temmuz 2016, 23:40', '::1'),
(92, 'osman bey', 'serkan@bey.com', 'cccc', '05444444444', 'Double-Oda', 'image_4.jpg', '222', 'Double Oda', '07/06/2016', '07/13/2016', '5', '1', '1', '3', '22 Temmuz 2016, 19:36', '::1'),
(91, 'osman bey', 'demo@example.com', 'notum yoktur.', '0222222222', 'Kral-Dairesi-', 'cS_53.jpg', '1355', 'Kral Dairesi', '2016-7-4', '2016-8-18', '2', '4', '2', '2', '22 Temmuz 2016, 00:26', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis`
--

CREATE TABLE `satis` (
  `id` int(11) NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `yetkili` text COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `web` text COLLATE utf8_turkish_ci NOT NULL,
  `il` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ilce` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adres` longtext COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(300) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `id` int(11) NOT NULL,
  `menuadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sayfaadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(3) NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `menusirasi` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `menuadi`, `sayfaadi`, `aciklama`, `resim`, `seo`, `durum`, `ingadi`, `ingaciklama`, `menusirasi`) VALUES
(31, 'Hakkında', 'Yarışma Hakkında', '<h3><strong>Koza Gen&ccedil; Moda Tasarımcıları Yarışması</strong></h3>\r\n\r\n<p><img src=\"http://127.0.0.1/DenibYarisma/uploads/sayfalar/tasarimyarismasi17022017_ek6.jpg\" style=\"float:right; height:306px; width:460px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1992 yılından beri&nbsp;<a href=\"https://www.ihkib.org.tr/tr\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none;\" target=\"_blank\">İstanbul Hazır Giyim ve Konfeksiyon İhracat&ccedil;ı Birlikleri (İHKİB)&nbsp;</a>tarafından d&uuml;zenlenen Koza Gen&ccedil; Moda Tasarımcıları Yarışması moda tasarımı alanında kariyer yapmak isteyen gen&ccedil; yetenekleri end&uuml;striyle buluşturan en &ouml;nemli platformdur.</p>\r\n\r\n<p>Moda end&uuml;strisine yeni tasarımcılar kazandırmak konusunda lokomotif g&ouml;revi g&ouml;ren KOZA, d&uuml;zenlendiği 28 yıl s&uuml;resince T&uuml;rkiye&rsquo;nin en etkileyici moda arşivini yaratmıştır. Bu y&ouml;n&uuml;yle T&uuml;rkiye&rsquo;deki moda end&uuml;strisinin gelişimini ve tarihini de temsil etmektedir.</p>\r\n\r\n<p>Koza&rsquo;nın t&uuml;m finalistleri bug&uuml;n ya T&uuml;rkiye&rsquo;nin en tanınmış moda tasarımcıları olarak kendi markalarını kurmuş ya da bir&ccedil;oğu &ouml;nde gelen moda markalarının tasarım departmanlarının başındadır.</p>\r\n', 'tasarimyarismasi17022017_ek6.jpg', 'Yarisma-Hakkinda', 1, 'sayfa-yarisma-hakkinda.html', 'yarisma', 1),
(38, 'Şartname', 'Yarışma Şartnamesi', '<p>Yarışmaya başvuran herkes işbu şartname ve ekinde belirtilen koşulları kabul etmiş sayılırlar.</p>\r\n\r\n<p>2020 Yılı yarışma şartnamesi pdf formatında indirmek i&ccedil;in l&uuml;tfen&nbsp;<a href=\"https://www.kozayarismasi.com/content/images/KOZA-2020-SARTNAME.pdf\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none;\" target=\"_blank\">tıklayın.</a></p>\r\n\r\n<p>Not: 2020 Yılı Yarışma Şartnamesi&#39;dir.</p>\r\n', '', 'Yarisma-Sartnamesi', 1, 'sayfa-yarisma-sartnamesi.html', 'yarisma', 2),
(39, 'Takvim', 'Yarışma Takvimi', '<h3><strong>Son Başvuru Tarihi</strong></h3>\r\n\r\n<p>4 Mayıs 2020 Pazartesi</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>1. J&uuml;ri: Online Değerlendirme</strong></h3>\r\n\r\n<p>13 Mayıs &Ccedil;arşamba - 25 Mayıs Pazartesi 2020</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Online Değerlendirme Sonucunun A&ccedil;ıklanması</strong></h3>\r\n\r\n<p>26 Mayıs 2020 Salı</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>2. J&uuml;ri: Y&uuml;zy&uuml;ze M&uuml;lakat</strong></h3>\r\n\r\n<p>10 Haziran 2020 &Ccedil;arşamba</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Y&uuml;zy&uuml;ze M&uuml;lakat Sonucunun A&ccedil;ıklanması</strong></h3>\r\n\r\n<p>11 Haziran 2020 Perşembe</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Final J&uuml;risi ve Gala Gecesi</strong></h3>\r\n\r\n<p>23 Aralık 2020 &Ccedil;arşamba</p>\r\n', '', 'Yarisma-Takvimi', 1, 'sayfa-yarisma-takvimi.html', 'yarisma', 3),
(40, 'Süreç', 'Yarışma Süreçleri', '<p>Koza Yarışması 3 aşamalı değerlendirme s&uuml;recinden oluşur. Tasarımcılar, akademisyenler ve moda profesyonellerinden oluşan se&ccedil;ici kurul puanlamaları ger&ccedil;ekleştirir.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Online Değerlendirme</strong></h3>\r\n\r\n<p>Online değerlendirme aşamasında t&uuml;m başvurular j&uuml;ri tarafından&nbsp;<a href=\"http://www.kozayarismasi.com/\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none;\" target=\"_blank\">www.kozayarismasi.com</a>&nbsp;&uuml;zerinden değerlendirilir.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Y&uuml;z Y&uuml;ze M&uuml;lakat</strong></h3>\r\n\r\n<p>Online değerlendirme sonucunda y&uuml;z y&uuml;ze m&uuml;lakata katılmaya hak kazanan katılımcılar hazırladıkları koleksiyonlar hakkında j&uuml;riye detaylı bilgi verirler.</p>\r\n\r\n<p>Değerlendirme sonucunda 10 finalist belirlenir.</p>\r\n\r\n<p>(J&uuml;ri belirtilen sayının altında se&ccedil;im yapma hakkını saklı tutar.)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Final J&uuml;risi</strong></h3>\r\n\r\n<p>Koza Gala Gecesi&rsquo;nde ger&ccedil;ekleşen Final J&uuml;risi&rsquo;nde finalistlerin hazırladıkları 6 par&ccedil;alık koleksiyon j&uuml;riye sunulur. Değerlendirme sonucunda ilk 3 belirlenir.</p>\r\n', '', 'Yarisma-Surecleri', 1, 'sayfa-yarisma-surecleri.html', 'yarisma', 4),
(41, 'Değerlendirme', 'Yarışma Değerlendirme Koşulları', '<p><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">J&uuml;ri değerlendirme s&uuml;recinde g&ouml;z &ouml;n&uuml;nde bulundurulan kriterler aşağıda yer almaktadır:</span></span></p>\r\n\r\n<div style=\"box-sizing: border-box; color: rgb(118, 118, 118); font-family: Poppins, sans-serif; font-size: 14px;\">\r\n<p><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\"><strong>BİRİNCİ VE İKİNCİ AŞAMA</strong></span></span></p>\r\n\r\n<ol start=\"1\">\r\n	<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Yaratıcılık</span></span>\r\n\r\n	<ol start=\"1\">\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Fikir ve konsept</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Se&ccedil;ilen temanın tasarıma aktarımı</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Form</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Koleksiyon b&uuml;t&uuml;nl&uuml;ğ&uuml;</span></span></li>\r\n	</ol>\r\n	</li>\r\n	<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Malzeme Kullanımı</span></span>\r\n	<ol start=\"1\">\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">&Ouml;zg&uuml;nl&uuml;k</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Tasarıma uygunluğu</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Aksesuar ile kullanımı</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Malzemelerin birbirleri ile uyumu</span></span></li>\r\n	</ol>\r\n	</li>\r\n	<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Sunum ve Teknik &Ccedil;izim</span></span>\r\n	<ol start=\"1\">\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Portfolyo</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Sunum</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Teknik &Ccedil;izim</span></span></li>\r\n	</ol>\r\n	</li>\r\n	<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Giyilebilirlik (Ticari Potansiyel)</span></span></li>\r\n</ol>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\"><strong>&Uuml;&Ccedil;&Uuml;NC&Uuml; AŞAMA ( FİNAL J&Uuml;RİSİ)</strong></span></span></p>\r\n\r\n<ol start=\"1\">\r\n	<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Yaratıcılık</span></span>\r\n\r\n	<ol start=\"1\">\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Fikir ve konsept</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Se&ccedil;ilen temanın tasarıma aktarımı</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Form</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Koleksiyon b&uuml;t&uuml;nl&uuml;ğ&uuml;</span></span></li>\r\n	</ol>\r\n	</li>\r\n	<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Malzeme Kullanımı</span></span>\r\n	<ol start=\"1\">\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">&Ouml;zg&uuml;nl&uuml;k</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Tasarıma uygunluğu</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Aksesuar ile kullanımı</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Malzemelerin birbirleri ile uyumu</span></span></li>\r\n	</ol>\r\n	</li>\r\n	<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Uygulama ve Dikim</span></span>\r\n	<ol start=\"1\">\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Model &Ccedil;&ouml;z&uuml;mleme (2 boyuttan 3 boyuta uygulama)</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Dikiş kalitesi ve finishing</span></span></li>\r\n		<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Kalıp ve Fit</span></span></li>\r\n	</ol>\r\n	</li>\r\n	<li><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Giyilebilirlik (Ticari Potansiyel)</span></span></li>\r\n</ol>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"font-family:verdana,geneva,sans-serif\">Not: İHKİB yukarıda yer alan değerlendirme kriterlerinde değişiklik yapma hakkını saklı tutar.</span></span></p>\r\n</div>\r\n', '', 'Yarisma-Degerlendirme-Kosullari', 1, 'sayfa-yarisma-degerlendirme-kosullari.html', 'yarisma', 5),
(42, 'Ödüller', 'Yarışma Ödülleri', '<h3><strong>Dereceye Giren Finalistlere Verilecek &Ouml;d&uuml;ller</strong></h3>\r\n\r\n<p>Koza Gala Gecesi&rsquo;nde ger&ccedil;ekleşen Final J&uuml;risi sonucunda belirlenen&nbsp;&nbsp;<strong><u>ilk 3 finaliste</u>&nbsp;</strong>&nbsp;verilecek &ouml;d&uuml;ller aşağıda yer almaktadır:</p>\r\n\r\n<h3><strong>Yurt Dışı Eğitim &Ouml;d&uuml;l&uuml; Hakkı</strong></h3>\r\n\r\n<p>Yurt dışı eğitim &ouml;d&uuml;l&uuml; hakkı</p>\r\n\r\n<p>2008/2 No&rsquo;lu Tasarım Desteği Hakkında Tebliğ&rsquo;in 6&rsquo;ncı maddesinin ikinci fıkrası &ccedil;er&ccedil;evesinde tasarım yarışmalarının ger&ccedil;ekleştirilmesi sonrasında; dereceye giren tasarımcılardan yurt dışı eğitim desteğine başvurmak isteyenler Bakanlığın belirlediği tasarım konusunda uluslararası &ccedil;apta tanınan eğitim kurumlarına başvurularını yaparlar.&nbsp; Tasarımcılar, yurt dışı eğitimlerine ilişkin olarak başvurdukları eğitim kurumlarından kabul almalarını m&uuml;teakiben Bakanlığın belirlediği belgelerle birlikte İHKİB&rsquo;e başvururlar. İHKİB&nbsp; nihai incelemenin yapılabilmesi ve yurt dışı eğitim desteği sağlanacak tasarımcıların belirlenmesi amacıyla adaylara ilişkin listeyi Bakanlığın belirlediği belgelerle birlikte yarışmanın ger&ccedil;ekleştiği yılı takip eden 2 (iki) takvim yılı i&ccedil;erisinde olmak kaydıyla her yılın Nisan ayında Bakanlığa iletir.</p>\r\n\r\n<h3><strong>Para &Ouml;d&uuml;l&uuml;</strong></h3>\r\n\r\n<p><strong>Yarışmanın Birincisine</strong></p>\r\n\r\n<p>50.000 TL</p>\r\n\r\n<p><strong>Yarışmanın İkincisine</strong></p>\r\n\r\n<p>25.000 TL</p>\r\n\r\n<p><strong>Yarışmanın &Uuml;&ccedil;&uuml;nc&uuml;s&uuml;ne</strong></p>\r\n\r\n<p>15.000 TL</p>\r\n\r\n<h3>Yabancı Dil Eğitim &Ouml;d&uuml;l&uuml;</h3>\r\n\r\n<p>Yurt i&ccedil;inde 1 yıllık İngilizce dil eğitimi.</p>\r\n\r\n<p>İngilizceye h&acirc;kim finalistler bir başka yabancı dil eğitimi alabilirler.</p>\r\n\r\n<p>(İHKİB tarafından belirlenecek kurumda, %90 devamlılık şartı aranmak şartıyla)</p>\r\n\r\n<h3><strong>10 Finaliste Verilecek &Ouml;d&uuml;ller</strong></h3>\r\n\r\n<p>Y&uuml;z y&uuml;ze m&uuml;lakat sonucunda belirlenen&nbsp;&nbsp;<strong><u>10 finaliste</u>&nbsp;</strong>&nbsp;verilecek &ouml;d&uuml;ller aşağıda yer almaktadır:</p>\r\n\r\n<h3><strong>At&ouml;lye ve Danışmanlık Desteği</strong></h3>\r\n\r\n<p>Koleksiyon hazırlama s&uuml;recinde at&ouml;lye ve danışmanlık desteği</p>\r\n\r\n<p>İHKİB tarafından belirlenecek ment&ouml;rler tarafından birebir danışmanlık g&ouml;r&uuml;şmeleriyle y&uuml;r&uuml;t&uuml;len bir s&uuml;re&ccedil;tir. Bu s&uuml;re&ccedil;te finalistler, tasarımcılardan oluşan Koleksiyon Danışma Kurulu ile İHKİB tarafından belirlenen tarih ve yerde aşağıda i&ccedil;eriği belirtilen kapsamda en fazla 3 g&ouml;r&uuml;şme yapabilirler.</p>\r\n\r\n<p><strong>Birinci G&ouml;r&uuml;şme</strong>&nbsp;kapsamında koleksiyonların teknik &ccedil;izimleri, kumaş ve malzeme se&ccedil;imleri ve uygulamaya dair teknik konular değerlendirilir ve finalistler y&ouml;nlendirilir. Finalistlerin bu g&ouml;r&uuml;şmeye yarışmaya sundukları portfolyoları ile uygulamaya y&ouml;nelik detaylı teknik &ccedil;izimleri, malzeme ve aksesuar &ouml;rneklerini tamamlayarak katılmaları beklenir.</p>\r\n\r\n<p><strong>İkinci G&ouml;r&uuml;şme</strong>&nbsp;kapsamında prototip uygulamaları değerlendirilir ve kritikler verilir. Finalistler bu g&ouml;r&uuml;şmeye koleksiyonlarında yer alan t&uuml;m giysilerin prototiplerini tamamlamış olarak katılmalı ve dikimde kullanacakları kumaş, yardımcı malzemeler, baskı, nakış, aksesuar vb malzemelerini prototiplerle birlikte danışma kuruluna sunmalıdır. Finalistlerin uygulama s&uuml;recinde birlikte &ccedil;alıştıkları teknik ekip bu g&ouml;r&uuml;şmede yer alabilir.</p>\r\n\r\n<p><strong>&Uuml;&ccedil;&uuml;nc&uuml; G&ouml;r&uuml;şme</strong>&nbsp;kapsamında dikimi tamamlanmış koleksiyonların manken &uuml;zerinde fit denemeleri yapılır ve uygulama kritikleri verilir.</p>\r\n\r\n<h3>Koleksiyon Hazırlama ve Malzeme Alım Bedeli</h3>\r\n\r\n<p>Koleksiyonlarının &uuml;retilmesi aşamasında her finaliste 20.000 TL kalıp, dikim ve malzeme alım bedeli verilmektedir.</p>\r\n\r\n<h3><strong>Eğitim &Ouml;d&uuml;l&uuml;</strong></h3>\r\n\r\n<p>İstanbul Moda Akademisi&#39;nin ileri d&uuml;zey eğitim programlarından Moda Tasarımı ve Y&ouml;netimi Master Class Diploma Programı&#39;na katılım hakkı</p>\r\n\r\n<p>Eğitim programı sonunda finalistler tarafından hazırlanan koleksiyonlar Mercedes-Benz Fashion Week Istanbul* (MBFWI) kapsamında New Gen defilesiyle sekt&ouml;re ve basına tanıtılır.</p>\r\n\r\n<p>Defilede sunulacak koleksiyonlar moda sekt&ouml;r&uuml;n&uuml;n &ouml;nde gelen profesyonellerinden oluşan bir j&uuml;ri tarafından belirlenmektedir.</p>\r\n\r\n<p>Diploma Program&rsquo;ına katılmaya hak kazanan finalistlerin bu programa kayıtlarını yaptırdıkları takdirde programa %90 oranında devam etmeleri zorunludur. Finalistler program başlangı&ccedil; tarihinden &ouml;nce kayıt yaptırmak ve programa aynı sene i&ccedil;inde katılmak zorundadırlar. Programa kayıt yaptırmayan ve ilk 3 hafta s&uuml;re ile devamlılık g&ouml;stermeyen finalistler programa devam edemezler.</p>\r\n\r\n<p>* İHKİB New Gen defilesinin d&uuml;zenleneceği organizasyonu belirleme hakkını saklı tutar.</p>\r\n\r\n<h3>Uluslararası Fuar Ziyareti</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>İHKİB tarafından belirlenecek sekt&ouml;rle ilgili uluslararası bir fuara ziyaret hakkı</p>\r\n\r\n<p>Not: İHKİB ziyaret edilecek fuarı ve ziyaret edecek finalist sayısını belirleme hakkını saklı tutar.</p>\r\n\r\n<h3><strong>Moda Tasarımcıları Derneği&rsquo;ne 1 Yıllık &Uuml;yelik</strong></h3>\r\n\r\n<h3><strong>PR ve Tanıtım</strong></h3>\r\n\r\n<p>Yazılı ve dijital basın ve sosyal medya mecralarında tanıtım</p>\r\n\r\n<p>Y&uuml;z y&uuml;ze m&uuml;lakat sonucunda se&ccedil;ilen 10 finalist yarışma g&uuml;n&uuml;ne kadar yazılı ve dijital basında ve Koza Gen&ccedil; Moda Tasarımcıları Yarışması&rsquo;nın resmi sosyal medya hesaplarında tanıtılır.</p>\r\n\r\n<p>Kazanan ilk 3 tasarımcı ise yarışma sonrasında ulusal basında tanıtılır.</p>\r\n', '', 'Yarisma-Odulleri', 1, 'sayfa-yarisma-odulleri.html', 'yarisma', 6),
(43, 'Koşulları', 'Başvuru Koşulları', '<div style=\"box-sizing: border-box; font-family: Poppins, sans-serif; font-size: 14px;\">\r\n<div style=\"box-sizing: border-box; padding: 15px 0px 90px; color: rgb(118, 118, 118); line-height: 22.4px;\">\r\n<div style=\"box-sizing: border-box; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;\">\r\n<h4>Koza Gen&ccedil; Moda Tasarımcıları Yarışması&rsquo;na katılmak i&ccedil;in aranan şartlar aşağıda yer almaktadır:</h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul style=\"list-style-type:disc\">\r\n	<li>T.C vatandaşı olmak</li>\r\n	<li>1990 ve daha sonraki yıllarda doğmuş olmak</li>\r\n	<li>&Uuml;niversitelerin g&uuml;zel sanatlar fak&uuml;ltelerinde ya da moda tasarım b&ouml;l&uuml;mlerinde okumak ya da mezun olmak, moda tasarımı meslek y&uuml;ksek okullarında veya olgunlaşma enstit&uuml;lerinde okumak ya da mezun olmak, en az 2 yıllık moda tasarımı sertifika / diploma programında okumak ya da mezun olmak.</li>\r\n	<li>T&uuml;rk moda &ccedil;evresinde tanınan bir isim veya marka olmayıp, adına kayıtlı ticari firması, markası olmamak ve ticari sponsoru bulunmamak.</li>\r\n	<li>Koza Gen&ccedil; Moda Tasarımcıları Yarışması&rsquo;nda ve T&uuml;rkiye&#39;deki İhracat&ccedil;ı Birlikleri tarafından Moda Tasarımı alanında d&uuml;zenlenen tasarım yarışmalarında daha &ouml;nce ilk &uuml;&ccedil; dereceye girmemiş olmak&nbsp;</li>\r\n</ul>\r\n\r\n<hr />\r\n<p><a class=\"btn btn-primary\" href=\"basvuru\" style=\"box-sizing: border-box; background-color: rgb(237, 28, 36); color: rgb(255, 255, 255); text-decoration-line: none; display: inline-block; padding: 12px 24px; margin-bottom: 0px; line-height: 1.42857; text-align: center; white-space: nowrap; vertical-align: middle; touch-action: manipulation; cursor: pointer; user-select: none; background-image: none; border: none; border-radius: 32px; min-width: 160px;\">Hemen Başvur</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n', '', 'Basvuru-Kosullari', 1, 'sayfa-basvuru-kosullari.html', 'basvuru', 1),
(44, 'Nasıl Yapılır?', 'Başvuru Nasıl Yapılır?', '<h3>1 - &Uuml;ye Ol!</h3>\r\n\r\n<p>Giriş Yap sekmesinden bilgilerini doldurarak &uuml;ye ol! Zaten &uuml;ye isen e-posta adresin ve şifren ile giriş yap!</p>\r\n\r\n<h3>2 - Başvuru Yap!</h3>\r\n\r\n<p>Başvurularım kısmına gir ve Başvuru Formu&rsquo;nu doldur.</p>\r\n\r\n<p>Koleksiyon temanı ve gelecek planlarını a&ccedil;ıklayan yazını yaz!</p>\r\n\r\n<p>Paftalarını y&uuml;kle!</p>\r\n\r\n<h3>3 - Başvurunu Kontrol Et Ve G&ouml;nder!</h3>\r\n\r\n<p>Son kayıt tarihine kadar başvurunu g&uuml;ncelleyebilir veya yeniden başvurabilirsin. İyi şanslar!</p>\r\n\r\n<p><strong>Koleksiyon Sunumunda Ve Paftalarında Dikkat Etmen Gerekenler!</strong></p>\r\n\r\n<ul>\r\n	<li>Kadın veya erkek kategorisinden birini tercih etmelisin</li>\r\n	<li>Koleksiyonun toplam 6 paftadan oluşmalı (Ek olarak mood board, storyboard, color board, inspiration board vs. ve seni etkileyen veya kendi hazırladığın bir video y&uuml;kleyebilirsin)</li>\r\n	<li>Paftalarının her biri 50 x 70 cm &ouml;l&ccedil;&uuml;lerinde olmalı</li>\r\n	<li>Her bir tasarımı detaylandıran artistik ve teknik &ccedil;izimlerin yanı sıra kullanılacak kumaş detayları ve tamamlayıcı aksesuarlar yer almalı</li>\r\n	<li>Her biri ayrı dosya ayrı olarak ve &lsquo;jpg&rsquo; veya &lsquo;png&rsquo; uzantılı y&uuml;klenmeli (Her biri max. 5 mb boyutunda toplam 12 dosya y&uuml;kleyebilirsin</li>\r\n	<li>Koleksiyon sunumunun b&uuml;t&uuml;n&uuml;nde kimliği belirtici isim/imza/mahlas vs. olmamalı.</li>\r\n	<li>Dikkat! KOZA 2020&rsquo;de herhangi bir tema yok. Koleksiyonların herhangi bir sezona y&ouml;nelik olması da gerekmiyor.</li>\r\n	<li>Bu formatların dışındaki dosyalar kabul edilmeyecektir.</li>\r\n</ul>\r\n\r\n<h3>&Ouml;rnek Paftalar</h3>\r\n\r\n<div class=\"galleries\" style=\"box-sizing: border-box; display: inline-block; color: rgb(118, 118, 118); font-family: Poppins, sans-serif; font-size: 14px;\">\r\n<div class=\"gallery\" style=\"box-sizing: border-box; margin: 30px 0px;\">\r\n<div class=\"row\" style=\"box-sizing: border-box; margin-right: -15px; margin-left: -15px;\">\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/0.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/0.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/1.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/1.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/2.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/2.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/3.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/3.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/4.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/4.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/5.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/5.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/6.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/6.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/7.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/7.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/8.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/8.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/9.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/9.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/10.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/10.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/11.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/11.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n\r\n<div class=\"col-sm-3\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 292.5px; max-height: 460px;\">\r\n<div class=\"item\" style=\"box-sizing: border-box; margin-bottom: 10px;\"><a href=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/12.jpg\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none; display: block; position: relative;\"><img alt=\"\" class=\"img-responsive\" src=\"https://www.kozayarismasi.com/Content/images/ornek-pafta/12.jpg\" style=\"border-style:initial; border-width:0px; box-sizing:border-box; display:block; height:auto; margin:15px 0px 20px; max-height:380px; max-width:100%; object-fit:cover; vertical-align:middle; width:262.5px\" /></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', 'Basvuru-Nasil-Yapilir-', 1, 'sayfa-basvuru-nasil-Yapilir.html', 'basvuru', 2),
(45, 'Sık Sorulan Sorular', 'Sık Sorulan Sorular', '<h4><strong>Lise &ouml;ğrencileri yarışmaya katılabilir mi ?</strong></h4>\r\n\r\n<p>Hayır. Katılım &ouml;n koşulu; &uuml;niversitelerin g&uuml;zel sanatlar fak&uuml;ltesinde ya da moda tasarım b&ouml;l&uuml;mlerinde okumak ya da mezun olmak, moda tasarım meslek y&uuml;ksekokullarında (MYO, olgunlaşma enstit&uuml;s&uuml; vb.) okumak ya da mezun olmak, en az 2 yıllık moda tasarım sertifika / diploma programında okumak ya da mezun olmak.</p>\r\n\r\n<h4><strong>Online başvuru yerine başvurular elden teslim edilebilir mi ?</strong></h4>\r\n\r\n<p>Hayır, başvurular sadece online olarak kabul edilecek.</p>\r\n\r\n<h4><strong>Yarışmanın bir teması var mıdır ?</strong></h4>\r\n\r\n<p>Hayır, Koza Gen&ccedil; Moda Tasarımcıları Yarışması&rsquo;nda bir tema ya da sezon yok. Kendi belirleyeceğin tema, konsept ya da sezonda bir koleksiyon hazırlayabilirsin.</p>\r\n\r\n<h4><strong>Paftaların &ouml;l&ccedil;&uuml;s&uuml; nedir?</strong></h4>\r\n\r\n<p>Her biri 50 x 70 cm &ouml;l&ccedil;&uuml;lerinde olacak şekilde 6 farklı pafta olmalı.</p>\r\n\r\n<h4><strong>Tasarım sayısı 6 adetten daha az veya daha fazla olabilir mi ?</strong></h4>\r\n\r\n<p>Hayır, 6 adet tasarım (tam g&ouml;r&uuml;n&uuml;m) olmalı. Daha fazla veya daha az g&ouml;r&uuml;n&uuml;m g&ouml;nderen başvurular değerlendirmeye alınmaz.</p>\r\n\r\n<h4><strong>Tasarım &ccedil;izimleri ve teknik bilgiler aynı sayfa da mı belirtilmeli ?</strong></h4>\r\n\r\n<p>Evet, her bir tam g&ouml;r&uuml;n&uuml;m&uuml; detaylandıran artistik ve teknik &ccedil;izimlerin yanı sıra (&ouml;n ve arka g&ouml;r&uuml;n&uuml;m), her bir paftada o g&ouml;r&uuml;n&uuml;mde kullanılacak kumaş detayları ve tamamlayıcı aksesuar detayları yer almalıdır.</p>\r\n\r\n<h4><strong>Tasarımların yalnızca &ouml;n g&ouml;r&uuml;n&uuml;mlerinin &ccedil;izilmesi yeterli mi, arka g&ouml;r&uuml;n&uuml;mlerinin de &ccedil;izilme zorunluluğu var mı ?</strong></h4>\r\n\r\n<p>Artistik &ccedil;izimlerde sadece &ouml;n g&ouml;r&uuml;n&uuml;m yeterli olmakla birlikte teknik &ccedil;izimlerde hem arka hem de &ouml;n g&ouml;r&uuml;n&uuml;m mutlaka olmalı.</p>\r\n\r\n<h4><strong>&Ccedil;izimlerin bilgisayarda yapılma zorunluluğu var mı ?</strong></h4>\r\n\r\n<p>Hayır, hem artistik hem de teknik &ccedil;izimler tercihine g&ouml;re elle veya bilgisayarda yapılabilir.</p>\r\n\r\n<h4><strong>Sayfa sayıları nereye yazılıyor ?</strong></h4>\r\n\r\n<p>Paftanın sağ alt k&ouml;şesi numaralandırılmalıdır.</p>\r\n\r\n<h4><strong>Başvuru &ouml;ncesi hazırlamam gereken belgeler/&ccedil;alışmalar nelerdir ?</strong></h4>\r\n\r\n<p>Pdf formatında 6 adet tasarım (tam g&ouml;r&uuml;n&uuml;m)</p>\r\n\r\n<p>Gelecek Planlarınız (max. 1000 karakter)</p>\r\n\r\n<p>Kısa &Ouml;zge&ccedil;mişiniz (max. 1000 karakter)</p>\r\n\r\n<p>Portfolyonuz hakkında kısa bir bilgi (max. 1000 karakter)</p>\r\n\r\n<h4><strong>Başvuru i&ccedil;in okul projeleri kabul ediliyor mu ?</strong></h4>\r\n\r\n<p>Elbette, neden olmasın? Kabul ediliyor.</p>\r\n\r\n<h4><strong>Başvuru i&ccedil;in grup projeleri kabul ediliyor mu ?</strong></h4>\r\n\r\n<p>Hayır, &ccedil;alışmalar bireysel olmalı.</p>\r\n\r\n<h4><strong>Paftalar kadın-erkek karma olacak şekilde hazırlanabilir mi ?</strong></h4>\r\n\r\n<p>Hayır, koleksiyon b&uuml;t&uuml;nl&uuml;ğ&uuml;n&uuml;n ifade edilmesi &ccedil;ok zor olacağından yalnızca kadın veya erkek olarak hazırlanmalıdır.</p>\r\n\r\n<h4><strong>Yabancı uyruklu kişiler yarışmaya katılabilir mi?/ T&uuml;rkiye&rsquo;de oturma izni olan yabancı uyruklu kişiler yarışmaya katılabilir mi ?</strong></h4>\r\n\r\n<p>Hayır. Katılım i&ccedil;in T.C vatandaşı olma koşulu bulunmaktadır.</p>\r\n\r\n<h4><strong>Yarışmaya katılmak i&ccedil;in yaş sınırı var mıdır ?</strong></h4>\r\n\r\n<p>Evet, 1990 ve daha sonraki yıllarda doğmuş olmak.</p>\r\n\r\n<p><a href=\"mailto:koza@itkib.org.tr\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none;\">Diğer sorularınız i&ccedil;in&nbsp;koza@itkib.org.tr&rsquo;ye mail atabilirsiniz.</a></p>\r\n\r\n<p><a href=\"https://www.kozayarismasi.com/content/images/koza_sartnamesi.pdf\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(237, 28, 36); text-decoration-line: none;\" target=\"_blank\">Daha fazla bilgi i&ccedil;in şartnameyi inceleyebilirsiniz.</a></p>\r\n', '', 'Sik-Sorulan-Sorular', 1, 'sayfa-sik-sorulan-sorular.html', 'basvuru', 3),
(46, 'Önceki Yıllar', 'Önceki Yıllarda Yarışma', '', '', 'Onceki-Yillarda-Yarisma', 1, 'sayfa-onceki-yillarda-yarisma.html', 'basin', 1),
(47, 'Haberler', 'Basında Haberler', '', '', 'Basinda-Haberler', 1, 'sayfa-basinda-haberler.html', 'basin', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urunseo` text COLLATE utf8_turkish_ci NOT NULL,
  `urunresim` text COLLATE utf8_turkish_ci NOT NULL,
  `urunadi` text COLLATE utf8_turkish_ci NOT NULL,
  `adet` text COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`id`, `isim`, `email`, `telefon`, `urunseo`, `urunresim`, `urunadi`, `adet`, `fiyat`, `tarih`, `ip`) VALUES
(3, 'Ahmet CAN', '', '05444444444', 'Deneme-Urun', '17.jpg', 'Deneme &Uuml;r&uuml;n / ABC123', '1', '40 TL', '12 Temmuz 2016, 16:14', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_ayar`
--

CREATE TABLE `site_ayar` (
  `id` int(11) NOT NULL,
  `site_title` text COLLATE utf8_turkish_ci NOT NULL,
  `site_meta` text COLLATE utf8_turkish_ci NOT NULL,
  `site_desc` text COLLATE utf8_turkish_ci NOT NULL,
  `firma_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `firma_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `firma_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `firma_fax` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `firma_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `firma_adres` text COLLATE utf8_turkish_ci NOT NULL,
  `google_maps` text COLLATE utf8_turkish_ci NOT NULL,
  `google_analytics` text COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gplus` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `copyright` text COLLATE utf8_turkish_ci NOT NULL,
  `ingcopyright` text COLLATE utf8_turkish_ci NOT NULL,
  `site_ingtitle` text COLLATE utf8_turkish_ci NOT NULL,
  `firma_ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `skype` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `youtube` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `tanitim` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `tema` longtext COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `site_ayar`
--

INSERT INTO `site_ayar` (`id`, `site_title`, `site_meta`, `site_desc`, `firma_logo`, `firma_adi`, `firma_tel`, `firma_fax`, `firma_email`, `firma_adres`, `google_maps`, `google_analytics`, `facebook`, `twitter`, `gplus`, `instagram`, `pinterest`, `copyright`, `ingcopyright`, `site_ingtitle`, `firma_ingadi`, `skype`, `youtube`, `tanitim`, `tema`) VALUES
(1, 'DENİB - Denizli İhracatçılar Birliği - İletişim Bilgileri', 'DENİB - Denizli İhracatçılar Birliği - İletişim Bilgileri', 'Denizli İhracatçılar Birliği Genel Sekreterliği İletişim Bilgileri', 'logo.png', 'DENİZLİ İHRACATÇILAR BİRLİĞİ', '+90 258 274 66 88 (PBX)', '+90 258 274 72 22 - 274 72 62', 'denib@denib.gov.tr', '<h3>DENİZLİ İHRACATÇILAR BİRLİĞİ GENEL SEKRETERLİĞİ</h3><br>Akhan Mah. 246 Sk. No:8 PK 402 20140, Pamukkale, Denizli, Türkiye<br>', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.087892898922!2d29.149623315652892!3d37.81141021782321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c73fbe2dcf76ef%3A0x2a0f3ac992c4edd8!2zRGVuaXpsaSDEsGhyYWNhdMOnxLFsYXIgQmlybGnEn2kgR2VuZWwgU2VrcmV0ZXJsacSfaQ!5e0!3m2!1str!2str!4v1551541679073', '', 'https://www.facebook.com/DenibDenizli', 'https://twitter.com/DenibDenizli', '', 'http://instagram.com/denibdenizli', '', 'Copyright © 2021, DENİB Her hakkı saklıdır.', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adi2` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(3) NOT NULL,
  `tarih` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ingadi2` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ingadi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `adi`, `adi2`, `resim`, `durum`, `tarih`, `ingadi2`, `ingadi`) VALUES
(64, 'Yarışma-1', '', 'tasarimyarismasi17022017_ek1.jpg', 1, '25-01-2021', '', '<h1>DENİB 5. Ev ve Plaj Giyimi Yarışması&#39;nın Nefes Kesen Finali Ger&ccedil;ekleşti...</h1>\r\n'),
(65, 'Yarışma-2', '', 'tasarimyarismasi17022017_ek2.jpg', 1, '25-01-2021', '', '<h1>DENİB 5. Ev ve Plaj Giyimi Yarışması&#39;nın Nefes Kesen Finali Ger&ccedil;ekleşti...</h1>'),
(66, 'Yarışma-3', '', 'tasarimyarismasi17022017_ek3.jpg', 1, '25-01-2021', '', '<h1>DENİB 5. Ev ve Plaj Giyimi Yarışması&#39;nın Nefes Kesen Finali Ger&ccedil;ekleşti...</h1>'),
(67, 'Yarışma-4', '', 'tasarimyarismasi17022017_ek4.jpg', 1, '25-01-2021', '', '<h1>DENİB 5. Ev ve Plaj Giyimi Yarışması&#39;nın Nefes Kesen Finali Ger&ccedil;ekleşti...</h1>'),
(68, 'Yarışma-5', '', 'tasarimyarismasi17022017_ek6.jpg', 1, '25-01-2021', '', '<h1>DENİB 5. Ev ve Plaj Giyimi Yarışması&#39;nın Nefes Kesen Finali Ger&ccedil;ekleşti...</h1>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ingaciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `kod` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `begen` int(11) NOT NULL,
  `efiyat` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `ukod` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `video` longtext COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `kategori`, `adi`, `seo`, `resim`, `durum`, `aciklama`, `tarih`, `ingaciklama`, `ingadi`, `kod`, `begen`, `efiyat`, `ukod`, `video`) VALUES
(26, 40, 'Deneme Proje 2', 'Deneme-Proje-2', '3.jpg', 1, '<p>dddd</p>\r\n', '13-07-2016', '', 'http://www.google.com', '', 0, 'B Firma A. Ş.', '22 Temmuz 2017', 'web,php'),
(25, 39, 'Deneme Proje', 'Deneme-Proje', '8_dirk_sebregts.jpg', 1, '<p>proje acıklaması</p>\r\n', '15-07-2016', '', 'http://www.google.com', '', 0, 'A Firma A.Ş.', '13 Temmuz 2017', 'Php // Css3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_kategori`
--

CREATE TABLE `urun_kategori` (
  `id` int(11) NOT NULL,
  `kategori_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `kategori_ingadi` text COLLATE utf8_turkish_ci NOT NULL,
  `kod` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `yonetici_id` int(11) NOT NULL,
  `yonetici_ad_soyad` char(55) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yonetici_kullanici` char(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yonetici_sifre` char(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yonetici_email` char(55) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yonetici_son_giris` char(55) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`yonetici_id`, `yonetici_ad_soyad`, `yonetici_kullanici`, `yonetici_sifre`, `yonetici_email`, `yonetici_son_giris`) VALUES
(1, 'Y&ouml;netim Paneli', 'admin', 'admin', 'info@siteniz.com', '05 Ekim 2015, 19:13');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `diger_resim`
--
ALTER TABLE `diger_resim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dosya`
--
ALTER TABLE `dosya`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ebulten`
--
ALTER TABLE `ebulten`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `etkinlikler`
--
ALTER TABLE `etkinlikler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galeriler`
--
ALTER TABLE `galeriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galeri_kategori`
--
ALTER TABLE `galeri_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `markalar`
--
ALTER TABLE `markalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `projeler`
--
ALTER TABLE `projeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje_kategori`
--
ALTER TABLE `proje_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje_resim`
--
ALTER TABLE `proje_resim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rez`
--
ALTER TABLE `rez`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satis`
--
ALTER TABLE `satis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `site_ayar`
--
ALTER TABLE `site_ayar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urun_kategori`
--
ALTER TABLE `urun_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`yonetici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `diger_resim`
--
ALTER TABLE `diger_resim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `dosya`
--
ALTER TABLE `dosya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `ebulten`
--
ALTER TABLE `ebulten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `etkinlikler`
--
ALTER TABLE `etkinlikler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `galeriler`
--
ALTER TABLE `galeriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `galeri_kategori`
--
ALTER TABLE `galeri_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Tablo için AUTO_INCREMENT değeri `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `markalar`
--
ALTER TABLE `markalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Tablo için AUTO_INCREMENT değeri `projeler`
--
ALTER TABLE `projeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Tablo için AUTO_INCREMENT değeri `proje_kategori`
--
ALTER TABLE `proje_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `proje_resim`
--
ALTER TABLE `proje_resim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Tablo için AUTO_INCREMENT değeri `rez`
--
ALTER TABLE `rez`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Tablo için AUTO_INCREMENT değeri `satis`
--
ALTER TABLE `satis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `site_ayar`
--
ALTER TABLE `site_ayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `urun_kategori`
--
ALTER TABLE `urun_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `yonetici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
