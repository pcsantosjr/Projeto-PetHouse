<?php

namespace App\Model\Product;

class Product {
    private $id;
    private $name;
    private $price;
    private $image;

    public function setId ($id) {
        if (!is_int ($id)){
            throw new \invalidArgumentException ("Id precisa ser um número inteiro");
        }
        $this->id = $id;
    }

    public function setName ($name) {
        if (!is_string ($name)){
            throw new \invalidArgumentException ("É obrigatório ter um nome");
        }
        $this->name = $name;
    }

    public function setPrice ($price) {
        if (!is_float ($price)){
            throw new \invalidArgumentException ("Preço precisa ser um Float");
        }
        $this->price = $price;
    }

    public function setImage ($image) {
        if (!is_string ($image)){
            throw new \invalidArgumentException ("É obrigatório a imagem ter um nome");
        }
        $this->image = $image;
    }

    public function getId (){
        return $this->id;
    }

    public function getName (){
        return $this->name;
    }

    public function getPrice (){
        return $this->price;
    }

    public function getImage (){
        return $this->image;
    }
}
?>