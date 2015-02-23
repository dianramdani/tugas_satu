<?php

function welcome($players)
{
    echo "#====================================================#";
    echo "\n";
    echo "#           Welcome To Batle Arena                   #";
    echo "\n";
    echo "#----------------------------------------------------#";
    echo "\n";
    echo "# Description :                                       #";
    echo "\n";
    echo "# 1. Ketik New untuk membuat karakter                 #";
    echo "\n";
    echo "# 2. Ketik Start untuk memulai pertarungan            #";
    echo "\n";
    echo "#-----------------------------------------------------#";
    echo "\n";
    echo "# Current Player :                                    #";
    echo "\n";
    for ($i=0; $i < count($players); $i++)
    {
        echo "#                   ".$players[$i]->get_name()."  #\n";  
    }
    echo "#                                                     #\n";
    echo  "# * max player 2 atau 3                              #\n";
    echo "#-----------------------------------------------------#\n";
    echo "(new/start)?";    
}

function initBatle($players)
{
    $versus = [];
    echo "#======================================================#\n";
    echo "#              Welcome to Battle Arena                 #\n";
    echo "#------------------------------------------------------#\n";
    echo "Siapa yang akan menyerang :";
    $penyerang = findPlayerByName($players, requestInput());
    array_push($versus, $penyerang);
    echo "Siapa yang diserang       :";
    $diserang = findPlayerByName($players, requestInput());
    array_push($versus, $diserang);
    echo "#------------------------------------------------------#\n";

    return $versus;
}


function doBatle($versus)
{
    $penyerang = $versus[0];
    $diserang = $versus[1];
        echo "Descriptions : \n";
            $x = 20;
            $mana = $penyerang->mana - $x;
            $penyerang->set_mana($mana);
            $blood = $diserang->blood - $x;
            $diserang->set_blood($blood);
            echo $penyerang->name." : "." mana = ".$penyerang->mana.", Blood =  ".$penyerang->blood ."\n";
            echo $diserang->name." : "." mana = ".$diserang->mana.", Blood =  ".$diserang->blood ."\n";
}

function findSmallestManna($players)
{
    $smallest_mana = 100;
    foreach ($players as $player)
    {
        if ($player->mana < $smallest_mana)
            $smallest_mana = $player->mana;
    }
    return $smallest_mana;
}

function createPlayer($name)
{
    //use class Player
    $player_one = new Player;
    $player_one->set_name($name); 
    echo $player_one->get_name(); 
    echo "\n";
    return $player_one;
}

function findPlayerByName($players,$name)
{
    foreach ($players as $player)
    {
        if ($player->get_name() == $name)
        {
            $found = $player;
            return $found;
        }
    }
}

function requestInput()
{
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    return trim($line);
}
?>