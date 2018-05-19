<?php
    session_start();
    unset($_SESSION['pessoaLogada']);
    header('Location: /');
    exit();