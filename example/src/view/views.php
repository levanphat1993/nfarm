<?php



class View
{

    public function __construct()
    {
        
    }

    public function render(string $name): string
    {

        var_dump($name);



        return 'hello';
    }
    
}

