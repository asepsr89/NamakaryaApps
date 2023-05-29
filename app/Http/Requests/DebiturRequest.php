<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DebiturRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
       return [
        'tglPengajuan' => 'required',
        'noDebitur' => 'required',
        'name' => 'required',
        'ibuKandung' => 'required',
        'noKtp'=>['required', Rule::unique('debiturs')->ignore($this->debitur)],
        'tlp' => 'required|numeric',
        'plafond' => 'required',
        'alamat' => 'required',
        'cabang_id' => 'required|not_in:0',
        // 'imgKtp' => 'required',
        // 'imgKK' => 'required',
        // 'imgPsKtp' => 'required',
        
        ];
    }

    public function messages()
    {
        return [
            'tglPengajuan.required' => 'tanggal tidak boleh kosong',
            'noDebitur.required' => 'Nomor Debitur tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'ibuKandung.required' => 'Ibu Kandung tidak boleh kosong',
            'noKtp.required' => 'No KTP tidak boleh kosong',
            'noKtp.unique' => 'No KTP sudah terdaftar',
            'noKtp.numeric' => 'Tidak boleh huruf atau karakter',
            'tlp.required' => 'Telepon tidak boleh kosong',
            'tlp.numeric' => 'Tidak boleh huruf atau karakter',
            'plafond.required' => 'Plafond tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'cabang_id.required' => 'Cabang tidak boleh kosong',
            'cabang_id.not_in' => 'cabang tidak boleh kosong pilih salah satu cabang',
            // 'imgKtp' => 'Foto KTP tidak boleh kosong',
            // 'imgKK' => 'Foto Kartu keluarga tidak boleh kosong',
            // 'imgPsKtp' => 'Foto KTP pasangan tidak boleh kosong',
        ];
    }
}
