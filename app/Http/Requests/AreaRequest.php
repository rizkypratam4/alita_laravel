<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
        $page_id = $this->route('areas')?->id;

        if ($this->isMethod('post')){
            return [
                'code' => 'required|string|max:10|unique:areas,code',
                'name' => 'required|string|max:255|unique:areas,name'
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            return [
                'code' => 'required|string|max:5|unique:areas,code,' . $page_id,
                'name' => 'required|string|max:255' . $page_id
            ];
        }
        return [];
    }
}
