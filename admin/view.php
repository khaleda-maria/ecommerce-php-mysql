<?php
session_start();

echo $_SESSION['name'];
echo '<hr/>';
echo $_SESSION['city'];
echo '<hr/>';
$session_id=session_id();
echo $session_id;