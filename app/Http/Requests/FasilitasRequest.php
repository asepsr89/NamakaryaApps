<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FasilitasRequest extends FormRequest
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
    'noDebitur'=>['required', Rule::unique('fasilitas')->ignore($this->fasilitas)],
    'tmpLahir' => 'required',
    'tglLahir' => 'required',
    'pendidikan' => 'required|not_in:0',
    'stsKawin' => 'required|not_in:0',
    'alamatSkrng' => 'required',
    'stsTinggal' => 'required|not_in:0',
    'jnsPekerjaan' => 'required|not_in:0',
    'namaPerusahaan' => 'required',
    'tlpPerusahaan' => 'required',
    'lamaBekerja' => 'required',
    'penghasilan' => 'required',
    'bukuNikah' => 'required|not_in:0',
    'aktaCerai' => 'required|not_in:0',
    'fotoPeminjam' => 'required|not_in:0',
    'idCard' => 'required|not_in:0',
    'suratHrd' => 'required|not_in:0',
    'suratBekerja' => 'required|not_in:0',
    'slipGaji' => 'required|not_in:0',
    'mutasiRekening' => 'required|not_in:0',
    'kartuBpjs' => 'required|not_in:0',
    'ijazahTerakhir' => 'required|not_in:0',
    'institusiLk' => 'required|not_in:0',
    'verifPerusahaan' => 'required|not_in:0',
    'kerjaAnalisis' => 'required|not_in:0',
    'surveiLingkungan' => 'required|not_in:0',
    'fotoRumah' => 'required|not_in:0',
    'skoringKredit' => 'required|not_in:0',
    'denahLokasi' => 'required|not_in:0',
    'mpp' => 'required|not_in:0',
    'buktiKepemilikan' => 'required|not_in:0',
    'shm' => 'required|not_in:0',
    'fotoAtm' => 'required|not_in:0',
    'payrollPelunasan' => 'required|not_in:0',
    'executiveSummary' => 'required|not_in:0',
    'dokumenTambahan' => 'required|not_in:0',
    ];
    }

    public function messages()
    {
        return [
            'noDebitur.required' => 'No Debitur tidak boleh kosong',
            'noDebitur.unique' => 'Nomor debitur sudah ada dalam database',
            'tmpLahir' => 'Tempat Lahir tidak boleh kosong',
            'tglLahir' => 'tanggal Lahir tidak boleh kosong',
            'pendidikan' => 'Pendidikan tidak boleh kosong',
            'stsKawin' => 'Status Kawin tidak boleh kosong',
            'alamatSkrng' => 'Alamat Sekarang tidak boleh kosong',
            'stsTinggal' => 'Status Tinggal tidak boleh kosong',
            'jnsPekerjaan' => 'Jenis Pekerjaan tidak boleh kosong',
            'namaPerusahaan' => 'Nama Perusahaan tidak boleh kosong',
            'tlpPerusahaan' => 'Telepon Perusahaan tidak boleh kosong',
            'lamaBekerja' => 'Lama Bekerja tidak boleh kosong',
            'penghasilan' => 'Pengahasilan tidak boleh kosong',

            'bukuNikah' => 'PIlih salah satu',
            'aktaCerai' => 'PIlih salah satu',
            'fotoPeminjam' => 'PIlih salah satu',
            'idCard' => 'PIlih salah satu',
            'suratHrd' => 'PIlih salah satu',
            'suratBekerja' => 'PIlih salah satu',
            'slipGaji' => 'PIlih salah satu',
            'mutasiRekening' => 'PIlih salah satu',
            'kartuBpjs' => 'PIlih salah satu',
            'ijazahTerakhir' => 'PIlih salah satu',
            'institusiLk' => 'PIlih salah satu',
            'verifPerusahaan' => 'PIlih salah satu',
            'kerjaAnalisis' => 'PIlih salah satu',
            'surveiLingkungan' => 'PIlih salah satu',
            'fotoRumah' => 'PIlih salah satu',
            'skoringKredit' => 'PIlih salah satu',
            'denahLokasi' => 'PIlih salah satu',
            'mpp' => 'PIlih salah satu',
            'buktiKepemilikan' => 'PIlih salah satu',
            'shm' => 'PIlih salah satu',
            'fotoAtm' => 'PIlih salah satu',
            'payrollPelunasan' => 'PIlih salah satu',
            'executiveSummary' => 'PIlih salah satu',
            'dokumenTambahan' => 'PIlih salah satu',
        ];
    }
}
