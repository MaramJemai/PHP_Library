<?php
    require_once("connexion.php");
    class teaches extends cnx {
        private $id_prof;
        private $id_subject;
       

        public function getid_prof(){
            return $this->id_prof;
        }
       
        public function getid_subject(){
            return $this->id_subject;   
        }
        
        public function ajouter(){
            $q = "INSERT INTO teaches (id_prof ,id_subject) VALUES ('$this->id_prof','$this->id_subject')";
            $stmt = $this->connexion()->exec($q);
            if(!$stmt)
                {echo('echec insertion'.$this->connexion()->errorInfo());
                return 'you are already teaching this subject !';}
            else{
                $r= 1;
                return $r;
            }
        }
        public function getAll(){
            $res=$this->connexion()->query("SELECT * from teaches");
            $les_taches= $res->fetchAll();
            return $les_taches;
        }
        public function getByP($id_prof){
            $res=$this->connexion()->query("SELECT * from teaches where id_prof = $id_prof");
            $les_taches= $res->fetchAll();
            return $les_taches;
        } public function getByS($id_subject){
            $res=$this->connexion()->query("SELECT * from teaches where id_subject=$id_subject");
            $les_taches= $res->fetchAll();
            return $les_taches;
        }
        public function supprimer($id_prof , $id_subject){
            $q="DELETE FROM teaches WHERE id_prof = $id_prof and id_subject = $id_subject";
            $stmt=$this->connexion()->exec($q);
            if(!$stmt)
                echo('echec de suppression'.$this->connexion()->errorInfo());
            else 
            return $stmt;
        }
 
        public function modifier($id_prof , $id_subject){
            $s=$this->getid_subject();
            $q="UPDATE teaches SET subject_id='$s' WHERE id_prof=$id_prof and id_subject=$id_subject";
            $stmt=$this->connexion()->exec($q);
            return $stmt;
        }
    }
?>