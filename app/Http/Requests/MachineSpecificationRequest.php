<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineSpecificationRequest extends FormRequest
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
            'asset_id' => 'required|exists:assets,id',
            'specs' => 'required|array|min:1',
            'specs.*.name' => 'required|string|max:255',
            'specs.*.value' => 'required|string|max:255',
        ];
    }
}
