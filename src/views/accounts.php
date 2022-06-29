<?php
require __DIR__ . '/top.php';
?>
<main class="main saskaitos">
    <h3>Accounts list</h3>
    <?php
    require __DIR__ . '/msg.php';
    
    ?>
    <ul>
        <?php foreach ($users as $key => $user) : ?>   
            <li class="action1">
                <span>Account Nr: <span class="value"></span><?= $user['sasNr'] ?></span>
                <span>Name: <span class="value"></span><?= $user['name'] ?></span>
                <span>Last name: <span class="value"></span><?= $user['surname'] ?></span>
                <span>Personal id: <span class="value"></span><?= $user['personId'] ?></span>
                <span>Funds USD: <span class="value"></span><?= $user['suma'] ?></span>
                <span>Funds EUR: <span class="value"></span><?= $user['suma'] * $eur ?></span>
            
                <div class="action2">
                <form action="<?= $link.'delete/'.$user['client']?>" method="post">
                <button class="btn" type="submit">DELETE</button>
                </form>
                <a class="btn" href="<?= $link.'add/'.$user['client']?>">Add funds</a>
                <a class="btn" href="<?= $link.'remove/'.$user['client']?>">Deduct funds</a>
                </div>
            </li>
        <?php endforeach ?>   
        </ul>

    <?php
    require __DIR__ . '/bottom.php';
    ?>