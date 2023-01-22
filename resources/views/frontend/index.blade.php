@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
<section >
    <div class="flex justify-content-between" style="background-image: url('{{asset('img/bg-section.svg')}}'); background-repeat:no-repeat;">
        <div class="ml-auto" style="margin-right: 5%">
            <img src="{{asset('img/student-2.png')}}" alt="{{ app_name() }}">
        </div>
    </div> 
    <div style="margin-left: 20%">
        @if(user_registration())
        <a href="{{ route('register') }}" style="background-color: #624F82; border-radius: 30px" class=" px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform invisible md:visible">
            <span class="mx-1">{{__('Register')}}</span>
        </a>
        @endif
    </div>
</section>

{{-- <section class="mb-20">
    <div class="container mx-auto flex px-5 py-10 sm:py-24 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-800">
                Screenshots of the project
            </h1>
            <p class="mb-8 leading-relaxed">
                In the following section we listed a number of screenshots of different parts of the project, Laravel Starter.
            </p>
        </div>
    </div>
</section>

<section class="mb-20">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-5">
        <div class="shadow-lg p-3 sm:p-10 rounded-lg">
            <img src="https://user-images.githubusercontent.com/396987/88519250-a0dcc380-d013-11ea-9dc5-9d731af611f1.jpg" alt="About page preview">
        </div>
        <div class="shadow-lg p-3 sm:p-10 rounded-lg row-span-2">
            <img src="https://user-images.githubusercontent.com/396987/88519360-d1bcf880-d013-11ea-9f6c-b5d33912057f.jpg" alt="Pricing page preview">
        </div>
        <div class="shadow-lg p-3 sm:p-10 rounded-lg">
            <img src="https://user-images.githubusercontent.com/396987/88489727-f3889200-cfb7-11ea-819f-dc9a52bc8d82.jpg" alt="Landing page preview">
        </div>
    </div>
</section> --}}

@endsection