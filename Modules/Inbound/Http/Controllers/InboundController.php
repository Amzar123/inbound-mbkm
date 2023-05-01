<?php

namespace Modules\Inbound\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Inbound\Entities\SubjectsTakenStudents;

class InboundController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Usulan';

        // module name
        // $this->module_name = 'documents';

        // directory path of the module
        $this->module_path = 'tag::backend';

        // module icon
        $this->module_icon = 'fas fa-tags';

        // module model name, path
        // $this->module_model = "Modules\Tag\Entities\Tag";
    }
    /**
     * Show the docs pages application.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        // $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        // $module_model = $this->module_model;
        // $module_name_singular = Str::singular($module_name);

        // return view('backend.docs.index');

        $mata_kuliah = SubjectsTakenStudents::all();

        return view(
            "inbound::backend.document.index",
            compact('module_title', 'module_icon', 'mata_kuliah')
        );
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function index()
    // {
    //     return view('inbound::index');
    // }

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
        dd("test");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
