<?php

require_once 'Color.class.php';

print( Color::doc() );

Color::$verbose = True;

$red     = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
$green   = new Color( array( 'rgb' => 255 << 8 ) );
$blue    = new Color( array( 'red' => 0, 'green' => 0   , 'blue' => 0xff ) );
$yellow  = $red->add( $green ); //appelle la fonction add de red sur green
$cyan    = $green->add( $blue ); //appelle la fonction add de green sur blue
$magenta = $blue->add( $red );
$white   = $red->add( $green )->add( $blue );

print( $red     . PHP_EOL );
print( $green   . PHP_EOL );
print( $blue    . PHP_EOL );
print( $yellow  . PHP_EOL );
print( $cyan    . PHP_EOL );
print( $white   . PHP_EOL );
print( $magenta . PHP_EOL );

Color::$verbose = False;
$black = $white->sub( $red )->sub( $green )->sub( $blue );

print( 'Black: ' . $black . PHP_EOL );

Color::$verbose = True;
$darkgrey = new Color( array( 'rgb' => (10 << 16) + (10 << 8) + 10 ) );

print( 'darkgrey: ' . $darkgrey . PHP_EOL );

$lightgrey = $darkgrey->mult( 22.5 );

print( 'lightgrey: ' . $lightgrey . PHP_EOL );

$random = new Color( array( 'red' => 12.3, 'green' => 31.2, 'blue' => 23.1 ) );

print( 'random: ' . $random . PHP_EOL );
?>


red
255 000 000 
g
000 255 000
b
000 000 255

yellow 
r 255 000 000 
+g 0000 255 000
255 255 000

0000 0000 = 00
0000 1111 = 15
1000 0000 = 128
0000 0000 1111 1111 = 255

0000 0000 | 0000 0000 | 0000 0000
0000 0000 | 1111 1111 | 0000 0000

0000 0000    0011 0000    0011 1001