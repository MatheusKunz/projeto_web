<?php
require_once '../Others/Database.php';
require_once '../Models/Moto.php';

class ControlaMoto
{
    private $tabela = 'motos';
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function salvar(Moto $moto)
    {
        try {
            $sql = "INSERT INTO $this->tabela (marca, modelo, ano, cilindradas, preco) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                $moto->getMarca(),
                $moto->getModelo(),
                $moto->getAno(),
                $moto->getCilindradas(),
                $moto->getPreco()
            ]);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao inserir moto: " . $e->getMessage());
        }
    }

    public function listar()
    {
        try {
            $sql = "SELECT * FROM $this->tabela";
            $stmt = $this->connection->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $motos = [];
            foreach ($rows as $row) {
                $m = new Moto($row['marca'], $row['modelo'], $row['ano'], $row['cilindradas'], $row['preco']);
                $m->setId($row['id']);
                $motos[] = $m;
            }

            return $motos;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao listar motos: " . $e->getMessage());
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir moto: " . $e->getMessage());
        }
    }

    public function buscarPorId($id)
    {
        try {
            $sql = "SELECT * FROM $this->tabela WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row)
                return null;

            $m = new Moto($row['marca'], $row['modelo'], $row['ano'], $row['cilindradas'], $row['preco']);
            $m->setId($row['id']);
            return $m;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao buscar moto: " . $e->getMessage());
        }
    }

    public function atualizar(Moto $moto)
    {
        try {
            $sql = "UPDATE $this->tabela SET marca = ?, modelo = ?, ano = ?, cilindradas = ?, preco = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                $moto->getMarca(),
                $moto->getModelo(),
                $moto->getAno(),
                $moto->getCilindradas(),
                $moto->getPreco(),
                $moto->getId()
            ]);
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar moto: " . $e->getMessage());
        }
    }
}