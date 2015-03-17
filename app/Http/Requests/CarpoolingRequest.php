<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CarpoolingRequest extends Request
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
            'event_id' => 'required|integer',
            'description' => 'required|min:10',
            'start_time' => ['required', 'date' => 'date_format:"d/m/Y - H:i"'],
            'location' => 'required',
            'price' => 'required|digits_between:0,100',
            'seats' => 'required|digits_between:1,10|integer',
            'stopovers' => '',
        ];

        return $rules;
    }

}
