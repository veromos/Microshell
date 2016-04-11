<?php
// environment.php for  in /home/chen_c/Piscine/MicroShell/include
// 
// Made by CHEN Christophe
// Login   <chen_c@etna-alternance.net>
// 
// Started on  Sat Oct 24 11:36:00 2015 CHEN Christophe
// Last update Sat Oct 24 13:22:01 2015 CHEN Christophe
//
preg_match("/([\/][\S]+)[\/]/", getcwd(), $previous);

$_server = array(
		 "LOGNAME" => "chen_c",
		 "USERS" => "chen_c",
		 "HOME" => $previous[1],  
		 "PWD" => getcwd(),
		 "OLDPWD" => getcwd(),
		 "LANG" => "en_US.UTF-8",
		 "LANGUAGE" => "en_US:en",
		 );