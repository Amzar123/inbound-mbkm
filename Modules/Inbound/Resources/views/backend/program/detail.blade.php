@extends('backend.layouts.app')

<!-- {{-- @section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection --}} -->

@section('breadcrumbs')
<x-backend-breadcrumbs>
    {{-- <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}</x-backend-breadcrumb-item> --}}
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <x-backend.section-header>
            {{-- <i class="{{ $module_icon }}"></i> {{ __($module_title) }}  --}}
            {{-- <small class="text-muted">{{ __($module_action) }}</small> --}}

            <x-slot name="subtitle">
                {{-- @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)]) --}}
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot>
        </x-backend.section-header>

        <hr>

        <div class="row mt-4">
            <div class="col">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                        <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Peserta</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                    </div>
                </nav>
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row m-4">
                            <center><h4><b>This is title</b></h4></center>
                        </div>
                        <div class="row m-4">
                            <b>Deskripsi</b> 
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consectetur asperiores voluptas quidem cupiditate illo commodi ut deserunt temporibus ipsa repudiandae et perferendis debitis, ea consequatur recusandae dicta facilis id.</p>
                            <b>Jadwal Kegiatan</b> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque sint quibusdam tempora, blanditiis, soluta provident animi accusamus libero velit maxime tenetur odit repudiandae? Est delectus doloremque at quo numquam sapiente?</p>
                            <b>Penyelenggara</b> 
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit architecto inventore tenetur quas tempora itaque natus praesentium error minus? Modi esse aspernatur totam nobis aut similique dolores maxime, ab praesentium.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div>
                            <div class="row mt-4">
                                <div class="col">
                                    <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>
                                                    NIM
                                                </th>
                                                <th>
                                                    Nama
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th class="text-center">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                    
                                        <tbody>
                                            <?php $index = 1 ?>
                                            @foreach($users as $user )
                                            <tr>
                                                <td>
                                                    {{ $index}}
                                                </td>
                                                <td>
                                                    {{ $user->username }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    test
                                                </td>
                                                <td>
                                                    <center><a href="{{route('inbound.peserta.show', $user->id)}}" class="btn btn-info mt-1" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('Detail')}}"><i class="fas fa-info-circle"></i> Detail</a></center>
                                                </td>
                                            </tr>
                                            <?php $index++ ?>
                                            @endforeach
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection