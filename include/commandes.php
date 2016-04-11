<?php
// commandes.php for  in /Users/chen_c/piscine/MicroShell/include
// 
// Made by CHEN Christophe
// Login   <chen_c@etna-alternance.net>
// 
//
// Last update Sat Oct 24 14:43:36 2015 CHEN Christophe
//

function func_echo($params){
  $i = 1;
  reset($_ENV);
  preg_match("/[^$]+/", $params[1], $key);
  if ($params[1] == "")
    {
      echo $params[1] . "\n";
      return (0);
    }
  if (isset($params[1]))
    {
     if ($params[1][0] == '$')
       echo $_ENV[$key[0]];
     else if (isset($params[1]))
       while ($i < count($params))
	 {
	    if (isset($params[$i + 1]))
	      echo $params[$i] . " ";
	    else
	      echo $params[$i] . "\n";
	    $i++;
	  }
    }
  else
    echo "\e[1;31mError: echo: Invalid arguments.\n\e[0m";
}


function func_ls($params){
  
$i = 1;

if ($params[1] == "")
  $ls = scandir(getcwd());
else if (isset($params[1]) === true)
  $ls = scandir($params[$i]);
else
  echo "\e[1;31mError: ls: Invalid arguments.\n\e[0m";
while ($i < count($ls))
  {
    if (is_dir($ls[$i]) == true && $ls[$i][0] != '.')
      echo "\e[1;34m{$ls[$i]}/\n\e[0m";
    else if (is_executable($ls[$i]) == true && $ls[$i][0] != '.')
      echo "\e[0;32m{$ls[$i]}*\n\e[0m";
    else if (is_link($ls[$i]) == true && $ls[$i][0] != '.')
      echo "\e[1;33m{$ls[$i]}@\n\e[0m";
    else if ($ls[$i][0] != '.')
      echo $ls[$i] . "\n";
    $i++;
  }
}

function func_cd($params)
{
  if ($params[0] == "cd" && $params[1] == false)
    {
      $_ENV["OLDPWD"] = $_ENV["PWD"];
      $_ENV["PWD"] = $_ENV["HOME"];
      chdir($_ENV["HOME"]);
    }
  else if (count($params) == 3)
    func_cd2($params);
  else
    echo "\e[0;31mError : cd: can only take one argument\n\e[0m";
}

function func_cd2($params)
{
  preg_match("/([\/][\S]+)[\/]/", $_ENV["PWD"], $previous);
  if ($params[1] == "-")
    {
      chdir($_ENV["OLDPWD"]);
      $_ENV["PWD"] = $_ENV["OLDPWD"];
    }
  else if ((($params[1]) == true) && $params[1] != "..")
    {
      if (is_dir($params[1]) === true)
	chdir($params[1]);
      else
	{
	  echo "ERROR";
	  return 0;
	}
      $_ENV["OLDPWD"] = $_ENV["PWD"];
      $_ENV["PWD"] = $_ENV["PWD"] . "/" . $params[1];
    }
  else if ((($params[1]) == true) && $params[1] == "..")
    {
      $_ENV["OLDPWD"] = $_ENV["PWD"];
      $_ENV["PWD"] = $previous[1];
      chdir($_ENV["PWD"]);
    }
}