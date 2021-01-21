<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostaController;
use App\User;
use Illuminate\Http\Request;
use App\Services\DocumentManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class ProfileController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    private $user_id = 0;


    public function __construct()
    {
        if (\Auth::user()) {
            $this->user_id = \Auth::user()->id;
        }

    }
    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        return tap($user)->update($request->only('name', 'email', 'location', 'sport_they_play', 'tournaments_won', 'photo
        ', 'video'));
    }


    public function getUser()
    {
        try {
            $result = User::find($this->user_id);
            return $this->respondWithSuccess($result);
        } catch (Exception $ex) {
            return $this->respondWithError($ex->getResponse());
        }
    }

    public function getUsers()
    {
        try {
            $result = User::where('is_admin', '!=', 1)->paginate(10);
            return $this->respondWithSuccess($result);
        } catch (Exception $ex) {
            return $this->respondWithError($ex->getResponse());
        }
    }



}
