<?php

namespace App\Actions\Actions\Book;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateBook
{
    use AsAction;

    public function handle(Book $book, array $data): Book
    {
        $book->update($data);

        $book->refresh();

        return $book;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|string|exists:book_categories,id',
            'release_at' => 'required|date'
        ];
    }

    public function jsonResponse(Book $book)
    {
        return BookResource::make($book);
    }

    public function htmlResponse(Book $book)
    {
        return view('book.index');
    }

    public function asController(Book $book, ActionRequest $request)
    {
        $request->validate();

        return $this->handle($book, $request->validated());   
    }
}