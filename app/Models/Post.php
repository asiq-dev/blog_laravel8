<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['author','category'];
    // protected $fillable = ['title','excerpt','body'];


public function scopeFilter($query, array $filters) //this func use for query data and return on controller / Post::newQuery()->filter();
{
    $query->when($filters['search'] ?? false, function ($query, $search) {
        $query->where('title', 'like', '%' .$search . '%')
        ->orWhere('body', 'like', '%' .$search . '%');
    });
}




    public function category(){
        return $this->belongsTo(Category::class);
    } 

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
