<?php
class Jurusan {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function getAllMahasiswa() {
        $sql = "SELECT * FROM mahasiswa"; // Specify the columns you want to select
        $rs = $this->dbh->query($sql);
        return $rs;
    }

    public function getAllJurusanMahasiswa() {
        $sql = "SELECT * FROM jurusan"; // Specify the columns you want to select
        $rs = $this->dbh->query($sql);
        return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO jurusan(nama)
                VALUES (?)";
        // prepare statement PDO
        $ps = $this->dbh->prepare($sql); 
        $ps->execute($data);
    }

    public function getJurusan($id){
        $sql = "SELECT jurusan.*, jurusan.nama AS kategori FROM jurusan WHERE jurusan.id = ?";
        // prepare statement PDO
        $ps = $this->dbh->prepare($sql); 
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function ubah($data){
            $sql = "UPDATE jurusan SET nama=? WHERE id=?";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($data);
        }

        public function hapus($id){
            $sql = "DELETE FROM jurusan WHERE id=?";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($id);
        }
}
?>