<?php

namespace App\Controller;

use App\Model\Product\ProductRepository;
use App\Model\User\UserRepository;
use App\Model\Shopping\Cart as ICart;
use App\Model\Shopping\CartItem;
use App\Mvc\Controller;

class Finish extends Controller{
    private $product;
    private $user;
    private $cart;
    
    public function __construct(ProductRepository $product, UserRepository $user, ICart $cart){
        parent:: __construct();
        $this->product = $product;
        $this->user = $user;
        $this->cart = $cart;
    }
    
    public function index(){
        $this->view->set('cartTotal', $this->cart->getTotal());
        $this->view->set('cartItems', $this->cart->getCartItems());
        $this->view->set('user', $this->user->getUser());
        $this->view->render("Finish");
    }
    
    public function add(){
        if(isset($_POST['id']) && preg_match("/^[0-9]+/", $_POST['id'])){
            $product = $this->product->getProduct($_POST['id']);
            $cartItem = new CartItem($product, 1);
            $this->cart->add($cartItem);
        }
        header("Location: index.php?page=cart");
    }

    public function update(){
        if(isset($_POST['id']) && preg_match("/^[0-9]+/", $_POST['id'])){
            $product = $this->product->getProduct($_POST['id']);
            $cartItem = new CartItem($product, $_POST['quantity']);
            $this->cart->update($cartItem);
        }
        header("Location: index.php?page=cart");
    }

    public function delete(){
        if(isset($_GET['id']) && preg_match("/^[0-9]+/", $_GET['id'])){
            $this->cart->delete($_GET['id']);
        }

        if(count($this->cart->getCartItems()) == 0){
            header("Location: index.php?page=home");
        }
        else {
            header("Location: index.php?page=cart");
        }  
    }
}
?>