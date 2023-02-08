<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

    protected $table = 'clientes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'foto',
        'nome',
        'nome_mae',
        'data_nascimento',
        'cpf',
        'cns',
        'endereco_id'
    ];

    public function endereco()
    {
        return $this->hasOne('App\Models\Enderecos','id','endereco_id');
    }

}