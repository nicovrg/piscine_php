<?php 

Class Color 
{
    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public static $verbose = false;
    
    function __construct ($array)
    {
        print ("constructor called");
        if (array_key_exists($array['rgb']) == true)
        {
            (int)$array['rgb'];
        }
        else if (array_key_exists($array['red']) == true && array_key_exists($array['green']) == true && array_key_exists($array['blue']) == true)
        {
            (int)$array['red'];
            (int)$array['green'];
            (int)$array['blue'];
        }
        else
        {
            print ("Error\n");
            return (0);
        }
        return ;
    }

    function __destruct ()
    {
        print ("destructor called");
        return ;
    }

    function __toString ()
    {
    }

    static function doc ()
    {
        $file = 'Color.doc.txt';
        $contenu = file_get_contents($file);
        echo "$contenu";
    }
}

?>