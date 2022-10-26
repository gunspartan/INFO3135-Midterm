<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Rental</title>
</head>
<body>
    <form action='.' method='POST'>
        <input type='hidden' name='action' value='rent'/>
         <table>
            <?php foreach($movies as $movie): ?>
                <tr>
                    <td><?php echo $movie['movieName']; ?></td>
                    <td><?php echo $movie['movieGenre']; ?></td>
                    <td>
                        <input type="checkbox" name="movies_to_rent[]" id="movie" value=<?php echo $movie['movieId']; ?>>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>

        <input type="submit" value="Submit"/>
    </form>
    <h3><?php echo $message; ?></h3>
</body>
</html>