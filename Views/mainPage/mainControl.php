<?php
    require_once("../../connect/connection.php");
    $sql="select * from movies";
    
function getMovies($str,$genre,$language,$sort=1,$page,$direction){//function that generates query for movies and returns movies with details
    $sql="SELECT * FROM `movies` M join `directors` join `languages` on M.director = `directors`.directorID and M.`language` = `languages`.`languageID` WHERE 1 ";
    if($language!=NULL){//filter for movies
        $sql.="and M.`language` = ".$language." ";
    }
    if($str!=NULL){// filter to search for specific string
        $sql.="and M.`movieName` like '%".$str."%' ";
    }
    if($genre!=NULL){// filter to search for genre
        $sql.="and M.movieID in (select movie from genre_movies where genre=".$genre.") ";
    }
    switch($sort){//sorting parameter
        case 2:
            $sql.="order by likes";
            break;
        case 3: 
            $sql.="order by time";
            break;
        default:
            $sql.="order by timestamp";
            break;
    }
    if($direction==2) $sql.=" asc"; //sorting direction
    else $sql.=" desc";
    $page-=1;
    $sql.=" limit 3 offset ".(3*$page); //limit by 3 for pagination
    $result=mysql_query($sql) or die("Mysql query failed: ".$sql);
    return $result;
}
function previous($param){ //return link for previous page in pagination
    if(!isset($param['page'])) $param["page"]=1;
    $param['page']-=1; 
    $res=http_build_query($param); 
    if($param['page']>0) $link=$_SERVER['PHP_SELF']."?".$res;
    else return "#";
    return $link;
}
function nextPage($param){//return link for next page in pagination
    if(!isset($param['page'])) $param["page"]=1;
    $param['page']+=1; 
    $res=http_build_query($param); 
    if($param['page']>0) $link=$_SERVER['PHP_SELF']."?".$res;
    else return "#";
    return $link;
}

function getAllGenres(){//get all genres
    $sql="SELECT * FROM `genre` ";
        $result=mysql_query($sql) or die("Failed to retrieve Genres");
        return $result;
}
function getLanguages(){//get all languages
     $sql="SELECT * FROM `languages` ";
        $result=mysql_query($sql) or die("Failed to retrieve Languages");
        return $result;
}
?>