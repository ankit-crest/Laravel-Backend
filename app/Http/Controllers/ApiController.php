<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function Userlist(){
        $user = User::paginate(5);

        return response()->json($user);
    }

    public function deleteItem($id){
      
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        $user->delete();
    
        // Return updated user list with pagination
        $users = User::latest()->paginate(5);
    
        return response()->json($users);
    }

    public function register(Request $request) {

    
      $validate=  $request->validate([
        'name' => 'required|max:25',
        'email' => 'required|email|unique:users',
        'password' =>'required'
        ]);

        $validate['password']= Hash::make($request->password);

        if($user = User::create($validate)){
            return response()->json(['message'=>'Record install successfully','user'=>$user]);
        }else{
            return response()->json($validate);
        }

        
    }
    public function login(Request $request) {

    
      $validate=  $request->validate([
       
        'email' => 'required',
        'password' =>'required'
        ]);

        $validate['password']= Hash::make($request->password);

        $user = User::where('email',$request->email)->first();


        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        return response()->json(['message'=>'Credential match successfully', 'access_token' => $token,'user'=>$user], 200);
        
    }

    

}
