<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingsRequest extends Request
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

        $id = Auth::user()->id;

        $rules =  [
            'username' => 'required|max:255|unique:users,username,'.$id,
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'phone' => 'required|min:10|unique:users,phone,'.$id,
        ];

        return $rules;
    }

}
