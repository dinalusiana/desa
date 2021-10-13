DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_dashboard_chartpenduduk`()
BEGIN
CREATE TEMPORARY TABLE temp_penduduk
select 'Wanita' as gender,'Balita' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Wanita' and deleted_at is null and usia >=0 and usia <=5
union all
select 'Wanita' as gender,'Anak - Anak' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Wanita' and deleted_at is null and usia >=6 and usia <=9
union all
select 'Wanita' as gender,'Remaja' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Wanita' and deleted_at is null and usia >=10 and usia <=18
union all
select 'Wanita' as gender,'Dewasa' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Wanita' and deleted_at is null and usia >18
union all
select 'Pria' as gender,'Balita' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Pria' and deleted_at is null and usia >=0 and usia <=5
union all
select 'Pria' as gender,'Anak - Anak' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Pria' and deleted_at is null and usia >=6 and usia <=9
union all
select 'Pria' as gender,'Remaja' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Pria' and deleted_at is null and usia >=10 and usia <=18
union all
select 'Pria' as gender,'Dewasa' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Pria' and deleted_at is null and usia >18;

select * from temp_penduduk;
drop TABLE temp_penduduk;
END;;
DELIMITER ;