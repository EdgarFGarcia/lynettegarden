@include('layouts.headermain')
    
    @include('layouts.mainnavigation')
    
<div id="slider">
<div id="headerSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <li data-target="#headerSlider" data-slide-to="1"></li>
    <li data-target="#headerSlider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/forest.jpg"class="d-block w-100" alt="...">
        <div class="carousel-caption">
            <h5>Our Business is Making Memory Unforgettable</h5>
            <a href="#portfolio" class="btn btn-light">MAKE AN RESERVATION</a>
        </div>
      </div>
    <div class="carousel-item">
      <img src="img/Grass%20green.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
            <h5>Plan Your Dream Event With Us</h5>
            <a href="#portfolio" class="btn btn-light">MAKE AN RESERVATION</a>
        </div>
      </div>
    <div class="carousel-item">
      <img src="img/sunny%20forest.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
            <h5>Here at #LynetteGardens</h5>
            <a href="#portfolio" class="btn btn-light">MAKE AN RESERVATION</a>
        </div>    </div>
  </div>
  <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
    
    <!------------------------------About-------------------------->
    
<section id="about">
<div class="container">
<div class="col-md-8">
<h2 align="center">WELCOME</h2>
<div class="about-content">

    LYNETTE GARDENS is an event management production, organizer based in Pasig, Metro Manila<p/><br/>
    
    We  specializes in the  conceptualization, organization, management and execution of  events providing a complete service from the planning stage through to the seamless delivery of the event.<p/><br/>

    LYNETTE GARDENS was founded by Sonny Hernandez who is a certified member of Philippine Airforce and holds degrees in both Mechanical Engineering and Computer Engineering he finished his college at Palawan, Puerto Princesa City and transfer his whole family member in Quezon City, Cubao.<p/><br/>
    
    The company was founded and continues to operate by the principle of providing a good quality service throughout the design and planning. Besides than providing good quality services LYNETTE GARDENS also take pride in competing their ideas to any competitors.<p/><br/>
    
    The company was established since 2016 and the function hall is operating since November 2016, the location has its approximately 642 sqm lot area and it was located at the Barangay Santolan, Evangelista St. City of Pasig. The business name was named after his beloved wife Lynette Hernandez. Hernandez youngest daughter Mia Hernandez who soon to be graduated as a Civil Engineer in Rizal Technology University Mandaluyong branch shes helping their business to run.<p/>  <p/>  
    
<a href="#contact" class="btn btn-dark">FIND OUT MORE</a> 
</div>    
</div>
</div>
</section>
    
@yield('content')
    
    <!----------------------------------------Team Members---------------------------------------------------------->
<section id="team">
<div class="container">
        <h1>Our Team</h1>
        <div class="row">
        <div class="col-md-3 profile-pic text-center">
        <div class="img-box">
        <img src="img/team%201.jpg" class="img-responsive">
            <ul>
                <a href="https://www.facebook.com/iaaaannn"><li><i class="fa fa-facebook"></i></li></a>
                <a href="http://www.twitter.com"><li><i class="fa fa-twitter"></i></li></a>
                <a href="https://www.instagram.com/diamanteiann/"><li><i class="fa fa-instagram"></i></li></a>
            </ul>
             </div>
                <h2>Diamante, Ian</h2>
                <h3>Font-End</h3>
            <p>Converting data to a graphical interface, through the use of HTML, CSS, and JavaScript, so that users can view and interact with that data.</p>
            </div>
                    <div class="col-md-3 profile-pic text-center">
        <div class="img-box">
        <img src="img/team2.jpg" class="img-responsive">
            <ul>
                <a href="https://www.facebook.com/ziska.arciagaii"><li><i class="fa fa-facebook"></i></li></a>
                <a href="http://www.twitter.com"><li><i class="fa fa-twitter"></i></li></a>
                <a href="https://www.instagram.com/lierarcg/"><li><i class="fa fa-instagram"></i></li></a>
            </ul>
             </div>
                <h2>Arciaga, Liera</h2>
                <h3>Documentation</h3>
                <p> Keeping accurate information about the objects in their care function and provenance. Inputting data about new acquisitions, researching images for catalogues or developing on-line guides.</p>
            </div>
                    <div class="col-md-3 profile-pic text-center">
        <div class="img-box">
        <img src="img/team%203.jpg" class="img-responsive">
            <ul>
                <a href="https://www.facebook.com/rodolfjohn.bunag"><li><i class="fa fa-facebook"></i></li></a>
                <a href="http://www.twitter.com"><li><i class="fa fa-twitter"></i></li></a>
                <a href="https://www.instagram.com/rjbunag/"><li><i class="fa fa-instagram"></i></li></a>
            </ul>
             </div>
                <h2>Bunag, Rodolf</h2>
                <h3>Back-End / Database</h3>
                <p>Associate with data access layer of software or hardware and includes any functionality that needs to be accessed and navigated to by digital means.</p>
            </div>
                    <div class="col-md-3 profile-pic text-center">
        <div class="img-box">
        <img src="img/team%204.jpg" class="img-responsive">
            <ul>
                <a href="https://www.facebook.com/Anthony.alacazar"><li><i class="fa fa-facebook"></i></li></a>
                <a href="http://www.twitter.com"><li><i class="fa fa-twitter"></i></li></a>
                <a href="https://www.instagram.com/anthonyalcazar08/"><li><i class="fa fa-instagram"></i></li></a>
            </ul>
             </div>
                <h2>Lawagan, Nathaniel</h2>
                <h3>Back-End / Database</h3>
                <p>Associate with data access layer of software or hardware and includes any functionality that needs to be accessed and navigated to by digital means.</p>
            </div>
    </div>
