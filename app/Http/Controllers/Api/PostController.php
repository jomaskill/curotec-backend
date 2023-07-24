<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Mail\PostCreated;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(
            Post::with('user')->get()
        );
    }

    public function store(StorePostRequest $request): PostResource
    {
        /** @var Post $post */
        $post = Post::create($request->validated())->load('user');

        Mail::to($post->user)->queue(new PostCreated($post));

        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        return new PostResource(
            tap($post)
                ->update($request->validated())
                ->load('user')
        );
    }

    public function show(Post $post): PostResource
    {
        return new PostResource($post->load('user'));
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json();
    }
}
