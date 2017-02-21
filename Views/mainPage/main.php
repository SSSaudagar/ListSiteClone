<?php
    require_once("mainControl.php")
?>
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
    <link href="../../assets/css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-9">
                <h1>Explore</h1>
            </div>
            <div class="col-md-3"></div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <h2>Filter by</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"><em>Genre:</em> </label>
                        <div class="col-md-9">
                            <select name="genre" id="genre" class="form-control">
                                <option value="">All</option>
                                <option value="2">Indian</option>
                                <option value="7">Horror</option>
                                <option value="9">Sci-Fi</option>
                                <option value="4">Thriller</option>
                                <option value="11">Award Winning</option>
                                <option value="5">Animation</option>
                                <option value="8">Romance</option>
                                <option value="6">Comedy</option>
                                <option value="14">Famous Directors</option>
                                <option value="10">Fantasy</option>
                                <option value="12">Experimental</option>
                                <option value="13">Bed Time Stories</option>
                                <option value="15">Dark</option>
                                <option value="22">Drama</option>
                                <option value="33">Disaster Porn</option>
                                <option value="34">Short Doc</option>
                                <option value="35">Oscar Winning</option>
                                <option value="44">Family</option>
                                <option value="55">Surreal</option>
                                <option value="57">Space</option>
                                <option value="59">Offline</option>
                                <option value="1">Uncategorized</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"><em>Language:</em> </label>
                        <div class="col-md-9">
                            <select name="language" id="language" class="form-control">
                                <option value="">All</option>

                                <option value="20">French</option>
                                <option value="21">Romanian</option>
                                <option value="24">Hindi</option>
                                <option value="25">English</option>
                                <option value="26">Japanese</option>
                                <option value="37">German</option>
                                <option value="39">Korean</option>
                                <option value="41">Spanish</option>
                                <option value="43">Mandarin</option>
                                <option value="46">Swedish</option>
                                <option value="49">Arabic</option>
                                <option value="52">Persian</option>
                                <option value="53">Catalan</option>
                                <option value="56">Marathi</option>
                                <option value="58">Assamese</option>
                                <option value="65">Bengali</option>
                                <option value="74">Danish</option>
                                <option value="93">Malayalam</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row form-horizontal">

                    <label for="" class="col-md-3 control-label"><em>Sort by:</em> </label>
                    <div class="col-md-9">
                        <select name="sort" id="sort" class="form-control">
                            <option value="1">Freshness</option>
                            <option value="2">Popularity</option>
                            <option value="3">Length</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row form-horizontal">
                    <button class="btn btn-success rightbtn">Search <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <div class="container">
        <?php
            $res=getMovies();
            while($row=mysql_fetch_assoc($res)) print_r($row);
        ?>
        
        <div class="row listing">
            <div class="col-md-5"><img src="../../assets/images/3.jpg"> </div>
            <div class="col-md-5">
                <h2><a href="#">Lovey Dovey</a></h2>
                <p>A cute-awkward, unromantically- romantic and unconventional story of an army man celebrating Valentines Day with his wife and trying to woo her. Watch his hilarious attempts and her indifference, </p>
                <h4>INDIA/20mins</h4>
                <h4>DIR:Adeeb Rai</h4>
                <p class="genres">
                    <span><a class="btn btn-small btn-default">Comedy</a></span>
                    <span><a class="btn btn-small btn-default">Drama</a></span>
                    <span><a class="btn btn-small btn-default">Indian</a></span>
                    <span><a class="btn btn-small btn-default">Romance</a></span>
                </p>
            </div>
            <div class="col-md-2 col3">
                <h4>237<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></h4>
                <h4>84<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></h4>
            </div>
        </div>
        <div class="row paging">
            <a><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
            <a>1</a>
            <a>2</a>
            <a>3</a>
            <a><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>