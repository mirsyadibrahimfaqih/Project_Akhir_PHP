<?php
class Mahasiswa {
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
        $sql = "INSERT INTO mahasiswa(NIM,nama,gender,umur,NIK,idjurusan,foto)
                VALUES (?,?,?,?,?,?,?)";
        // prepare statement PDO
        $ps = $this->dbh->prepare($sql); 
        $ps->execute($data);
    }

    public function getMahasiswa($id){
        $sql = "SELECT mahasiswa.*, jurusan.nama AS kategori FROM mahasiswa INNER JOIN jurusan ON jurusan.id = mahasiswa.idjurusan WHERE mahasiswa.id = ?";
        // prepare statement PDO
        $ps = $this->dbh->prepare($sql); 
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function ubah($data){
            $sql = "UPDATE mahasiswa SET NIM=?, nama=?, gender=?, umur=?, NIK=?, idjurusan=?, foto=? WHERE id=?";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($data);
        }

        public function hapus($id){
            $sql = "DELETE FROM mahasiswa WHERE id=?";
            // prepare statement PDO
            $ps = $this->dbh->prepare($sql); 
            $ps->execute($id);
        }
}
?>