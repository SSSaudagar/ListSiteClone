<?php
    require_once("../../connect/connection.php");
    $sql="select * from movies";
    
function getMovies($genre,$language,$sort=1){
    $sql="SELECT * FROM `movies` M join `directors` join `languages` on M.director = `directors`.directorID and M.`language` = `languages`.`languageID` WHERE 1 ";
    if($language!=NULL){
        $sql.="and M.`language` = ".$language." ";
    }
    if($genre!=NULL){
        $sql.="and M.movieID in (select movie from genre_movies where genre=".$genre.") ";
    }
    switch($sort){
        case 2:
            $sql.="order by likes desc";
            break;
        case 3: 
            $sql.="order by time";
            break;
        default:
            $sql.="order by timestamp desc";
            break;
    }
    $result=mysql_query($sql) or die("Mysql query failed: ".$sql);
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

function getAllGenres(){
    $sql="SELECT * FROM `genre` ";
        $result=mysql_query($sql) or die("Failed to retrieve Genres");
        return $result;
}
function getLanguages(){
     $sql="SELECT * FROM `languages` ";
        $result=mysql_query($sql) or die("Failed to retrieve Languages");
        return $result;
}
?>