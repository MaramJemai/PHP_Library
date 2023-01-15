<?php
    require_once("connexion.php");
    class document extends cnx {
        private $id;
        private $id_user;
        private $title;
        private $description;
        private $date;
        private $image;
        private $doc;
        private $subject;
        private $department;
        private $level;
        private $verified;
        private $deleted;

        public function getId(){
            return $this->id;
        }
        public function getIdUser(){
            return $this->id_user;
        }
        public function setidu($idu){
            $this->id_user=$idu;
        }
        public function getdescription(){
            return $this->description;   
           }
        public function setdescription($de){
            $this->description=$de;
        }
        public function getdate(){
            return $this->date;   
           }
        public function setdate($date){
            $this->date=$date;
        }
        public function getimage(){
            return $this->image;   
           }
        public function setimage($i){
            $this->image=$i;
        }
        public function getdoc(){
            return $this->doc;   
           }
        public function setdoc($doc){
            $this->doc=$doc;
        }
        public function gettitle(){
            return $this->title;   
           }
        public function settitle($t){
            $this->title=$t;
        }   
        public function getsubject(){
            return $this->subject;    
        }
        public function setsubject($s){
            $this->subject=$s;
        }
        public function getdepartment(){
            return $this->department;   
        }
        public function setdepartment($d){
            $this->department=$d;
       }
        public function getlevel(){
            return $this->level;    
        }
        public function setlevel($l){
            $this->level=$l;
        }

        public function getverified(){
            return $this->verified;    
        }
        public function setverified($v){
            $this->verified=$v;
        }

        public function getdeleted(){
            return $this->deleted;    
        }
        public function setdeleted($d){
            $this->deleted=$d;
        }

        public function add() { // Ajouter d'un colonne
            if (!isset($this->title) || !isset($this->description) || !isset($this->date)  || !isset($this->image) || !isset($this->doc) ||
            !isset($this->subject) || !isset($this->department) || !isset($this->level) ) {
                return false;
            }
            $q = "INSERT INTO document(id_user, title, description,date,image,doc,department, subject, level,verified,deleted)
             VALUES ('$this->id_user', '$this->title', '$this->description', '$this->date', '$this->image', '$this->doc', '$this->department', '$this->subject', '$this->level', '$this->verified', '$this->deleted')";
            $stmt = $this->connexion()->exec($q);
            if (!$stmt) {
                echo 'echec insertion '.$this->connexion()->errorInfo();
                return 0;
            } else {
                $r = 1; // id d'enregistrement ajouté
                return $r;
            }
        }

        public function getByTitle($title){
            $q = "SELECT * FROM document WHERE title=$title";
            $res = $this->connexion()->query($q);
            if (!$res) {
                echo 'echec insertion '.$this->connexion()->errorInfo();
                return 0;
            } else {
                $r = 1; // id d'enregistrement ajouté
                return $r;
            }
        }
        public function getAll(){
            $res=$this->connexion()->query("SELECT * from document");
            $les_documents= $res->fetchAll();
            return $les_documents;
        }

        public function delete($id){
           /* $q="DELETE FROM document WHERE id = $id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;*/
            $q="UPDATE document SET deleted='deleted'  WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
        public function getBy($id){
            $q = "SELECT * FROM document WHERE id=$id";
            $res = $this->connexion()->query($q);
            $le_document=$res->fetch();
            return $le_document;
        }

        
        public function edit($id){
            $t=$this->gettitle();
            $des=$this->getdescription();
            $dat=$this->getdate();
            $i=$this->getimage();
            $doc=$this->getdoc();
            $dep=$this->getdepartment();
            $s=$this->getsubject();
            $l=$this->getlevel();
            $q="UPDATE document SET title='$t' ,descreption='$des' ,date='$dat' ,image='$i' ,doc='$doc' ,department='$dep' ,  subject='$s' ,level='$l' WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
        public function getByU($id_u) {
        $res=$this->connexion()->query("SELECT * FROM document where id_user=$id_u and verified='verified' and deleted='not deleted'");
        $documents=$res->fetchAll();
        return $documents ;
         }

         public function getByUDown($id) {
            $res=$this->connexion()->query("SELECT * from document d join download dow on d.id=dow.id_doc where dow.id_user=$id " );
            $documents=$res->fetchAll();
            return $documents;
        }

        public function getByUF($id) {
            $res=$this->connexion()->query("SELECT * from document d join favorite f on d.id=f.id_doc where f.id_user=$id and d.deleted='not deleted'" );
            $documents=$res->fetchAll();
            return $documents;
        }

        public function getOne($id_user , $id_doc){
        $res=$this->connexion()->query("SELECT * from document where id=$id_user and id=$id_doc" );
        $documents=$res->fetchAll();
        $nbr=count($documents);
        if ($nbr>0)
            return true;
        else
            return false;
        }
        public function modif($id){
            $v = "verified";
            $q="UPDATE document SET verified='$v' WHERE id=$id";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }

        public function getAllByVerified(){
            $res=$this->connexion()->query("SELECT * from document where verified='verified' " );
            $documents=$res->fetchAll();
            return $documents;
        }
        public function getAllByUnVerified($d){
            $res=$this->connexion()->query("SELECT * from document where verified='unverified' and department =$d order by id desc " );
            $documents=$res->fetchAll();
            return $documents;
        }
    }
?>