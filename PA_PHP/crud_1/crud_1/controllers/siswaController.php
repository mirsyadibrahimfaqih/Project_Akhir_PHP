<?php 
    require_once '../models/dbkoneksi.php';
    require_once 'class_siswa.php';

    // tangkap request element form
    $NIM = $_POST['NIM'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $umur = $_POST['umur'];
    $NIK = $_POST['NIK'];
    $idjurusan = $_POST['jurusan'];
    $foto = $_POST['foto'];
    $tombol = $_POST['submit'];

    // Menyimpan data diatas ke sebuah array
    $data = [
        $NIM,      // ? 1 
        $nama,      // ? 2
        $gender,   // ? 3
        $umur,     // ? 4
        $NIK,      // ? 5
        $idjurusan,   // ? 6
        $foto       // ? 7
    ];

    // proses
    $obj = new Mahasiswa($dbh);
    // $obj->simpan($data);
    switch ($tombol) {
        case 'simpan';
            $obj->simpan($data);
            break;
        case 'ubah';
            $data[] = $_POST['idx']; //tangkap hidden field u/ ? ke-8
            $obj->ubah($data);
            break;
        case 'hapus';
        $id[] = $_POST['idx']; //tangkap ke-1 where id=?
        $obj->hapus($id);
        break;  
        default://tombol batal
        header('Location://localhost/Belajar_PHP/p13/PA_PHP/crud_1/crud_1/index.php?hal=DataBarang');
            break;
    }



    // Landing Page
    header('Location://localhost/Belajar_PHP/p13/PA_PHP/crud_1/crud_1//index.php');

?>