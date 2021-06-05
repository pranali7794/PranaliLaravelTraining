<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table='posts';   
    protected $fillable = ['title','body','user_id'];

    //Get the blog posts for the user.
    public function posts()
    {
        return $this->belongsTo(Crud::class);
    }
}
