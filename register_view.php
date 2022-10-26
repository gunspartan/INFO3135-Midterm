<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register here</h1>
    <form action="." method='POST' class="form">
        <input type='hidden' name='action' value='register'/>
        <label for="fname"><?php echo $fname_label; ?></label>
        <input type="text" name="fname" id="fname"/>
        <label for="lname"><?php echo $lname_label; ?></label>
        <input type="text" name="lname" id="lname"/>
        <label for="username"><?php echo $username_label; ?></label>
        <input type="text" name="username" id="username"/>
        <label for="password"><?php echo $password_label; ?></label>
        <input type="password" name="password" id="password"/>
        <label for="confirm_password"></label><?php echo $confirm_password_label; ?></label>
        <input type="password" name="confirm_password" id="confirm_password"/>
        
        <input type='submit' class="submit" value='Register'>
    </form>
    <h3><?php echo $message; ?></h3>
    <a href=".?action=welcome">Cancel</a>
</body>
</html>