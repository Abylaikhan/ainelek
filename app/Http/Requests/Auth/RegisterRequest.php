<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'role_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'company_name' => ['required_if:role,dealer,distributor', 'string', 'max:255'],
            'address' => ['required_if:role,dealer,distributor', 'string', 'max:255'],
            'bin' => ['required_if:role,distributor', 'string', 'max:12'],
            'bank' => ['required_if:role,distributor', 'string', 'max:255'],
            'kbe' => ['required_if:role,distributor', 'string', 'max:50'],
            'bik' => ['required_if:role,distributor', 'string', 'max:50'],
            'account_number' => ['required_if:role,distributor', 'string', 'max:50'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }


}
