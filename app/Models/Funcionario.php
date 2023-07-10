<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    use HasFactory;

    public function empresa(){
        return $this->BelongsTo('App\Models\Empresa');
    } 
    public function contratos(){
        return $this->HasMany('App\Models\Contrato');
    }
}
