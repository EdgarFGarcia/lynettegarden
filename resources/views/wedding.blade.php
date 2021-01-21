@include('layouts.headermain')
@include('layouts.navigationinner')

    <!-----------------------WEDDINGPAGE-------------------------->
<div class="tohideifpassed">
<section id="wedding">
    <div class="container">
        <p>The highest happiness on earth is the happiness of marriage.</p>
    </div>
</section>
    
    <!----------------------Wedding Options---------------------->
    
<section id="wedding-option">
        <div class="col-md-12">
        <h1 align="center">Themes & Features</h1>
        <div class="container themeplacer">
        </div>        
</section>
          
<!----------------------------MODAL-FORM----------------------------------->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Please Select Time and Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <!-----------------Inside modal form-------------------->
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <label for="datedata">Date</label>
            <input type="date" id="datedata" class="form-control"/>
        </div>
        <div class="col-md-6">
            <label for="timedata">Time</label>
            <input type="time" id="timedata" class="form-control"/>
        </div>
    </div>
</div>
<!-- <input class="form-control" id="datetime" placeholder="Select Date & Time">

<script>
          $("#datetime").datetimepicker({step: 5});
</script> -->
 <!-----------------end inside modal form-------------------->           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <!-- <a href="reservation.html" class="btn btn-warning" id="btnSubmitReservation">Confirm</a> -->
        <button class="btn btn-warning" id="confirmbutton">Confirm</button>
      </div>
    </div>
  </div>
  </div>


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
</div>

<div class="reservationform">

    <div class="col-md-12" style="background-color: #333333; height:100%;">
        <div class="row">
            <div class="col-md-6 mt-5" style="background-color: #777777; border-radius: 8px; height:960px;">
                <img src="img/contactIcon.png" class="contact">
                <div class="col-md-6 mx-auto">
                    <legend class="mx-auto" style="color: #fff;">Please fill out the form</legend>
                    <label for="firstname" style="color: #fff;">Firstname</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Firstname"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="lastname" style="color: #fff;">Lastname</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Lastname"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="dateofbirth" style="color: #fff;">Date Of Birth</label>
                    <input type="date" class="form-control" id="dateofbirth" placeholder="Date Of Birth"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="emailaddress" style="color: #fff;">Email Address</label>
                    <input type="email" class="form-control" id="emailaddress" placeholder="Email Address"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="contactnumber" style="color: #fff;">Contact Number</label>
                    <input type="text" class="form-control" id="contactnumber" placeholder="Contact Number"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="bldgno" style="color: #fff;">House No. | Bldg No. | Street No.</label>
                    <input type="text" class="form-control" id="bldgno" placeholder="123 Street Name"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="barangay" style="color: #fff;">Barangay</label>
                    <input type="text" class="form-control" id="barangay" placeholder="Barangay"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="city" style="color: #fff;">City</label>
                    <input type="text" class="form-control" id="city" placeholder="Manila City"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="state" style="color: #fff;">State | Province</label>
                    <input type="text" class="form-control" id="state" placeholder="NCR"/>
                </div>
                <div class="col-md-6 mx-auto">
                    <label for="country" style="color: #fff;">Country</label>
                    <input type="text" class="form-control" id="country" placeholder="Philippines"/>
                </div>
                <br/>
                <div class="col-md-6 mx-auto">
                    <button class="btn btn-warning" id="proceedreservation">Proceed</button>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <legend style="color: #fff;" class="mx-auto">MAKE A RESERVATION</legend>
                <p style="color: #fff;" class="mx-auto">Lynette Gardens was founded by Sony Hernandez. The company was founded and continues to operates by the principle<br/> of providing a good quality service through the design and planning asides than providing<br/> a good quality services, Lynette Gardens also take pride in competing their<br/> ideas to any competotors. The business was established since 2016.</p>
            </div>
        </div>
    </div>

</div>

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
    var date, time, themeid, pricetopass;
    $(document).ready(function(){
        $('.reservationform').attr("hidden", true);
        getthemes();
    });

    function getthemes(){
        $.ajax({
            url: "{{ url('/getthemeswedding') }}",
            method: "get"
        }).done(function(res){
            $.each(res.data, function(i, v){
                // console.log(res.data[i].id);
                $('.themeplacer').append("<div class='box'><div class='imgBx'><img src='{{ asset("assets/img/lynette/wedding1.jpg") }}'/></div><div class='content'><h3>"+v.name+"</h3><small style='font-size: 12px;'>"+v.description+"</small><br/><small style='font-size: 12px;'>Price: "+v.price+"</small><br/><small style='font-size: 12px;'>"+v.min_pax+"-"+v.max_pax+" pax</small><br/><center><button class='btn btn-info' onclick='getthemeidandprice("+res.data[i].id+")' data-toggle='modal' data-target='#exampleModalCenter'>Reserve Now</button></center><input type='hidden' value='"+res.data[i].id+"' id='themeid'/><input type='hidden' value='"+res.data[i].name+"' id='themename'/><input type='hidden' value='"+res.data[i].price+"' id='pricetopass'/></div></div>");
            });
        });
    }

    function getthemeidandprice(id){
        themeid = id;
    }

    // $(document).on('click', '#getthemeidandprice', function(){
    //     themeid = $('#themeid').val();
    //     pricetopass = $('#pricetopass').val();
    //     alert(themeid, pricetopass);
    // });

    $(document).on('click', '#confirmbutton', function(){
        date = $('#datedata').val();
        time = $('#timedata').val();
        $.ajax({
            url: "{{ url('/checkdatetimeavailability') }}",
            method: "GET",
            data: {
                date: date,
                time: time
            }
        }).done(function(res){
            if(res.response){
                toastr.success(res.message);
                $('#exampleModalCenter').modal('hide');
                $('.tohideifpassed').attr("hidden",true);
                $('.reservationform').attr("hidden", false);
            }else{
                toastr.info(res.message);
            }
        });
    });

    $(document).on('click', '#proceedreservation', function(){
        // $('#proceedreservation').attr("hidden", true);
        var themeidtopass = themeid;
        var pricetopass = $('#pricetopass').val();
        console.log(themeid, pricetopass);
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var dateofbirth = $('#dateofbirth').val();
        var emailaddress = $('#emailaddress').val();
        var contactnumber = $('#contactnumber').val();
        var bldgno = $('#bldgno').val();
        var barangay = $('#barangay').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var country = $('#country').val();
        // console.log(themeid, firstname, lastname, dateofbirth, emailaddress, contactnumber, bldgno, barangay, city, state, country);
        $.ajax({
            url: "{{ url('/makereservation') }}",
            method: "POST",
            data: {
                themeid: themeidtopass,
                firstname: firstname,
                lastname: lastname,
                dateofbirth: dateofbirth,
                emailaddress: emailaddress,
                contactnumber: contactnumber,
                bldgno: bldgno,
                barangay: barangay,
                city: city,
                state: state,
                country: country,
                date: date,
                time: time,
                "_token": "{{ csrf_token() }}",
            }
        }).done(function(res){
            if(res.response){
                toastr.success(res.message);
                setTimeout(
                function() {
                    window.location.replace("{{ url('/') }}");
                }, 5000);
            }else{
                toastr.error(res.message);
            }
        });
    });

</script>
</body>
</html>