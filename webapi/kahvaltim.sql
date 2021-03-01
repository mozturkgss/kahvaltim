-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Ara 2018, 07:06:57
-- Sunucu sürümü: 10.1.19-MariaDB
-- PHP Sürümü: 5.6.28

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
-- Tablo için tablo yapısı `adres`
--

CREATE TABLE `adres` (
  `id` int(11) NOT NULL,
  `kullaniciid` int(11) NOT NULL,
  `adresadi` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(5000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ilce` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `il` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adisoyadi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `adres`
--

INSERT INTO `adres` (`id`, `kullaniciid`, `adresadi`, `adres`, `ilce`, `il`, `adisoyadi`) VALUES
(1, 2, 'Is', 'Kayseri Valiligi', 'Kocasinan', 'Kayseri', 'Mustafa Öztürk'),
(14, 2, 'Ev', 'Toki', 'Melikgazi', 'Kayseri', 'Mustafa Ozturk'),
(15, 6, 'Ev', 'Yenimahalle', 'Kocasinan', 'Kayseri', 'Bekir Eren'),
(16, 2, 'Is', 'Kayseri Valigi', 'Kocasinan', 'Kayseri', 'Mustafa Ozturk');

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
(6, 'bekir', '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `id` int(11) NOT NULL,
  `kullaniciid` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adresid` int(11) NOT NULL,
  `toplamtutar` float NOT NULL,
  `durum` varchar(20) NOT NULL DEFAULT 'siparis'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`id`, `kullaniciid`, `tarih`, `adresid`, `toplamtutar`, `durum`) VALUES
(10, 2, '2017-10-27 13:43:53', 1, 10, 'siparis'),
(11, 2, '2017-10-27 13:51:25', 14, 32, 'tamam'),
(12, 6, '2017-10-27 14:03:42', 15, 15, 'tamam'),
(13, 2, '2017-12-14 16:35:36', 16, 75, 'siparis');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisdetay`
--

CREATE TABLE `siparisdetay` (
  `id` int(11) NOT NULL,
  `siparisid` int(11) NOT NULL,
  `stokid` int(11) NOT NULL,
  `miktar` int(11) NOT NULL,
  `birimfiyat` float NOT NULL,
  `tutar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `siparisdetay`
--

INSERT INTO `siparisdetay` (`id`, `siparisid`, `stokid`, `miktar`, `birimfiyat`, `tutar`) VALUES
(18, 10, 3, 1, 10, 10),
(19, 11, 15, 2, 1, 2),
(20, 12, 1, 1, 15, 15),
(21, 11, 3, 3, 3, 30),
(22, 13, 1, 1, 15, 15),
(23, 13, 5, 2, 20, 40),
(24, 13, 3, 2, 10, 20);

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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `id` int(11) NOT NULL,
  `kullaniciadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `adisoyadi` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `kullaniciadi`, `sifre`, `adisoyadi`) VALUES
(1, 'mustafa', '2', 'Mustafa Öztürk');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisdetay`
--
ALTER TABLE `siparisdetay`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adres`
--
ALTER TABLE `adres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `siparisdetay`
--
ALTER TABLE `siparisdetay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Tablo için AUTO_INCREMENT değeri `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
