<?php

$connect = mysqli_connect(
    'sql213.epizy.com', // hopst
    'epiz_29666120', // username
    'U9x2tTEPKECh', // password
    'epiz_29666120_students' //database
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    
    <h1>Student List!</h1>

    <?php

    $query = 'SELECT *
        FROM programs
        ORDER BY name';
    $programs = mysqli_query($connect, $query);

    ?>

    <?php while($program = mysqli_fetch_assoc($programs)): ?>

        <hr>

        <h2><?=$program['name']?></h2>

        <?php

        $query = 'SELECT *
            FROM students
            WHERE program_id = '.$program['id'].'
            ORDER BY last';
        $students = mysqli_query($connect, $query);

        ?>

        <ul>

            <?php while($student = mysqli_fetch_assoc($students)): ?>

                <li>
                    <strong><?=$student['first']?> <?=$student['last']?></strong>
                    <br>
                    <a href="<?=$student['portfolio']?>">
                        <?=$student['portfolio']?>
                    </a>
                    <br>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?=urlencode($student['portfolio'])?>">
                        Share <?=$student['first']?> on LinkedIn!
                    </a>
                </li>

            <?php endwhile; ?>

        </ul>

    <?php endwhile; ?>

</body>
</html>