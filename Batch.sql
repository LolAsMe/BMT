TRUNCATE `bmt2`.`anggota`;
TRUNCATE `bmt2`.`anggunan`;
TRUNCATE `bmt2`.`cetak`;
TRUNCATE `bmt2`.`detail_nisbah`;
TRUNCATE `bmt2`.`detail_pembiayaan`;
TRUNCATE `bmt2`.`detail_simpanan`;
TRUNCATE `bmt2`.`failed_jobs`;
TRUNCATE `bmt2`.`jabatan`;
TRUNCATE `bmt2`.`jenis_pembiayaan`;
TRUNCATE `bmt2`.`jenis_simpanan`;
TRUNCATE `bmt2`.`karyawan`;
TRUNCATE `bmt2`.`nisbah`;
TRUNCATE `bmt2`.`password_resets`;
TRUNCATE `bmt2`.`pembiayaan`;
TRUNCATE `bmt2`.`personal_access_tokens`;
TRUNCATE `bmt2`.`sessions`;
TRUNCATE `bmt2`.`simpanan`;
TRUNCATE `bmt2`.`transaksis`;
TRUNCATE `bmt2`.`users`;

ALTER TABLE bmt2.anggota
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.anggunan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.cetak
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.detail_nisbah
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.detail_pembiayaan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.detail_simpanan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.detail_transaksi
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.jabatan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.jenis_pembiayaan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.jenis_simpanan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.karyawan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.nisbah
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.pembiayaan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.simpanan
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.users
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE bmt2.transaksi
CHANGE COLUMN `created_at` `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
CHANGE COLUMN `updated_at` `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ;

INSERT INTO `bmt2`.`jenis_pembiayaan`
(
`kode`,
`nama`,
`bahas`)
select bmt_old.jns_pjm.kd_pjm, bmt_old.jns_pjm.nm_pjm, bmt_old.jns_pjm.BAHAS from bmt_old.jns_pjm;

INSERT INTO `bmt2`.`jenis_simpanan`
(
`kode`,
`nama`,
`bahas`)
select bmt_old.jns_agt.kd_jns, bmt_old.jns_agt.nm_jns, bmt_old.jns_agt.BAHAS from bmt_old.jns_agt ORDER BY bmt_old.jns_agt.kd_jns;


INSERT INTO `bmt2`.`jabatan`
(
`kode`,
`nama`)
select 
kd_jab, 
nm_jab
from bmt_old.jabatan;

INSERT INTO `bmt2`.`karyawan`
(`kode`,
`nama`,
`alamat`,
`no_telepon`,
`jabatan_id`)
select 
kd_kar, 
nm_kar,
alamat,
no_telp,
bmt.jabatan.id
from bmt_old.karyawan
INNER JOIN bmt.jabatan ON bmt_old.karyawan.jabatan COLLATE utf8mb4_general_ci =bmt.jabatan.kode
order by bmt_old.karyawan.kd_kar
;



INSERT INTO `bmt2`.`anggota`
(`kode`,
`nama`,
`no_ktp`,
`alamat`,
`telepon`,
`pekerjaan`,
`tempat_lahir`,
`tanggal_lahir`,
`tanggal_masuk`,
`nama_ibu_kandung`,
`jenis_kelamin`,
`karyawan_id`,
`keterangan`)
SELECT 
    `anggota`.`no_agt`,
    `anggota`.`nama`,
    `anggota`.`no_ktp`,
    `anggota`.`alamat`,
    `anggota`.`telp`,
    `anggota`.`pek`,
    `anggota`.`t_lahir`,
    `anggota`.`tgl_lahir`,
    `anggota`.`tgl_masuk`,
    `anggota`.`nm_ibukd`,
    `anggota`.`jen_kel`,
    `anggota`.`kd_kar`,
    `anggota`.`ket`
FROM `bmt_old`.`anggota`;



INSERT INTO `bmt2`.`simpanan` (`kode`,
 `anggota_id`,
 `jenis_simpanan_id`,
 `jumlah`,
 `tanggal_pembuatan`,
 `keterangan`) 
SELECT 
 bmt_old.anggota.no_rek,
bmt2.anggota.id as anggota_id,
bmt_old.anggota.kd_simp as jenis_simpanan_id,
 bmt_old.anggota.jml_tabungan as jumlah,
bmt2.anggota.tanggal_masuk as tanggal_pembuatan,
 bmt_old.anggota.ket as keterangan
FROM bmt2.anggota
INNER JOIN bmt_old.anggota ON bmt_old.anggota.no_agt COLLATE utf8mb4_general_ci =bmt2.anggota.kode;

UPDATE `bmt_old`.`cetak`
SET
`no_urut` = 1
WHERE no_urut is null;


INSERT INTO `bmt2`.`cetak`
(
`kode`,
`tanggal`,
`sandi`,
`debit`,
`kredit`,
`saldo`,
`karyawan_id`,
`simpanan_id`,
`no_urut`)
SELECT 
`cetak`.`no_cetak`,
    `cetak`.`tgl_trax`,
    `cetak`.`sandi`,
    `cetak`.`debet`,
    `cetak`.`kredit`,
    `cetak`.`saldo`,
    '1',
    bmt2.simpanan.id,
    `cetak`.`no_urut`
FROM `bmt_old`.`cetak`
INNER JOIN bmt2.simpanan ON bmt_old.cetak.no_rek COLLATE utf8mb4_general_ci =bmt2.simpanan.kode;

INSERT INTO `bmt2`.`detail_simpanan` (`simpanan_id`, `kode`, `transaksi_id`, `tanggal_transaksi`, `tanggal_slip`, `debit`, `kredit`, `saldo_awal`, `saldo_akhir`, `keterangan`, `karyawan_id`) SELECT  bmt2.simpanan.id as simpanan_id, `simpan`.`no_simpan`,     1,     `simpan`.`tgl_trax`,     `simpan`.`tgl_slip`,     `simpan`.`j_ambil`,     `simpan`.`j_simpan`,     `simpan`.`saldo_awl`,     `simpan`.`saldo_akhir`,     `simpan`.`ket`,     1 FROM `bmt_old`.`simpan` INNER JOIN bmt2.simpanan ON bmt_old.simpan.no_rek COLLATE utf8mb4_general_ci =bmt2.simpanan.kode where bmt_old.simpan.saldo_awl >= 0 and bmt_old.simpan.saldo_akhir >= 0
;

INSERT INTO `bmt2`.`transaksi`
(
`transaksi_id`,
`kode`,
`nama`,
`keterangan`,
`debit`,
`kredit`,
`tanggal_transaksi`,
`tanggal_slip`,
`karyawan_id`)
SELECT 
"1",
    `harian`.`KD_TRX`,
    `harian`.`NM_TRX`,
    `harian`.`NO_REK`,
    `harian`.`DEBET`,
    `harian`.`KREDIT`,
    `harian`.`TGL`,
    `harian`.`TGL_SLIP`,
    "1"
FROM `bmt_old`.`harian`;

;

