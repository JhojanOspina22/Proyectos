<?php
session_start();
unset ($SESSION['login']);
session_destroy();

header('Location: ../Index.php');
