<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

trait CheckFieldTrait
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validateEmail(array $data){

        return Validator::make($data, [
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
    /**
     * @param Request $request
     * @return string
     */
    public function checkEmail(Request $request)
    {
        $validator = $this->validateEmail($request->all());
        if($validator->fails()){
            return response()->json(['success'=>false]);
        }
        return response()->json(['success'=>true]);


    }

}
