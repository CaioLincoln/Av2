<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bem extends Model
{
    protected $table = 'bens';
    use HasFactory;
    public function contrato(){
        return $this->BelongsTo('App\Models\Contrato');
    } 
}
