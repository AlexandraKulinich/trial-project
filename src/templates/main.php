<h1>Hello, <?= $user_name ?? 'Guest' ?></h1>
<form method='post'>
    <?php if (isset($user_name)) { ?>
    <button type="submit" name="action" value="logout">Logout</button>
    <?php } else { ?>
    <button type="submit" name="action" value="login">Login</button>
    <?php } ?>
</form>