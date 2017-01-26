<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ERLA - Strony internetowe, HTML, CSS, WordPress</title>
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

        <meta name="description" content="Strony internetowe, projekty internetowe, webdesign, programowanie, HTML, CSS, JavaScript, PHP, Wordpess">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="favicon.png"/>

  
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/rk-slider.css">

        <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->
        <link rel="stylesheet" href="css/swipebox.min.css">

        <!-- Google web fonts -->
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        

        <div class="container">
            <div class="row">
            <!-- =================================
                        LEFT CONTENT
                 =================================
             -->
                <div class="col-md-2" style="padding: 0">
                    
                    <div class=" left-content affix-top" data-spy="affix">    
                        <nav>
                            <a href="index.php"><img src="img/me.jpg" alt="Roman Kowalski" class="img-circle"></a>
                            <p><strong>Roman Kowalski</strong></p>

                            <ul>
                                <li data-point="tasks" class="selected"><a href="#tasks">Zadania</a></li>
                                <li data-point="projects"><a href="#projects">Zrealizowane projekty</a></li>
                                <li data-point="tools"><a href="#tools">Styl pracy</a></li>
                                <li data-point="contact"><a href="#contact">Kontakt</a></li>
                            </ul>
                        </nav>

                        <section id="social-icons">
                            <a href="mailto:roman@erla.pl"><i class="fa fa-envelope-o fa-2x" aria-hidden="true">&nbsp;</i></a>
                            <a href="tel:+48509180864"><i class="fa fa-mobile fa-2x" aria-hidden="true">&nbsp;</i></a>
                            <!-- <a href="#"><i class="fa fa-skype fa-2x" aria-hidden="true">&nbsp;</i></a> -->
                            <br>
                            <a href="https://codepen.io/erla/" target="_blank"><i class="fa fa-codepen fa-2x" aria-hidden="true">&nbsp;</i></a>
                            <a href="https://github.com/kowal2499" target="_blank"><i class="fa fa-github fa-2x" aria-hidden="true">&nbsp;</i></a>
                        </section>
                    </div>

                </div>

            <!--   ==================================
                        RIGHT CONTENT
                   ==================================
            -->


                <div class="col-md-10" style="padding: 0">
                    <div class="right-panel">
                        <article id="tasks">
                            <?php include 'tasks.php'; ?>
                        </article>

                        <article id="projects">
                            <?php include 'projects.php'; ?>
                        </article>

                        <article id="tools">
                            <?php include 'tools.php'; ?>
                        </article>

                        <article id="contact">
                            <?php include 'contact.php'; ?>
                        </article>

                        <footer>
                            <span style="float: left">(c) 2017, Roman Kowalski</span>
                        <span>
                            Made in Koszalin, Poland
                            
                        </span>

                        <img src="img/erla-logo.png">
                        </footer>
                    </div>
                </div>

            </div>
        </div>


        <script src="js/vendor/jquery-2.1.0.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/rk-slider.js"></script>
        <script src="js/jquery.swipebox.min.js"></script>

        <script>
            $( '.buttons-area button#btn-gallery' ).click( function( e ) {
                e.preventDefault();
                // get the ID of the project which button was clicked
                var projectId = $(this).data("projectId");

                var content = $(".slider-wrapper li#" + projectId + " .full-page-imgs li");
                var elements = [];

                for (var i=0; i< content.length; i++) {
                    elements.push(
                        {
                            "href": $(content[i]).data("img"),
                            "title": $(content[i]).data("desc")
                        });
                }
                if (elements.length > 0) {
                    $.swipebox( elements );
                }
            } );

        </script>



        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-88186600-1', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>
