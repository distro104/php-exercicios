<?php

defined('CONTROL') or die('Acesso negado.');

echo '<pre>';
print_r($_SESSION);

?>

<div class="container mb-1">
    <div class="row border">
        <div class="col">
            <h3 class="text-center">TIC TAC-TOE</h3>
            <div class="row">
                <div class="col">
                    <h3 class="text-center <?= $_SESSION['active_player'] == 1 ? 'text-warning': '' ?> "><?= $_SESSION['player_1_name'] ?></h3>
                    <h3 class="text-center "><?= $_SESSION['player_1_score'] ?></h3>
                </div>
                <div class="col text-end">
                    <h3 class="text-center <?= $_SESSION['active_player'] == 2 ? 'text-warning': '' ?> "><?= $_SESSION['player_2_name'] ?></h3>
                    <h3 class="text-center"><?= $_SESSION['player_2_score'] ?></h3>
                </div>
            </div>            
        </div>
        <hr>
        <div class="col board  vh-100 d-flex justify-content-center align-items-center">
            <table class="table text-center align-middle">
                <tbody>
                    <tr>
                        <td>x</td>
                        <td>x</td>
                        <td>x</td>
                    </tr>
                    <tr>
                        <td>x</td>
                        <td>x</td>
                        <td>x</td>
                    </tr>
                    <tr>
                        <td>x</td>
                        <td>x</td>
                        <td>x</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
