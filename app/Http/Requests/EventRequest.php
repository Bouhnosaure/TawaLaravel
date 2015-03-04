<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventRequest extends Request
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
        $rules =  [
            'name' => 'required|unique:events|min:3',
            'description' => 'required|min:10',
            'start_time' => ['required', 'date' => 'date_format:"d/m/Y - H:i"'],
            'end_time' => ['required', 'date' => 'date_format:"d/m/Y - H:i"'],
            'location' => 'required',
            'address' => 'required',
            //'is_private' => 'required'
        ];

        if($this->method() == 'PATCH'){
            $rules['name'] = 'required|min:3';
        }

        return $rules;
    }

}
