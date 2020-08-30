<?php
$connect=mysqli_connect('localhost','faris','0123456','sales');

if(!$connect){
    echo "Connection error : ". mysqli_connect_error();
}
?>