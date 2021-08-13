<style>
    table {
        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        font-size: 14px;
        border-collapse: collapse;
        text-align: center;
    }
    th, td:first-child {
        background: #AFCDE7;
        color: white;
        padding: 10px 20px;
    }
    th, td {
        border-style: solid;
        border-width: 0 1px 1px 0;
        border-color: white;
    }
    td {
        background: #D8E6F3;
    }
    th:first-child, td:first-child {
        text-align: left;
    }
</style>

<?php

include_once 'func.php';

$users = Func::loadAllUsers();

?>

<table>
    <tr>
        <?php foreach ($users[0] as $key => $value): ?>
            <th><?= $key ?></th>
        <?php endforeach ?>
    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <?php foreach ($user as $value) { ?>
                <td><?= $value ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>