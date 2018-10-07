<div class="gallery-page">
  <div class="container container-fluid other-columns">
    <h1> <i class="far fa-images"></i>Gallery</h1>
      <div class="row gallery-title">
        <div  class="col-xs-12 col-sm-6 gallery-item">
          <div class="container gallery-container">
            <div class="row">
              <div class="col-xs-7">
                <img>
                <div class="button-modal">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row gallery-title">
        <div  class="col-xs-12 col-sm-6 gallery-item">
          <div class="container gallery-container">
            <div class="row">
              <div class="col-xs-7">
                <img>
                <div class="button-modal">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Gallery</h4>
  </div>

  <div class="modal-body">
            <div class="carousel-modal">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="assets/images/carousel1.jpg">
                </div>
                <div class="item">
                  <img src="assets/images/carousel2.jpeg">
                </div>
                <div class="item">
                  <img src="assets/images/carousel3.jpg">
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>

</div>
</div>
</div>
