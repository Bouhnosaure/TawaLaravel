<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class UserProfileRequest extends Request
{
    /**
     * @var Guard
     */
    private $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

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
        $id = $this->auth->user()->id;

        $rules = [
            'name' => 'required|max:255|unique:users,name,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'profile.firstname' => 'required|max:255',
            'profile.lastname' => 'required|max:255',
            'profile.phone' => 'required|min:10|unique:user_profiles,phone,' . $id . ',user_id'
        ];

        return $rules;
    }
}
