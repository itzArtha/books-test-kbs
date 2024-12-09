<?php

namespace App\Actions\Actions\Book;

use App\Http\Resources\BooksResource;
use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IndexBook
{
    use AsAction;

    public function handle()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->orWhere('title', 'LIKE', "$value%")
                ->orWhere('release_date', 'LIKE', "$value%")
                ->orWhere('author', 'LIKE', "$value%")
                ->orWhereHas('category', function ($category) use ($value) {
                    $category->orWhere('name', 'LIKE', "$value%");
                });
            });
        });

        $queryBuilder = QueryBuilder::for(Book::class);

        return $queryBuilder
            ->defaultSort('id')
            ->allowedSorts(['id', 'title', 'release_date', 'author'])
            ->allowedFilters([$globalSearch])
            ->paginate(10)
            ->withQueryString();
    }

    public function jsonResponse(LengthAwarePaginator $books)
    {
        return BooksResource::collection($books);
    }

    public function asController()
    {
        return $this->handle();
    }
}
