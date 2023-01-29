<?php

namespace Modules\Inbound\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class DocumentController extends Controller
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

        return view(
            "backend.docs.index",
            compact('module_title', 'module_icon')
        );
    }
}
