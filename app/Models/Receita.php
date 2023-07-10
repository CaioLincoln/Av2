<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receita extends Model
{
    use HasFactory;
    protected $table = 'receitas';

    public function contrato(){
        return $this->belongsTo('App\Models\Contrato');
    } 
}
