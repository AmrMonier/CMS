<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'content', ];
    public $timestamps = false;

    public static function boot()

    {

        parent::boot();



        static::creating(function ($model) {

            $model->created_at = $model->freshTimestamp();

        });
      }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function post()
    {
      return $this->belongsTo(Post::class);
    }
}
