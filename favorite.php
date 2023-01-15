<?php
require_once("connexion.php");
class favorite extends cnx {
    private $id_user;
    private $id_doc;
    private $date;
    public function getid_user()
    {
        return $this->id_user;
    }
    public function setid_user ($user)
    {
        $this->id_user=$user;
    }
    public function getid_doc ()
    {
        return $this->id_doc;
    }
    public function setid_doc ($doc)
    {
        $this->id_doc=$doc;
    }
    public function getdate ()
    {
        return $this->date;
    }
    public function setdate ($d)
    {
        $this->date=$d;
    }
    public function add()
    {
        $q="INSERT INTO favorite (id_user , id_doc ,date ) VALUES( '$this->id_user' , '$this->id_doc' , '$this->date' )";
        $stmt=$this->connexion()->exec($q);
        if(!$stmt)
            return ('echec insertion'.$this->connexion()->errorInfo());

            
    }
    public function getAll()
    {
        $res=$this->connexion()->query("SELECT * FROM favorite ");
        $favorites=$res->fetchAll();
        return $favorites ;
    }
    public function getByD($id_doc)
    {
        $res=$this->connexion()->query("SELECT * FROM favorite where id_doc=$id_doc");
        $favorites=$res->fetchAll();
        return $favorites ;
    }
    public function getByU($id_user)
    {
        $res=$this->connexion()->query("SELECT * FROM favorite where id_user=$id_user");
        $favorites=$res->fetchAll();
        return $favorites ;
    }
    
    public function delete($id_user , $id_doc)
    {
        $q="DELETE FROM favorite WHERE id_user=$id_user and id_doc=$id_doc";
        $stmt=$this->connexion()->exec($q);
        if(!$stmt)
            echo ('echec de suppression '.$this->connexion()->errorInfo());
        else
            return $stmt ;
    }

    public function getOne( $id_doc){
        $res=$this->connexion()->query("SELECT * FROM favorite where id_doc=$id_doc");
        $favorites=$res->fetchAll();
        return $favorites;
    }
    public function getById($id_user,$id_doc)
    {
        $res=$this->connexion()->query("SELECT * FROM favorite WHERE id_user=$id_user and id_doc=$id_doc");
        $fav=$res->fetch();
        return $fav;
    }


}
?>

