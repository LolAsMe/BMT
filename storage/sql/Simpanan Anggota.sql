SELECT bmt.anggota.id as anggota_id, bmt.anggota.kode, bmt_old.anggota.no_rek,bmt_old.anggota.kd_simp as jenis_simpanan_id, bmt_old.anggota.jml_tabungan as jumlah,bmt.anggota.tanggal_masuk as tanggal_pembuatan, bmt_old.anggota.ket as keterangan
FROM bmt.anggota
INNER JOIN bmt_old.anggota ON bmt_old.anggota.no_agt COLLATE utf8mb4_general_ci =bmt.anggota.kode;
INSERT INTO `bmt`.`simpanan` (`kode`, `anggota_id`, `jenis_simpanan_id`, `jumlah`, `tanggal_pembuatan`, `keterangan`) VALUES ('bmt_old.anggota.no_rek', anggota_id, jenis_simpanan_id, jumlah, tanggal_pembuatan, keterangan)
