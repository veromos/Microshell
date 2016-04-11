<?php
// affichage.php for  in /Users/chen_c/piscine/MicroShell
// 
// Made by CHEN Christophe
// Login   <chen_c@etna-alternance.net>
// 
// Started on  Thu Oct 22 20:43:16 2015 CHEN Christophe
// Last update Sat Oct 24 15:31:49 2015 CHEN Christophe
//
function aff_prompt(){
  echo "$> ";
}

function aff_exit(){
  echo "Merci d'avoir utilise MicroShell.\nA bientot.\n";
}

function func_clear($params){
  echo "\033c";
}

function func_cat($params){
  $i = 1;
  if (isset($params[$i]))
    $filename = $params[$i];
  else
    return (0);
  while ($i < count($params))
    {
      if (file_exists($filename) == true)
	{
	  if (is_dir($filename) == false)
	  {
	    if (is_readable($filename) == true)
	      {
		if (($handle = fopen($filename, "r")) == TRUE)
		  {
		    $handle = fopen($filename, "r");
		    $contents = fread($handle, filesize($filename));
		    echo $contents . "\n";
		  fclose($handle);
		  $i++;
		  }
		else
		  echo "\e[1;31mError: $params[$i]: Cannot open file\n\e[0m";
	      }
	    else
	      echo "\e[1;31mError: $params[$i]: Permission denied\n\e[0m";
	  }
	  else
	    echo "\e[1;31mError: $params[$i]: Is a directory\n\e[0m";
	}
      else
	echo "\e[1;31mError: $params[$i]: No such file or directory\n\e[0m";
    }
}

function func_redirection($params){
  if ((count($params) == 4) && ($params[2] == ">" || $params[2] == ">>"))
    if (file_exists($params[3]) == true)
      if (is_dir($params[3]) == false)
	if (is_readable($params[3]) == true)
	  {
	  if ($params[2] == ">")
	    {
	      $handle = fopen($params[3], "w");
	      $contents = fwrite($handle, $params[1]);
	      fclose($handle);
	    }
	  else if ($params[2] == ">>")
	    {
	      $handle = fopen($params[3], "a");
	      $contents = fwrite($handle, $params[1]);
	      fclose($handle);
	    }
	  }
	else
	  echo "\e[1;31mredirection.php: $params[3]: Permission denied\n\e[0m";
      else
	echo "\e[1;31mredirection.php: $params[3]: Is a directory\n\e[0m";
    else
      echo "\e[1;31mredirection: $params[3]: No such file or directory\n\e[0m";
  else
    echo "\e[1;31mUsage : ./redirection.php 'string' '[> >>]' 'File'\n\e[0m";}