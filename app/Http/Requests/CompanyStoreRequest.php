<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        # to check unique in store only
        $company_id = null;

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $company_id = $this->route('company') ?? $this->route('param');
        }

        return [
            'name' => 'required|string|max:100|min:2',
            'email' => 'required|max:191|email:rfc,dns|unique:companies,email,'. $company_id .',id,deleted_at,NULL',
            'logo' => 'nullable|mimes:png,jpeg,jpg|dimensions:max_width=100,max_height=100',
            'website' => 'required|max:191|unique:companies,website,'.$company_id.',id,deleted_at,NULL',
        ];
    }
}
