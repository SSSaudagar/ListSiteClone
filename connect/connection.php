<?php
Define("DB_SERVER","localhost");
  Define("DB_USER","root");
  Define("DB_PASS","");
  Define("DB_NAME","ajency");

  $connection = @mysql_connect(DB_SERVER, DB_USER, DB_PASS);
  if(! $connection ) {
      die('Could not connect: ' . mysql_error());
   }
   
   //echo 'Connected successfully';
   
  mysql_select_db(DB_NAME);
?>