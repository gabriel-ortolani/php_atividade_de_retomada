<?php
// Página de logout (15c_logout.php)
session_start();

// destrói a sessão do usuário
session_destroy();

header("Location:15a_sistema.php");

exit();

?>