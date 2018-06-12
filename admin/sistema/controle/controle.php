<?PHP
date_default_timezone_set('America/Sao_Paulo');
include_once 'sistema/conexoes/conexao.php';

class Controle extends Conexao
{

    /*****Limpa nome para url ******/
    public function urlClear($link)
    {
        $link = strtolower($link);
        $link = urlencode($link);
        $link = str_replace('+', '-', $link);
        return $link;
    }

    /*****Protege as páginas restritas do front*****/
    public
    function protegeFront()
    {
        $this->query("SELECT * FROM acompanhantes WHERE email = '" . $_SESSION['ciagp-login'] . "' AND senha = '" . $_SESSION['ciagp-senha'] . "' AND excluido = 0 AND STATUS > 0");
        $login = $this->conta_resultado();
        if ($login >= 1) {
            return true;
        } else {
            session_destroy();
            exit('<br />Faça login para continuar.');
        }
    }

    /*****Login front*****/
    public
    function doLogin($login, $senha)
    {
        $this->query("SELECT * FROM bj_usuario WHERE email = '" . $login . "' AND excluido = 0 ");
        $contausuarios = $this->conta_resultado();
        $usuarios = $this->recebe_resultado();
        if ($contausuarios >= 1) {
            foreach ($usuarios as $usuario) {
                if (crypt($senha, $usuario['senha']) == $usuario['senha']) {
                    $_SESSION['senha'] = $usuario['senha'];
                    $_SESSION['email'] = $login;
                    $_SESSION['id'] = $usuario['id'];
                } else {
                    echo 'Senha incorreta.<meta http-equiv="refresh" content="2; url=/" />';
                }
            }
        } else {
            echo 'Nome de usuário incorreto.<meta http-equiv="refresh" content="2; url=/" />';
        }
    }

    /*****Logout front*****/
    public
    function logoutFront()
    {
        session_destroy();
        echo 'Você foi desconectado.<meta http-equiv="refresh" content="2; url=/" />';
    }

    /*****Busca informação específica da tabela específica*****/
    public
    function getInformacao($id, $parte, $tabela)
    {
        $this->query("SELECT * FROM " . $tabela . " WHERE excluido = 0 AND id = " . $id);
        $informacoes = $this->recebe_resultado();

        foreach ($informacoes as $informacao) {
            return utf8_encode($informacao[$parte]);
        }
    }

    public
    function getUsuarios()
    {
        $this->query("SELECT * FROM usuarios WHERE excluido = 0");
        $usuarios = $this->recebe_resultado();

        foreach ($usuarios as $usuario) {
            echo '<tr>
                  <td>'. $usuario["id"] .'</td>
                  <td>'. utf8_encode($usuario["nome"]) .'</td>
                  <td>'. $usuario["email"] .'</td>
                  <td>
                  <a href="cadastrar-usuarios.php?ac=' . $usuario["id"] . '"><i class="fa fa-pencil"></i> </a>
                  <a href="#"><i class="fa fa-trash"></i></a>
                  </td>
                  </tr>';
        }
    }

    public
    function getTransportadoras()
    {
        $this->query("SELECT * FROM transportadoras WHERE excluido = 0");
        $transporta = $this->recebe_resultado();

        foreach ($transporta as $transp) {
            echo '<tr>
                  <td>'. $transp["id"] .'</td>
                  <td>'. utf8_encode($transp["nome"]) .'</td>
                  <td><a href="'. $transp["link"].'" target="_blank">Site da Transportadora</a> </td>
                  <td>'. $transp["valor"] .'</td>
                  <td>
                  <a href="cadastrar-transportadoras.php?ac=' . $transp["id"] . '"><i class="fa fa-pencil"></i> </a>
                  <a href="#"><i class="fa fa-trash"></i></a>
                  </td>
                  </tr>';
        }
    }

