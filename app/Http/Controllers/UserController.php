<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "ini adalah isi dari methodnya";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "ini adalah halaman user method create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return "ini adalah halaman tampilan user $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return "ini adalah halaman tampilan edit user $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return "ini adalah halaman update user dengan id: <b>".$id."</b>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return "ini adalah halaman delete user dengan id: <b>".$id."</b>";
    }
}
