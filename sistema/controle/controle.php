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
        $this->query("SELECT * FROM clientes WHERE email = '" . $_SESSION['login'] . "' AND senha = '" . $_SESSION['senha'] . "' AND excluido = 0");
        $login = $this->conta_resultado();
        if ($login >= 1) {
            return true;
        } else {
            exit('Deu erro amigo!!! Nome de usuário ou senha incorretos.<meta http-equiv="refresh" content="2; url =/admin/ " />');
        }
    }

    /*****Login front*****/
    public
    function doLogin($login, $senha)
    {
        $this->query("SELECT * FROM clientes WHERE email = '" . $login . "' AND senha = '" . md5($senha) . "' AND excluido = 0");
        $contausuarios = $this->conta_resultado();
        $usuarios = $this->recebe_resultado();
        if ($contausuarios >= 1) {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = md5($senha);
            foreach ($usuarios as $usuario) {
                $_SESSION['bj-id'] = $usuario['id'];
            }
        } else {
            exit('Ta errado ai.<meta http-equiv="refresh" content="2; url =/" />');
        }
    }


    //BUSCA DOS RESULTADOS DO USUARIO DENTRO DO PAINEL ADMINISTRATIVO
    public
    function getUsuarios()
    {
        $this->query("SELECT * FROM usuarios WHERE excluido = 0");
        $usuarios = $this->recebe_resultado();

        foreach ($usuarios as $usuario) {
            echo '<tr>
                  <td>' . $usuario["id"] . '</td>
                  <td>' . utf8_encode($usuario["nome"]) . '</td>
                  <td>' . $usuario["email"] . '</td>
                  <td>
                  <a href="cadastrar-usuarios.php?ac=' . $usuario["id"] . '"><i class="fa fa-pencil"></i> </a>
                  <a href="#"><i class="fa fa-trash"></i></a>
                  </td>
                  </tr>';
        }
    }

    //BUSCA DOS RESULTADOS DA TRANSPOTADORA DENTRO DO PAINEL ADMINISTRATIVO
    public
    function getTransportadoras()
    {
        $this->query("SELECT * FROM transportadoras WHERE excluido = 0");
        $transporta = $this->recebe_resultado();

        foreach ($transporta as $transp) {
            echo '<tr>
                  <td>' . $transp["id"] . '</td>
                  <td>' . utf8_encode($transp["nome"]) . '</td>
                  <td><a href="' . $transp["link"] . '" target="_blank">Site da Transportadora</a> </td>
                  <td>' . $transp["valor"] . '</td>
                  <td>
                  <a href="cadastrar-transportadoras.php?ac=' . $transp["id"] . '"><i class="fa fa-pencil"></i> </a>
                  <a href="#"><i class="fa fa-trash"></i></a>
                  </td>
                  </tr>';
        }
    }

    //BUSCA DOS RESULTADOS DO CLIENTES DENTRO DO PAINEL ADMINISTRATIVO
    public
    function getClientes()
    {
        $this->query("SELECT * FROM clientes WHERE excluido = 0");
        $clientes = $this->recebe_resultado();

        foreach ($clientes as $cliente) {
            echo '<tr>
                  <td>' . $cliente["id"] . '</td>
                  <td>' . utf8_encode($cliente["nome"]) . '</td>
                  <td>' . utf8_encode($cliente["email"]) . '</td>
                  <td>' . $cliente["telefone"] . '</td>
                  
                  </tr>';
        }
    }

    //CADASTRA NOVA TRANSPORTADORA
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

    //ATUALIZA DADOS DA TRANSPORTADORA
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

    // CADASTRA NOVO USAURIO

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

    //ATUALIZA OS DADOS DO USUARIO

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

    //PROTEGER PAGINA = VERIFICA SE USUARIO ESTA LOGADO
    /*****Protege o sistema administrativo*****/
    public
    function protegePagina()
    {
        $this->query("SELECT * FROM clientes WHERE email = '" . $_SESSION['login'] . "' AND senha = '" . $_SESSION['senha'] . "' AND excluido = 0");
        $login = $this->conta_resultado();
        if ($login >= 1) {
            return true;
        } else {
            exit('Deu erro amigo!!! Nome de usuário ou senha incorretos.<meta http-equiv="refresh" content="2; url =/admin/ " />');
        }
    }

    // FUNÇÃO DE LOGIN E DESCRIPT DA SENHA
    /*****Login administrativo*****/
    public
    function login($login, $senha)
    {
        $this->query("SELECT * FROM clientes WHERE email = '" . $login . "' AND senha = '" . md5($senha) . "' AND excluido = 0");
        $contausuarios = $this->conta_resultado();
        $usuarios = $this->recebe_resultado();
        if ($contausuarios >= 1) {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = md5($senha);
            $_SESSION['id'] = $usuarios["id"];
            foreach ($usuarios as $usuario) {
                $_SESSION['bj-id'] = $usuario['id'];
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

    public
    function buscaTransportadoras()
    {
        //CALCULO SE PESO É MAIOR QUE 500KG
        $peso = $_POST["peso"];
        if ($peso >= '500') {
            $this->query("SELECT * FROM transportadoras WHERE peso >= '500' AND excluido = 0");
            $transportadoras = $this->recebe_resultado();

            foreach ($transportadoras as $transp) {
                $valor = $transp["valor"];
                //CALCULO DE PESO * VALOR = VALOR TOTAL
                $resultado = $peso * $valor;
                echo '
                <tr>
                <td>' . utf8_encode($transp["nome"]) . '</td>
                <td>R$ ' . $transp["valor"] . '</td>
                <td>R$ ' . $resultado . '</td>
                <td><a href="' . $transp["link"] . '" target="_blank"><span class="badge bg-danger">Ver Transportadora</span></a></td>
                </tr>';
            }
        } else {
            //CALCULO SE PESO É MENOR QUE 500KG
            $this->query("SELECT * FROM transportadoras WHERE peso <= '500' AND excluido = 0");
            $transportadoras = $this->recebe_resultado();

            foreach ($transportadoras as $transp) {
                $valor = $transp["valor"];
                $resultado = $peso * $valor;
                echo '
                <tr>
                <td>' . utf8_encode($transp["nome"]) . '</td>
                <td>R$ ' . $transp["valor"] . '</td>
                <td>R$ ' . $resultado . '</td>
                <td><a href="' . $transp["link"] . '" target="_blank"><span class="badge bg-danger">Ver Transportadora</span></a></td>
                </tr>';
            }

        }
    }


}//fecha classe
