<?php

include_once 'func.php';

$isAdded = false;
$loginError = false;

$login = null;
$password = null;
$email = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (Func::isLoginAvailable($login)) {
            Func::addUser($login, $password, $email);
            $isAdded = true;
        } else {
            $loginError = true;
        }
    }
}

?>

<?php if($isAdded): ?>
    <p>User <?= $login ?> was succesfully added!</p>
<?php else: ?>
    <?php if($loginError): ?>
        <p>This login is not available!</p>
    <?php endif; ?>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="text" name="login" id="login" placeholder="login" value="<?= $login ?>"> <br>
        <input type="password" name="password" id="password" placeholder="password"> <br>
        <input type="email" name="email" id="email" placeholder="email" value="<?= $email ?>"> <br>

        <input type="submit" name="send" value="Add">
    </form>
<?php endif; ?>
    