<?php

class Moto
{
    private $id;
    private $marca;
    private $modelo;
    private $ano;
    private $cilindradas;
    private $preco;

    public function __construct($marca = "", $modelo = "", $ano = 0, $cilindradas = 0, $preco = 0.0)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->cilindradas = $cilindradas;
        $this->preco = $preco;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function getModelo()
    {
        return $this->modelo;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function getAno()
    {
        return $this->ano;
    }
    public function setAno($ano)
    {
        $this->ano = $ano;
    }
    public function getCilindradas()
    {
        return $this->cilindradas;
    }
    public function setCilindradas($cilindradas)
    {
        $this->cilindradas = $cilindradas;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
}