@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
<section >
    <div class="flex justify-content-between" style="background-image: url('{{asset('img/wavesOpacity.svg')}}'); background-repeat:no-repeat; width: 100%">
            <!-- your content -->
            <div style="bottom: 0; position: absolute; margin-buttom: 500px">
              <!-- your bottom div content -->
              <h2>Leading and outstanding</h2>
            </div>
          
        <div class="ml-auto">
            <img src="{{asset('img/student-pic.png')}}" alt="{{ app_name() }}">
        </div>
    </div> 
    <div>
        <a href="{{ route('register') }}" id="login-button" class="mx-5 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transfor focus:outline-none focus:bg-purple-500 hover md:visible">
            <span class="mx-1">{{__('Register')}}</span>
        </a>
    </div>
</section>
@endsection