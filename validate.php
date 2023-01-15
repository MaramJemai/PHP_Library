<?php
    require_once("connexion.php");
    class validate extends cnx {
        private $id_prof;
        private $id_doc;
        private $valid;
        public function getid_prof(){
            return $this->id_prof;
        }
        public function getid_doc(){
            return $this->id_doc;   
           }
        public function getvalid(){
            return $this->valid;   
        }
        public function setvalid($l){
            $this->valid=$l;
       }
        public function ajouter(){
            if(!isset($this->id_prof) || !isset($this->valid)  )
            return false;
            $q = "INSERT INTO validate (id_prof,id_doc, valid) VALUES ('$this->id_prof','$this->id_doc','$this->valid')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function getAll(){
            $res=$this->connexion()->query("SELECT * from validate");
            $validated= $res->fetchAll();
            return $validated;
        }
        public function supprimer($id_prof){
            $q="DELETE FROM validate WHERE id_prof = $id_prof";
            $stmt=$this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }
        public function editBy($id_prof){
            $q = "SELECT * FROM validate WHERE id_prof=$id_prof";
            $res = $this->connexion()->query($q);
            $validated=$res->fetch();
            return $validated;
        }
        public function alter($id_prof , $id_doc){
            $ln=$this->getvalid();
            $q="UPDATE validate SET valid='$ln'  WHERE id_prof=$id_prof and id_doc=$id_doc";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
    }
?>