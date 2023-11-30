<?php

// Inicio da sessao
session_start();

// Rotas permitidas
$rotas_permitidas = require_once __DIR__ . "/../inc/rotas.php";

// Definicao das rotas
$rota = $_GET['rota'] ?? 'home';

// Verifica se o usuario esta logado
if(!isset($_SESSION['usuario'])) {
    $rota = 'login';
}

// Caso o usuario ja esteja logado e tenta entrar no login
if(isset($_SESSION['usuario']) && $rota == 'login') {
    $rota = 'home';
}

// caso a rota nao exista
if (!in_array($rota, $rotas_permitidas)) {
    $rota = '404';
}

// Preparacao da pagina
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

//CARREGA CONSTANTES
require_once __DIR__ . '/../inc/config.php';
require_once __DIR__ . '/../inc/database.php';

//TESTE
//phpinfo();
$db = new database();
$usuarios = $db->query('SELECT * FROM USUARIOS');
echo '<pre>';
print_r($usuarios);
echo '</pre>';
die();

// apresentacao da pagina
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . "/../scripts/{$script}";
require_once __DIR__ . '/../inc/footer.php';