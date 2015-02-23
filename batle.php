<?php

require('player.php');
require('methods.php');

$players = [];

welcome($players);

while (count($players) < 3)
{
    $response = requestInput();
    
    if ($response == 'new')
    {    
        echo "#----------------------------------------------------#\n";
        echo "# Masukan Nama Player :";
            $handle_name = fopen("php://stdin", "r");
            $line_name = fgets($handle_name);
            $player = createPlayer(trim($line_name));
            array_push($players, $player);
            welcome($players);
    }
    elseif ($response == 'start')
    {
        break;
    }
    else
    {
        echo "please type New or Start\n";
        welcome($players);
    }
}

$smallest_manna = 40;
while ($smallest_manna > 0)
{
    echo "\n";
    $versus = initBatle($players);
    doBatle($versus);
    $smallest_manna = findSmallestManna($players);
}

echo "#=================== Game Over =====================# \n";

?>