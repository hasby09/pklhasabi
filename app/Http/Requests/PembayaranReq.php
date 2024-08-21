<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;

class PembayaranReq extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $pembayaran = $this->route('pembayaran');
        return [
            'nisn' => ['required', Rule::unique('pembayaran', 'nisn')->ignore($pembayaran)],
            'jumlah_bayar' => 'required'
        ];
    }
}
