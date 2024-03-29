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
        </x-backend.section-header>
        
        <hr>
        <h4>Daftar program</h4>
        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nama Program
                            </th>
                            <th>
                                Penyelenggara
                            </th>
                            <th>
                                Waktu Pelaksanaan
                            </th>
                            @if (auth()->user()->hasRole('prodi'))
                                <th class="text-center">
                                    Action
                                </th>
                            @endif
                            @if (auth()->user()->hasRole('user'))
                                <th class="text-center">
                                    Action
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        <?php $index = 1 ?>
                        @foreach($programs as $item )
                        <tr>
                            <td>
                                {{ $index }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->institution }}
                            </td>
                            <td>
                                {{ $item->start }} s.d. {{ $item->end }}
                            </td>
                            @if (auth()->user()->hasRole('prodi'))
                                <td>
                                    <center><a href="{{route('program.destroy', $item->id)}}" class="btn btn-danger mt-1" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('labels.backend.delete')}}" data-confirm="Are you sure?"><i class="fas fa-trash-alt"></i> Delete</a>
                                    <a href="{{route('program.show', $item->id)}}" class="btn btn-info mt-1" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('Detail')}}"><i class="fas fa-info-circle"></i> Detail</a></center>
                                </td>
                            @endif
                            @if (auth()->user()->hasRole('user'))
                                <td>
                                    <center>
                                        <a href="{{route('program.register', ['uuid' => $item->id])}}" class="btn btn-primary mt-1" data-method="POST" data-token="{{csrf_token()}}" data-toggle="tooltip" title="Daftar" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-paper-plane"></i> Daftar</a>
                                        <a href="{{route('program.show', ['uuid' => $item->id])}}" class="btn btn-info mt-1" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('Detail')}}"><i class="fas fa-info-circle"></i> Detail</a>
                                    </center>
                                </td>
                            @endif
                        </tr>
                        <?php $index++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if (auth()->user()->hasRole('prodi'))
            <hr>
            <h4>Tambahkan program</h4>
            <form action="{{ route('program.store') }}" method="POST">
                @csrf
                <div class="row mb-2">
                    <div class="col">
                        <label for="namaprogram" class="form-label">Nama program</label>
                        <input type="text" class="form-control" name="nama_program" id="namaprogram" placeholder="Masukan nama program" aria-label="Nama mata kuliah">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-8">
                        <label for="inputpenyelenggara" class="form-label">Penyelenggara</label>
                        <input type="text" class="form-control" name="penyelenggara" id="inputpenyelenggara" placeholder="Masukan nama penyelenggara" aria-label="Kode mata kuliah">
                    </div>
                    <div class="col">
                        <label for="inputwaktu" class="form-label">Mulai Program</label>
                        <input type="date" class="form-control" name="program_start" id="inputwaktumulaipelaksanaan" aria-label="Nama mata kuliah">
                    </div>
                    <div class="col">
                        <label for="inputwaktu" class="form-label">Selesai Program

                        </label>
                        <input type="date" class="form-control" name="program_end" id="inputwaktuakhirpelaksanaan" aria-label="Nama mata kuliah">
                    </div>
                </div>
                <button class="btn btn-primary mt-1 mb-3" type="submit"> <i class="fa fa-plus"></i> {{ __('Tambah') }}</button>
            </form>
        @endif
    </div>
    <div class="card-footer">
        <div class="row">

        </div>
    </div>
</div>
@endsection