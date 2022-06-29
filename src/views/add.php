<?php
require __DIR__ . '/top.php';

?>
<main class="main saskaitos">
    <h3>Add funds</h3>
    <?php
    require __DIR__ . '/msg.php';
    ?>

    <form action="" method="post" class="new add">
        <span>Name: <span class="value"></span><?= $users['name']?></span>
        <span>Last name: <span class="value"></span><?= $users['surname']?></span>
        <span>Balance USD: <span class="value"></span><?= $users['suma']?></span>
        <span>Sum: <input type="number" name="add" required></span>
        <button class="btn">ADD $$$</button>
    </form>

    <?php
    require __DIR__ . '/bottom.php';
    ?>