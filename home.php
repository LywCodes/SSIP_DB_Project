<?php
  session_start();
  if(!isset($_SESSION["customer"])){
    header("Location: identification.html");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./homeStyle.css" />
    <title>PU eCanteen</title>
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary"
      style="background-color: #fcf2e8"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="">
          <img src="./source/logo.png" alt="logo" height="45" />
        </a>
        
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="overlay-image">
            <img src="./source/slide-1.png">
          </div>
          <div class="container">
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <h1>Editor's Choice 2</h1>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit
              suscipit cumque recusandae accusantium ex assumenda rem aperiam
              voluptate. Repudiandae, impedit.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <h1>Editor's Choice 3</h1>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit
              suscipit cumque recusandae accusantium ex assumenda rem aperiam
              voluptate. Repudiandae, impedit.
            </p>
          </div>
        </div>
      </div>
      <a
        href="#myCarousel"
        class="carousel-control-prev"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a
        href="#myCarousel"
        class="carousel-control-next"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>
    <br /><br /><br />

    <div class="card-deck justify-content-center">
      <div class="row row-gap">
        <div class="col-md-4">
          <div class="card">
            <img src="./source/card.png" class="card-img-top" style="width: 55%; height: auto;"  />
            <div class="card-body divider-line">
              <h3 class="card-title">Store I</h3>
              <p class="card-text">
                Operational Time : <br> 07.30 AM - 17.00 PM 
              </p>
              <a href="#" class="btn btn-primary btn-block">View Store</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="./source/card.png" class="card-img-top" style="width: 55%; height: auto;"  />
            <div class="card-body divider-line">
              <h3 class="card-title">Store I</h3>
              <p class="card-text">
                Operational Time : <br> 07.30 AM - 17.00 PM 
              </p>
              <a href="#" class="btn btn-primary btn-block btn-no-padding">View Store</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="./source/card.png" class="card-img-top" style="width: 55%; height: auto;"  />
            <div class="card-body divider-line">
              <h3 class="card-title">Store I</h3>
              <p class="card-text">
                Operational Time : <br> 07.30 AM - 17.00 PM 
              </p>
              <a href="#" class="btn btn-primary btn-block">View Store</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-gap">
        <div class="col-md-4">
          <div class="card">
            <img src="./source/card.png" class="card-img-top" style="width: 55%; height: auto;"  />
            <div class="card-body divider-line">
              <h3 class="card-title">Store I</h3>
              <p class="card-text">
                Operational Time : <br> 07.30 AM - 17.00 PM 
              </p>
              <a href="#" class="btn btn-primary btn-block">View Store</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="./source/card.png" class="card-img-top" style="width: 55%; height: auto;"  />
            <div class="card-body divider-line">
              <h3 class="card-title">Store I</h3>
              <p class="card-text">
                Operational Time : <br> 07.30 AM - 17.00 PM 
              </p>
              <a href="#" class="btn btn-primary btn-block">View Store</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="./source/card.png" class="card-img-top" style="width: 55%; height: auto;"  />
            <div class="card-body divider-line">
              <h3 class="card-title">Store I</h3>
              <p class="card-text">
                Operational Time : <br> 07.30 AM - 17.00 PM 
              </p>
              <a href="#" class="btn btn-primary btn-block">View Store</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br /><br /><br />
    <footer>
      <br>
      <h6>© 2024 President University eCanteen Service</h6>
      <p>All Rights Reserved</p>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>