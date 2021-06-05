<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    use HasFactory;
    protected $table='sample_data';   
    protected $fillable = ['id','image','first_name','last_name','mobile', 'email', 'address', 'gender', 'country_code'];

//Get the blog posts for the user.
    public function user()
    {
        return $this->hasMany(Blogs::class,'user_id');
    }
}
