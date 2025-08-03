<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinishGoodScheduleRequest extends FormRequest
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
            'item_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:1',
            'priority' => 'required|in:1,2,3,4,5',
        ];
    }
}
