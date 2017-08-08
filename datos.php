<!DOCTYPE html>
<html lang="en">

<head>
   <?php include 'head.php';?>
</head>

<body id="page-top" class="fondo1">
   <?php include 'menu.php' ?>

<header>
    <div id="inicio" class="seccion5">
        <div class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4 margenTexto">
        <form role="form" name="sentMessage" id="contactForm" novalidate>
         <h1>Juegos Luminosos</h1>
        <p>Registrate y participa por un kit completo de juegos luminosos.</p>
           <div class="form-group">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="tu Nombre y Apellidos" required data-validation-required-message="Debes ingresar tu nombre">
                <p class="help-block text-danger"></p>
           </div>
           <div class="form-group">
                <input type="text" class="form-control" name="rut" id="rut" placeholder="RUT (1.111.111-1)" oninput="checkRut(this)" required data-validation-required-message="Debes ingresar tu rut">
                <p class="help-block text-danger"></p>
           </div>
           <div class="form-group"> 
                  <select name="region" id="region" class="col-xs-6 form-control" required data-validation-required-message="Debes ingresar tu region.">
                  <option value="">Seleccione Región</option>
                  <option value="1">Arica y Parinacota</option>
                  <option value="2">Tarapacá</option>
                  <option value="3">Antofagasta</option>
                  <option value="4">Atacama</option>
                  <option value="5">Coquimbo</option>
                  <option value="6">Valparaiso</option>
                  <option value="7">Metropolitana de Santiago</option>
                  <option value="8">Libertador General Bernardo O\'Higgins</option>
                  <option value="9">Maule</option>
                  <option value="10">Biobío</option>
                  <option value="11">La Araucanía</option>
                  <option value="12">Los Ríos</option>
                  <option value="13">Los Lagos</option>
                  <option value="14">Aisén del General Carlos Ibáñez del Campo</option>
                  <option value="15">Magallanes y de la Antártica Chilena</option>
                  </select>
                  <p class="help-block text-danger"></p>
              </div>
           	  <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="tu Mail" required  data-validation-required-message="Debes ingresar tu email.">
                <p class="help-block text-danger"></p>
              </div>
          	  <div class="form-group">
                <input type="num" class="form-control telefono" name="telefono" id="telefono" maxlength="9" minlength="9"  placeholder="teléfono (9 Digitos)"  onkeypress="return valida(event)" required data-validation-required-message="Debes ingresar tu teléfono">
                <p class="help-block text-danger"></p>
              </div>
           <div id="success"></div>
           <button type="submit" class="btn btn-default page-scroll" >¡Enviar!</button>
           </form>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>
</header>
<?php include'footer.php'; ?>
    <script src="js/contact_me.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
</body>
</html>