<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
</head>
<body>
    <h1>Log in</h1>
    <form action='.' method='POST'>
        <input type='hidden' name='action' value='login'/>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username"/>
        <label for="password">Password: </label>
        <input type="password" name="password" id="username">
        <input type="submit" value="Submit"/>
    </form>
    
    <h3><?php echo $message; ?></h3>
    
    <a href=".?action=welcome">Cancel</a>
</body>
</html>