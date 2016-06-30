<?php
session_start();
session_destroy();
session_unset();

header("location:web.php");


?>
<html>
<body>
Logout successfully
</body>
</html>