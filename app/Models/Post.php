<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'content'];

    public function casts()
    {
        return [
            'title' => 'array',
            'content' => 'array',
        ];
    }

    // $post->trans_title
    public function getTransTitleAttribute()
    {
        return $this->title[app()->getLocale()];
    }

    public function getEnTitleAttribute()
    {
        return $this->title['en'];
    }

    public function getArTitleAttribute()
    {
        return $this->title['ar'];
    }

    // $post->image
    // public function getImageAttribute() {

    // }
}
