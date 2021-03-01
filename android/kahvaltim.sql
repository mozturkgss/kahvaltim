-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Kas 2016, 10:53:02
-- Sunucu sürümü: 10.1.9-MariaDB
-- PHP Sürümü: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kahvaltim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kullaniciadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kullaniciadi`, `sifre`) VALUES
(2, 'mozturk', '2'),
(3, 'basaran', '1'),
(6, 'bekir', '3'),
(7, 'mozturkgss', '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `stokadi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `resimid` int(11) NOT NULL,
  `birim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `birimfiyat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stok`
--

INSERT INTO `stok` (`id`, `stokadi`, `aciklama`, `resimid`, `birim`, `birimfiyat`) VALUES
(1, 'Klasik Kahvaltı', 'Beyaz peynir, kaşar peynir, baharatlı eritme peynir, su böreği, haşlanmış yumurta, siyah zeytin, yeşil zeytin, domates, salatalık, vişne reçeli, bal, tereyağı, dana jambon', 1, 'Porsiyon', 15),
(3, 'Mini Kahvaltı', 'Beyaz peynir, kaşar peynir, siyah zeytin, yeşil zeytin, domates, salatalık, yeşilbiber, haşlanmış yumurta, incir reçeli, ceviz', 2, 'Porsiyon', 10),
(5, 'Zengin Kahvaltı', 'Beyaz peynir, kaşar peynir, lor peynir, örgü peynir, kahvaltılık sos, su böreği, nugget, dana kavurma, haşlanmış yumurta, siyah zeytin, domates, salatalık, şeftali reçeli, tahin pekmez karışımı, bal, tereyağı, kızarmış sosis, dana jambon', 3, 'Porsiyon', 20),
(7, 'Patatesli Kahvaltı', 'Patates kızartması, beyaz peynir, kaşar peynir, siyah zeytin, yeşil zeytin, domates, salatalık, bal, tereyağı, dana jambon, kızarmış sosis', 4, 'Porsiyon', 15),
(9, 'Enerjik Kahvaltı', 'Beyaz peynir, kaşar peynir, zeytin, domates, salatalık, haşlanmış yumurta, vişne reçeli, çilek reçeli, bal, tereyağı, salam', 5, 'Porsiyon', 20),
(11, 'Soğuk Sandviç', 'Kaşar peynir veya beyaz peynir, domates, marul, dana jambon', 6, 'Adet', 5),
(13, 'Simit', 'Susamlı klasik simit', 7, 'Adet', 1),
(15, 'Açma', 'Tereyağlı Açma Simit', 8, 'Adet', 1),
(17, 'Peynirli Poğaça', 'Beyaz Peynirli Poğaça', 9, 'Adet', 1),
(19, 'Kaşarlı Poğaça', 'Kaşar Peynirli Poğaça', 10, 'Adet', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Tablo için AUTO_INCREMENT değeri `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
