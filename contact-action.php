<?php
require "config.php";

if (isset($_POST['subscribe'])) {
    echo "<h1 align='center'>Votre E-mail a &eacute;t&eacute; bien envoy&eacute;...</h1>";
    header("refresh:3;url=" . $BASE_URL . "#contact");
}
?>