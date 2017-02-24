<?php
    require_once("mainControl.php")
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movies</title>
        <!-- Bootstrap -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../assets/css/navbar-fixed-top.css" rel="stylesheet">
        <link href="../../assets/css/jumbotron.css" rel="stylesheet">
        <link href="../../assets/css/main.css" rel="stylesheet">


    </head>

    <body>
<!--        fixed header using bootstrap-->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Movies Listing</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>

        <!-- Main component for searching and filtering -->
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8">
                    <h2>Explore</h2>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <hr/>
            <form action="<?=htmlentities($_SERVER['PHP_SELF']) ?>" method="get">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Filter by</h3>
                        <hr>
                    </div>
                    <input hidden="hidden" readonly name="page" value="1">
<!--                    Search for a string-->
                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <div class="form-group" id="title">
                                <label for="" class="col-md-3 control-label"><em>Search:</em> </label>
                                <div class="col-md-9">
                                    <input class="form-control" name="title" placeholder="Search" value="<?=checkGet(" title ") ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
<!--                        Filter with genre-->
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label"><em>Genre:</em> </label>
                                <div class="col-md-9">
                                    <select name="genre" id="genre" class="form-control">
                                        <option value="">All</option>
                                        <?php $allGenre=getAllGenres();
                                    while($oneGenre=mysql_fetch_assoc($allGenre)){
                                ?>
                                            <option value="<?=$oneGenre['genreID']?>" <?php if(checkGet( "genre")==$oneGenre[ 'genreID']) echo "selected" ?>>
                                                <?=$oneGenre['genreName']?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
<!--                        FIlter with Language-->
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label"><em>Language:</em> </label>
                                <div class="col-md-9">
                                    <select name="language" id="language" class="form-control">
                                        <option value="">All</option>
                                        <?php $allLang=getLanguages();
                                    while($lang=mysql_fetch_assoc($allLang)){
                                ?>
                                            <option value="<?=$lang['languageID']?>" <?php if(checkGet( "language")==$lang[ 'languageID']) echo "selected" ?>>
                                                <?=$lang['languageName']?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
<!--                        Sort by -->
                        <div class="form-group row form-horizontal">
                            <label for="" class="col-md-3 control-label"><em>Sort by:</em> </label>
                            <div class="col-md-9">
                                <select name="sort" id="sort" class="form-control">
                                    <option value="1" <?php if(checkGet( "sort")==1) echo "selected"; ?>>Freshness</option>
                                    <option value="2" <?php if(checkGet( "sort")==2) echo "selected" ?>>Popularity</option>
                                    <option value="3" <?php if(checkGet( "sort")==3) echo "selected" ?>>Length</option>
                                </select>
                            </div>
                        </div>
<!--                        Sort Direction-->
                        <div class="form-group row form-horizontal">
                            <div class="col-md-3"> </div>
                            <div class="col-md-2 radio"><input class="" type="radio" name="direction" value="2" <?php if(checkGet("direction") and $_GET['direction']==2) echo "checked"; ?>>Ascending</div>
                            <div class="col-md-3 radio"><input class="" type="radio" name="direction" value="1" <?php if(checkGet("direction") and $_GET['direction']!=2) echo "checked"; ?>>Descending</div>
                            <div class="col-md-3"><button class="btn btn-success rightbtn">Search <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></div>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
        </div>

        <div class="container">
            <?php
            $genre=(checkGet("genre"))? checkGet("genre"):NULL;
            $language=(checkGet("language"))? checkGet("language"):NULL;
            $sort=(checkGet("sort"))? checkGet("sort"):NULL;
            $search=(checkGet("title"))? checkGet("title"):NULL;
            $page=(checkGet("page"))? checkGet("page"):1;
            $direction=(checkGet("direction"))? checkGet("direction"):1;
//            function to get values from the database
            $res=getMovies($search,$genre,$language,$sort,$page,$direction);
            while($row=mysql_fetch_assoc($res)) {
        ?>
<!--            Row for displaying each movie-->
                <div class="row listing">
                    <div class="col-md-5"><img src="../../assets/images/<?=$row['movieID'] ?>.jpg"> </div>
                    <div class="col-md-5">
                        <h2><a href="#"><?=$row['movieName'] ?></a></h2>
                        <p><?=substr($row['description'],0,300) ?>... </p>
                        <h4><?=getCountries($row['movieID']) ?>/<?=getTime($row['time']) ?></h4>
                        <h4>Dir:<?=$row['directorName'] ?></h4>
                        <p class="genres">
                        <?php $gen=getGenres($row['movieID']);
                        while($genre=mysql_fetch_assoc($gen)){
                        ?>
                            <span><a class="btn btn-small btn-default"><?=$genre['genreName'] ?></a></span>
                        <?php } ?>
                        </p>
                    </div>
                    <div class="col-md-2 col3">
                        <h4><?=$row['views'] ?> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></h4>
                        <h4><?=$row['likes'] ?> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></h4>
                    </div>
                </div>
                <hr>
                <?php } ?>
<!--            Paging to display only 3 movies per page-->
                    <div class="row paging">
                        <a href="<?=previous($_GET)?>"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
                        <span class="page">Page <?=(checkGet("page"))? checkGet("page"):1 ?></span>
                        <a href="<?=nextpage($_GET)?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                    </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../assets/js/bootstrap.min.js"></script>
    </body>

    </html>