<?php

namespace App\Http\Controllers;

use App\Book;
use App\Transformer\BookTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BooksController extends Controller
{
    public function index()
    {
        return $this->collection(Book::paginate(4), new BookTransformer());
    }

    public function show($id) {

        return Book::find($id);

        //return $this->item(Book::findOrFail($id), new BookTransformer());

        //return ['data' => Book::findOrFail($id)->toArray()];
        /*try{
            return Book::findOrfail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Book not found'
                ]
            ], 404);
        }*/
    }
    

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'author' => 'required'
        ]);

        $book = Book::create($request->all());
        $data = $this->item($book, new BookTransformer());

        return response()->json($data, 201,[
            'Location' => route('books.show', ['id' => $book->id])
        ]);
    }

    public function update(Request $request, $id) {

        try{
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Book not found'
                ]
            ], 404);
        }

        $book->fill($request->all); // то же самое, что и new
        $book->save();

        return $this->item($book, new BookTransformer());
    }

    public function destroy($id) {
        try{
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e){
            return response()->json([
                'error' => [
                    'message' => 'Book not found'
                ]
            ], 404);
        }
        $book->delete();

        return response(null, 204);
    }



}
