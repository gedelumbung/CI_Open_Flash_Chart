CREATE TABLE IF NOT EXISTS `tbl_pollingsoal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soal` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_pollingsoal`
--

INSERT INTO `tbl_pollingsoal` (`id`, `soal`, `status`) VALUES
(1, 'Bagaimana pelaksanaan proses akademik di semester genap ini?', 'Y');


CREATE TABLE IF NOT EXISTS `tbl_pollingjawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal` int(11) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY (`id_jawaban`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_pollingjawaban`
--

INSERT INTO `tbl_pollingjawaban` (`id_jawaban`, `id_soal`, `jawaban`, `counter`) VALUES
(1, 1, 'Kurang', 6),
(2, 1, 'Cukup Bagus', 3),
(3, 1, 'Sangat Bagus', 10),
(4, 1, 'Tidak Tahu', 6);
