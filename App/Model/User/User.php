<?php

namespace App\Model\User;

class User {
    private $id;
    private $username;
    private $name;
    private $cpf;
    private $email;
    private $telephone;
    private $cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $complemento;
    private $cidade;
    private $estado;

    public function setId ($id) {
        if (!is_int ($id)){
            throw new \invalidArgumentException ("Id precisa ser um número inteiro");
        }
        $this->id = $id;
    }

    public function setUserName ($username) {
        if (!is_string ($username)){
            throw new \invalidArgumentException ("É obrigatório ter um nom de usuário");
        }
        $this->username = $username;
    }

    public function setName ($name) {
        if (!is_string ($name)){
            throw new \invalidArgumentException ("É obrigatório ter um nome");
        }
        $this->name = $name;
    }

    public function setCPF ($cpf) {
        if (!is_string ($cpf)){
            throw new \invalidArgumentException ("É obrigatório ter um CPF");
        }
        $this->cpf = $cpf;
    }

    public function setEmail ($email) {
        if (!is_string ($email)){
            throw new \invalidArgumentException ("É obrigatório ter um e-mail");
        }
        $this->email = $email;
    }

    public function setTelephone ($telephone) {
        if (!is_string ($telephone)){
            throw new \invalidArgumentException ("É obrigatório ter um telefone");
        }
        $this->telephone = $telephone;
    }

    public function setCEP ($cep) {
        if (!is_string ($cep)){
            throw new \invalidArgumentException ("É obrigatório ter um CEP");
        }
        $this->cep = $cep;
    }

    public function setEndereco ($endereco) {
        if (!is_string ($endereco)){
            throw new \invalidArgumentException ("É obrigatório ter um endereço");
        }
        $this->endereco = $endereco;
    }

    public function setNumero ($numero) {
        if (!is_string ($numero)){
            throw new \invalidArgumentException ("É obrigatório ter um número");
        }
        $this->numero = $numero;
    }

    public function setBairro($bairro) {
        if (!is_string ($bairro)){
            throw new \invalidArgumentException ("É obrigatório ter um bairro");
        }
        $this->bairro = $bairro;
    }

    public function setComplemento ($complemento) {
        if (!is_string ($complemento)){
            throw new \invalidArgumentException ("É obrigatório ter um complemento");
        }
        $this->complemento = $complemento;
    }

    public function setCidade ($cidade) {
        if (!is_string ($cidade)){
            throw new \invalidArgumentException ("É obrigatório ter um cidade");
        }
        $this->cidade = $cidade;
    }

    public function setEstado ($estado) {
        if (!is_string ($estado)){
            throw new \invalidArgumentException ("É obrigatório ter um estado");
        }
        $this->estado = $estado;
    }

    public function getId (){
        return $this->id;
    }

    public function getUserName (){
        return $this->username;
    }

    public function getName (){
        return $this->name;
    }

    public function getCpf (){
        return $this->cpf;
    }
    
    public function getEmail (){
        return $this->email;
    }

    public function getTelephone (){
        return $this->telephone;
    }

    public function getCep (){
        return $this->cep;
    }

    public function getEndereco (){
        return $this->endereco;
    }

    public function getNumero (){
        return $this->numero;
    }

    public function getBairro (){
        return $this->bairro;
    }

    public function getComplemento (){
        return $this->complemento;
    }

    public function getCidade (){
        return $this->cidade;
    }

    public function getEstado (){
        return $this->estado;
    }



}
?>