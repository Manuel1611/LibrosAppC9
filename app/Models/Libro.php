<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    
    protected $table = 'libro';
    public $timestamps = false;
    protected $fillable = ['titulo', 'editorial', 'paginas', 'autor', 'url', 'numVentas'];
    
    function ventas() {
     
        return $this->hasMany('App\Models\Ventas', 'idlibro');
    
    }

}
