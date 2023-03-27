<?php
session_start();
$_SESSION['administrador'] = 0;
 echo '<script>
    alert("Salistes del sistema");
 location.href = "login.php";
    </script>';
?>