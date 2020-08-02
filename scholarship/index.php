<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jhole Ranking</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">JHOLEY RANKING</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-links" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-capitalize" id="nav-links">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">contact us</a>
                        </li>
                      
                       
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <header id="home">
            <div class="content">
                <div class="d-flex align-items-center flex-column justify-content-center">
                    <h1>Create your Future Here</h1>
                    <h2>Successfully partnering up with various Universities in Australia for easy pathway.<br> Offering custom ranking for all </h2>
                    <a href="register.php">
                        <span>Register</span>
                        <i class="fas fa-long-arrow-alt-right fa-2x"></i>
                    </a><br>
                    <h2>Already a memeber? </h2>
                    <a href="register.php">
                        <span>Sign In</span>
                        <i class="fas fa-long-arrow-alt-right fa-2x"></i>
                    </a>
                </div>
            </div>
          <div id="slideToNext" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="imgs/header.jpg" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="imgs/header.jpg" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="imgs/header.jpg" class="d-block w-100">
              </div>
            </div>
            <a class="carousel-control-prev" href="#slideToNext" role="button" data-slide="prev">
              <i class="fas fa-chevron-left"></i>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slideToNext" role="button" data-slide="next">
              <i class="fas fa-chevron-right"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
     </header>
        
        
        <div class="contact" id="contact">
            <div class="container"><h2 class="text-capitalize"><span>get</span> in touch</h2></div>
            <div class="contact-child">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="contact-form">
                                <form>
                                    <input type="text" placeholder="Your name">
                                    <input type="text" placeholder="Your Phone number">
                                    <input type="email" placeholder="Your email">
                                    <textarea placeholder="Message"></textarea>
                                    <input type="submit" value="send" class="text-uppercase">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <a href="index.html" class="logo">JHOLEY RANKING</a>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                <span>Allawah New South Wales 2218 </span>
                            </div>
                            <div class="col-md-4 col-12">
                                <i class="fas fa-phone fa-2x"></i>
                                <span>(+71) 56982424536</span>
                            </div>
                            <div class="col-md-4 col-12">
                                <i class="fas fa-envelope fa-2x"></i>
                                <span>Jholeyranking@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <h4 class="text-capitalize">About Jholeyranking</h4>
                            <p>Successfully partnering up with various Universities in Australia for easy pathway.<br> Offering custom ranking for all</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <h4 class="text-capitalize">Menu</h4>
                            <ul class='text-capitalize main-list'>
                                <li><a href="#home">home</a></li>
                                
                                <li><a href="#contact">contact us</a></li>
                                
                            </ul>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <h4 class="text-capitalize">about factory</h4>
                            <form>
                                <input type="text" placeholder="Enter your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="copyright">
                    <p>© 2020 All Rights Reserved. Jholey Ranking</p>
                </div>
            </div>
        </footer>    
            
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(function () {
                
                'use strict';
                
                var winH = $(window).height();
                
                $('header, .slide').height(winH);
                
                $('.navbar a.search-link').on('click', function () {
                    $(this).siblings('form').fadeToggle();
                });
                
                $('.navbar ul.navbar-nav li a, footer ul.main-list li a').on('click', function (e) {
                    
                    var getAttr = $(this).attr('href');
                    
                    e.preventDefault();
                    $('html').animate({scrollTop: $(getAttr).offset().top}, 1000);
                });
            });
        </script>
    </body>
</html>