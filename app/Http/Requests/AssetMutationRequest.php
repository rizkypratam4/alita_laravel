<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssetMutationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'exists:users,id',
                Rule::exists('users', 'id')->where(function ($query){
                    $query->whereNotNull('departement_id')
                          ->whereNotNull('work_place_id');
                })
            ],

            'location_id' => 'required|exists:locations,id',
            'note' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Pilih user yang bertanggung jawab',
            'user_id.exists' => 'User yang dipilih tidak valid atau belum memiliki departement/lokasi kerja',
            'location_id.required' => 'Lokasi baru harus dipilih',
            'location_id.exists' => 'Lokasi yang dipilih tidak valid',
            'image.mimetypes' => 'File harus berupa gambar dengan format: jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ];
    }
}
