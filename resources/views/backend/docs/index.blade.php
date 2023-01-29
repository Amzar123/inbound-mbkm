@extends('backend.layouts.app')

{{-- @section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection --}}

@section('breadcrumbs')
<x-backend-breadcrumbs>
    {{-- <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}</x-backend-breadcrumb-item> --}}
</x-backend-breadcrumbs>
@endsection

<style>
    /**
 *
 * Style.css
 *
 */.container {
    padding: 50px 200px;
}
.box {
  position: relative;
  background: #ffffff;
  width: 100%;
}
.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}
.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}
.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
  border-radius: 30px;
  margin-right: 5%;
  margin-left: 5%;
}
.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}
.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}
.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}
.preview-zone {
  text-align: center;
}
.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}
</style>

@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} 
            {{-- <small class="text-muted">{{ __($module_action) }}</small> --}}

            <x-slot name="subtitle">
                {{-- @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)]) --}}
            </x-slot>
            {{-- <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot> --}}
        </x-backend.section-header>

        <hr>
        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Code
                            </th>
                            <th>
                                Updated At
                            </th>
                            <th>
                                Created By
                            </th>
                            <th class="text-end">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @foreach($$module_name as $module_name_singular) --}}
                        <tr>
                            {{-- <td>
                                {{ $module_name_singular->id }}
                            </td>
                            <td>
                                <a href="{{ url("admin/$module_name", $module_name_singular->id) }}">{{ $module_name_singular->name }}</a>
                            </td>
                            <td>
                                {{ $module_name_singular->slug }}
                            </td>
                            <td>
                                {{ $module_name_singular->updated_at->diffForHumans() }}
                            </td>
                            <td>
                                {{ $module_name_singular->created_by }}
                            </td>
                            <td class="text-end">
                                <a href='{!!route("backend.$module_name.edit", $module_name_singular)!!}' class='btn btn-sm btn-primary mt-1' data-toggle="tooltip" title="Edit {{ ucwords(Str::singular($module_name)) }}"><i class="fas fa-wrench"></i></a>
                                <a href='{!!route("backend.$module_name.show", $module_name_singular)!!}' class='btn btn-sm btn-success mt-1' data-toggle="tooltip" title="Show {{ ucwords(Str::singular($module_name)) }}"><i class="fas fa-tv"></i></a>
                            </td> --}}

                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>

                <div class="col" style="float: right">
                    {{-- <button onclick="window.history.back();" type="button" style="border-radius: 16px; color: #624F82; border-color: #624F82" class="btn btn-outline-primary">Cancel</button> --}}
                    <x-button style="width: 80px">
                        {{ __('Tambah') }}
                    </x-button>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Code
                            </th>
                            <th>
                                Updated At
                            </th>
                            <th>
                                Created By
                            </th>
                            <th class="text-end">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @foreach($$module_name as $module_name_singular) --}}
                        <tr>
                            {{-- <td>
                                {{ $module_name_singular->id }}
                            </td>
                            <td>
                                <a href="{{ url("admin/$module_name", $module_name_singular->id) }}">{{ $module_name_singular->name }}</a>
                            </td>
                            <td>
                                {{ $module_name_singular->slug }}
                            </td>
                            <td>
                                {{ $module_name_singular->updated_at->diffForHumans() }}
                            </td>
                            <td>
                                {{ $module_name_singular->created_by }}
                            </td>
                            <td class="text-end">
                                <a href='{!!route("backend.$module_name.edit", $module_name_singular)!!}' class='btn btn-sm btn-primary mt-1' data-toggle="tooltip" title="Edit {{ ucwords(Str::singular($module_name)) }}"><i class="fas fa-wrench"></i></a>
                                <a href='{!!route("backend.$module_name.show", $module_name_singular)!!}' class='btn btn-sm btn-success mt-1' data-toggle="tooltip" title="Show {{ ucwords(Str::singular($module_name)) }}"><i class="fas fa-tv"></i></a>
                            </td> --}}

                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                            <td>
                                haha
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>

                <div class="col" style="float: right">
                    <button onclick="window.history.back();" type="button" style="border-radius: 16px; color: #624F82; border-color: #624F82" class="btn btn-outline-primary">Cancel</button>
                    <x-button style="width: 80px">
                        {{ __('Usulkan') }}
                    </x-button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">

        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <x-backend.section-header>
            <i class="fas fa-upload"></i> Upload file
            {{-- <small class="text-muted">{{ __($module_action) }}</small>  --}}

            <x-slot name="subtitle">
                {{-- @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)]) --}}
            </x-slot>
            {{-- <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot> --}}
        </x-backend.section-header>
        <hr>
        <div class="">
            <form action="test-upload.php" method="POST" enctype="multipart/form-data" >   <div class="container">
                <div class="row">
                 <div class="col-md-12">
                  <div class="form-group">     
                    <div class="preview-zone hidden">
                     <div class="box box-solid">
                      <div class="box-header with-border">
                       <div><b>Preview</b></div>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-danger btn-xs remove-preview">
                           <i class="fa fa-times"></i> Reset This Form
                          </button>
                        </div>
                       </div>
                       <div class="box-body">
                        
                       </div>
                     </div>
                    </div>       
                    <div class="dropzone-wrapper">
                     <div class="dropzone-desc">
                      <i class="nav-icon fas fa-upload"></i>
                      <p>Pilih file atau tarik kesini.</p>
                     </div>
                     <input type="file" name="img_logo" class="dropzone">
                    </div>      
                  </div>
                 </div>
                </div>    
                  <div class="justify-center mt-5">
                    <center>
                        <x-button style="width: 25%">
                        {{ __('Upload') }}
                    </x-button></center>
                  </div>
                </div>
            </form> 
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
        </div>
    </div>
</div>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    /**
 *
 * app.js
 *
 */
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            var htmlPreview = 
            '<img width="200" src="' + e.target.result + '" />'+
            '<p>' + input.files[0].name + '</p>';
            var wrapperZone = $(input).parent();
            var previewZone = $(input).parent().parent().find('.preview-zone');
            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
            
            wrapperZone.removeClass('dragover');
            previewZone.removeClass('hidden');
            boxZone.empty();
            boxZone.append(htmlPreview);
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}
       
function reset(e) {
    e.wrap('<form>').closest('form').get(0).reset();
    e.unwrap();
}
    
$(".dropzone").change(function(){
    readFile(this);
    });$('.dropzone-wrapper').on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });$('.dropzone-wrapper').on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });$('.remove-preview').on('click', function() {
        var boxZone = $(this).parents('.preview-zone').find('.box-body');
        var previewZone = $(this).parents('.preview-zone');
        var dropzone = $(this).parents('.form-group').find('.dropzone');
        boxZone.empty();
        previewZone.addClass('hidden');
        reset(dropzone);
    });
</script>
@endsection