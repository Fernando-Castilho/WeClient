<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    const CREATED_AT = "DataCadastro";
    const UPDATED_AT = "DataAtualizacao";

    protected $fillable = [
        "Nome",
        "Cpf",
        "DataNascimento",
        "Renda"
    ];
}
