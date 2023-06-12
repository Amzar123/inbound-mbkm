<?php

namespace Modules\Inbound\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

use Modules\Inbound\Entities\Program;
use Modules\Inbound\Entities\UsersPrograms;
use App\Models\User;

use Ramsey\Uuid\Uuid;

class ProgramController extends Controller
{

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Programs';

        // module name
        $this->module_name = 'programs';

        // directory path of the module
        $this->module_path = 'programs';

        // module icon
        $this->module_icon = 'c-icon cil-calendar';

        // module model name, path
        $this->module_model = "Modules\Inbound\Entities\Program";
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $programs = $module_model::paginate();

        return view(
            'inbound::backend.program.index', 
            compact('programs','module_title', 'module_name', 'module_icon', 'module_name_singular', 'module_action'));
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
        // Generate a version 4 (random) UUID
        $uuid = Uuid::uuid4();

        // Convert UUID to string
        $uuidString = $uuid->toString();
        //
        $data = [
            "id" => $uuidString,
            "name" => $request->nama_program,
            "institution" => $request->penyelenggara,
            "kode" => $request->kode_program 
        ];
        $module_name_singular = Program::create($data);

        return redirect("inbound/program");
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($kode)
    {
        $program = Program::where('kode', $kode)->get();
        $users = User::join("users_programs", "users.id", '=', 'users_programs.user_id')->get();

        return view('inbound::backend.program.detail', compact('program', 'users'));
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
    public function destroy($kode)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'destroy';

        $$module_name_singular = $module_model::where('kode', $kode)->delete();

        Flash::success('<i class="fas fa-check"></i> '.label_case($module_name_singular).' Deleted Successfully!')->important();

        // Log::info(label_case($module_title.' '.$module_action)." | '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".Auth::user()->name.'(ID:'.Auth::user()->id.')');

        return redirect("inbound/program");
    }

    /**
     * Show index data.
     * @return Renderable
     */
    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Programs';

        $$module_name = $module_model::all();

        $data = $$module_name;

        return Datatables::of($$module_name)
                        ->addColumn('action', function ($data) {
                            $module_name = $this->module_name;

                            return view('backend.includes.user_actions', compact('module_name', 'data'));
                        })
                        ->rawColumns(['kode', 'name', 'institution'])
                        ->orderColumns(['id'], '-:column $1')
                        ->make(true);
    }

    /**
     * Register to program.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function register(Request $request, $id)
    {
        $userId = auth()->user()->id;

        // is program exist
        $program = Program::where('kode', $id)->get();
        if (!$program) {
            Flash::failed('<i class="fas fa-cross"></i> Program tidak ditemukan!')->important();
            return redirect("inbound/program");
        }

        $data = [
            "program_id" => $id,
            "user_id" => $userId
        ];
        $success = UsersPrograms::create($data);

        if (!$success) {
            Flash::failed('<i class="fas fa-cross"></i> Gagal mendaftar!')->important();
        } else {
            Flash::success('<i class="fas fa-check"></i> Berhasil mendaftar!')->important();
        }

        return redirect("inbound/program");
    }

    /**
     * Menampilkan pendaftar.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function show_applicant(Request $request)
    {
        $userId = auth()->user()->id;

        // is program exist
        $program = Program::where('kode', $id)->get();
        if (!$program) {
            Flash::failed('<i class="fas fa-cross"></i> Program tidak ditemukan!')->important();
            return redirect("inbound/program");
        }

        $data = [
            "program_id" => $id,
            "user_id" => $userId
        ];
        $success = UsersPrograms::create($data);

        if (!$success) {
            Flash::failed('<i class="fas fa-cross"></i> Gagal mendaftar!')->important();
        } else {
            Flash::success('<i class="fas fa-check"></i> Berhasil mendaftar!')->important();
        }

        return redirect("inbound/program");
    }
}
