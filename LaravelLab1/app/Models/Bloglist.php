<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloglist extends Model
{
    use HasFactory;

    protected $table = 'bloglist';
    protected $fillable = ['author', 'b_title', 'b_content', 'dateCreated', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class , 'email', 'email');
    }

}
