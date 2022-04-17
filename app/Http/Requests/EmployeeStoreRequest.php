<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
        $employee_id = null;

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $employee_id = $this->route('employee') ?? $this->route('param');
        }

        return [
            'first_name' => 'required|string|max:100|min:2',
            'last_name' => 'required|string|max:100|min:2',
            'company_id' => 'required|numeric|exists:companies,id',
            'email' => 'required|max:191|email:rfc,dns|unique:employees,email,'. $employee_id .',id,deleted_at,NULL',
            'phone' => 'required',
        ];
    }
}
