<template>
  <div id="principal-page">
    <img alt="Psico logo" src="http://127.0.0.1:8000/storage/psicologiaa.png">
    <br>
    <br><br>
      <nav>
        <a href="/home">PÁGINA PRINCIPAL</a> |
        <a href="/libros">MIS LIBROS</a> 
    </nav>
<br>
    <div id="band" class="container text-center">
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
    </div>
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
</style>