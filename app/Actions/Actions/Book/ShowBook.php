<?php

namespace App\Actions\Actions\Book;

use App\Http\Resources\BookResource;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ShowBook
{
    use AsAction;

    public function handle(Book $book)
    {
        return $book;
    }

    public function jsonResponse(Book $book)
    {
        return BookResource::make($book);
    }

    public function asController(Book $book)
    {
        return $this->handle($book);
    }
}
