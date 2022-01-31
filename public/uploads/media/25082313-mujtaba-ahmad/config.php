<?php
ini_set('mysqli.default_socket', '/tmp/mysql5.sock');
ini_set('mysql.default_socket', '/tmp/mysql5.sock');
ini_set('pdo_mysql.default_socket', '/tmp/mysql5.sock');
        

	class Config{
		
		
		//var $connectionString = array( 'development'=> 'mysql://dbo591119447:aberdeen@123#@localhost/db591119447');
		var $connectionString = array( 'development'=> 'mysql://dbu331349:AiDB#123!@db5000259449.hosting-data.io/dbs253146');
		
		function fConnectDatabase(){
		      
				ActiveRecord\Config::initialize(function($cfg)
 {
 	 
     $cfg->set_model_directory(HOMEDIR.'/models');
	 $cfg->set_connections(array( 'development'=> 'mysql://dbu331349:AiDB#123!@db5000259449.hosting-data.io/dbs253146'));
    // $cfg->set_connections(array( 'development'=> 'mysql://dbo591119447:aberdeen@123#@localhost/db591119447'));
	// $cfg->set_connections(array( 'development'=> 'mysql://irfan:4ejybebar@localhost/zadmin_crm')); 
 });
		 
			}
		}  
		
		
			/*class Config{
		
		
		var $connectionString = array( 'development'=> 'mysql://dbo527154547:CRM123#@localhost/db527154547');
		
		function fConnectDatabase(){
		      
				ActiveRecord\Config::initialize(function($cfg)
 {
     $cfg->set_model_directory(HOMEDIR.'/models');
     $cfg->set_connections(array( 'development'=> 'mysql://dbo527154547:CRM123#@localhost/db527154547'));
	// $cfg->set_connections(array( 'development'=> 'mysql://irfan:4ejybebar@localhost/zadmin_crm'));
 });
		 
			}
		} */
?>