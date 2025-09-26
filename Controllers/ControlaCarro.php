<?php

require_once '../Others/Database.php';
require_once '../Models/Carro.php';

class ControlaCarro
{

    private $tabela = 'carros';
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }

    public function salvar(Carro $carro)
    {
        try {
            $sql = "INSERT INTO $this->tabela (marca, modelo, ano, cor, placa, preco) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                $carro->getMarca(),
                $carro->getModelo(),
                $carro->getAno(),
                $carro->getCor(),
                $carro->getPlaca(),
                $carro->getPreco()
            ]);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao inserir carro: " . $e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $sql = "SELECT * FROM $this->tabela";
            $stmt = $this->connection->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $carros = [];
            foreach ($rows as $row) {
                $c = new Carro($row['marca'], $row['modelo'], $row['ano'], $row['cor'], $row['placa'], $row['preco']);
                $c->setId($row['id']); 
                $carros[] = $c;
            }
            
            return $carros;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao listar carros: " . $e->getMessage());
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir carro: " . $e->getMessage());
        }
    }

    public function buscarPorId($id)
    {
        try {
            $sql = "SELECT * FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                return null; 
            }

            $c = new Carro($row['marca'], $row['modelo'], $row['ano'], $row['cor'], $row['placa'], $row['preco']);
            $c->setId($row['id']);
            return $c;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao buscar carro: " . $e->getMessage());
        }
    }

    public function atualizar(Carro $carro)
    {
        try {
            $sql = "UPDATE $this->tabela SET marca = ?, modelo = ?, ano = ?, cor = ?, placa = ?, preco = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                $carro->getMarca(),
                $carro->getModelo(),
                $carro->getAno(),
                $carro->getCor(),
                $carro->getPlaca(),
                $carro->getPreco(),
                $carro->getId()
            ]);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar carro: " . $e->getMessage());
        }
    }
}