<?php

// Cancellazione del cookie
setcookie("41pfosjwgnw4ifj22232fef39n");

// Preleva la pagina precedente
$pagina_precedente = $_SERVER['HTTP_REFERER'];

echo "<meta http-equiv='Refresh' content='0; url=$pagina_precedente'>";

?>