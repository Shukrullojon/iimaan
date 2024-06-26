<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Info::latest()->paginate(20);
        return view('info.index',[
            'infos' => $infos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file){
            $file_name = date('Y_m_d_H_i_s').rand(10000, 99999).'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('files'), $file_name);
        }

        Info::create([
            'type' => $request->type,
            'text' => $request->text,
            'file' => $file_name ?? '',
        ]);
        return redirect()->route('info.index')->with('success', 'Info create successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        $info->delete();
        return redirect()->route('info.index')
            ->with('success','Info deleted successfully');
    }
}
