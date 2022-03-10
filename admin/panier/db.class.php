<?php 
    class DB{
        private $host = 'localhost';
        private $username = 'remacons';
        private $pass = 'K330D)A.dbn2Rc';
        private $database = 'remacons_zinira';
        private $db;

        public function __construct($host=null, $username=null, $pass=null, $database=null){
            if($host != null){
                $this->host = $host;
                $this->username = $username;
                $this->pass = $pass;
                $this->database = $database;
            }
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8', ''.$this->username.'', ''.$this->pass.'', array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
        }

        public function query($sql, $data = array()){
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>