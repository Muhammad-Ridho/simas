<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $users = User::orderBy('id','desc')->simplePaginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {       
        $this->validate($request, [
            'name'   => 'required|string',
            'email'  => 'required|string',
            'img' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/images');
        $image = new User([
            'img' => $imagePath,
            ]);

        User::create([
            'name'   => $request->get('name'),
            'level'   => $request->get('level'),
            'email'   => $request->get('email'),
            'password'   => $request->get('password'),
            'img' => $image,
            
        ]);
        
 
        return redirect()->route('users.index')->with('message', 'Data Users baru berhasil ditambahkan.');
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
        return view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'email' => 'required',
            // 'password' => 'required'
        ]);
        
        $users->fill($request->post())->save();
 
        return redirect()->route('users.index')->with('success','Users Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users,)
    {
        try {
            $users->delete();

            return redirect()->route('users.index', [])->with('success', __('Lokasi deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.index', [])->with('error', 'Cannot delete Users: ' . $e->getMessage());
        }
    
    }
}