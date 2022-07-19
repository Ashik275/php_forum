<?php
session_start();
echo 'Logging you out please wait';

session_unset();
session_destroy();
header("location:/forum");
?>