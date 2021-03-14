<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $books = Book::all();

        return $this->successResponse($books);
    }

    /**
     * Ingresar libros
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1'
        ];
        $this->validate($request, $rules);
        $book = Book::create($request->all());

        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    /**
     * Retornar un libro
     */
    public function show($book)
    {
        $book = Book::findOrFail($book);

        return $this->successResponse($book);
    }

    /**
     * Actualizar libro
     */
    public function update(Request $request, $book)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'min:1',
            'author_id' => 'min:1'
        ];
        $this->validate($request, $rules);

        $book = Book::findOrFail($book);
        $book->fill($request->all());

        if($book->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $book->save();

        return $this->successResponse($book);
    }

    /**
     * Eliminar un libro
     */
    public function destroy($book)
    {
        $book = Book::findOrFail($book);
        $book->delete();

        return $this->successResponse($book);
    }
}
