<?php
    require_once("../../connect/connection.php");
    if(!isset($_GET['id'])) die("Unauthorised Access. ID not set");
    
function getPrevious(){
    $param=$_GET;
    unset($param['id']);
    $link="../mainPage/main.php?".http_build_query($param);
    return $link;
    
}
function getMovieDetails($id){//function that generates query for movie details
    $sql="SELECT * FROM `movies` M join `directors` join `languages` on M.director = `directors`.directorID and M.`language` = `languages`.`languageID` WHERE movieID=".$id;
        $result=mysql_query($sql) or die("Mysql query failed: ".$sql);
    $res=mysql_fetch_assoc($result);
    return $res;
}
?>