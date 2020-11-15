<!---------------------------------------------NavigationBar-------------------------------------->
<section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
          <b class="navbar-brand" href="#" style="font-family: Borealis"><span class="firstLogoName">Lynette</span><span class="secondLogoName">Gardens</span></b>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="#top">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#portfolio">EVENT PORTFOLIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#team">OUR TEAM</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">CONTACT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#location">LOCATION</a>
              </li>        
            </ul>
              <div class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" id="controlnumber" placeholder="Input Reference No." aria-label="Search">
                <button class="btn btn-warning my-2 my-sm-0" id="searchcontrolnumber" type="submit">Search Code</button>
              </div>
          </div>
        </nav>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="controlnumbermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <input type="hidden" id="controlnumberid"/>
                <label for="cnname">Customer Name:</label>
                <input type="text" id="cnname" class="form-control" disabled/>
                <label for="cnemail">Email:</label>
                <input type="text" id="cnemail" class="form-control" disabled/>
                <label for="cnmobilenumber">Mobile Number:</label>
                <input type="text" id="cnmobilenumber" class="form-control" disabled/>
              </div>
              <div class="col-md-6">
                <label for="cnreservationdate">Reservation Date:</label>
                <input type="text" id="cnreservationdate" class="form-control" disabled/>
                <label for="cnthemename">Theme Name:</label>
                <input type="text" id="cnthemename" class="form-control" disabled/>
                <div class="row">
                  <div class="col-md-6">
                    <label for="cnprice">Theme Price:</label>
                    <input type="text" id="cnprice" class="form-control" disabled/>
                  </div>
                  <div class="col-md-6">
                    <label for="cnpartialprice">Theme Partial Price:</label>
                    <input type="text" id="cnpartialprice" class="form-control" disabled/>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="cancelreservation">Cancel Reservation</button>
          </div>
        </div>
      </div>
    </div>
    <!---------------------------------------------------Slider-------------------------------------->