</div>  
</section>
    
<!---------------------------Reservation---------------------------------------->

<section id="reservation">
    <div class="container">
        <p>Make Your Reservation Less Hassle</p>
        <a href="#portfolio" class="btn btn-warning">BOOK NOW</a>     
    </div>
</section>
    
<!---------------------------Contact Us----------------------------------------->    
    
<section id="contact">
    <div class="container">
        <h1>Get In Touch</h1>
        <div class="row">
        <div class="col-md-6">
            <form  method="post" action="#">
            
            
            
            </form>
        <form class="contact-form">
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Your Name">
        </div>
        <div class="form-group">
        <input type="number" class="form-control" placeholder="Phone Number">
        </div>
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email Address">
        </div>
        <div class="form-group">
            <textarea class="form-control" row="4" placeholder="Message"></textarea>
        </div>
            <button type="submit" class="btn btn-warning">SEND MESSAGE >></button>
        </form>
        </div>
        <div class="col-md-6 contact-info"> 
            <div class="follow"><b>Address:</b><i class="fa fa-map-marker"></i> Evangelista street,Barangay Santolan, Pasig City, Metro Manila, Philippines.</div>
            <div class="follow"><b>Phone:</b><i class="fa fa-phone"></i>  09951507244</div>    
            <div class="follow"><b>Email:</b><i class="fa fa-envelope-o"></i> lynetteGardens@gmail.com</div>
            <div class="follow"><label><b>Get Social:</b></label>
                <a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
                <a href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a>
                <a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>
                <a href="http://www.googleplus.com"><i class="fa fa-google-plus"></i></a>
            </div> 
        </div>
        </div>
</div>
</section>  
    
    <!--------------------------------LOCATION-------------------------------->
    
<section id="location">
    <div class="container">
    <h1>Our Location</h1>
    <div class="row">
    <div class="col-md-6">
    <div class="card" style="width: 35rem; background-color: rgba(178,178,178,0.25)">
                <img src="img/MAP%20LOCATION.jpg.png" class="card-img-top" alt="...">
                <div class="card-body">
                <a href="#largeModal" class="btn btn-lg btn-warning" data-toggle="modal">View more >></a>
                    <!-- Large Modal HTML -->
    <div id="largeModal" class="modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Location</h4>
                </div>
                <div class="modal-body">
                    <img src="img/MAP%20LOCATION.jpg">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>     
    </div>
    </div>
    </div>
    </div>
    
        <div class="visit">
                       <h2><a style="color: white">Visit Us</a></h2>
               <p>@Lynette Gardens Event Organizer</p>
               <p>======================================</p>
            <h2><a style="color: white">Business Our</a></h2>
               <p><b>Monday-Friday :</b>9am to 6pm</p>
               <p><b>Saturday :</b>9am to 6pm</p>
               <p><b>Sunday :</b>Closed</p>
            </div>
    
</section>
    
    <!--------------------------------Footer--------------------------------->
    
    <section id="footer">
        <div class="footer-content">
        <div class="footer-section about"></div>
        <div class="footer-section links"></div>
        <div class="footer-section contact-form"></div>
        </div>
        
        <div class="footer-bottom">
            &copy; lynettegardens.com | Designed by Group 4
        </div>
    </section>
    
    <!-----------------------------footer end-------------------------------->
    
    <script src="js/smooth-scroll.js"></script>
    <script>
	    var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    @yield('script')
</body>
</html>

























