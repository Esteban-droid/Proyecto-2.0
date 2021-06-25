<template>
  <div id="principal-page">
    <img alt="Psico logo" src="http://127.0.0.1:8000/storage/psicologiaa.png">
    <br>
    <br><br>
    <nav>
        <a href="/home" style="color:black">PÁGINA PRINCIPALasadasdasd |</a>
        <a href="/libros" style="color:black">MIS LIBROS |</a>
        <a href="/informacion" style="color:black">MAYOR INFORMACIÓN</a> 
    </nav>
<br>
    <!--<div id="band" class="container text-center">
        <h3>PsychoBooks</h3>
        <p><em>We love knowledge!</em></p>
        <p>Esta aplicación ofrece una herramienta que facilita la gestión de documentos personales del 
            profesional psicólogo/a, otorgando un grado más de organización en su quehacer. 
            Este instrumento le ofrece la posibilidad de resguardar libros que tienen una gran 
            importancia para sus deberes del día a día, así como también el actualizar su información. 
            Por otra parte, en caso de no estar satisfecho con su documento, el profesional podrá eliminarlos 
            para mantener su bandeja de entrada vacía. Como resultado final, se logra obtener una herramienta 
            intuitiva que facilita la manipulación de documentos digitales y que permanecen resguardados en la 
            base de datos de la aplicación, ofreciendo así un espacio privado para el profesional y la 
            oportunidad de llevarlos a donde quiera, evitando así el colapso de documentos físicos como 
            hojas de papel, libros comprados, entre otros</p>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <p class="text-center"><strong>Añade un nuevo libro y llevalo a donde sea.</strong></p><br>
                <img src="http://127.0.0.1:8000/storage/libroo.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
            </div>
            <div class="col-sm-4">
                <p class="text-center"><strong>Tu información es privada asi que, no te preocupes!</strong></p><br>
                <img src="http://127.0.0.1:8000/storage/seguroo.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
            </div>
            <div class="col-sm-4">
                <p class="text-center"><strong>Ahorra espacio, y disfruta de tu bilbioteca personal</strong></p><br>
                <img src="http://127.0.0.1:8000/storage/afueraa.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
            </div>
        </div>
    </div>-->
    <footer id="colophon" class="site-footer" role="contentinfo">
  <div class="social-wrapper">
    <ul>
      <li>
        <a href="#" target="_blank">
          <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png" alt="Twitter Logo" class="twitter-icon"></a>
      </li>
      <li>
        <a href="#" target="_blank">
          <img src="http://www.iconarchive.com/download/i54037/danleech/simple/facebook.ico" alt="Facebook Logo" class="facebook-icon"></a>
      </li>
      <li>
        <a href="#" target="_blank">
          <img src="http://icons.iconarchive.com/icons/marcus-roberto/google-play/256/Google-plus-icon.png" alt="Googleplus Logo" class="googleplus-icon"></a>
      </li>
      <li>
        <a href="#" target="_blank">
          <img src="https://lh3.googleusercontent.com/j_RwVcM9d47aBDW5DS1VkdxUYCkDUCB6wZglv4x-9SmsxO0VaFs7Csh-FmKRCWz9r_Ef=w170" alt="Youtube Logo" class="youtube-icon"></a>
      </li>
    </ul>
  </div>

  <nav class="footer-nav" role="navigation">
  </nav>
</footer>
<!-- #colophon -->
<footer style="color:black">&copy; Copyright 2021</footer>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    #principal-page {
        text-align: center;
        background-image:url('http://127.0.0.1:8000/storage/book.jpg');
        background-size:cover;
        color: #fff;
    }

    .ultimos-libros {
        text-align: center;
    }
    img {
  border-radius: 50%;
    }
    a{
        color: #fff;
    }
    .site-footer {
	text-align: center;
	margin: 10px 0;
	padding: 10px 0;
}

#social-wrapper {
	text-align: center;
}

/*Social Media Icons*/
.social-wrapper {
	text-align: center;
}

.social-wrapper ul li {
	display: inline;
	margin: 0 5px;
}

.twitter-icon,
.facebook-icon,
.googleplus-icon,
.youtube-icon{
	margin-top: .625em;
	width: 40px;
	height: 40px;
	filter: alpha(opacity=60); /* For IE8 and earlier */
  border-radius: 25px;
}

.twitter-icon:hover,
.facebook-icon:hover,
.googleplus-icon:hover,
.youtube-icon:hover{
	filter: alpha(opacity=100); /* For IE8 and earlier */
}

.footer-nav p {
	text-align: center;
}
</style>