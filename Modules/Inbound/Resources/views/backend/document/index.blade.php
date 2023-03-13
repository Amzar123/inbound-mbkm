@extends('backend.layouts.app')

<!-- {{-- @section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection --}} -->

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
 */
 .container {
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
        <form action="{{ route('inbound.subject') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col">
                    <label for="inputkodematakuliah" class="form-label">Kode mata kuliah</label>
                    <input type="text" class="form-control" name="kode_mata_kuliah" id="inputkodematakuliah" placeholder="Masukan kode mata kuliah" aria-label="Kode mata kuliah">
                </div>
                <div class="col">
                    <label for="namamatakuliah" class="form-label">Nama mata kuliah</label>
                    <input type="text" class="form-control" name="nama_mata_kuliah" id="namamatakuliah" placeholder="Masukan nama mata kuliah disini" aria-label="Nama mata kuliah">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-8">
                    <label for="inputdosenpengampu" class="form-label">Dosen pengampu</label>
                    <input type="text" class="form-control" name="dosen_pengampu" id="inputdosenpengampu" placeholder="Masukan dosen pengampu disini" aria-label="Kode mata kuliah">
                </div>
                <div class="col">
                    <label for="inputbobotsks" class="form-label">Bobot SKS</label>
                    <input type="number" min="1" max="4" class="form-control" name="sks_mata_kuliah" id="inputbobotsks" placeholder="Masukan bobot sks disini" aria-label="Nama mata kuliah">
                </div>
            </div>
            <x-button style="width: 80px"  type="submit">
                {{ __('Tambah') }}
            </x-button>
        </form>

        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Kode Mata Kuliah
                            </th>
                            <th>
                                Mata Kuliah
                            </th>
                            <th>
                                Dosen Pengampu
                            </th>
                            <th>
                                SKS
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $index = 1 ?>
                        @foreach($mata_kuliah as $item )
                        <tr>
                            <td>
                                {{ $index}}
                            </td>
                            <td>
                                {{ $item->kode }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->dosen }}
                            </td>
                            <td>
                                {{ $item->sks }}
                            </td>
                            <td>
                                <center><a href="{{route('inbound.subject.delete', $item->subject_id)}}" class="btn btn-danger mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt"></i> Delete</a></center>
                            </td>
                        </tr>
                        <?php $index++ ?>
                        @endforeach
                    </tbody>
                </table>
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
            {{-- action="{{ route('inbound.upload') }}" --}}
            <form action="{{ route('inbound.upload') }}" method="POST" enctype="multipart/form-data" >   <div class="container">
                @csrf
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
                     <input type="file" name="file_loa" class="dropzone">
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