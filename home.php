<?php
session_start();

echo "estou logado ".$_SESSION['nome']??'';
echo "<br>";
echo '<a href="/logout.php">Sair</a>';