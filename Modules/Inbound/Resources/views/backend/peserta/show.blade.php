@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}'>
        {{ __($module_title) }}
    </x-backend-breadcrumb-item>
    <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot>
        </x-backend.section-header>

        <hr>

        <h4>Profile</h4>
        {{-- disini tambahkan untuk biodata orang --}}
        <table class="table table-striped">
            <tr>
                <td>Nama</td>
                <td>Aji Muhammad Zapar</td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>Ilmu Komputer</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>Bandung</td>
            </tr>
        </table>
        <hr>
        <h4>Program yang diikuti</h4>
        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Kode Program
                            </th>
                            <th>
                                Nama Program
                            </th>
                            <th>
                                Penyelenggara
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>

                    {{-- <tbody>
                        <?php $index = 1 ?>
                        @foreach($programs as $item )
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
                                {{ $item->institution }}
                            </td>
                            <td>
                                <center><a href="{{route('program.destroy', $item->kode)}}" class="btn btn-danger mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt"></i> Delete</a>
                                <a href="{{route('program.show', $item->kode)}}" class="btn btn-info mt-1" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('Detail')}}"><i class="fas fa-info-circle"></i> Detail</a></center>
                            </td>
                        </tr>
                        <?php $index++ ?>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>

        <hr>

        <h4>Pratinjau dokumen</h4>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-end text-muted">
                    {{-- Updated: {{$$module_name_singular->updated_at->diffForHumans()}},
                    Created at: {{$$module_name_singular->created_at->isoFormat('LLLL')}} --}}
                </small>
            </div>
        </div>
    </div>
</div>

@endsection