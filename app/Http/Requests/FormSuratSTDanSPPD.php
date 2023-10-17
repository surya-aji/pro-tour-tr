<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class FormSuratSTDanSPPD extends FormRequest
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
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'dasar_surat' => 'required|string',
            'dari' => 'required',
            'kepada' => 'required',
            'tanggal_pelaksanaan' => 'required',
            'tempat_pelaksanaan' => 'required',
            'maksud_surat' => 'required|string',
            'tingkat_biaya' => 'required',
            'angkutan' => 'required',
            'tanggal_berangkat' => 'required',
            'tanggal_pulang' => 'required',
            'anggaran' => 'integer',
            'instansi' => 'string',
            'akun' => 'string',
            'keterangan' => 'string',
            'pejabat_pembuat_komitmen' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama Wajib Diisi',
            'nomor_surat.required' => 'Nomor Surat Wajib Diisi',
            'tanggal_surat.required' => 'Tanggal Surat Wajib Diisi',
            'dasar_surat.required' => 'Dasar Surat Wajib Diisi',
            'dari.required' => 'Pemberi Perintah Wajib Diisi',
            'kepada.required' => 'Yang Diberi Perintah Wajib Diisi',
            'tanggal_pelaksanaan.required' => 'Tanggal Pelaksanaan Wajib Diisi',
            'tempat_pelaksanaan.required' => 'Tempat Pelaksanaan Wajib Diisi',
            'maksud_surat.required' => 'Maksud Surat Wajib Diisi',
            'tingkat_biaya.required' => 'Tingkat Biaya Wajib Diisi',
            'angkutan.required' => 'Angkutan Wajib Diisi',
            'tanggal_berangkat.required' => 'Tanggal Berangkat Wajib Diisi',
            'tanggal_pulang.required' => 'Tanggal Pulang Wajib Diisi',
            'pejabat_pembuat_komitmen.required' => 'Pejabat Pembuat Komitmen Wajib Diisi',
        ];
    }
}
