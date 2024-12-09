<?php

namespace App\Actions\Actions\Book;

use App\Models\Book;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteBook
{
    use AsAction;

    public function handle(Book $book)
    {
        $book->delete();
    }
    
    public function asController(Book $book)
    {
        return $this->handle($book);
    }
}
