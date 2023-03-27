<?php
$file = fopen("visitantes.txt", "r");

while(!feof($file)) {

$contador = fgets($file);
echo '<script>
alert("Su portal WEB cuenta con '.$contador.' Visitantes");
</script>';
}

?>