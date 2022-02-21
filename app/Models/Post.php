<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //to allow insert in table
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user() //name is very important
    {
        return $this->belongsTo(User::class);
    }

}
