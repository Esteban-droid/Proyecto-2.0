<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Editorial;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $libros = Libro::where('user_id', Auth::user()->id)
                ->with('autores') //Hace referencia a la funcion en el modelo
                ->with('editorial')
                ->get();

            return $libros;
        }

        return view('libros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CONSULTAMOS SI EXISTE LA EDITORIAL ESCRITA EN EL FORMULARIO, DE SER ASI LLAMAMOS EL PRIMER RESULTADO DESDE LA BASE DE DATOS
        $editorial = Editorial::where('nombre', $request->editorial)->first();

        // CREANDO UN OBJETO LIBRO, EL CUAL SE GUARDARA EN LA BASE DE DATOS AUTOMATICAMENTE
        $libro  = Libro::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'paginas' => $request->paginas,
            'link' => $request->link,
            'editorial_id' => $editorial->id,
            'user_id' => Auth::user()->id,
        ]);

        // METEMOS A LOS AUTORES DENTRO DE LA VARIABLE AUTORES
        $autores = $request->autores;
        // SEPARAMOS LOS AUTORES EN UN ARRAY, EL CUAL SE SEPARARA POR LA COMA(,)
        $autores = explode(',', $autores);

        // return $autores;
        foreach ($autores as $key => $nombre_autor) { //Recorriendo el listado de los autores
            // return $autor;
            $autor = Autor::where('nombre', $nombre_autor)->first(); //Si existe o no el autor

            if (!$autor) { //Si no existe se crea uno nuevo con el create()
                $autor = Autor::create([
                    'nombre' => $nombre_autor
                ]);
            }

            $libro->autores()->attach($autor); //Se asocia el autor actual con el libro correspondiente....el autores() es el metodo dentro del modelo Libros
        }

        return response()->json([
            'msg' => 'Libro añadido correctamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);

        $libro->autores;
        return $libro;   //muestra los datos del libro con su autor   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        // ACTUALIZAMOS LA INFO QUE OBTENEMOS DESDE EL REQUEST
        $libro->descripcion = $request->descripcion;
        $libro->editorial_id = $request->editorial_id;
        $libro->link = $request->link;
        $libro->paginas = $request->paginas;
        $libro->titulo = $request->titulo;
        // GUARDAMOS LA INFO CON EL funcion save()
        $libro->save();
        // METEMOS A LOS AUTORES DENTRO DE LA VARIABLE AUTORES
        $autores = $request->autores;
        // SEPARAMOS LOS AUTORES EN UN ARRAY, EL CUAL SE SEPARARA POR LA COMA(,)
        $autores = explode(',', $autores);

        // ELIMINAMOS LOS AUTORES ANTES DE AGREGAR LOS NUEVOS
        $libro->autores()->detach();
        // return $autores;
        foreach ($autores as $key => $nombre_autor) { //Recorriendo el listado de los autores
            if ($nombre_autor != '') {
                // return $autor;
                $autor = Autor::where('nombre', $nombre_autor)->first(); //Si existe o no el autor

                if (!$autor) { //Si no existe se crea uno nuevo con el create()
                    $autor = Autor::create([
                        'nombre' => $nombre_autor
                    ]);
                }

                $libro->autores()->attach($autor); //Se asocia el autor actual con el libro correspondiente....el autores() es el metodo dentro del modelo Libros
            }
        }

        return response()->json([
            'msg' => 'Libro actualizado correctamente!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        /*foreach($libro->autores as $key=>$autor){
            $autor->libros()->detach();
            $autor->delete();
        }*/
        $libro->autores()->detach();
        $libro->delete();
        return response()->json(['msg' => 'Libro borrado'], 200);
    }
}
