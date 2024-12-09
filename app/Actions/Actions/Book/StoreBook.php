<?php

namespace App\Actions\Actions\Book;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreBook
{
    use AsAction;

    public function handle(array $data): Book
    {
        return Book::create($data);
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

    public function asController(ActionRequest $request)
    {
        $request->validate();

        return $this->handle($request->validated());   
    }
}