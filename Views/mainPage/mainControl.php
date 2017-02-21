<?php
    require_once("../../connect/connection.php");
    $sql="select * from movies";
    
function getMovies(){
    $sql="SELECT * FROM `movies` join `directors` join `languages` on `movies`.director = `directors`.directorID and `movies`.`language` = `languages`.`languageID` WHERE 1 ";
    $result=mysql_query($sql);
    return $result;
}
?>