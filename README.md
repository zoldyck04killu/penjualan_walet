# aplikasi_penjualan_walet

## Cara Pemasangan

1. Download dan extract ke dalam directory C::/xampp/htdoc/.  
2. delete name master dibelakang penjualan_walet-mater menjadi penjualan_walet.  
3. buka XAMPP dan run mysql dan apache.  
4. buka phpmyadmin.  
5. buat database dengan nama database aplikasi_penjualan_walet. (jika databasa sudah ada bisa dihapus dulu)  
6. Import database yang disertakan pada file ini. yaitu aplikasi_penjualan_walet.sql  
7. dan jalankan aplikasi nya dengan ngetik di URL browser = localhost/penjualan_walet  


## note :

jika ada pesan error :  

Warning: mysqli::__construct(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) in /srv/http/aplikasi_penjualan_walet/config/connection.php on line 17

pastikan pada folder __config__ didalam file __config.php__ :  
```
$user = 'root';
$pass = '';
$db   = 'aplikasi_penjualan_walet';
```
