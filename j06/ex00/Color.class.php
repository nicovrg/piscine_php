#!/usr/bin/php
<?php 

Class Color 
{
    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public static $verbose = false;
    
    function __construct ($array)
    {
        if ($verbose == true)
            print ("constructor called");
        if (array_key_exists($array['rgb'], $array) == true)
        {
            (int)$array['rgb'];
        }
        else if (array_key_exists($array['red'], $array) == true && array_key_exists($array['green'], $array) == true && array_key_exists($array['blue'], $array) == true)
        {
            (int)$array['red'];
            (int)$array['green'];
            (int)$array['blue'];
        }
        else
        {
            if ($verbose == true)
                print ("Error\n");
            return (0);
        }
        return (1);
    }

    function __destruct ()
    {
        if ($verbose == true)
            print ("destructor called");
        return (1);
    }

    function __toString ()
    {
        return $this->verbose;
    }

    function add ()
    {
        
    }
    
    function sub ()
    {
    
    }
    
    function mult ()
    {
    
    }
    

    static function doc ()
    {
        $file = 'Color.doc.txt';
        $contenu = file_get_contents($file);
        echo "$contenu";
    }
}

Color::$verbose = True;

$red = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
print( $red     . PHP_EOL );



?>