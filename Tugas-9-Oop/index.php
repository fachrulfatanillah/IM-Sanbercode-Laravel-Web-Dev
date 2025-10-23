<?php
require_once 'Animal.php';
require_once 'Frog.php';
require_once 'Ape.php';

$sheep = new Animal("shaun");
$kodok = new Frog("buduk");
$sungokong = new Ape("kera sakti");

echo "Name : " . $sheep->name . "<br>";
echo "Legs : " . $sheep->legs . "<br>";
echo "Cold Blooded : " . $sheep->cold_blooded . "<br>";

echo "<br>";
echo "Name : " . $kodok->name . "<br>";
echo "Legs : " . $kodok->legs . "<br>";
echo "Cold Blooded : " . $kodok->cold_blooded . "<br>";
echo $kodok->jump();
echo "<br>";

echo "<br>";
echo "Name : " . $sungokong->name . "<br>";
echo "Legs : " . $sungokong->legs . "<br>";
echo "Cold Blooded : " . $sungokong->cold_blooded . "<br>";
echo $sungokong->yell();
