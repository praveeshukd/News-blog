<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    
    
   protected $guarded=[];
   protected $with=['category','author'];
   public function scopeFilter($query, $filters)
{

    $query->when($filters['search'] ?? false, function ($query, $search) {
        $query->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
    });
    
// category
$query->when($filters['category'] ?? false, function ($query, $category) {
    $query->whereHas('category', function ($query) use ($category) {
        $query->where('slug', $category);
    });
});
// author
$query->when($filters['author'] ?? false, function ($query, $author) {
    $query->whereHas('author', function ($query) use ($author) {
        $query->where('username', $author);
    });
});
}
public function comments(){
    return $this->hasMany(Comment::class);
   }

   public function category(){
    return $this->belongsTo(Category::class);
   }
   public function author(){
    return $this->belongsTo(User::class,'user_id');
   }


}
