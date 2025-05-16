<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
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
        $page_id = $this->route('maintenances')?->id;

        if ($this->isMethod('post')){
            return [
                'departement_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'tanggal_perolehan' => 'required|date',
                'supplier' => 'nullable|string|max:255',
                'serial_number' => 'nullable|string|max:255',
                'kode_asset' => 'required|string|max:255',
                'harga' => 'required|string|max:255',
                'kapasitas' => 'nullable|string|max:255',
                'brand_id' => 'nullable|integer',
                'work_place_id' => 'required|integer',
                'category_id' => 'required|integer',
                'type_id' => 'required|integer',
                'keterangan' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'nullable|boolean',
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            return [
                'departement_id' => 'required|integer' . $page_id,
                'name' => 'required|string|max:255' . $page_id,
                'tanggal_perolehan' => 'required|date' . $page_id,
                'supplier' => 'required|string|max:255' . $page_id,
                'serial_number' => 'required|string|max:255' . $page_id,
                'kode_asset' => 'required|string|max:255' . $page_id,
                'harga' => 'required|string|max:255' . $page_id,
                'kapasitas' => 'required|string|max:255' . $page_id,
                'brand_id' => 'required|integer' . $page_id,
                'work_place_id' => 'required|integer' . $page_id,
                'category_id' => 'required|integer' . $page_id,
                'type_id' => 'required|integer' . $page_id,
                'keterangan' => 'required|string|max:255' . $page_id,
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' . $page_id,
                'status' => 'required|boolean' . $page_id,
            ];
        }

        return [];
    }
}
