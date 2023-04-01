<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\Quote;
use App\Http\Resources\V1\{
    QuoteResource,
    QuoteCollection
};
use App\Http\Requests\{
    StoreQuoteRequest,
    UpdateQuoteRequest
};

class QuoteController extends Controller
{
    public function index()
    {
        return new QuoteCollection(Quote::with('user')
                                        ->latest()
                                        ->paginate(10));
    }

    public function store(StoreQuoteRequest $request)
    {
        $quotes = Quote::create($request->validated());
        $quotes->tags()->attach($request->tags);
        return new QuoteResource($quotes);

        // return new QuoteResource(Quote::create($request->validated())); //No relationship many to many
    }

    public function show(Quote $quote)
    {
        return new QuoteResource($quote->loadMissing('tags'));
    }

    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $quote = tap($quote)->update($request->validated());
        $quote->tags()->sync($request->tags);
        return new QuoteResource($quote);

        // return new QuoteResource(tap($quote)->update($request->validated())); //No relationship many to many
    }

    public function destroy(Quote $quote)
    {
        $quote->tags()->detach($quote);
        $quote->delete();
        return response()->noContent();
    }
}