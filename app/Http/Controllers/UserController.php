<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('list', ['users' => $users]);
    }
    public function create()
    {
        $user=new User();
        return view('form', ['user' => $user , 'action' => 'create' , "actionUrl" => 'store']);
    }
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
            'email' => 'nullable|string|email|max:255|unique:users,email',
        ]);

        User::create($validationData);
        return redirect('/')->with('success', 'User created successfully.');
    }
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('form', ['user' => $user , 'action' => 'update' , "actionUrl" => 'update/'.$id]);
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validationData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $validationData['name'];
        $user->age = $validationData['age'];
        $user->email = $validationData['email'];
        $user->save();
        return redirect('/')->with('success', 'User updated successfully.');
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/')->with('success', 'User deleted successfully.');
    }
}
