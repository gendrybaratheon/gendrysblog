<?php

namespace App\Transformers;

use App\Post;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

use Carbon\Carbon;

class PostTransformer extends TransformerAbstract
{
    public function transform(Post $post)
    {
        $created_at = date('Y-m-d H:i:s', strtotime($post->created_at));
        return [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'created_at' => $created_at,
        ];
    }
}