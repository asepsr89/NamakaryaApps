<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlikRequest extends FormRequest
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
            'tglSlik'=>'required',
            'statusKolek'=>'required',
            'keterangan'=>'required',
            'note'=>'required',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
        'tglSlik.required' => 'Tanggal tidak boleh kosong',
        'statusKolek.required' => 'Status tidak boleh kosong',
        'keterangan.required' => 'Keterangan tidak boleh kosong',
        'note.required' => 'Note tidak boleh kosong',
        'status.required' => 'Status tidak boleh kosong',
        ];
    }
}
