<?php 
require 'libs/rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=name','user', 'password' ); 

if ( !R::testconnection() )
{
		exit ('Connection To The Database Failed');
}

session_start();