<?php

namespace Modules\Inbound\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

use App\Models\User;
use Modules\Inbound\Entities\File;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class FileController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Files';

        // module name
        $this->module_name = 'files';

        // directory path of the module
        $this->module_path = 'files';

        // module icon
        $this->module_icon = 'c-icon cil-file';

        // module model name, path
        $this->module_model = "Modules\Inbound\Entities\File";
    }

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
         // dd($request);
         $module_title = $this->module_title;
         $module_name = $this->module_name;
         $module_path = $this->module_path;
         $module_icon = $this->module_icon;
         $module_model = $this->module_model;
         $module_name_singular = Str::singular($module_name);
 
         $module_action = 'Edit Profile';
         $$module_name_singular = User::findOrFail(auth()->user()->id);
        
         // Handle Avatar upload
        if ($request->hasFile('file_loa')) {
            if ($$module_name_singular->getMedia($module_name)->first()) {
                $$module_name_singular->getMedia($module_name)->first()->delete();
            }

            $media = $$module_name_singular->addMedia($request->file('file_loa'))->toMediaCollection($module_name);

            $$module_name_singular->avatar = $media->getUrl();

            $$module_name_singular->save();
        }

        $file_data = [
            'file_id' => Uuid::uuid4()->toString(),
            'user_id' => auth()->user()->id,
            'file_name' => $request->file('file_loa')->getClientOriginalName()
        ];

        File::create($file_data);

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
    }
}
