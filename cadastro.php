  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>BJ Transportes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
   
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#myPage">Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.html">INICIO</a></li>
          <li><a href="#cadastro">CADASTRO</a></li>
          <li><a href="#contato">CONTATO</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="jumbotron text-center">
    <h1>BonJovens Transporte</h1> 
    <p>O transporte que você precisa está aqui!</p> 
    <form>
      <div class="input-group">
       
        </div>
      </div>
    </form>
  </div>



  <div id ="cadastro" class="container-fluid bg-grey">
    <h2 class="text-center">CADASTRO</h2> 
    <div class="row">
      <div class="col-sm-5">  
      </div>

      <div class="col-sm-6 form-group">
         <form action="inserir.php" method="post">

<!-- DADOS PESSOAIS -->     
<fieldset>
 <legend>Dados Pessoais</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <input class="form-control" id="nome" name="nome" placeholder="Nome" type="text" required>
   </td>
   <td>
    <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required>
   </td>
   <td>
    <input class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" type="text" required>
   </td>  
  </tr>
  <tr>
   <td>
    <input class="form-control" id="doc" name="doc" placeholder="RG / I.E." type="text" required>
   </td>
  <tr>
   <td>
    <input class="form-control" id="reg" name="reg" placeholder="CPF / CNPJ" type="text" required>
   </td>
  </tr>
 </table>
</fieldset>
<br/>

<!-- ENDEREÇO -->
<fieldset>
 <legend>Dados de Endereço</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <input class="form-control" id="rua" name="rua" placeholder="Logradouro" type="text" required>
   </td>
   <td>
    <input class="form-control" id="bairro" name="bairro" placeholder="Bairro" type="text" required>
   </td>
   <td>
   <td>
    <input class="form-control" id="numero" name="numero" placeholder="Número" type="text" size="4" required>
   </td>
  </tr>
  <tr>
   <td>
    <input class="form-control" id="complemento" name="complemento" placeholder="Complemento" type="text">
   </td>
  </tr>
  <tr>
   <td>
    <input class="form-control" id="cidade" name="cidade" placeholder="Cidade" type="text" required>
   </td>
  </tr>
  <tr>
   <td>
    <input class="form-control" id="UF" nUFame="estado" placeholder="UF" type="text" size="2" required>
   </td>
  </tr>
  <tr>
   <td>
    <input class="form-control" id="cep1" name="cep1" placeholder="CEP" type="text" size="8" maxlength="8" required>
    </td>
  </tr>
 </table>
</fieldset>
<br/>

<!-- DADOS DE CONTATO -->
<fieldset>
 <legend>Dados de contato</legend>
 <table cellspacing="10">
  <tr>
   <td>
    <input class="form-control" id="econtato" name="econtato" placeholder="E-mail para Contato" required>
   </td>
  </tr>
  <tr>
   <td>
    <input class="form-control" id="tel" name="tel" placeholder="Telefone para Contato" required>
   </td>
  </tr>
 </table>
</fieldset>
<br/>

<input type="submit" name="submit" style="cursor:pointer" value="Enviar">
<input type="reset" value="Limpar">

</form>

      </form>
    </div>
  </div>
</div>
</body>
</html>

  <!-- Container Contato -->
  <div id="contato" class="container-fluid bg-grey">
    <h2 class="text-center">CONTATO</h2>
    <div class="row">
      <div class="col-sm-5">
        <p>Contate-nos, entraremos em contato dentro de 24 horas.</p>
        <p><span class="glyphicon glyphicon-map-marker"></span> Araras, SP</p>
        <p><span class="glyphicon glyphicon-phone"></span> +55 1997070-7070</p>
        <p><span class="glyphicon glyphicon-envelope"></span> email@yahoo.com.br</p>
      </div>
      <div class="col-sm-7 slideanim">
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" id="name" name="Name" placeholder="Nome" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required>
          </div>
        </div>
        <textarea class="form-control" id="comments" name="comments" placeholder="Comentário" rows="5"></textarea><br>
        <div class="row">
          <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </div>



<!-- Adicionar Google Maps -->
  <div id="googleMap" style="height:400px;width:100%;"></div>
  <script>
  function myMap() {
  var myCenter = new google.maps.LatLng(-22.37560677, -47.37035291);
  var mapProp = {center:myCenter, zoom:15, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
  <!--
  To use this code on your website, get a free API key from Google.
  Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
  -->

  <footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
      <span class="glyphicon glyphicon-chevron-up"></span>
  </footer>

  <script>
  $(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function(){
     
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
    
    $(window).scroll(function() {
      $(".slideanim").each(function(){
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
      });
    });
  })
  </script>

  </body>
  </html>
