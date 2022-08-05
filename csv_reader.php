<?php
$csv = 'C:\\xampp\\htdocs\\internship_project2\\BULKEMAIL.csv';
$fh = fopen($csv, 'r');
while(list($email) = fgetcsv($fh, 1024, ',')){
    printf("<p> %s </p>", $email);
}

?>