<?php
require_once 'Animal.php';
class Dog implements Animal
{
    public function makeSound()
    {
        return 'Woof!';
    }

    public function eat()
    {
        return 'The dog is eating.';
    }

}