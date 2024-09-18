<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    use HasFactory;
    protected $fillable = ["nome" ,"ingredientes", "restaurante_id" ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
        
    }

}
