<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index(){

        $user = $this->user->get();

        return response()->json([
            'users' => $user
        ], 200);
    }

    public function show($id){

        try {
            $user = $this->user->findOrFail($id);

            return response()->json([
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

}
