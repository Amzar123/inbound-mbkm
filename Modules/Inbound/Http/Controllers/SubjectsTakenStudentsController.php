<?php

namespace Modules\Inbound\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

use Modules\Inbound\Entities\SubjectsTakenStudents;

class SubjectsTakenStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('inbound::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('inbound::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $data = [
          'kode' => $request->kode_mata_kuliah ,
          'name' => $request->nama_mata_kuliah ,
          'dosen' => $request->dosen_pengampu ,
          'sks' => $request->sks_mata_kuliah,
          'subject_id' => Uuid::uuid4()->toString(),
          'user_id' => auth()->user()->id
        ];

        SubjectsTakenStudents::create($data);

        return redirect('inbound/document');
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('inbound::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('inbound::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        // dd($id);
        SubjectsTakenStudents::where('subject_id',$id)->delete();
        return redirect('inbound/document');
    }
}
