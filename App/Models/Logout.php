<?php
session_start();
unset($_SESSION['nome_cliente']);
unset($_SESSION['id_cliente']);
session_destroy();
header('Location: ?router=Controllers/home/');
exit();