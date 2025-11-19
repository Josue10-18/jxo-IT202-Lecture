<?php
if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
}
if (headers_sent()){
   echo 'Click <a href ="index.php?content=logout"><strong>here</strong></a> to logout.';
} else {
   header("Loaction: index.php");
}
?>