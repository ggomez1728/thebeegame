<!DOCTYPE html>
<html>
<body>
<?php
session_start();
require_once './Model/Game.php';
//unset($_SESSION['game']);//force reset

if (isset($_SESSION['game']) && !(isset($_REQUEST['reset']) && $_REQUEST['reset'])) {
    $game = unserialize($_SESSION['game']);
} else {
    $game = new Game();
}


echo "<h1>ROUND ".$game->getRound()."</h1>";

if (isset($_POST) && isset($_POST['hit'])) {

    if (isset($_REQUEST['position']) && $_REQUEST['position'] !== '') {
        $position = (int)$_REQUEST['position']-1;
    } else {
        $position = null;
    }
    $story = $game->play($position);

    echo $story;

    if ($game->isDead()) {

        echo "<h2>Game Over. Press Hit to start a new game...</h2>";

        $game = new Game();
    }

    $_SESSION['game'] = serialize($game);
}
?>
<hr/>
<form id="hitForm" action="index.php" method="POST">
    <label for="reset">Force Reset</label> : <input type="checkbox" id="reset" name="reset" value="1"/>
    <br/>
    <label for="reset">Force Hitting bee number </label> : <input type="number" min="1" max="<?php echo $game->getCountBees()?>" id="position" name="position" value=""/>
    <br/>
    <input name="hit" type="submit" value="Hit !">
</form>
<?php
var_dump("game new status :", $game);
?>
</body>
</html>