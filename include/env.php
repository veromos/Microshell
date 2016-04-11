#!/usr/bin/env php
<?php
// env.php for  in /home/chen_c/Piscine/MicroShell
// 
// Made by CHEN Christophe
// Login   <chen_c@etna-alternance.net>
// 
// Started on  Fri Oct 23 18:01:48 2015 CHEN Christophe
// Last update Sat Oct 24 13:57:13 2015 CHEN Christophe
//

function func_env($params)
{
  if ($params[1] == false)
    {
      reset($_ENV);
      echo key($_ENV) . "=";
      echo current($_ENV) . "\n";  
      while (next($_ENV) !== false)
	{
	  echo key($_ENV) . "=";
	  echo current($_ENV) . "\n";  
	}
    }
  else
    echo "\e[0;31mError : Invalid arguments.\n\e[0m";
}

function func_setenv($params)
{
  if ((count($params) == 3) || (count($params) == 4))
    {
      $_ENV["$params[1]"] = "$params[2]";
      return ($_ENV);
    }
  else
    echo "\e[0;31mError: Invalid arguments.\n\e[0m";
}

function func_unsetenv($params)
{
  if (count($params) == 3)
    {
      if ($params[1] == "PWD" || $params[1] == "HOME" || $params[1] == "OLDPWD")
	echo "\e[0;31mError : Permission denied.\n\e[0m";
      else if (isset($_ENV["{$params[1]}"]))
	{
	  unset($_ENV["{$params[1]}"]);
	  return ($_ENV);
	}
      else
	echo "\e[0;31mError: $params[1] is already null.\n\e[0m";
    }
  else
    echo "\e[0;31mError: Invalid arguments.\n\e[0m";
}

function func_pwd($params)
{
  echo $_ENV["PWD"] . "\n";
  return $_ENV["PWD"];
}