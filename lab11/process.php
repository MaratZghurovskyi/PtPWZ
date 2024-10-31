<?php
if(empty($_POST['name'])) {
    echo "Empty string";
}
if(empty($_POST['surname'])) {
    echo "Empty string";
}
?>
Hi <?php echo htmlspecialchars($_POST['name']); ?> <?php echo htmlspecialchars($_POST['surname']); ?>!