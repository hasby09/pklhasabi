<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;

class SppReq extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules():array {
        return [
            'nominal' => ['required', Rule::unique('spp', 'nominal')],
            'tahun' => 'required'
        ];
    }
}
