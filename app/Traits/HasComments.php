<?php
/**
 * Project: anippe
 * File: HasComments.php
 * Author: Luka
 * Date: 02.01.2021
 * Time: 18:20
 */

namespace App\Traits;


use App\Models\Comment;

trait HasComments
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'related')->latest();
    }
}
