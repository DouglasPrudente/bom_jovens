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
        $this->query("SELECT * FROM usuarios WHERE status = '1' AND email = '" . $_SESSION['login'] . "' AND senha = '" . $_SESSION['senha'] . "' AND excluido = 0");
        $login = $this->conta_resultado();
        if ($login >= 1) {
            return true;
        } else {
            exit('Deu erro amigo!!! Nome de usuário ou senha incorretos.');
        }
    }

    /*****Login front*****/
    public
    function doLogin($login, $senha)
    {
        $this->query("SELECT * FROM usuarios WHERE status = '1' AND email = '" . $login . "' AND senha = '" . $senha . "' AND excluido = 0");
        $contausuarios = $this->conta_resultado();
        $usuarios = $this->recebe_resultado();
        if ($contausuarios >= 1) {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            foreach ($usuarios as $usuario) {
                $_SESSION['userlevel'] = $usuario['funcao'];
                $_SESSION['useridadmin'] = $usuario['id'];
            }
        } else {
            exit('Ta errado ai amigao.');
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
        $this->query("SELECT * FROM " . $tabela . " WHERE id = " . $id);
        $informacoes = $this->recebe_resultado();

        foreach ($informacoes as $informacao) {
            return utf8_encode($informacao[$parte]);
        }
    }


    public
    function getTcc()
    {
        $this->query("SELECT * FROM trabalhos WHERE excluido = 0");
        $tccs = $this->recebe_resultado();

        foreach ($tccs as $tcc) {
            echo '<tr>
                  <td>'. $tcc["id"] .'</td>
                  <td>'. utf8_encode($tcc["tcc"]) .'</td>
                  <td>'. utf8_encode($tcc["alunos"]) .'</td>
                  <td>'. utf8_encode($tcc["orientador"]) .'</td>
                  <td>'. utf8_encode($tcc["linha_estudo"]) .'</td>
                  <td>'. $tcc["arquivo"] .'</td>
                  
                  </tr>';
        }
    }

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


    /*****Cadastra novo usuário*****/
    public
    function registraUsuario($nome, $email, $senha)
    {
        $this->query("INSERT INTO usuarios (nome, email, senha, status) VALUES (:nome, :email, :senha, :status)");
        $this->ligar(':nome', $nome);
        $this->ligar(':email', $email);
        $this->ligar(':senha', $senha);
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
        $this->query("SELECT * FROM usuarios WHERE status = '1' AND email = '" . $login . "' AND senha = '" . $senha . "' AND excluido = '0'");
        $contausuarios = $this->conta_resultado();
        $usuarios = $this->recebe_resultado();
        if ($contausuarios >= 1) {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
        
        } else {
            exit('Ta errado ai amigao.<meta http-equiv="refresh" content="2; url =     " />');
        }
    }



/************** Insere  TCC no banco **************/

    public
    function registraTcc($titulo, $autores, $palavras_chave, $linha_pesquisa, $resumo)
    {
        /**************Coleta as informações do arquivo enviado e salva na pasta destino*********/
        $filename = $_FILES['arquivopdf']['name']; // Salva o nome do arquivo em $filename
        $ext = pathinfo($filename, PATHINFO_EXTENSION); // Filtra a extensão do arquivo a partir de $filename e salva em $ext
        $allowed = array('pdf'); // Define quais extensões de arquivo serão permitidas
        if (!in_array(strtolower($ext), $allowed)) { // Confere se o arquivo é válido
            exit('Tipo de arquivo inválido.');
        }
        $nomearquivo = $this->random_string(80); // Define um nome aleatório para o arquivo
        $pastadetcc = 'uploads/tcc/'; // Define a pasta para onde as imagens serão enviadas
        $uploadfile = $pastadetcc . $nomearquivo . '.' . $ext; // concatena as informações geradas para criar o arquivo
        while (file_exists($uploadfile)) { // Verifica se o arquivo já existe
            $nomearquivo = $this->random_string(60); // Gera um novo nome enquanto o anterior existir
            $uploadfile = $pastadetcc . $nomearquivo . '.' . $ext; // concatena as informações coletadas com o novo nome
        }
        if (!move_uploaded_file($_FILES['arquivopdf']['tmp_name'], $uploadfile)) { // Move o arquivo para o local definido
            exit('Falha ao enviar arquivo:' . $uploadfile . '<br />' . print_r($_FILES));
        }

        $foto = $nomearquivo . '.' . $ext; // Recupera somente o nome do arquivo para salvar na base de dados

        
        $this->query("INSERT INTO tcc (titulo, autores, palavras_chave, linha_pesquisa, resumo, arquivo) VALUES (:titulo, :autores, :palavras_chave, :linha_pesquisa, :resumo, :arquivo)");
        $this->ligar(':titulo', $titulo);
        $this->ligar(':autores', $autores);
        $this->ligar(':palavras_chave', $palavras_chave);
        $this->ligar(':linha_pesquisa', $linha_pesquisa);
        $this->ligar(':resumo', $resumo);
        $this->ligar(':arquivo', $arquivo);
        if ($this->executar()) {
            return true;
        } else {
            return false;
        }
    }

    /***** Atualiza TCC *****/
    public
    function atualizaTcc($id, $titulo, $autores, $palavras_chave, $linha_pesquisa, $resumo)
    {
        $this->query("UPDATE tcc SET titulo = :titulo, autores = :autores, palavras_chave = :palavras_chave, linha_pesquisa = :linha_pesquisa, resumo = :resumo WHERE id = " . $id);
        $this->ligar(':titulo', $titulo);
        $this->ligar(':autores', $autores);
        $this->ligar(':palavras_chave', $palavras_chave);
        $this->ligar(':linha_pesquisa', $linha_pesquisa);
        $this->ligar(':resumo', $resumo);
        if ($this->executar()) {
            return true;
        } else {
            return false;
        }
    }


    /****  Exibe TCC ****/
    public
    function exibeTCC()
    {
        $this->query("SELECT * FROM tcc ORDER BY titulo ASC");
        $tccs = $this->recebe_resultado();

        foreach ($tccs as $tcc) {
            echo '<tr>
                        <td>' . utf8_encode($tcc["titulo"]) . '</td>
                        <td>' . utf8_encode($tcc["autores"]) . '</td>
                        <td>' . utf8_encode($tcc["linha_pesquisa"]) . '</td>
                        <td><center><a href="' . utf8_encode($tcc["arquivo"]) . '"><i class="fa fa-file"></i></a></center></td>';

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
