<?php 
    //inicio da sessão
    session_start();

    // carregamento das rotas permitidas
    $rotas_permitidas = require_once __DIR__ . '/../inc/rotas.php';

    // definição de rota
     $rota = $_GET ['rota'] ?? 'home';
    //   /\query string a existencia de uma variavel rota, se ela não existir volta para a pagina inicial

    // verifica se o usuario está logado
    if(!isset($_SESSION['usuario'])){
        $rota = "login";
    }
    // /\ MESMO QUE EU DEFINA UMA ROTA, SE O USUARIO NAO ESTIVER LOGADO A ROTA MOSTRARA O FORM DE LOGIN

    // se o usuario está logado e tenta entrar no login...
    if(isset($_SESSION['usuario']) && $rota == 'login'){
        $rota = 'home';
    }

    // se a rota não existe
    if(!in_array($rota, $rotas_permitidas)){
        $rota = '404';
    }

    // preparação da pagina
    $script = null;
        switch ($rota) {
            case '404':
                $script = '404.php';
                break;
                
            case 'login':
                $script = 'login.php';
                break; 

            case 'home':
                $script = 'home.php';
                break; 
    }  

    // carregamento de scripts permanentes
    require_once __DIR__ . "/../inc/config.php";
    require_once __DIR__ . "/../inc/database.php";
    
    // apresentação da pagina
    require_once __DIR__ . "/../inc/header.php";
    require_once __DIR__ . "/../scripts/$script";
    require_once __DIR__ . "/../inc/footer.php";
?>