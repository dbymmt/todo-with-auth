<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Category;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'action',
    ];

    protected $hidden = [
        'id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeUser($query, $user_id)
    {
        if(!empty($user_id)){
            $query->where('user_id', $user_id);
        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('action', 'like', '%' . $keyword . '%');
        }
    }

    // public function retTodos() {
    //     return $this->action;
    // }

}
