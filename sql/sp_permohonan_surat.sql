DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permohonan_surat`(IN `aksi` VARCHAR(255), IN `param_id_surat_permohonan` INT(11), IN `param_nama` VARCHAR(100), IN `param_ttl` VARCHAR(100), IN `param_kewarganegaraan` VARCHAR(45), IN `param_agama` VARCHAR(45), IN `param_pekerjaan` VARCHAR(45), IN `param_alamat` VARCHAR(255), IN `param_nik` VARCHAR(45), IN `param_keperluan` VARCHAR(255), IN `param_keterangan` VARCHAR(255), IN `param_nomer` INT(11), IN `param_bulan` VARCHAR(20), IN `param_tahun` VARCHAR(10), IN `param_file_upload` VARCHAR(255))
BEGIN

/*
created by fq 2020-10-20
CARA EXECUTE :
kirim parameter aksi(insert,delete,edit,update) dari front end.
urutan parameter ada di atas.

CALL SP_KONTAK('insert',null,'Param_namapt','Param_address','Param_nomor','Param_email','Param_fb','Param_ig','Param_tw','Param_olx','Param_wa');
CALL SP_KONTAK('delete',1,null,null,null,null,null,null,null,null,null);
CALL SP_KONTAK('edit',1,null,null,null,null,null,null,null,null,null);
CALL SP_KONTAK('update',2,'Param_namapt2','Param_address2','Param_nomor2','Param_email2','Param_fb2','Param_ig2','Param_tw2','Param_olx2','Param_wa2');
CALL SP_KONTAK('show',null,null,null,null,null,null,null,null,null,null);
*/

	-- ==========================ERROR HANDLE CODE ==========================
	DECLARE EXIT HANDLER FOR 1062 SELECT 0 AS resutStatus,'Duplicate keys error encountered' msgStatus; 
    DECLARE EXIT HANDLER FOR 1048 SELECT 0 AS resutStatus,'Data Tidak Lengkap' msgStatus; 
    DECLARE EXIT HANDLER FOR 1265 SELECT 0 AS resutStatus,'Format Parameter Input Tidak Benar' msgStatus; 
	
    /*
    DECLARE exit handler for sqlexception
	BEGIN
		-- ERROR
	ROLLBACK;
	END;
   */
   
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
	SELECT 0 AS resutStatus,'Format Data Input Tidak Benar' msgStatus; 
	ROLLBACK;
	END;
    -- ==========================ERROR HANDLE CODE ==========================
    
    
	-- ======================START QUERY INSERT======================
	IF aksi="insert" THEN
    START TRANSACTION;
    INSERT INTO permohonan_surat (
    nama 
	,ttl
	,kewarganegaraan
	,agama
	,pekerjaan
	,alamat
	,nik
	,keperluan
	,keterangan
	,nomer
	,bulan
	,tahun
    ,file_upload
    ) 
    VALUES (
	param_nama
	,param_ttl 
	,param_kewarganegaraan 
	,param_agama
	,param_pekerjaan 
	,param_alamat 
	,param_nik
	,param_keperluan 
	,param_keterangan
	,param_nomer
	,param_bulan 
	,param_tahun 
    ,param_file_upload
    );
    COMMIT;
	SELECT 1 AS resutStatus, 'Berhasil Tambah Data' AS msgStatus;
    
    
    END IF;
    
	-- ======================END QUERY INSERT======================
    
    
    
    -- ======================START QUERY DELETE======================
    IF aksi="delete" THEN
    DELETE FROM permohonan_surat WHERE id_surat_permohonan=Param_id_surat_permohonan;
	SELECT 1 AS resutStatus, 'Berhasil Delete Data' AS msgStatus;
    END IF;
    -- ======================END QUERY DELETE======================
    
    
    
     -- ======================START QUERY EDIT======================
    IF aksi="edit" THEN
    SELECT * FROM permohonan_surat WHERE id_surat_permohonan=param_id_surat_permohonan;
    END IF;
    
    IF aksi="create_no" THEN
    select ifnull((select nomer from permohonan_surat WHERE bulan=param_bulan and tahun=param_tahun order by nomer desc limit 1),0)+1 as nomer limit 1;
    END IF;
    
    
    
    
    -- ======================END QUERY EDIT======================
    

    
    -- ======================START QUERY UPDATE======================
    IF aksi="update" THEN
    START TRANSACTION;
    UPDATE permohonan_surat SET  
    nama = Param_nama,
	ttl = Param_ttl,
	kewarganegaraan = Param_kewarganegaraan,
	agama = Param_agama,
	pekerjaan = Param_pekerjaan,
	alamat = Param_alamat,
	nik = Param_nik,
    keperluan = Param_keperluan,
	keterangan = Param_keterangan,
	nomer = Param_nomer,
    bulan = Param_bulan,     
    tahun = Param_tahun,
    file_upload = param_file_upload
    WHERE id_surat_permohonan=Param_id_surat_permohonan;
    COMMIT;
	SELECT 1 AS resutStatus, 'Berhasil Update Data' AS msgStatus;
    END IF;
    -- ======================END QUERY UPDATE======================


     -- ======================START QUERY SHOW======================
    IF aksi="show" THEN
    SELECT * FROM permohonan_surat;
    END IF;
    
    IF aksi="AllPemohonSurat" THEN
    SELECT * FROM permohonan_surat where id_surat_permohonan not in (select ifnull(id_permohonan_surat,0) from surat);
    END IF;
    
    IF aksi="SelectPemohonSurat" THEN
    SELECT * FROM permohonan_surat where id_surat_permohonan=param_id_surat_permohonan;
    END IF;
    -- ======================END QUERY SHOW======================	
    
    IF aksi NOT IN ('show','insert','update','edit','delete','show','create_no','AllPemohonSurat','SelectPemohonSurat') THEN
    SELECT 0 AS resutStatus, 'Parameter Aksi Belum Di seting' AS msgStatus;
    END IF;
    
END;;
DELIMITER ;