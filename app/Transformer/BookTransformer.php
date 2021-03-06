<?php

namespace App\Transformer;

use App\Book;
use League\Fractal\TransformerAbstract;


/**
 * Class BookTransformer
 *
 * @package App\Transformer
 */
class BookTransformer extends TransformerAbstract {


    /**
     * @param \App\Book $book
     *
     * @return array
     */
    public function transform(Book $book) {
        return [
            'id'          => $book->id,
            'title'       => $book->title,
            'description' => $book->description,
            'author'      => $book->author,
            /*'created'     => $book->created_at->toIso8601String(),*/
           /* 'updated'     => $book->updated_at->toIso8601String(),
            'released'    => $book->created_at->diffForHumans()*/
        ];
    }

}


?>
