<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // parsing data
        $dataMhs = [
           ['id' => '1', 'nama' => 'Rahmi Rahmawati', 'nim' => '20110162', 'usia' => '20'],
           ['id' => '2', 'nama' => 'Ayu Yuliana', 'nim' => '20110161', 'usia' => '20']
        ];

        if($request->query('kelas')){
            $dataMhs = array_filter($dataMhs, function($kelas){
                return $kelas['kelas'] == request()->kelas;
            });
        }

        return view('user.index', compact('dataMhs'));
    }

    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('user.index')->with('message', 'Data anda telah diinputkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dataMhs = [
            ['id' => '1', 'nama' => 'Rahmi Rahmawati', 'nim' => '20110162', 'usia' => '20'],
            ['id' => '2', 'nama' => 'Ayu Yuliana', 'nim' => '20110161', 'usia' => '20'],
         ];

        if($id){
            $dataMhs = array_filter($dataMhs, function($id){
                return $id['id'] == request()->segment(count(request()->segments()));
            });
        }

        return view('user.detail', compact('dataMhs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataMhs = [
            ['id' => '1', 'nama' => 'Rahmi Rahmawati', 'nim' => '20110162', 'usia' => '20'],
            ['id' => '2', 'nama' => 'Ayu Yuliana', 'nim' => '20110161', 'usia' => '20']
         ];

         $dataMhs = array_filter($dataMhs, function($id){
            return $id['id'] == request()->segment(count(request()->segments())-1);
         });

         return view('user.edit', compact('dataMhs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('user.index')->with('message', 'Data anda telah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return redirect()->route('user.index')->with('message', 'Data anda telah dihapus');
    }
}
