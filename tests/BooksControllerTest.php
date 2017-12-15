<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class BooksControllerTest extends TestCase
{
    /** @test **/
    public function index_status_code_should_be_200()
    {
        $this->get('/books')->seeStatusCode(200);
    }

    /** @test **/
    /*public function store_should_save_new_book_in_the_database()
    {
        $this->post('/books', [
            'title' => 'The Invisible Man',
            'description' => 'An invisible man is trapped in the terror of his own creation',
            'author' => 'H.G. Wells'
        ]);

        $this
            ->seeJson(['created' => true])
            ->seeInDatabase('books', ['title' => 'The Invisible Man']);
    }*/

    /** @test **/
    public function store_should_respond_with_a_201_and_location_header_when_successful()
    {
        $this->markTestIncomplete('pending');
    }



    /** @test **/
    public function index_should_return_a_collection_of_records()
    {
        $books = factory('App\Book',2)->create();

        $this->get('/books');

        foreach ($books as $book) {
            $this->seeJson(['title' => $book->title]);
        }
    }
}
