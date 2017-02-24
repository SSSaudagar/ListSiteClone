<?php require_once("movieControl.php"); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Movies</title>

        <!-- Bootstrap -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../assets/css/navbar-fixed-top.css" rel="stylesheet">
        <link href="../../assets/css/jumbotron.css" rel="stylesheet">
        <link href="../../assets/css/movie.css" rel="stylesheet">

    </head>

    <body>
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

        <!-- Main component for a primary marketing message or call to action -->
        <?php
        $details=getMovieDetails(checkGet("id"));
    ?>
            <div><img src="../../assets/images/<?=$details['movieID']?>.jpg"></div>
            <div id="banner">
                <div class="container" id="info">
                    <h2><?=$details['movieName'] ?></h2>
                    <hr>
                    <div class="col-md-7">
                        <h4><?=$details['tagline']?></h4>
                        <h3>by <span class="director"><?=$details['directorName'] ?></span></h3>
                        <h5><?=$details["languageName"] ?></h5>
                        <h4><?=getCountries($details['movieID']) ?>/<?=getTime($details['time']) ?></h4>
                        <hr>
                        <?php $gen=getGenres($details['movieID']);
                        while($genre=mysql_fetch_assoc($gen)){
                        ?>
                            <span><a class="btn btn-small btn-default"><?=$genre['genreName'] ?></a></span>
                        <?php } ?>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-2" id="view">
                        <h4><?=$details['views'] ?> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></h4>
                        <h4><?=$details['likes'] ?> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></h4>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>

            <div class="container">
                <p id="discription">
                    <?=$details["description"]?>
                </p>
                <div class="row">
                    <div class="col-md-10-offset-2">
                        <a class="btn btn-warning btn-block" href="<?=getPrevious()?>">Go Back</a>
                    </div>
                </div>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="../../assets/js/bootstrap.min.js"></script>
    </body>

    </html>