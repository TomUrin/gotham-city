<?php
require __DIR__ . '/top.php';

?>
<main class="main saskaitos">
<h3>Deduct funds</h3>
<?php
    require __DIR__ . '/msg.php';
    ?>

    <form action="" method="post" class="new add">
        <span>Name: <span class="value"></span><?= $users['name']?></span>
        <span>Last name: <span class="value"></span><?= $users['surname']?></span>
        <span>Account balance USD: <span class="value"></span><?= $users['suma']?></span>
        <span>The amount to be deducted: <input type="number" name="remove" required></span>
        <button type="submit" class="btn">CASH OUT</button>
    </form>

    <?php
    require __DIR__ . '/bottom.php';
    ?>