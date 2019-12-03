<?php

session_start();
session_destroy();
?>
<script>
    window.location="login.php";
    alert ('Anda telah berhasil logout');
</script>
<?php
exit;

?>
