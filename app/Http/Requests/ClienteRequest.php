<?php

namespace App\Http\Requests;

use App\Rules\CpfRule;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $minDate = Carbon::today()->subYears(125);
        return [
            "nome" => [
                "required", 
                "string",
                "max:150"
            ],
            "cpf" => [
                "required",
                "numeric",
                "digits:11",
                "unique:cliente,Cpf,".$this->id,
                new CpfRule
            ],
            "dataNascimento" => [
                "required",
                "date",
                "before:tomorrow",
                "after:".$minDate
            ],
            "renda" => [
                "nullable",
                "numeric",
                "between:0,999999.99"
            ]
        ];
    }

    public function messages(){
        return [
            "nome.required" => "O nome é obrigatório!",
            "nome.max" => "O nome pode ter no máximo 150 caracteres!",

            "cpf.required" => "O CPF é obrigatório!",
            "cpf.numeric" => "O CPF precisa ser apenas números!",
            "cpf.digits" => "O CPF precisa ter 11 digitos!",
            "cpf.unique" => "Já existe um cliente cadastrado com esse cpf!",

            "dataNascimento.required" => "A data de nascimento é obrigatório!",
            "dataNascimento.date" => "A data de nascimento precisa ser uma data!",
            "dataNascimento.before" => "A data de nascimento precisa ser válida!",
            "dataNascimento.after" => "A data de nascimento precisa ser válida!",

            "renda.numeric" => "A renda é um valor real!",
            "renda.between" => "A renda precisa ser um valor positivo!"
        ];
    }
}
