<?php 

include_once 'func.php';

$count = Func::getUserCount();

?>

<form action="addUser.php" method="post">
    <input type="submit" name="send" value="addUser">
</form>
<br>
<form action="showUsers.php" method="post">
    <input type="submit" name="send" value="showUsers">
</form>
<br>
<p>User count: <?= $count ?></p>