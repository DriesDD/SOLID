<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SOLID</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,400;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>


<?php
session_start();

require 'slide.php';

$title = new Slide('<h1>SOLID principles</h1><h3>A guide</h3>');
$s = new Slide('<h1>Single Responsibility Principle</h1><h3>A class should have only <u>one job</u>.</h3>');
$o = new Slide('<h1>Open-Closed Principle</h1><h3>Software entities (Classes, modules, functions) should be open for <u>extension</u>, not modification.</h3>');
$l = new Slide('<h1>L: Liskov Substitution Principle</h1><h3>A sub-class must be substitutable for its super-class</h3>');
$i = new Slide('<h1>I: Interface Segregation Principle</h1><h3>Make fine grained interfaces that are client specific</h3>');
$d = new Slide('<h1>D:Dependency Inversion Principle</h1><h3>Dependency should be on <u>abstractions</u>, not concretions or details</h3>');
$end = new Slide('<h3>end of presentation</h3>');

function getVolunteer(): string
{   $classmates = [
        'Alejandro', 'Balder', 'Bas', 'Ezgi', 'Fawad', 'Gerrit', 'Gwen', 'Lisa', 'Mattias', 'Nicol', 'Oyuna', 'Victor'
    ];
    return '<br>' . $classmates[rand(0, sizeof($classmates) - 1)];
}

if (isset($_SESSION['slide']) == false) {
    $_SESSION['slide'] = 0;
}
if (isset($_POST['previous'])) {
    $_SESSION['slide'] -= 1;
}
if (isset($_POST['next'])) {
    $_SESSION['slide'] += 1;
}
$_SESSION['slide'] = ($title->GetNumberOfSlides() + $_SESSION['slide']) % $title->GetNumberOfSlides();

?>

<body>
    <form action="index.php" method="post">
        <container class='flex-container'>
            <input class='nav left' value="◀" name="previous" type="submit">
            </input>
            <div class='slide'>
                <div>
                    <?php
                    echo ($title->GetSlideFromIndex($_SESSION['slide']));
                    echo ('<input class= "nav" size="50" value="get volunteer" name="picker" type="submit"></input>');
                    if (isset($_POST['picker'])) {
                        echo (getVolunteer());
                    }
                    ?>
                </div>
            </div>
            <input class='nav right' value="▶" name="next" type="submit">
            </input>

        </container>
    </form>
</body>

</html>