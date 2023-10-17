<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class FormEditPegawai extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'nama' => 'required|string',
            'nip' => 'string',
            'tempat_lahir' => 'string',
            'tanggal_lahir' => 'date',
            'jabatan' => 'string',
            'pangkat_golongan' => 'string',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama Wajib Diisi',
        ];
    }

  
}
