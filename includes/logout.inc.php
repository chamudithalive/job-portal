<?php

session_start(); // Required To do anything related to sessions. Best to put on top before any other code.
session_unset(); // Function frees all session variables currently registered like $_Session['id_user']
session_destroy(); // Destroys all data registered to a session. Basically destory all session.

header("Location: ../index.php");
exit();