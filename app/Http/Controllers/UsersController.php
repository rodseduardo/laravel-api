<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $result =  User::findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }

    public function show($id)
    {
        $result = User::findOrFail($id);
        return response()->json($result);
    }

    public function destroy($id)
    {
        $result = User::findOrFail($id);
        $result->delete();
        return response()->json($result);
    }
}
