<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = ["image", "slug", "title", "synopsis", "description", "author", "author_attachment", "publisher", "publisher_attachment", "release_date", "release_year", "price", "is_used", "keys", 'file'];

    public function rents()
    {
        return $this->hasMany(BookRent::class);
    }
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
