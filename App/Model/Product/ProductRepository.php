<?php

namespace App\Model\Product;

interface ProductRepository {

    public function getProducts();
    public function getProductsByTypeOfProduct($typeOfProduct);
    public function getProduct($id);
}
?>