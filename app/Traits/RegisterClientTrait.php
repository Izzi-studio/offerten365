<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Str;
use Log;
trait RegisterClientTrait {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorClient(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'availability' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new Client instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createClient(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'role_id' => env('ROLE_ID_CLIENT'),
            'phone' => $data['phone'],
            'availability' => $data['availability'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function registerClient(Request $request)
    {

        $credential = $request->only('client')['client'];
        $this->password = Str::random(8);
        $credential['password'] = $this->password;

        $this->validatorClient($credential)->validate();

        event(new Registered($user = $this->createClient($credential)));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

    }
}
