<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Resources\V1\{
    TagResource,
    TagCollection
};
use App\Http\Requests\{
    StoreTagRequest,
    UpdateTagRequest
};

class TagController extends Controller
{
    public function index()
    {
        return new TagCollection(Tag::paginate());
    }

    public function store(StoreTagRequest $request)
    {
        return new TagResource(Tag::create($request->validated()));
    }

    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        return new TagResource(tap($tag)->update($request->validated()));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->noContent();
    }
}