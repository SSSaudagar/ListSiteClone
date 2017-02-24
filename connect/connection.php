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

function getTime($timeSecs){//convert time to string
    $sec=$timeSecs%60;
    $min=((int)($timeSecs/60))%60;
    $hour=(int)($timeSecs/3600);
    $text="";
    if($hour>0) $text=$text.$hour." HRS ";
    if($min>0) $text=$text.$min." MIN ";
    if($sec>0) $text=$text.$sec." SEC";
    return $text;
}
function getGenres($movieID){//get all genres of a movie
    $sql="SELECT * FROM `genre_movies` join `genre` on `genre_movies`.`genre`=`genre`.`genreID` WHERE `movie`=".$movieID;
    $result=mysql_query($sql) or die("Mysql query failed");
    return $result;
}
function checkGet($string){//check whether a get parameter exists and return its value. 
    if(isset($_GET) and isset($_GET[$string]) and !empty($_GET[$string])){
        return $_GET[$string];
    }
    else return false;
}
function getCountries($movieID){//return countries for perticular movie
        $sql="SELECT * FROM `country_movies` join `country` on `country_movies`.`country`=`country`.`countryID` WHERE `movie`=".$movieID;
    //echo $sql;
    $text="";
    $result=mysql_query($sql) or die("Mysql query failed");
    if($row=mysql_fetch_assoc($result)){
        $text=$row['countryName'];
        while($row=mysql_fetch_assoc($result)){
            $text.=", ".$row['countryName'];
        }
    }else{
        $text="No Region";
    }
    return $text;
}

?>