<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contrato extends Model
{
    protected $table = 'contratos';
    use HasFactory;
    public function funcionario(){
        return $this->BelongsTo('App\Models\Funcionario');
    }
    public function vendedor(){
        return $this->hasOne('App\Models\Vendedor');
    }
    public function bem(){
        return $this->hasOne('App\Models\Bem');
    }
    public function receita(){
        return $this->HasMany('App\Models\Receita');
    }
}
