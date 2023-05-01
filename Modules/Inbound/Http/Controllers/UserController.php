<?php

namespace Modules\Inbound\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use App\Models\Userprofile;
use App\Models\User;
use App\Events\Backend\UserProfileUpdated;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Users';

        // module name
        $this->module_name = 'users';

        // directory path of the module
        $this->module_path = 'users';

        // module icon
        $this->module_icon = 'c-icon cil-people';

        // module model name, path
        $this->module_model = "App\Models\User";
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit Profile';

        if (! auth()->user()->can('edit_users')) {
            $id = auth()->user()->id;
        }

        $$module_name_singular = $module_model::findOrFail($id);
        $userprofile = Userprofile::where('user_id', $$module_name_singular->id)->first();

        // dd($userprofile);

        Log::info(label_case($module_title.' '.$module_action).' | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return view(
            "inbound::backend.user.Profile",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'userprofile')
        );
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
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    // public function show($id)
    // {
    //     dd("ini id nya ", $id);
    //     $module_title = $this->module_title;
    //     $module_name = $this->module_name;
    //     $module_path = $this->module_path;
    //     $module_icon = $this->module_icon;
    //     $module_model = $this->module_model;
    //     $module_name_singular = Str::singular($module_name);

    //     $module_action = 'Edit Profile';

    //     if (! auth()->user()->can('edit_users')) {
    //         $id = auth()->user()->id;
    //     }

    //     $$module_name_singular = User::findOrFail($id);
    //     $userprofile = Userprofile::where('user_id', $$module_name_singular->id)->first();

    //     Log::info(label_case($module_title.' '.$module_action).' | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

    //     return view(
    //         "inbound::backend.user.Profile",
    //         compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', "$module_name_singular", 'userprofile')
    //     );
    // }

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
        // dd($request);
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit Profile';

        // $this->validate($request, [
        //     'avatar'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'first_name'=> 'required|min:3|max:191',
        //     'last_name' => 'required|min:3|max:191',
        //     'email'     => 'email',
        // ]);

        // $this->validate($request, [
        //     // 'avatar'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'nama'=> 'required|min:3|max:191',
        //     'last_name' => 'required|min:3|max:191',
        //     'email_address'     => 'email',
        //     'nim' => 'required',
        //     'nik' => 'required|min:12',
        //     'pt_asal' => 'required',
        //     'address' => 'optional',
        //     'nisn' => 'required'
        // ]);

        if (! auth()->user()->can('edit_users')) {
            $id = auth()->user()->id;
        }

        $$module_name_singular = User::findOrFail($id);

        // Handle Avatar upload
        if ($request->hasFile('avatar')) {
            if ($$module_name_singular->getMedia($module_name)->first()) {
                $$module_name_singular->getMedia($module_name)->first()->delete();
            }

            $media = $$module_name_singular->addMedia($request->file('avatar'))->toMediaCollection($module_name);

            $$module_name_singular->avatar = $media->getUrl();

            $$module_name_singular->save();
        }

        $data_array = $request->except('avatar');
        $data_array['avatar'] = $$module_name_singular->avatar;
        // $data_array['name'] = $request->first_name.' '.$request->last_name;
        
        $user_profile = Userprofile::where('user_id', '=', $$module_name_singular->id)->first();
        $user_profile->update($data_array);

        // dd($user_profile);

        event(new UserProfileUpdated($user_profile));

        Flash::success('<i class="fas fa-check"></i> '.label_case($module_name_singular).' Updated Successfully!')->important();

        Log::info(label_case($module_title.' '.$module_action).' | User:'.auth()->user()->name.'(ID:'.auth()->user()->id.')');

        // dd("sukses yeay");
        return redirect(route('inbound.profile.index', $$module_name_singular->id));
        
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

    /**
     * Display all of inbound participants.
     * @return Renderable
     */
    public function getPesertaInbound()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $page_heading = ucfirst($module_title);
        $title = $page_heading.' '.ucfirst($module_action);

        $$module_name = $module_model::paginate();

        Log::info("'$title' viewed by User:".auth()->user()->name.'(ID:'.auth()->user()->id.')');

        return view(
            "inbound::backend.peserta.index",
            compact('module_title', 'module_name', 'module_path', 'module_icon', 'module_action', 'module_name_singular', 'page_heading', 'title')
        );
    }

    public function index_data()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::select('id', 'name', 'username', 'email', 'email_verified_at', 'updated_at', 'status');

        $data = $$module_name;

        return Datatables::of($$module_name)
                        ->addColumn('action', function ($data) {
                            $module_name = $this->module_name;

                            return view('backend.includes.user_actions', compact('module_name', 'data'));
                        })
                        ->addColumn('user_roles', function ($data) {
                            $module_name = $this->module_name;

                            return view('backend.includes.user_roles', compact('module_name', 'data'));
                        })
                        ->editColumn('name', '<strong>{{$name}}</strong>')
                        ->editColumn('status', function ($data) {
                            $return_data = $data->status_label;
                            $return_data .= '<br>'.$data->confirmed_label;

                            return $return_data;
                        })
                        ->editColumn('updated_at', function ($data) {
                            $module_name = $this->module_name;

                            $diff = Carbon::now()->diffInHours($data->updated_at);

                            if ($diff < 25) {
                                return $data->updated_at->diffForHumans();
                            } else {
                                return $data->updated_at->isoFormat('LLLL');
                            }
                        })
                        ->rawColumns(['name', 'action', 'status', 'user_roles'])
                        ->orderColumns(['id'], '-:column $1')
                        ->make(true);
    }
}
