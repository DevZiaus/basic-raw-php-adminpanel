
 <?php
    $db_host='localhost';
    $db_user='root';
    $db_passw='';
    $db_name='rawphp';

    $conn=mysqli_connect($db_host,$db_user,$db_passw,$db_name);
    if(!$conn){
    echo "Database connection error!";
    }
?>
