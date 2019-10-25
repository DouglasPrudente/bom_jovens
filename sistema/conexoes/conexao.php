<?php
include 'sistema/configuracoes/base.php';

class Conexao extends Base
{
    private $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {

        // Defini DSN
        $dsn = 'mysql:host=' . $this->hospedagem . ';dbname=' . $this->base;
        // Defini Opções
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
    }

    // Query responsável por qualquer função de insert no banco (insert, update, drop, alter)
    public
    function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    //Ligar =  responsavel pela junção de variáveis com os valores do banco
    public
    function ligar($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //Responsável pela execução do query no banco
    public
    function executar()
    {
        return $this->stmt->execute();
    }

    // Pega o Ultimo cadastro do banco (não está sendo executado)
    public
    function lastInsertId()
    {
        $this->dbh->lastInsertId();
    }

    // Responsável por select do banco (seleciona os dados da tabela)
    public
    function recebe_resultado()
    {
        $this->executar();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Respon´svel pela contagem do resultado
    public
    function conta_resultado()
    {
        $this->executar();
        return $this->stmt->rowCount();
    }
}