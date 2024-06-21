<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
        ]);

        return redirect("/dashboard/users")->with("status", 'Admin berhasil ditambahkan, lakukan login untuk mendapatkan email verifikasi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($request->email !== $user->email) {
            $rule['email'] =  ['required', 'string', 'email', 'max:255', 'unique:users'];
            $validatedData = $request->validate($rule);

            $user->email = $request->email;
        }

        if (isset($request->newpassword)) {

            if (Hash::make($request->password) !== auth()->user()->password) {
                return redirect("/dashboard/users/" . auth()->user()->id . "/edit")->with("status", 'Password lama salah!');
            }

            $rule['newpassword'] = ['required', 'string', 'min:8'];
            $validatedData = $request->validate($rule);

            $user->password = Hash::make($request->newpassword);
        }

        $user->name = $request->name;
        $user->save();

        return redirect("/dashboard/users")->with("status", 'Admin berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $nama = $user->name;
        $user->delete();

        return redirect("/dashboard/users")->with("status", 'Admin ' . $nama . ' berhasil dihapus!');
    }
}
