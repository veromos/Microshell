

<?php
// decoupage.php for  in /Users/chen_c/piscine/MicroShell/include
// 
// Made by CHEN Christophe
// Login   <chen_c@etna-alternance.net>
// 
// Started on  Thu Oct 22 20:08:40 2015 CHEN Christophe
// Last update Sat Oct 24 15:19:39 2015 CHEN Christophe
//

function decoup_params($line)
{
  return (preg_split('[\s+]', $line));
}