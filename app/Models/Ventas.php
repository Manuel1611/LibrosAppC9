<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    
    protected $table = 'ventas';
    public $timestamps = false;
    protected $fillable = ['idlibro', 'precio'];
    
    function libro() {
     
        return $this->belongsTo('App\Models\Libro', 'idlibro');
    
    }
}
