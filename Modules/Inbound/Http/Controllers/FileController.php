<?php

namespace Modules\Inbound\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use Modules\Inbound\Entities\File;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Laracasts\Flash\Flash;

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
         $module_title = $this->module_title;
         $module_name = $this->module_name;
         $module_path = $this->module_path;
         $module_icon = $this->module_icon;
         $module_model = $this->module_model;
         $module_name_singular = Str::singular($module_name);
 
         $module_action = 'Edit Profile';
         $$module_name_singular = User::findOrFail(auth()->user()->id);

         $fileNames = [];
         $fileTypes = [];
         $fileUrl = [];
        
        // handle loa file upload
        if ($request->hasFile('loa_file')) {
            // if ($$module_name_singular->getMedia($module_name)->first()) {
            //     $$module_name_singular->getMedia($module_name)->first()->delete();
            // }

            // $media = $$module_name_singular->addMedia($request->file('loa_file'))->toMediaCollection($module_name);

            // $$module_name_singular->avatar = $media->getUrl();

            // $$module_name_singular->save();

            $file = $request->file('loa_file');
            $path = $file->store('uploads', 'public');
            $url = Storage::url($path);

            $fileNames[count($fileNames)] = $request->file('loa_file')->getClientOriginalName();
            $fileTypes[count($fileTypes)] = "Letter Of Acceptance";
            $fileUrl[count($fileUrl)] = $url;
        }

        // handle surat persetujuan file upload
        if ($request->hasFile('persetujuan_pt_file')) {
            // if ($$module_name_singular->getMedia($module_name)->first()) {
            //     $$module_name_singular->getMedia($module_name)->first()->delete();
            // }

            // Storage::disk('local')->put('example.txt', 'Contents');

            // $media = $$module_name_singular->addMedia($request->file('persetujuan_pt_file'))->toMediaCollection($module_name);

            // $$module_name_singular->avatar = $media->getUrl();

            // $$module_name_singular->save();

            $file = $request->file('persetujuan_pt_file');
            $path = $file->store('uploads', 'public');
            $url = Storage::url($path);

            // dd(count($fileNames));

            $fileNames[count($fileNames)] = $request->file('persetujuan_pt_file')->getClientOriginalName();
            $fileTypes[count($fileTypes)] = "Surat Persetujuan PT Asal";
            $fileUrl[count($fileUrl)] = $url;
        }

        for ($i=0; $i < count($fileTypes); $i++) { 
            $file_data = [
                'file_id' => Uuid::uuid4()->toString(),
                'user_id' => auth()->user()->id,
                'file_name' => $fileNames[$i],
                'type' => $fileTypes[$i],
                'url' => $fileUrl[$i]
            ];
    
            $isUploadSuccess = File::create($file_data);
            if (!$isUploadSuccess) {
                Flash::warning('<i class="fas fa-cross"></i> '.label_case($fileNames[$i]).' uploaded!')->important();
            } 
            Flash::success('<i class="fas fa-check"></i> '.label_case($fileNames[$i]).' uploaded!')->important();
        }  
        
        return redirect("inbound/document"); 
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
    public function destroy(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'destroy';

        $isSuccess = $module_model::where('file_id', $request->file_id)->delete();

        if (!$isSuccess) {
            Flash::warning('<i class="fas fa-cross"></i> '.label_case($request->file_id).' Deleted failed!')->important();
            return redirect("inbound/document");
        }
        // Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');
        Flash::success('<i class="fas fa-check"></i> '.label_case($request->file_id).' Deleted Successfully!')->important();
        return redirect("inbound/document");
    }
}
