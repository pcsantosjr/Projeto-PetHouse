<?php

namespace App\Model\User;

class UserRepositoryPDO implements UserRepository{
    private $pdo;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getUsers(){
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\User\User');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUser(){
        $id = isset($_SESSION['id']) ?  $_SESSION['id'] : 8;
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\User\User');
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>