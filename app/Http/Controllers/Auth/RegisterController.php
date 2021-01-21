<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'location' => ['required', 'string', 'max:255'],
            'sport_they_play' => ['required', 'string', 'max:255'],
            'tournaments_won' => ['required', 'string', 'max:255'],
            'photo' => ['required', 'string', 'max:255'],
            'video' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = request();
        $profileImage = $request->file('photo');
        $profileImageSaveAsName = time() . Auth::id() . "-profile." . $profileImage->getClientOriginalExtension();
        $profileVideo = $request->file('video');
        $profileVideoSaveAsName = time() . Auth::id() . "-profile." . $profileVideo->getClientOriginalExtension();


        $upload_path = 'app/public/uploads';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        $upload_path = 'app/public/uploads';
        $profile_image_url = $upload_path . $profileVideoSaveAsName;
        $success = $profileVideo->move($upload_path, $profileVideoSaveAsName);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'location' => $data['location'],
            'sport_they_play' => $data['sport_they_play'],
            'tournaments_won' => $data['tournaments_won'],
            'password' => Hash::make($data['password']),
        ]);
    }
}




$upload_path = 'profile_images/';
$profile_image_url = $upload_path . $profileImageSaveAsName;
$success = $profileImage->move($upload_path, $profileImageSaveAsName);


 return User::create([
       'name' => $data['name'],
       'email' => $data['email'],
       'password' => bcrypt($data['password']),
       'dob' => $data['dob'],
       'profile_picture' => $profile_image_url,
   ]);