<?php

// Polymorphism

interface Animal
{
    public function eat(string $food) : bool;
    public function talk(bool $shout) : string;
}

class Cat implements Animal 
{
    public function eat(string $food): bool
    {

        if ($food == 'tuna') {
            return true;
        } else {
            return false;
        }

    }

    public function talk(bool $shout): string
    {
        if ($shout === true) {
            return "MEOW!";
        } else {
            return "Meow.";
        }
    }
}

Class Dog implements Animal
{
    public function eat(string $food): bool
    {
        if ($food == 'meat') {
            return true;
        } else {
            return false;
        }
    }

    public function talk(bool $shout): string
    {
        if ($shout == true) {
            return "GAUU!"; 
        } else {
            return "Gauu.";
        }
    }
}

Class Cows implements Animal
{
    public function eat(string $food): bool
    {
        if ($food == 'grass') {
            return true;
        } else {
            return false;
        }
    }

    public function talk(bool $shout): string
    {
        if ($shout == true) {
            return "UBOO!"; 
        } else {
            return "Uboo.";
        }
    }
}

// uses

$objCat = new Cat();
var_dump($objCat); 
$objCat->eat(true);

$objDog = new Dog();
var_dump($objDog); 
$objDog->eat(true);

$objCows = new Cows();
var_dump($objCows); 
$objCows->eat(true);


