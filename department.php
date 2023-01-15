<?php
    require_once("connexion.php");
    class department extends cnx {
        private $id;
        private $name;

        public function getId(){
            return $this->id;
        }
        public function getname(){
            return $this->name;   
        }
        public function setname($n){
            $this->name=$n;
        }

        public function add(){
            $q="INSERT INTO department (name  ) VALUES( '$this->name')";
        $stmt=$this->connexion()->exec($q);
        if(!$stmt)
            return ('echec insertion'.$this->connexion()->errorInfo());
        }
        public function getAll(){
            $res=$this->connexion()->query("SELECT * from department");
            $departments= $res->fetchAll();
            return $departments;
        }
        public function delete($id){
            $q="DELETE FROM department WHERE id = $id";
            $stmt=$this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }
        public function getBy($id){
            $q = "SELECT * FROM department WHERE id=$id";
            $res = $this->connexion()->query($q);
            $department=$res->fetch();
            return $department;
        }
        public function edit($id){
            $n=$this->getname();
            $q="UPDATE department SET name='$n' WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
    }
?>