<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'coronacont';

$con = mysqli_connect($server, $user, $password, $db);

if($con){
    ?>
    <script>
        alert('Connection successful')
    </script>
<?php
}
else {
    ?>
    <script>
        alert('Conn not successful')
    </script>
    <?php
}
?>
