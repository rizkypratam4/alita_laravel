<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkPlaceRequest extends FormRequest
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
        $page_id = $this->route('work_places')?->id;

        if ($this->isMethod('post')){
            return [
                'area_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'opening_hours' => 'date_format:H:i',
                'closing_hours' => 'date_format:H:i',
                'comforta' => 'nullable|boolean',
                'therapedic' => 'nullable|boolean',
                'spring_air' => 'nullable|boolean',
                'super_fit' => 'nullable|boolean',
                'isleep' => 'nullable|boolean',
                'sleep_spa' => 'nullable|boolean',
                'category' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            return [
                'area_id' => 'required|integer' . $page_id,
                'name' => 'required|string|max:255' . $page_id,
                'address' => 'required|string|max:255' . $page_id,
                'opening_hours' => 'nullable|date_format:H:i' . $page_id,
                'closing_hours' => 'nullable|date_format:H:i|after_or_equal:opening_hours' . $page_id,
                'comforta' => 'required|boolean' . $page_id,
                'therapedic' => 'required|boolean' . $page_id,
                'spring_air' => 'required|boolean' . $page_id,
                'super_fit' => 'required|boolean' . $page_id,
                'isleep' => 'required|boolean' . $page_id,
                'sleep_spa' => 'required|boolean' . $page_id,
                'category' => 'required|string|max:255' . $page_id,
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' . $page_id
            ];
        }
        return [];
    }
}
