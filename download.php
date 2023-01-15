<?php
    require_once("connexion.php");
    class download extends cnx {
        private $id_user;
        private $id_doc;
        private $date;

        public function getid_user(){
            return $this->id_user;   
        }
        public function setid_user($user){
            $this->id_user=$user;
        }  
        public function getid_doc(){
            return $this->id_doc;    
        }
        public function setid_doc($doc){
            $this->id_doc=$doc;
        }
        public function getdate(){
            return $this->date;   
        }
        public function setdate($d){
            $this->date=$d;
       }

        public function add(){
            if(!isset($this->id_user)  ||!isset($this->id_doc) || !isset($this->date) )
            return false;
            $q = "INSERT INTO download (id_user,id_doc ,date) VALUES ('$this->id_user','$this->id_doc','$this->date')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function editAll(){
            $res=$this->connexion()->query("SELECT * from download");
            $downloads= $res->fetchAll();
            return $downloads;
        }
        public function getByU($id_u){
            $q = "SELECT * FROM download WHERE id_user = $id_u ";
            $res = $this->connexion()->query($q);
            $downloads=$res->fetchAll();
            return $downloads;
        }
        public function getByUD($id_u,$id_d){
            $q = "SELECT * FROM download WHERE id_user = $id_u and id_doc=$id_d";
            $res = $this->connexion()->query($q);
            $downloads=$res->fetchAll();
            return $downloads;
        }
        public function edit($id_u,$id_d){
            $d=$this->getdate();
            $q="UPDATE download SET  date='$d' WHERE id_user = $id_u and id_doc = $id_d";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }

        public function getByD($id_doc)
        {
        $res=$this->connexion()->query("SELECT * FROM download where id_doc=$id_doc");
        $downloads=$res->fetchAll();
        return $downloads ;
        }

    }
?>