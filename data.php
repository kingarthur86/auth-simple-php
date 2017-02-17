<?php

include 'database.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

if (!$name || (strlen($name) < 4)) {
    echo "<p style='color: red;'>Username must have minimum 4 characters!</p>";
} else {
    $connect = dbConnect();
    $username = mysqli_real_escape_string($connect, $name);
    $query = selectUser($connect, 'username', 'username', $username);

    $numrows = mysqli_num_rows($query);
    
    
    if ($numrows) {
        echo "<p style='color: red;'>Someone else has chosen this username. Choose another one.</p>";
    } else {
        echo "<p style='color: green;'>This username is accesible.</p>";
}
}





