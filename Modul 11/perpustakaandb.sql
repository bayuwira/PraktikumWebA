CREATE DATABASE perpustakaandb;

USE perpustakaandb;

CREATE TABLE `buku` (
  `id` INT(11) NOT NULL,
  `judul_buku` VARCHAR(100) NOT NULL,
  `penulis_buku` VARCHAR(100) NOT NULL,
  `penerbit_buku` VARCHAR(100) NOT NULL,
  `tahun_terbit` CHAR(4) NOT NULL,
  `stok` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

INSERT INTO `buku` (`id`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_terbit`, `stok`) VALUES
(3, 'Buku 1)', 'Penulis1', '\r\nPenerbit1', '1999', 10),
(5, 'Buku 2', '\r\nPenulis2', '\r\nPenerbit2', '2020', 11),
(7, 'Buku 3', '\r\nPenulis4', '\r\nPenerbit4', '2020', 14),
(9, 'Buku 4', 'Penulis4', 'Penerbit4', '2010', 12);

ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `buku`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;