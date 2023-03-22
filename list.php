<?php

$connect = mysqli_connect(
    '<DB_HOST>', // host
    '<DB_USERNAME>', // username
    '<DB_PASSWORD>', // password
    '<DB_DATABASE' // database
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student list</title>
</head>
<body>

    <h1>Student List</h1>

    <?php

    $query = 'SELECT *
        FROM programs
        ORDER BY name';
    $programs = mysqli_query($connect, $query);

    ?>

    <?php while($program = mysqli_fetch_assoc($programs)): ?>

        <h2><?=$program['name']?></h2>

        <?php

        $query = 'SELECT *
            FROM students
            WHERE program_id = '.$program['id'].'
            ORDER BY last,first';
        $students = mysqli_query($connect, $query);

        ?>

        <?php while($student = mysqli_fetch_assoc($students)): ?>

            <h3><?=$student['first']?> <?=$student['last']?></h3>
            
            <a href="<?=$student['portfolio']?>"><?=$student['portfolio']?></a>

            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?=urlencode($student['portfolio'])?>">
                Share on LinkedIn
            </a>

            <br>

        <?php endwhile; ?>

        <hr>

    <?php endwhile; ?>
    
</body>
</html>