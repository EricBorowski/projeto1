<?php
include "../session/start_session.php";

session_destroy();
header("location: ../paginas/inicio.php");