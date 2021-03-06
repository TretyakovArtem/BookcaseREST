<?php

namespace App\Http\Controllers;


use App\Author;
use App\Transformer\AuthorTransformer;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index()
    {
        return $this->collection(
            Author::paginate(4),
            new AuthorTransformer()
        );
    }

    public function show($id)
    {
        return $this->item(
            Author::findOrFail($id),
            new AuthorTransformer()
        );
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'gender' => [
                'required',
                'regex:/^(male|female)$/i'
            ],
            'biography' => 'required',[
                'gender.regex' => "Gender format in invalid: must equal 'male' or 'female'"
            ]
        ]);


        $author = Author::create($request->all());
        $data = $this->item($author, new AuthorTransformer());

        return response()->json($data, 201, [
            'Location' => route('authors.show', ['id' => $author->id])
        ]);
    }
}


?>