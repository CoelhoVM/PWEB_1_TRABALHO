<?php

class db {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    private $dbname = "db_pweb1_secret_recipe";
    private $table_name;

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        return $this->conn();
    }

    function conn()
    {
        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );
            return $conn;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function store($dados)
    {
        unset($dados['id']); // remove o campo id
        $conn = $this->conn();

        $sql = "INSERT INTO $this->table_name (";
        $flag = 0;
        $arrayDados = [];

        foreach ($dados as $campo => $valor) {
            if ($flag == 0) {
                $sql .= "$campo";
            } else {
                $sql .= ", $campo";
            }
            $flag = 1;
        }

        $sql .= ") VALUES (";
        $flag = 0;

        foreach ($dados as $campo => $valor) {
            if ($flag == 0) {
                $sql .= "?";
            } else {
                $sql .= ", ?";
            }
            $flag = 1;
            $arrayDados[] = $valor;
        }

        $sql .= ")";
        $st = $conn->prepare($sql);
        $st->execute($arrayDados);
    }

    public function update($dados)
    {
        $id = $dados['id'];
        unset($dados['id']);
        $conn = $this->conn();

        $sql = "UPDATE $this->table_name SET ";
        $flag = 0;
        $arrayDados = [];

        foreach ($dados as $campo => $valor) {
            if ($flag == 0) {
                $sql .= "$campo = ?";
            } else {
                $sql .= ", $campo = ?";
            }
            $flag = 1;
            $arrayDados[] = $valor;
        }

        $sql .= " WHERE id = ?";
        $arrayDados[] = $id;

        $st = $conn->prepare($sql);
        $st->execute($arrayDados);
    }

    public function find($id)
    {
        $conn = $this->conn();

        $sql = "SELECT * FROM $this->table_name WHERE id = ?";
        $st = $conn->prepare($sql);
        $st->execute([$id]);

        return $st->fetchObject();
    }

    public function all()
    {
        $conn = $this->conn();

        $sql = "SELECT * FROM $this->table_name";

        $st = $conn->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS);
    }

    public function destroy($id)
    {
        $conn = $this->conn();

        $sql = "DELETE FROM $this->table_name WHERE id = ?";

        $st = $conn->prepare($sql);
        $st->execute([$id]);

        return $st->fetchAll(PDO::FETCH_CLASS);
    }

    public function search($dados)
    {
        $campo = $dados['tipo'];
        $valor = $dados['valor'];

        $conn = $this->conn();

        $sql = "SELECT * FROM $this->table_name WHERE $campo LIKE ?";

        $st = $conn->prepare($sql);
        $st->execute(["%$valor%"]);

        return $st->fetchAll(PDO::FETCH_CLASS);
    }

   public function login($dados)
    {
        $conn = $this->conn();

        $sql = "SELECT * FROM $this->table_name WHERE email = ?";
        $st = $conn->prepare($sql);
        $st->execute([$dados['email']]);

        $result = $st->fetchObject();

        // Verifica se encontrou usuário e compara a senha
        if ($result && password_verify($dados['senha'], $result->senha)) {
            return $result;
        } else {
            return "error";
        }
    }


    function checkLogin()
    {
        session_start();

        if (empty($_SESSION['email'])) {
            session_destroy();
            header('Location: ../../index.php?error=Sessao Expirada!');
            exit;
        }
    }

    public function ingredientesPorReceita($id_receita) 
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM ingredientes WHERE id_receita = ?";
        $st = $conn->prepare($sql);
        $st->execute([$id_receita]);
        return $st->fetchAll(PDO::FETCH_OBJ);
    }

}
?>
