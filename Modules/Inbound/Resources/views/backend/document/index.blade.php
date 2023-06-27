@extends('backend.layouts.app')
@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection
@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} 
            <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)]) 
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot>
        </x-backend.section-header>

        <hr>

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

        <hr>

        <form action="{{ route('inbound.subject') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
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
            <button class="btn btn-primary mt-1 mb-3" type="submit"> <i class="fa fa-plus"></i> {{ __('Tambah') }}</button>
        </form>
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
        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nama file
                            </th>
                            <th>
                                Jenis file
                            </th>
                            <th>
                                Diunggah pada
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $index = 1 ?>
                        @foreach($files as $file )
                        <tr>
                            <td>
                                {{ $index}}
                            </td>
                            <td>
                                {{ $file->file_name }}
                            </td>
                            <td>
                                {{ $file->type }}
                            </td>
                            <td>
                                {{ $file->created_at }}
                            </td>
                            <td>
                            <center>
                                    <div class="">
                                        <a href="{{ route('inbound.subject.delete', $item->subject_id) }}" class="btn btn-danger mt-1 mr-1" data-method="DELETE" data-token="{{ csrf_token() }}" data-toggle="tooltip" title="{{ __('labels.backend.delete') }}" data-confirm="Are you sure?">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('document.destroy') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="file_id" value="{{ $file->file_id }}">
                                            <button type="submit" data-toggle="tooltip" title="{{ __('labels.backend.delete') }}" onclick="return confirm('Are you sure?')" class="btn btn-danger mt-1">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                            </center>
                            </td>
                        </tr>
                        <?php $index++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="">
            <form action="{{ route('inbound.upload') }}" method="POST" enctype="multipart/form-data" >   <div class="container">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">Letter Of Acceptance (LoA)</label>
                    <input class="form-control" name="loa_file" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Surat persetujuan perguruan tinggi asal</label>
                    <input class="form-control" name="persetujuan_pt_file" type="file" id="formFile">
                </div>
                <button class="btn btn-primary mt-1 mb-3" type="submit"><i class="fas fa-paper-plane"></i> Kirim</button>
            </form> 
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
        </div>
    </div>
</div>
@endsection