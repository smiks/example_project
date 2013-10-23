<?php
class RegistrationController extends BaseController
{   
    public function showRegistrationForm()
    {
        return View::make('form');   
    }

    public function processRegistrationForm()
    {
        $data = Input::all();

        $rules = array(
            'username' => 'required|alpha_num|min:3|max:32',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:3',
			'password_confirmation' => 'same:password'
        );

        $validator = Validator::make($data, $rules);

        if($validator->passes()) {
            return 'Data was saved.';
        }
        return Redirect::to('/register')->withErrors($validator)->withInput();
    }
}
