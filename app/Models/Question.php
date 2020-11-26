<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // you have to specified table field that can be filled
    // otherwise it will get error when using store method on controller
    // protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];
    // or use guarded
    protected $guarded = [];

    // to change model route binding from id to slug
    // api/question/{questionId} will not work anymore
    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function replies(){
      return $this->hasMany(Reply::class);
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
      return asset("api/question/$this->slug");
    }
}
