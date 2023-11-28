<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = strval($value);
        
        $mult = 10;
        $somaCpf = 0;
        for($i = 0; $i < 9; $i++) {
            $digito = intval(substr($value, $i, 1));
            $somaCpf += $digito*$mult;
            $mult--;
        }
        $restoCpf = $somaCpf % 11;
        
        $verificador1 = "0";
        if($restoCpf != 0 && $restoCpf != 1){
            $verificador1 = strval(11 - $restoCpf);
        }

        if($verificador1 != substr($value, 9, 1)){
            $fail("O CPF precisa ser válido");
        }

        $mult = 10;
        $somaCpf = 0;
        for($i = 1; $i < 10; $i++) {
            $digito = intval(substr($value, $i, 1));
            $somaCpf += $digito*$mult;
            $mult--;
        }
        $restoCpf = $somaCpf % 11;
        
        $verificador2 = "0";
        if($restoCpf != 0 && $restoCpf != 1){
            $verificador2 = strval(11 - $restoCpf);
        }

        if($verificador2 != substr($value, 10, 1)){
            $fail("O CPF precisa ser válido");
        }
    }
}
