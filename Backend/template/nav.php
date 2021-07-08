<div id="searchpanel" class="row disable">
    <input type="text" name="" id="" class="searchbar" placeholder="Chercher">
</div>
<div id="plusPanel" class="col disable">
    <ul>
<?php
$arrayPerm = array($_GET['pages'], $_SESSION['user']['role']);

switch ($arrayPerm){
    case array('',3):
    case array('',0):
        echo '<li><a href="index.php?pages=10">Nouveau site</a></li>';
    break;
}

?>

    </ul>
</div>
<nav>
    <ul>
        <li><a href="index.php"><i class="fas fa-map-marked-alt"></i></a></li>
        <li><a href=""><i class="fas fa-bed"></i></a></li>
        <li id="openPlusBtn"><a><i class="fas fa-plus"></i></a></li>
        <li id="openSearchPanel"><a><i class="fas fa-search"></i></a></li>
        <li><a href=""><i class="fas fa-user"></i></a></li>
    </ul>
</nav>