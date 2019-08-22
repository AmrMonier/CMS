<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Tag;

class Post extends Model
{
  use SoftDeletes;

  protected $fillable = [
      'title',
      'description',
      'content',
      'image',
      'category_id'
      ];

      public function tags()
      {
        return $this->belongsToMany(Tag::class);
      }

      public function category()
      {
        return $this->belongsTo(Category::class);
      }

      public function hasTag(Tag $tag)
      {
        return in_array($tag->id, $this->tags->pluck('id')->toArray());
      }

      public function deleteImage()
      {
        Storage::delete($this->image);
      }
}
