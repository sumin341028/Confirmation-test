<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Database\Factories\ContactFactory::new();
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
        'category_id',
        'created_at',
    ];
        
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
