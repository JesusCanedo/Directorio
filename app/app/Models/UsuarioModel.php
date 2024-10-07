<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    use HasFactory;

    protected $table = 'usuarios'; 

    protected $fillable = [
        'id', 
        'departamento', 
        'nombre', 
        'puesto', 
        'email', 
        'area', 
        'camspu',
        'extension'
    ];  
}