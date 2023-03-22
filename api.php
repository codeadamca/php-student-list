<?php

$connect = mysqli_connect(
    '<DB_HOST>', // host
    '<DB_USERNAME>', // username
    '<DB_PASSWORD>', // password
    '<DB_DATABASE' // database
);

$data = array();

$query = 'SELECT *
    FROM programs
    ORDER BY name';
$programs = mysqli_query($connect, $query);

while($program = mysqli_fetch_assoc($programs))
{

    $query = 'SELECT *
        FROM students
        WHERE program_id = '.$program['id'].'
        ORDER BY last,first';
    $students = mysqli_query($connect, $query);

    while($student = mysqli_fetch_assoc($students))
    {
        $program['students'][] = $student;
    }

    $data[] = $program;

}

echo json_encode($data);