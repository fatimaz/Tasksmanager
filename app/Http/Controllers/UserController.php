<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeUserRequest $request)
    {
        try{
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('success', 'User added successfully');
        }catch(\Exception $e){    
            return redirect()->back()->with(['error' => 'There is an error please try again ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user= User::findorFail($id);
        return view('dashboard.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try {
        
        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        return redirect()->route('users.index')->with('success', 'User updated successfuly');

        }catch(\Exception $e){    
            return redirect()->back()->with(['error' => 'There is an error please try again ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      try{
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('users.index')->with('error', 'User deleted successfuly');
             
        }catch(\Exception $e){    
            return redirect()->back()->with(['error' => 'There is an error please try again ']);
        }
    }



    public function updatepassword(string $id){
        $user= User::findorFail($id);
        return view('dashboard.users.update_password',compact('user'));
    }

    // * Update the password.

    public function update_password(UpdatePasswordRequest $request)
    {

         try {
            $user = User::findorfail($request->id);
            $user->update([
                'password'=>Hash::make($request->password)
            ]);
            return redirect()->route('users.index')->with('success', 'User password updated successfuly');
          
        }catch(\Exception $e){    
            return redirect()->back()->with(['error' => 'There is an error please try again ']);
        }
    }


}
