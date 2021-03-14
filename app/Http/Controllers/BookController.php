<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BookController extends Controller
{

    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retornar la lista de libros
     */
    public function index()
    {

    }

    /**
     * Ingresar libros
     */
    public function store(Request $request)
    {

    }

    /**
     * Retornar un libro
     */
    public function show($book)
    {

    }

    /**
     * Actualizar libro
     */
    public function update(Request $request, $book)
    {

    }

    /**
     * Eliminar un libro
     */
    public function destroy($book){

    }

}
