@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}'>
        {{ __($module_title) }}
    </x-backend-breadcrumb-item>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.show", $user->id)}}' icon='{{ $module_icon }}'>
        {{ $user->name }}
    </x-backend-breadcrumb-item>

    <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<style>
.main-profile-img {
  width: 140px;
  height: 140px;
  border-radius: 50%;
  border-style: solid;
  border-color: #FFFFFF;
  box-shadow: 0 0 8px 3px #B8B8B8;
  position: relative;
}

.wrap {
  position: relative;
}

/* .wrap:after {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    content: "\f044";
    position: absolute;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid grey;
    top: 0;
    left: 113px;
    background: white;
    color: blue;
    align-items: center;
    display: flex;
    justify-content: center;
} */

.inputfile {
    opacity: 1;
    overflow: hidden;
    position: absolute;
    z-index: 1;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #624F82;
    margin: auto;
    justify-content: center;
    align-items: center;
    left: 105px;
}
.inputfile + label {
    opacity: 1;
    overflow: hidden;
    position: absolute;
    z-index: 1;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #624F82;
    margin: auto;
    justify-content: center;
    align-items: center;
    left: 105px;
}
.inputfile + label svg {
    fill: red;
}
</style>
<div class="card">
    <div class="card-body">
        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __('Profile') }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                {{-- @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)]) --}}
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot>
        </x-backend.section-header>

        <hr>
        
        <div class="row mt-4 mb-4">
            <div class="col">
                {{-- {{ html()->modelForm('POST', route('inbound.profile.update', "1"))->class('form-horizontal')->attributes(['enctype'=>"multipart/form-data"])->open() }}    --}}
                <form action="{{ route('inbound.profile.update', $userprofile->user_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group row">
                    {{-- {{ html()->label(__('labels.backend.users.fields.avatar'))->class('col-md-2 form-control-label')->for('name') }} --}}
                    
                    <div class="col-md-2">
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

                        <div class="wrap">
                            <img src="{{ asset($userprofile->avatar) }}" class="main-profile-img" />
                            <input class="inputfile" name="avatar" multiple="" type="file">
                            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></label>
                        </div>
                    </div>

                    <div class="col-md-10 mt-4" >
                        <h3 style="color:#B8B8B8">Foto Anda</h3>
                        <p style="color:#B8B8B8"><i>Foto anda akan ditampilkan pada bagian profile</i></p>
                    </div>
                    
                </div>
                <!--form-group-->

                <div class="row m-3">
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = 'nik';
                            $field_lable = '<b>NIK</b>';
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->value($userprofile->nik)->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = 'nama';
                            $field_lable = '<b>Nama</b>';
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->value($userprofile->name)->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = 'email';
                            $field_lable = '<b>Email Address</b>';
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->value($userprofile->email)->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = 'nisn';
                            $field_lable = '<b>NISN</b>';
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->value($userprofile->nisn)->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = 'address';
                            $field_lable = '<b>Address</b>';
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->textarea($field_name)->value($userprofile->address)->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = 'nim_asal';
                            $field_lable = '<b>NIM PT Asal</b>';
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->value($userprofile->nim_asal)->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = 'pt_asal';
                            $field_lable = '<b>PT Asal</b>';
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->value($userprofile->pt_asal)->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = 'pt_asal';
                            $field_lable = '<b>PT Asal</b>';
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>

                        <div class="col-md-10"> 
                            <select class="form-select col-md-10" name="" id="">
                                aji
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        
                    </div>
                    <div class="col-12 col-md-6">
                        
                    </div>
                </div>

                <div class="row mt-4 m-3" style="float: right" >
                    <div class="col" style="margin-right: 25px">
                        {{-- <div class="form-group">
                            {{ html()->submit($text = icon('fas fa-save')." Save")->class('btn btn-success') }}
                        </div> --}}
                        <div class="col">
                            <button onclick="window.history.back();" type="button" style="border-radius: 16px; color: #624F82; border-color: #624F82" class="btn btn-outline-primary">Cancel</button>
                                {{-- <x-button  style="width: 80px">
                                    {{ __('Save') }}
                                </x-button> --}}
                                <x-backend.buttons.save />
                        </div>
                        
                    </div>
                </div>
                {{-- {{ html()->closeModelForm() }} --}}
                </form>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-end text-muted">
                    {{-- Updated: {{$user->updated_at->diffForHumans()}},
                    Created at: {{$user->created_at->isoFormat('LLLL')}} --}}
                </small>
            </div>
        </div>
    </div>
</div>

@endsection



@push('after-styles')

<!-- Select2 Bootstrap 4 Core UI -->
<link href="{{ asset('vendor/select2/select2-coreui-bootstrap4.min.css') }}" rel="stylesheet" />

<!-- Date Time Picker -->
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-4-datetime-picker/css/tempusdominus-bootstrap-4.min.css') }}" />

@endpush

@push ('after-scripts')
<!-- Select2 Bootstrap 4 Core UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap",
            placeholder: "-- Select an option --",
            allowClear: true,
        });
    });
</script>

<!-- Date Time Picker & Moment Js-->
<script type="text/javascript" src="{{ asset('vendor/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap-4-datetime-picker/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script type="text/javascript">
    $(function() {
        $('.datetime').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: 'far fa-clock',
                date: 'far fa-calendar-alt',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right',
                today: 'far fa-calendar-check',
                clear: 'far fa-trash-alt',
                close: 'fas fa-times'
            }
        });
    });



$(document).ready(function() {
    $('.select2').select2({
        width: '100%',
        placeholder: 'Search...',
        allowClear: true,
    });
});

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</script>
@endpush