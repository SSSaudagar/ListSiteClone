<?php
    require_once("../../connect/connection.php");
    $sql="select * from movies";
    
function getMovies(){
    $sql="SELECT * FROM `movies` join `directors` join `languages` on `movies`.director = `directors`.directorID and `movies`.`language` = `languages`.`languageID` WHERE 1 ";
    $result=mysql_query($sql) or die("Mysql query failed");
    return $result;
}

function getTime($timeSecs){
    $sec=$timeSecs%60;
    $min=((int)($timeSecs/60))%60;
    $hour=(int)($timeSecs/3600);
    $text="";
    if($hour>0) $text=$text." ".$hour." HRS";
    if($min>0) $text=$text." ".$min." MIN";
    if($sec>0) $text=$text." ".$sec." SEC";
    return $text;
}

function getCountries($movieID){
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
function getGenres($movieID){
    $sql="SELECT * FROM `genre_movies` join `genre` on `genre_movies`.`genre`=`genre`.`genreID` WHERE `movie`=".$movieID;
    $result=mysql_query($sql) or die("Mysql query failed");
    return $result;
}
?>