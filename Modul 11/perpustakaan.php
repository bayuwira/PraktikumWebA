<?php
    class Perpustakaan{
        private $mysqli;
        public function __construct($conn)
        {
            $this->mysqli = $conn;
        }

        public function lihat($id=null){
            $db = $this->mysqli->connection;
            $sql = "SELECT * FROM buku";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
        public function lihat_sorting($sort,$field){
            $db = $this->mysqli->connection;
            $sql = "SELECT * FROM buku ORDER BY $field $sort";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
        public function lihat_filter($q,$column){
            $db = $this->mysqli->connection;
            $sql = "SELECT * FROM buku WHERE $column LIKE '%$q%'";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>