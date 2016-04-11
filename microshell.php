#!/usr/bin/env php
<?php
// microshell.php for  in /Users/chen_c/piscine/MicroShell
// 
// Made by CHEN Christophe
// Login   <chen_c@etna-alternance.net>
// 
// Started on  Thu Oct 22 20:11:55 2015 CHEN Christophe
// Last update Sat Oct 24 14:10:57 2015 CHEN Christophe
//
require_once('include/environment.php');
require_once('include/affichage.php');
require_once('include/commandes.php');
require_once('include/decoupage.php');
require_once('include/env.php');
global $_ENV;
$_ENV = $_SERVER;

func_clear();
$fd = fopen('php://stdin', 'r');
if ($fd !== false)
  {
    aff_prompt();
    while (($line = fgets($fd)) != "exit\n")
      {
	$params = decoup_params($line);
	$ptr = 'func_' . $params[0];
	if (function_exists($ptr))
	  {
	    $ptr($params);
	  }
	else
	  echo ": Command not found\n";
      	aff_prompt();
      }
    aff_exit();
    fclose($fd);
  }