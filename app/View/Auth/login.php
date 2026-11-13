<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/BaThrift/auth" method="POST">
        <label for="email">email</label>
        <input type="email" id="email" name="email">
        <br><br>

        <?php if(isset($model['error_login'])): ?>
            <p><?= $model['error_login'] ?></p>
        <?php endif;?>

        <label for="password">password</label>
        <input type="password" id="password", name="password">
        <br><br>

        <button type="submit">pencet</button>
    </form>
</body>
</html>