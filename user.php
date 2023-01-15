<?php
    require_once("connexion.php");
    class user extends cnx {
        private $id;
        private $first_name;
        private $last_name;
        private $departement;
        private $email;
        private $role;
        private $image;
        private $passwd;
        private $verified;
 

        public function getId(){
            return $this->id;
        }
        public function getfirst_name(){
            return $this->first_name;   
           }
           public function setfirst_name($n){
            $this->first_name=$n;
            }
            public function setfirstname($n){
                $this->first_name=$n;
                }
        public function getlast_name(){
            return $this->last_name;   
        }
        public function setlast_name($l){
            $this->last_name=$l;
       }
       public function setlastname($l){
        $this->last_name=$l;
   }
        public function getdepartement(){
            return $this->departement;   
        }
        public function setdepartement($d){
            $this->departement=$d;
       }
        public function getemail(){
            return $this->email;    
        }
        public function setemail($e){
            $this->email=$e;
        }
        public function getrole(){
            return $this->role;    
        }
        public function setrole($r){
            $this->role=$r;
        }
        public function getimage(){
            return $this->image;    
        }
        public function setimage($i){
            $this->image=$i;
        }
        public function getpasswrd(){
            return $this->passwd;    
        }
        public function setpasswrd($p){
            $this->passwd=$p;
        }
        public function getverified(){
            return $this->verified;    
        }
        public function setverified($v){
            $this->verified=$v;
        }
        public function ajouter(){
            if(!isset($this->first_name) || !isset($this->last_name) ||!isset($this->departement) ||!isset($this->email)|| !isset($this->passwd) ||!isset($this->role) )
            return false;
            $q = "INSERT INTO user (first_name, last_name, departement, email, password , role , verified) VALUES ('$this->first_name','$this->last_name','$this->departement','$this->email','$this->passwd' , '$this->role' , '$this->verified')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                echo('echec insertion'.$this->connexion()->errorInfo());
            else{
                $r= 1;
                return $r;
            }
        }
        public function getAll(){
            $res=$this->connexion()->query("SELECT * from user");
            //Extraire (fech) toutes les lignes 
            $users= $res->fetchAll();
            return $users;
        }

        public function getAllDesc(){
            $res=$this->connexion()->query("SELECT * from user order by id desc");
            //Extraire (fech) toutes les lignes 
            $users= $res->fetchAll();
            return $users;
        }
        public function delete($id){
            $q="DELETE FROM user WHERE id = $id";
            $stmt=$this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }
        public function getBy($id){
            $q = "SELECT * FROM user WHERE id=$id";
            $res = $this->connexion()->query($q);
            $user=$res->fetch();
            return $user;
        }
        public function edit($id){
            $fn=$this->getfirst_name();
            $ln=$this->getlast_name();
            $i=$this->getimage();
            $e=$this->getemail();
            $p=$this->getpasswrd();
            $q="UPDATE user SET first_name='$fn' , last_name='$ln'  ,  email='$e' , image='$i', password='$p' WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
        public function modif($id){
            $v = "verified";
            $q="UPDATE user SET verified='$v' WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }

        public function getAllByVerified(){
            $v = "unverified";
            $res=$this->connexion()->query("SELECT * from user where verified='$v' " );
            $users=$res->fetchAll();
            return $users;
        }
/*
        public function getE($email){
            $q = "SELECT * FROM user WHERE email=$email";
            $res = $this->connexion()->query($q);
            $user=$res->fetch();
            return $user;
        }*/

    }
?>