<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    // creamosel fillable con los campos para poder llenar la BD
    protected $fillable = ['name','slug','description'];

    public function doctors(){
        return $this->belongsToMany(User::class);
    }



}
