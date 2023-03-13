@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
<section >
    <div class="flex justify-content-between" style="background-image: url('{{asset('img/wavesOpacity.svg')}}'); background-repeat:no-repeat; width: 100%">
        <div class="ml-auto">
            <img src="{{asset('img/student-pic.png')}}" alt="{{ app_name() }}">
        </div>
    </div> 
    <div style="margin-left: 20%">
        @if(user_registration())
        {{-- <a href="{{ route('register') }}" style="background-color: #624F82; border-radius: 30px" class=" px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform invisible md:visible">
            <span class="mx-1">{{__('Register')}}</span>
        </a> --}}
        @endif
    </div>
</section>
@endsection