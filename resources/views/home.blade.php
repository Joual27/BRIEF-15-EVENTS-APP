@extends('main')

@section('title','X-Evento')

@section('content')
    <div class="absolute w-full h-[100vh] bg-black opacity-80 inset-0">
    </div>
    <div>
        <img src="{{asset('images/home-bg.jpg')}}" class="absolute w-full h-[100vh] object-cover z-[-1]" alt="">
    </div>
    <section class="p-0 z-20 relative m-0 w-full h-[100vh]">
        <x-navbar/>

        <div class="flex flex-col gap-[3rem] mt-[7.5rem]">
            <div class="text-white w-[50%] mx-auto flex flex-col gap-[1rem] flex justify-center text-center">
                <p class="text-[3.5rem] font-medium">Book Your Events</p>
                <p class=" text-medium text-[1.5rem]">Discover, engage, and seamlessly navigate through our comprehensive event platform, where every detail is meticulously crafted to elevate your event experience.</p>
            </div>
            <div class="flex gap-[25px] items-center justify-center">
                <button class="text-white font-medium py-[0.4rem] px-[1.5rem] cursor-pointer btn-border ">
                    <a href="{{route('register')}}">Register</a>
                </button>
                <button class="text-white font-medium py-[0.4rem] px-[1.5rem] cursor-pointer login-btn">
                    <a href="{{route('login')}}">Log In</a>
                </button>
            </div>
        </div>

        <div class="mt-[8rem] flex gap-[3rem] items-center justify-center">
            <div class="bg-red-400 px-[0.75rem] py-[0.5rem] rounded-lg text-white font-medium">Pool Party</div>
            <div class="bg-red-400 px-[0.75rem] py-[0.5rem] rounded-lg text-white font-medium">Wedding</div>
            <div class="bg-red-400 px-[0.75rem] py-[0.5rem] rounded-lg text-white font-medium">Lorem</div>
            <div class="bg-red-400 px-[0.75rem] py-[0.5rem] rounded-lg text-white font-medium">Lorem</div>
            <div class="bg-red-400 px-[0.75rem] py-[0.5rem] rounded-lg text-white font-medium">Lorem</div>
        </div>
    </section>
@endsection
