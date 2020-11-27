<?php

namespace App\Model\Product;

class ProductRepositoryPDO implements ProductRepository{
    private $pdo;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getProducts(){
        $stmt = $this->pdo->prepare("SELECT id, name , price , image FROM product");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Product\Product');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductsByTypeOfProduct($typeOfProduct){
        $stmt = $this->pdo->prepare("SELECT id, name , price , image FROM product WHERE typeOfProduct = :typeOfProduct");
        $stmt->bindValue(":typeOfProduct", $typeOfProduct, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Product\Product');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProduct($id){
        $stmt = $this->pdo->prepare("SELECT id, name , price , image FROM product WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Product\Product');
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>