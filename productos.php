<!DOCTYPE html>
<html lang="en">

<head>
   <?php include 'head.php';?>
</head>

<body id="page-top" class="fondo1">
<?php include 'menu.php' ?>

<!-- Slider start -->
<div class="slider">
    <div class="slider-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="mogo-slider" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner text-center" role="listbox">
                            <div class="item active">
                                <div class="slider-content">
                                    <p class="slider-caption">
                                        Petrobras en primavera
                                    </p>
                                    <h3 class="slider-titile text-uppercase">
                                        Productos <br> Luminosos
                                    </h3>
                                    <span class="verticle-bar"></span>
                                    <div class="btn-action">
                                       <br><br><br> 
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="slider-content">
                                    <p class="slider-caption">
                                       Petrobras en primavera
                                    </p>
                                    <h3 class="slider-titile text-uppercase">
                                        Productos <br> Luminosos
                                    </h3>
                                    <span class="verticle-bar"></span>
                                    <div class="btn-action">
                                       <br><br><br> 
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="slider-content">
                                    <p class="slider-caption">
                                       Petrobras en primavera
                                    </p>
                                    <h3 class="slider-titile text-uppercase">
                                      Productos <br> Luminosos
                                    </h3>
                                    <span class="verticle-bar"></span>
                                    <div class="btn-action">
                                       <br><br><br> 
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="slider-content">
                                    <p class="slider-caption">
                                        Petrobras en primavera
                                    </p>
                                    <h3 class="slider-titile text-uppercase">
                                        Productos <br> Luminosos
                                    </h3>
                                    <span class="verticle-bar"></span>
                                   <div class="btn-action">
                                       <br><br><br> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#mogo-slider" data-slide-to="0" class="active">
                                <div class="indicator-inner">
                                    <span class="number">01</span>
                                    <span class="text text-uppercase">Producto 1</span>
                                </div>
                            </li>
                            <li data-target="#mogo-slider" data-slide-to="1">
                                <div class="indicator-inner">
                                    <span class="number">02</span>
                                    <span class="text text-uppercase">Producto 2</span>
                                </div>
                            </li>
                            <li data-target="#mogo-slider" data-slide-to="2">
                                <div class="indicator-inner">
                                    <span class="number">03</span>
                                    <span class="text text-uppercase">Producto 3</span>
                                </div>
                            </li>
                            <li data-target="#mogo-slider" data-slide-to="3">
                                <div class="indicator-inner">
                                    <span class="number">04</span>
                                    <span class="text text-uppercase">Producto 4</span>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of slider -->


<script>
jQuery('#mogo-slider').carousel({
    interval: 5000
})
</script>


<?php include'footer.php'; ?>


</body>

</html>
