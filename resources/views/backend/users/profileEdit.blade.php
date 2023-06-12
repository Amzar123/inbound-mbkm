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

.wrap:after {
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
}
</style>
<div class="card">
    <div class="card-body">
        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __('Profile') }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot>
        </x-backend.section-header>

        <hr>
        
        <div class="row mt-4 mb-4">
            <div class="col">
                {{ html()->modelForm($userprofile, 'PATCH', route('backend.users.profileUpdate', $$module_name_singular->id))->class('form-horizontal')->attributes(['enctype'=>"multipart/form-data"])->open() }}
                
                
                <div class="form-group row">
                    {{-- {{ html()->label(__('labels.backend.users.fields.avatar'))->class('col-md-2 form-control-label')->for('name') }} --}}

                    {{-- <div class="col-md-5">
                        <img src="{{asset($$module_name_singular->avatar)}}" class="user-profile-image img-fluid img-thumbnail" style="max-height:100px; max-width:100px; border-radius: 50%" />
                    </div>
                    <div class="col-md-5">
                        <input id="file-multiple-input" name="avatar" multiple="" type="file">
                    </div> --}}
                    <div class="col-md-2">
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

                        <div class="wrap">
                            <img src="https://i.stack.imgur.com/mSXoO.png" class="main-profile-img" />
                        </div>
                    </div>

                    <div class="col-md-10 mt-4" >
                        <h3 style="color:#B8B8B8">Foto Anda</h3>
                        <p style="color:#B8B8B8"><i>Tets</i></p>
                    </div>
                    
                </div>
                <!--form-group-->

                <div class="row m-3">
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = '<b>NIK</b>';
                            $field_lable = $field_name;
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->placeholder("Masukan NIK anda disini")->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = '<b>Nama</b>';
                            $field_lable = $field_name;
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->placeholder("Masukan Nama anda disini")->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = '<b>Email Address</b>';
                            $field_lable = $field_name;
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->placeholder("Masukan Email anda disini")->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = '<b>NISN</b>';
                            $field_lable = $field_name;
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->placeholder("Masukan NISN anda disini")->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = '<b>Address</b>';
                            $field_lable = $field_name;
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->textarea($field_name)->placeholder("Masukan alamat anda disini")->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = '<b>NIM PT Asal</b>';
                            $field_lable = $field_name;
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->placeholder("Masukan NIM PT Asal anda disini")->class('form-control')->attributes(["$required"]) }}
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <?php
                            $field_name = '<b>PT Asal</b>';
                            $field_lable = $field_name;
                            $field_placeholder = $field_lable;
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        </div>
    
                        <div class="col-md-10">
                            {{ html()->text($field_name)->placeholder("Masukan PT Asal anda disini")->class('form-control')->attributes(["$required"]) }}
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
                            <x-button style="width: 80px">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                        
                    </div>
                </div>
                {{ html()->closeModelForm() }}
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-end text-muted">
                    Updated: {{$user->updated_at->diffForHumans()}},
                    Created at: {{$user->created_at->isoFormat('LLLL')}}
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
</script>
@endpush