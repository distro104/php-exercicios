<?php

// INICIO DA SESSAO
session_start();

// ROTAS PERMITIDAS
$rotas_permitidas = require_once __DIR__ . "/../inc/rotas.php";

// Definicao das rotas
$rota = $_GET['rota'] ?? 'home';

// VERIFICA SE O USUARIO
if (!isset($_SESSION['user']) && $rota <> "login_submit") {
    $rota = 'login';
}

// CASO A ROTA ESTEJA COMO LOGOUT DESTROI A SESSAO E VAI PARA LOGIN
if ($rota == 'logout') {
    unset($_SESSION['user']);
    $rota = 'login';
}

// CASO O USUARIO ESTEJA LOGADO E TENTA UTILIZAR O LOGIN
if (isset($_SESSION['user']) && $rota == 'login') {
    $rota = 'home';
}

// CASO A ROTA NAO EXISTA
if (!in_array($rota, $rotas_permitidas)) {
    $rota = '404';
}

// PREPARA A PAGINA
$script = null;
switch ($rota) {
    case '404':
        $script = '404.php';
        break;

    case 'login':
        $script = 'login.php';
        break;

    case 'login_submit':
        $script = 'login_submit.php';
        break;

    case 'home':
        $script = 'home.php';
        break;

    case 'page1':
        $script = 'page1.php';
        break;

    case 'page2':
        $script = 'page2.php';
        break;

    case 'page3':
        $script = 'page3.php';
        break;
}

//CARREGA CONSTANTES
require_once __DIR__ . '/../inc/config.php';
require_once __DIR__ . '/../inc/database.php';

// APRESENTACAO DA PAGINA
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . "/../scripts/{$script}";
require_once __DIR__ . '/../inc/footer.php';
