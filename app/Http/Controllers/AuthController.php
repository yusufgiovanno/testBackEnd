<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller{
    function login(Request $r){
        $cred = User::where('username', $r->username)->first();

        if($cred == null){
            return back()->with('error', 'User not found.');
        } else {
            if ($cred->status != 'Y'){
                return back()->with('error', 'User is inactive.');
            } else {
                if ($cred->password == md5($r->password)) {
                    session(['username'  => $cred->username]);
                    session(['name'      => $cred->name]);
                    session(['userid'    => $cred->id]);

                    return redirect('/data-parkir');
                } else {
                    return back()->with('error', 'Incorrect Password.');
                }
            }
        }

        return $cred;
    }

    function logout(){
        session()->flush();
        return redirect('/');
    }
}