    public
    function getClientes()
    {
        $this->query("SELECT * FROM clientes WHERE excluido = 0");
        $clientes = $this->recebe_resultado();

        foreach ($clientes as $cliente) {
            echo '<tr>
                  <td>'. $cliente["id"] .'</td>
                  <td>'. utf8_encode($cliente["nome"]) .'</td>
                  <td>'. utf8_encode($cliente["email"]) .'</td>
                  <td>'. $cliente["telefone"] .'</td>
                  
                  </tr>';
        }
    }

    /*****Cadastra novo atributo para anunciante específica*****/
    public
    function registraTransp($nome, $link, $telefone, $valor)
    {
        $this->query("INSERT INTO transportadoras (nome, link, telefone, valor) VALUES (:nome, :link, :telefone, :valor)");
        $this->ligar(':nome', $nome);
        $this->ligar(':link', $link);
        $this->ligar(':telefone', $telefone);
        $this->ligar(':valor', $valor);
        if ($this->executar()) {
            return true;
        } else {
            return false;
        }
    }

    /*****Atualiza cadastro do atributo da anunciante específica*****/
    public
    function atualizaTransp($id, $nome, $link, $telefone, $valor)
    {
        $this->query("UPDATE transportadoras SET nome = :nome, link = :link, telefone = :telefone, valor = :valor WHERE id = " . $id);
        $this->ligar(':nome', $nome);
        $this->ligar(':link', $link);
        $this->ligar(':telefone', $telefone);
        $this->ligar(':valor', $valor);
        if ($this->executar()) {
            return true;
        } else {
            return false;
        }
    }

    /*****Cadastra novo usuário*****/
    public
    function registraUsuario($nome, $email, $senha)
    {
        $this->query("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $this->ligar(':nome', $nome);
        $this->ligar(':email', $email);
        $this->ligar(':senha', md5($senha));
        if ($this->executar()) {
            return true;
        } else {
            return false;
        }
    }

    /*****Atualiza cadastro do usuário*****/
    public
    function atualizaUsuario($id, $nome, $email)
    {
        $this->query("UPDATE usuarios SET nome = :nome, email = :email WHERE id = " . $id);
        $this->ligar(':nome', $nome);
        $this->ligar(':email', $email);
        if ($this->executar()) {
            return true;
        } else {
            return false;
        }
    }

    /*****Marca o item específico de uma tabela específica como excluído*****/
    public
    function marcaExclusao($id, $tabela)
    {
        $this->query("UPDATE " . $tabela . " SET excluido='1' WHERE id=" . $id);
        if ($this->executar()) {
            return true;
        } else {
            return false;
        }
    }

    /*****Protege o sistema administrativo*****/
    public
    function protegePagina()
    {
        $this->query("SELECT * FROM usuarios WHERE email = '" . $_SESSION['login'] . "' AND senha = '" . $_SESSION['senha'] . "' AND excluido = 0");
        $login = $this->conta_resultado();
        if ($login >= 1) {
            return true;
        } else {
            exit('Deu erro amigo!!! Nome de usuário ou senha incorretos.<meta http-equiv="refresh" content="2; url =/admin/ " />');
        }
    }

    /*****Login administrativo*****/
    public
    function login($login, $senha)
    {
        $this->query("SELECT * FROM usuarios WHERE email = '" . $login . "' AND senha = '" . md5($senha) . "' AND excluido = 0");
        $contausuarios = $this->conta_resultado();
        $usuarios = $this->recebe_resultado();
        if ($contausuarios >= 1) {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = md5($senha);
            foreach ($usuarios as $usuario) {
                $_SESSION['userlevel'] = $usuario['funcao'];
                $_SESSION['useridadmin'] = $usuario['id'];
            }
        } else {
            exit('Ta errado ai amigao.<meta http-equiv="refresh" content="2; url =     " />');
        }
    }


    /********Nome de arquivo aleatório********/
    function random_string($length)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

}//fecha classe
