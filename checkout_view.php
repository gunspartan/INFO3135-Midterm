<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>
<body>
    <h2>Todays date:</h2>
    <h3><?php echo date("d/m/Y"); ?></h3>
    <h1>Renting: </h1>
    <table>
        <tr>
            <td>Title</td>
        </tr>
        <?php foreach($_SESSION['movies_to_rent'] as $movie): ?>
            <tr>
                <td><?php echo $movies[$movie]['movieName']; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>