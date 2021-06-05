
<template id="libros-vue">

  <div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Añadir Libro</button>
    <button type="button" class="btn btn-success" @click="pagina_principal()">Página Principal</button>
    <hr />
    <!-- Modal -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nuevo Libro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" @submit.prevent="añadir()">
              <div class="form-group">
                <label for="titulo">Titulo Libro</label>
                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo" aria-describedby="help-titulo" v-model="libro.titulo"/>
                <small id="help-titulo" class="text-muted">Titulo del libro</small>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" v-model="libro.descripcion"></textarea>
              </div>
              <div class="form-group">
                <label for="paginas">Cantidad de paginas</label>
                <input type="number" name="paginas" id="paginas" class="form-control" placeholder="Cant. paginas" aria-describedby="help-paginas" min="1" v-model="libro.paginas"/>
                <small id="help-paginas" class="text-muted">Cantidad de paginas del libro</small>
              </div>
              <div class="form-group">
                <label for="autores">Autores</label>
                <input type="text" name="autores" id="autores" class="form-control" placeholder="Autores" aria-describedby="help-autores" v-model="libro.autores"/>
                <small id="help-autores" class="text-muted">Autores del libro, separar por coma (,)</small>
              </div>
              <div>
                <p>Editorial</p>
                <select class="custom-select" v-model="libro.editorial">
                  <option v-for="item in editoriales" :key="item.id" v-bind:value="item.nombre">
                    {{ item.nombre }}
                  </option>
                </select>
                <small id="help-autores" class="text-muted">Seleccionar editorial</small>
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control" placeholder="Link" aria-describedby="help-link" v-model="libro.link"/>
                <small id="help-link" class="text-muted">Ingrese link de libro</small>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal de editar-->
    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar libro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" @submit.prevent="update()">
              <div class="form-group">
                <label for="titulo_edit">Titulo Libro</label>
                <input type="text" name="titulo" id="titulo_edit" class="form-control" placeholder="Titulo" aria-describedby="help-titulo" v-model="libro_edit.titulo"/>
                <small id="help-titulo" class="text-muted"
                  >Titulo del libro</small
                >
              </div>
              <div class="form-group">
                <label for="descripcion_edit">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion_edit" rows="3" v-model="libro_edit.descripcion"></textarea>
              </div>
              <div class="form-group">
                <label for="paginas_edit">Cantidad de paginas</label>
                <input type="number" name="paginas" id="paginas_edit" class="form-control" placeholder="Cant. paginas" aria-describedby="help-paginas" min="1" v-model="libro_edit.paginas"/>
                <small id="help-paginas" class="text-muted">Cantidad de paginas del libro</small>
              </div>
              <div class="form-group">
                <label for="autores_edit">Autores</label>
                <input type="text" name="autores" id="autores_edit" class="form-control" placeholder="Autores" aria-describedby="help-autores" v-model="libro_edit.autores"/>
                <small id="help-autores" class="text-muted">Autores del libro, separar por coma (,)</small>
              </div>
              <div>
                <p>Editorial</p>
                <select class="custom-select" v-model="libro_edit.editorial_id">
                  <option v-if="'libro_edit.editorial_id == item.id'" selected v-for="item in editoriales" :key="item.id" v-bind:value="item.id">
                    {{ item.nombre }}
                  </option> <!--Para ver cual trae seleccionado-->
                  <option v-else v-for="item in editoriales" :key="item.id" v-bind:value="item.id">
                    {{ item.nombre }}
                  </option>
                </select>
                <small id="help-autores" class="text-muted">Seleccionar editorial</small>
              </div>
              <div class="form-group">
                <label for="link_edit">Link</label>
                <input type="text" name="link" id="link_edit" class="form-control" placeholder="Link" aria-describedby="help-link" v-model="libro_edit.link"/>
                <small id="help-link" class="text-muted">Ingrese link de libro</small>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- TABLA -->
    <table class="table table-striped table-inverse">
      <thead class="thead-inverse">
        <tr align="center">
          <th>#</th>
          <th>Titulo</th>
          <th>Descripcion</th>
          <th>Paginas</th>
          <th>Autores</th>
          <th>Editorial</th>
          <th>Link</th>
          <th>Detalle de libro</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in libros" :key="index.id" align="center">
          <td scope="row">{{ item.id }}</td>
          <td>{{ item.titulo }}</td>
          <td style="height: 100px; overflow: auto; display: block;">
            {{ item.descripcion }}
          </td>
          <td>{{ item.paginas }}</td>
          <td>
            <ul>
              <li v-for="(item1, index1) in item.autores" :key="index1.id">
                {{ item1.nombre }}
              </li>
            </ul>
          </td>
          <td>{{ item.editorial.nombre }}</td>
          <td><a id="link" @click="redirigir(item.link)">{{ item.link }}</a></td>
          <td align="center">
            <button class="btn btn-success" :id="item.id" @click="editar(item.id)" data-toggle="modal" data-target="#modal_edit">Detalles</button>
          </td>
          <td align="center">
            <button class="btn btn-warning" :id="item.id" @click="editar(item.id)" data-toggle="modal" data-target="#modal_edit">Editar</button>
            <button class="btn btn-danger" @click="eliminarLibro(item.id)">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- END TABLA -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      libro: {
        titulo: "",
        descripcion: "",
        paginas: "",
        autores: "",
        editorial: "",
        link: "",
      },
      libros: [],
      editoriales: [], 
      libro_edit: {}, 
      autores_edit: "", 
    };
  },

  mounted() {
    this.obtenerEditoriales();
    this.listado();
  },

  methods: {
    pagina_principal() {
      location.href = "/home";
    },
    redirigir(link){
      window.location = `http://${link}`;
    },
    


    añadir() {
      if (
        this.libro.titulo.trim() === "" ||
        this.libro.paginas.trim() === "" ||
        this.libro.descripcion.trim() === "" ||
        this.libro.autores.trim() === "" ||
        this.libro.editorial == null ||
        this.libro.link.trim() === ""
      ) {
        alert("Debes completar todos los campos antes de guardar");
        return;
      }
      let libros = {
        titulo: this.libro.titulo,
        descripcion: this.libro.descripcion,
        paginas: this.libro.paginas,
        autores: this.libro.autores,
        editorial: this.libro.editorial,
        link: this.libro.link,
      };

      console.log(libros);

      axios
        .post("/libros", libros)
        .then((res) => {
          this.listado();
          console.log(res.data); //recomendado
          //   RECIBIMOS EL MENSAJE QUE ESTAMOS ENVIANDO DESDE EL CONTROLADOR AL FINAL, LUEGO DE AÑADIR EL LIBRO Y LOS AUTORES DE DICHO LIBRO
          let msg = res.data.msg;

          // MOSTRAMOS LA ALERTA CON EL MENSAJE ANTERIOR
          alert(msg);
          //Para limpiar los campos
          this.libro.titulo = "";
          this.libro.descripcion = "";
          this.libro.paginas = "";
          this.libro.autores = "";
          this.libro.editorial = "";
          this.libro.link = "";
        })
        .catch((err) => {});
    },

    eliminarLibro(libro_id) {
      let confirmar = confirm("¿Seguro que quiere borrar este libro?");
      if (confirmar) {
        axios.delete(`/libros/${libro_id}`)
        .then((res) => {
          this.listado();
          let msg = res.data.msg;
          alert(msg);
        });
      }
    },

    listado() {
      axios
        .get("/libros")
        .then((res) => {
          this.libros = res.data;
          console.log(res);
        })
        .catch((error) => {});
    },

    obtenerEditoriales() {
      axios
        .get("editoriales")
        .then((response) => {
          this.editoriales = response.data;
          console.log(this.editoriales);
        })
        .catch((error) => {});
    },

    editar(id) {
      //para que reciba un numero
      this.autores_edit = ""; //para que este vacia
      axios.get(`/libros/${id}/edit`)
      .then((res) => {
        this.libro_edit = res.data; //le ingresamos el data a la variable, que son el listado de los autores
        // OBTENER EL ARRAY DE LOS AUTORES Y CONVERTIRLOS EN STRING
        console.log(this.libro_edit.autores); //muestra los autores en consola
        this.libro_edit.autores.forEach((autor) => { //haciendo referencia a autores que aparece en network...recorriendo los autores
          this.autores_edit += `${autor.nombre},`; //guardando nombre del autor...concatenando en el input...le estoy agregando otro dato
          this.libro_edit.autores = this.autores_edit;
        });
      });
    },

    update() {
      axios
        .put(`/libros/${this.libro_edit.id}`, this.libro_edit) //la info que le estoy enviando al final al controlador
        .then((response) => {
          alert(response.data.msg);
          this.listado();
          $("#modal_edit").modal("hide");
        })
        .catch((error) => {});
    },
  },
};
</script> 

<style>
    #link:hover {
  background-color: rgb(226, 223, 19);
}
</style>