<?php
    require_once("connexion.php");
    class subject extends cnx {
        private $id;
        private $name;
        private $departement;
       

        public function getId(){
            return $this->id;
        }
        public function getname(){
            return $this->name;   
           }
           public function setname($n){
            $this->name=$n;
            }

        public function getdepartement(){
            return $this->departement;   
        }
        public function setdepartement($d){
            $this->departement=$d;
       }
        public function ajouter(){
            if(!isset($this->name)  ||!isset($this->departement)   )
            return false;
            $q = "INSERT INTO subject (name, departement) VALUES ('$this->name','$this->departement')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function editAll(){
            $res=$this->connexion()->query("SELECT * from subject");
            $subjects= $res->fetchAll();
            return $subjects;
        }
        public function supprimer($id){
            $q="DELETE FROM subject WHERE id = $id";
            $stmt=$this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }
        public function getBy($id){
            $q = "SELECT * FROM subject WHERE id=$id";
            $res = $this->connexion()->query($q);
            $subject=$res->fetch();
            return $subject;
        }
        public function modifier($id){
            $n=$this->getname();
            $d=$this->getdepartement();
            $q="UPDATE subject SET name='$n'  , departement='$d' WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
    }
?>