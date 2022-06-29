<?php
require __DIR__ . '/top.php';

?>
<main class="main saskaitos">
    <h3>New account</h3>
    <?php
    require __DIR__ . '/msg.php';
    ?>
    <form action="" method="post" class="new">
    <input type="hidden" name="client" value="<?= $id ?>" readonly>
        Account Nr.: <input type="text" name="code" value="<?= $iban ?>" required readonly />
        Name: <input type="text" name="name" required />
        Last name: <input type="text" name="surname" required />
        Personal id: <input type="number" name="personId" required />
        <button class="btn-create">CREATE</button>
    </form>

    <?php
    require __DIR__ . '/bottom.php';
    ?>