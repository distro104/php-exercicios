<?php


/**
 * VERIFICA SE ACONTECEU UM POST
 */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /?rota=404');
    exit;
}

/**
 * VERIFICA SE USUARIO E SENHA ESTAO PREENCHIDOS SENAO COLOCA NULL
 */
$user = $_POST['text_user'] ?? null;
$pass = $_POST['text_pass'] ?? null;

/** VERIFICA SE DADOS SAO VALIDOS */
if (empty($user) || empty($pass))
{
    header('Location: index.php?rota=');
    exit; 
}

/** COM A CLASSE DATABASE QUE JA ESTA CARREGADA NO INDEX... */
$db = new database();
$params = [
    ':user' => $user
];
$sql = "SELECT * FROM user WHERE user = :user";
$result = $db->query($sql, $params);

/** VERIFICA SE OCORREU ALGUM ERRO */
if ($result['status'] === 'error') {
    header('Location: index.php?rota=404');
    exit;
}

/** VERIFICA SE O USUARIO NAO EXISTE */
if (count($result['data']) === 0) {
    /** ERRO NA SESSAO */
    $_SESSION['error'] = 'Usuario ou senha invalidos';

    header('Location: index.php?rota=login');
    exit;
}

/** VERIFICA SE CASO O USUARIO EXISTIR MAS A SENHA ESTA INCORRETA */
if (!password_verify($pass, $result['data'][0]->pass)) {
    /** ERRO NA SESSAO */
    $_SESSION['error'] = 'Usuario ou senha invalidos';

    header('Location: index.php?rota=login');
    exit;
}

/** DEFINE A SESSAO DO USUARIO */
$_SESSION['user'] = $result['data'][0];

/** REDIRECIONA PARA A PAGINA INICIAL */
header('Location: index.php?rota=login');
exit;
