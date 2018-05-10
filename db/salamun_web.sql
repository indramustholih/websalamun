-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 12:47 PM
-- Server version: 5.6.20
-- PHP Version: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `salamun_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id_post` int(11) NOT NULL,
  `slug_post` varchar(100) DEFAULT NULL,
  `judul_post` varchar(100) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(50) DEFAULT NULL,
  `status_post` enum('publish','draft','','') DEFAULT NULL,
  `tags` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `slug_post`, `judul_post`, `isi`, `gambar`, `status_post`, `tags`, `date_created`) VALUES
(2, 'apakah-yii-itu', 'apakah yii itu ?', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ornare felis vel arcu sagittis, nec condimentum mauris vulputate. Pellentesque condimentum non tortor eu tempor. Praesent fermentum lorem nisi, non varius turpis sollicitudin quis. Maecenas convallis ultricies leo vel consequat. Cras blandit, nibh a hendrerit ultrices, purus lacus aliquet metus, ornare cursus sapien risus ut nisl. Cras tincidunt mi turpis, eu consectetur sapien fringilla eget. Vivamus lobortis metus id lorem laoreet, id auctor turpis facilisis. Pellentesque fringilla, lacus sit amet tempus semper, felis nibh porttitor nunc, ut condimentum nisi diam ac diam. Praesent volutpat scelerisque leo et elementum. Donec imperdiet magna vel quam fringilla consectetur.</p>\r\n<p>Donec eleifend magna eget volutpat ullamcorper. Praesent tristique in diam quis gravida. Nullam molestie rhoncus nisi ac efficitur. Nam nec ante non magna viverra mollis eget at ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus tincidunt mi at dui pretium condimentum. Vivamus magna velit, aliquet nec nisi nec, ultricies congue leo. Praesent id rhoncus nisl, sit amet efficitur sapien.</p>\r\n<p>Nam vehicula, libero sit amet faucibus ullamcorper, sem metus tempor neque, eu consectetur nisl nisi ac massa. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultricies lacinia augue ac sollicitudin. Etiam suscipit diam ex, nec efficitur neque faucibus ultricies. Aenean lobortis tristique erat, sit amet eleifend mi porttitor vitae. Pellentesque accumsan libero leo, sed pulvinar velit pretium ut. Pellentesque eu sem sodales, pellentesque mauris nec, tincidunt ex. Nullam at neque mi. Vestibulum facilisis felis est, nec lacinia nunc vulputate at. Quisque dolor diam, elementum quis semper in, scelerisque vitae magna. Donec eget odio id enim pharetra vestibulum. Quisque dictum ultricies erat eget consequat. Sed varius urna nunc, in sagittis odio feugiat vel. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi lacinia justo sem. Pellentesque quis fringilla augue, interdum condimentum nunc.</p>\r\n<p>Nam ut rhoncus risus. Proin ultricies elit eget tortor ullamcorper ultrices. Vestibulum sed enim vitae turpis feugiat elementum molestie quis dui. Ut at iaculis ex, vel elementum dui. Aenean tempus turpis nec nisl fermentum, quis interdum orci pulvinar. Nulla a nunc dignissim, sagittis odio sed, vestibulum ipsum. Duis efficitur turpis ex, quis egestas est dictum et. Aenean ac lorem massa.</p>\r\n<p>Aliquam erat volutpat. Nulla gravida lorem non lectus tincidunt, a feugiat lectus elementum. Vivamus ut lorem vulputate, varius lorem eu, egestas eros. Vestibulum ultricies sed massa faucibus blandit. Sed condimentum dolor nulla, eu eleifend augue pellentesque sed. Suspendisse feugiat congue sem, id sagittis mi interdum in. Nam nunc lectus, bibendum faucibus nisl at, condimentum iaculis nisl. Ut imperdiet nunc in tortor eleifend, vel semper turpis iaculis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam vitae elementum odio, eu accumsan est. Aenean efficitur massa sed urna gravida, id cursus nisl luctus. Aenean nisl orci, commodo eu tempor vel, dignissim ac lacus. Cras consectetur magna id ex vestibulum gravida. Nullam a pellentesque tellus. Phasellus convallis eget velit nec condimentum.</p>', 'Pasang_Yii2.PNG', 'publish', 'php', '2018-05-08 05:22:40'),
(4, 'thaler-pastikan-transfusi-dan-minum-obat-kelasi-besi-secara-rutin', 'Thaler, Pastikan Transfusi dan Minum Obat Kelasi Besi Secara Rutin', '<p>Thalssemia&hellip;..No!</p>\r\n<p>Skrining&hellip;..Yes!</p>\r\n<p>Thaller&hellip;&hellip;..Semangaat</p>\r\n<p>Putuskan mata rantai Thalassemia&hellip;Yes..Yes..Yes&hellip;!</p>\r\n<p>&nbsp;</p>\r\n<p>Teriakan Yel-yel para penyandang Thalassemia (thaler) memenuhi seisi ruangan. Yel-yel penuh semangat ini menunjukkan keriangan dan kebahagiaan Thaler menghadiri kegiatan Belajar dan Bermain Bersama Keluarga Thalassemia dalam memperingati Hari Thalassemia Internasional di Trans Studio Bandung, 8 Mei 2018.</p>\r\n<p>Acara yang digagas oleh Perhimpunan Orang Tua Penderita Thalassaemia Indonesia (POPTI) Jawa Barat ini dihadiri oleh sekitar 520 peserta dengan kegiatan edukasi pemberian penghargaan bagi para Thaler yang berprestasi, tanya jawab, pemaparan hasil penelitian Thalassemia serta hiburan.</p>\r\n<p>Sesi edukasi selalu jadi salah satu sesi yang dinantikan. Kepala KSM Ilmu Kesehatan Anak RSHS, DR. dr. Susi Susanah, Sp.A(K) mengisi sesi tanya jawab dengan para thaler yang hadir. Dari berbagai pertanyaan serta jawaban yang disampaikan, dapat disimpulkan bahwa Thalassemia merupakan penyakit yang diturunkan sehingga skrining sebelum menikah sangat penting. Sementara bagi thaler yang ditekankan adalah agar secara rutin melakukan tranfusi serta meminum obat kelasi besi agar menjaga fungsi organ tubuh tetap baik.</p>\r\n<p>Hal tersebut dikuatkan oleh hasil penelitian yang dilakukan dr. Pandji Irani Vilza Sp.PD(K) bersama tim, bahwa angka penyandang thalassemia yang mengalami komplikasi kelainan jantung dan penurunan fungsi hati cukup banyak. Hal itu diakibatkan dari menumpuknya zat besi yang dialami thaler. Untuk itu, dr. Pandji menegaskan agar para thaler tidak bosan-bosan melakukan transfusi serta meminum obat kelasi besi agar tidak terjadi komplikasi.</p>\r\n<p>Tawa anak-anak yang &ldquo;dikontrak&rdquo; untuk melakukan tranfusi darah seumur hidup ini sungguh sumringah. Bagaimana tidak, di Hari Thalassemia Internasional ini, mereka bersama keluarga dan teman-teman seperjuangannya bisa belajar dan bermain di lokasi Trans Studio. Selesai pertemuan resmi di gedung Theater, anak-anak tegar ini diberi kesempatan menaiki wahana bermain yang tersedia disana. Keluar ruangan theater wajahnya semakin sumringah, sebagian masih malu-malu melihat ke sekeliling ruangan Trans Studio yang ramai tapi sebagian lain langsung menghampiri wahana yang diinginkan, semoga kebahagiaan di hari ini cukup untuk mengobati peluhnya berjuang menghadapi penyakitnya.</p>\r\n<p>Mengenai konsep acara yang unik ini, Ketua POPTI Jabar, Nunuk Joyo Supeno menjelaskan, &ldquo;Setiap tahun POPTI selalu menyelenggarakan peringatan Hari Thalassemia Sedunia, dua tahun lalu diselenggarakan oleh RSUP dr. Hasan Sadikin, tahun ini kami yang selenggarakan, bekerja sama dengan para dokter RSHS,&rdquo; Ungkapnya. Ia menjelaskan, ingin sekali mengajak para Thaler bermain, melihat mereka bisa tertawa riang merupakan kebahagiaan sendiri bagi POPTI serta para petugas kesehatan yang selama ini merawat. &ldquo;Alhamdulillah banyak yang support sehingga kami dapat menyelenggarakannya disini,&rdquo; Tambahnya.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Tentang Thalassemia</strong></p>\r\n<p>Thalasemia adalah penyakit kelainan darah yang diakibatkan oleh faktor genetika dan menyebabkan protein yang ada di dalam sel darah merah (hemoglobin) tidak berfungsi secara normal. Kelainan bawaan pada sel darah ini menyebabkan sel darah merah mudah hancur. Usia sel darah merah normal sekitar 90-120 hari, sedangkan bagi penyandang thalassemia berat karena bahan pembentuk utama dari sel merah ini tidak sempurna atau tidak ada, maka sel darahnya mudah hancur. Permasalahan ini dapat ditanggulangi dengan melakukan tranfusi darah.</p>\r\n<p>Karena sel darah merah mudah hancur, tubuh memiliki mekanisme untuk membentuk sel darah merah baru, nah untuk membentuk sel darah merah baru perlu besi, besi diserap banyak oleh tubuh, sehingga tubuh mengandung banyak besi dan menumpuk, bisa menumpuk di kulit, di jantung atau di organ lain. Untuk mengurangi penyulit ini ada obatnya yang disebut obat kelasi besi.</p>\r\n<p>&ldquo;Zaman dulu penyandang Thalassemia hanya bertahan sampai usia balita, karena dulu penyakit ini belum banyak diketahui, tetapi sekarang dunia medis sudah mengetahui dan memiliki tata laksana thalasemia yang semakin baik, sehingga angka hidup Thaler relatif tinggi. Di RSHS saja sudah banyak Thaler yang berprestasi menjadi guru, sudah banyak yang lulus kuliah, bahkan beberapa orang sudah berusia 40 tahun&rdquo; Jelas dr. Susi.</p>\r\n<p>Penyakit ini merupakan genetik, seorang thaler hampir pasti ibu bapaknya yang tampak normal adalah pembawa sifat. Orang tua pembawa sifat dapat menurunkan thalassemia kepada anaknya. Di Indonesia dari yang tercatat 9000 thalasseia mayor, 40% ada di Jawa barat . &ldquo;Ini yang tercatat, saya yakin pasti masih banyak yang belum tercatat,&rdquo; Imbuhnya.</p>\r\n<p>Untuk memutus mata rantai Thalassemia ini yang bisa dilakukan adalah cek darah sebelum menikah, dokter sangat menganjurkan agar sesama pembawa sifat thalassemia tidak menikah, karena kemungkinan besar akan menghasilkan anak dengan Thalasemia mayor. Tetapi tentu saja pada akhirnya diserahkan kepada yang bersangkutan. &ldquo;Yang jelas, sebelum menikah lakukan skrining Thalasemia, untuk selanjutnya dapat dikonsultasikan bersama dokter,&rdquo; Tutupnya. (FLH-Humas RSHS)</p>', 'thala.jpg', 'publish', 'sgsags', '2018-05-08 07:34:57'),
(5, 'apakah-pusing-itu', 'Apakah Pusing Itu ?', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ornare felis vel arcu sagittis, nec condimentum mauris vulputate. Pellentesque condimentum non tortor eu tempor. Praesent fermentum lorem nisi, non varius turpis sollicitudin quis. Maecenas convallis ultricies leo vel consequat. Cras blandit, nibh a hendrerit ultrices, purus lacus aliquet metus, ornare cursus sapien risus ut nisl. Cras tincidunt mi turpis, eu consectetur sapien fringilla eget. Vivamus lobortis metus id lorem laoreet, id auctor turpis facilisis. Pellentesque fringilla, lacus sit amet tempus semper, felis nibh porttitor nunc, ut condimentum nisi diam ac diam. Praesent volutpat scelerisque leo et elementum. Donec imperdiet magna vel quam fringilla consectetur.</p>\r\n<p>Donec eleifend magna eget volutpat ullamcorper. Praesent tristique in diam quis gravida. Nullam molestie rhoncus nisi ac efficitur. Nam nec ante non magna viverra mollis eget at ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus tincidunt mi at dui pretium condimentum. Vivamus magna velit, aliquet nec nisi nec, ultricies congue leo. Praesent id rhoncus nisl, sit amet efficitur sapien.</p>\r\n<p>Nam vehicula, libero sit amet faucibus ullamcorper, sem metus tempor neque, eu consectetur nisl nisi ac massa. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultricies lacinia augue ac sollicitudin. Etiam suscipit diam ex, nec efficitur neque faucibus ultricies. Aenean lobortis tristique erat, sit amet eleifend mi porttitor vitae. Pellentesque accumsan libero leo, sed pulvinar velit pretium ut. Pellentesque eu sem sodales, pellentesque mauris nec, tincidunt ex. Nullam at neque mi. Vestibulum facilisis felis est, nec lacinia nunc vulputate at. Quisque dolor diam, elementum quis semper in, scelerisque vitae magna. Donec eget odio id enim pharetra vestibulum. Quisque dictum ultricies erat eget consequat. Sed varius urna nunc, in sagittis odio feugiat vel. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi lacinia justo sem. Pellentesque quis fringilla augue, interdum condimentum nunc.</p>\r\n<p>Nam ut rhoncus risus. Proin ultricies elit eget tortor ullamcorper ultrices. Vestibulum sed enim vitae turpis feugiat elementum molestie quis dui. Ut at iaculis ex, vel elementum dui. Aenean tempus turpis nec nisl fermentum, quis interdum orci pulvinar. Nulla a nunc dignissim, sagittis odio sed, vestibulum ipsum. Duis efficitur turpis ex, quis egestas est dictum et. Aenean ac lorem massa.</p>\r\n<p>Aliquam erat volutpat. Nulla gravida lorem non lectus tincidunt, a feugiat lectus elementum. Vivamus ut lorem vulputate, varius lorem eu, egestas eros. Vestibulum ultricies sed massa faucibus blandit. Sed condimentum dolor nulla, eu eleifend augue pellentesque sed. Suspendisse feugiat congue sem, id sagittis mi interdum in. Nam nunc lectus, bibendum faucibus nisl at, condimentum iaculis nisl. Ut imperdiet nunc in tortor eleifend, vel semper turpis iaculis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam vitae elementum odio, eu accumsan est. Aenean efficitur massa sed urna gravida, id cursus nisl luctus. Aenean nisl orci, commodo eu tempor vel, dignissim ac lacus. Cras consectetur magna id ex vestibulum gravida. Nullam a pellentesque tellus. Phasellus convallis eget velit nec condimentum.</p>', 'pusing1.jpg', 'publish', '', '2018-05-08 08:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses_level` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses_level`) VALUES
(18, 'admin', '$2y$10$vDX0e0OYQD8qs5ceiHvSE.4QSrI41/e1omIsWQm9HuxdiPvrIyvLO', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
