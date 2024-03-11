@extends('main')


@section('title','Events')

@section('content')
    <div>
        <img class="absolute w-full h-[25vh] inset-0 z-[-10] object-cover" src="{{asset('images/events-bg.jpg')}}" alt="">
        <div class="bg-black opacity-70 absolute w-full h-[25vh] inset-0 z-[-1]">

        </div>
    </div>
    <div class="h-[150px] flex items-center w-[80%] mx-auto justify-center z-20 bg-transparent">
        <nav class="flex justify-between w-full">
            <div>
                <p class="bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text text-[1.5rem] font-medium">X-EVENTO</p>
            </div>
            <ul class="flex ml-[4rem] text-gray-300 items-center justify-center  font-medium text-[1.25rem] gap-[40px] ">
                <li class="hover:text-orange-400"><a href="">Home</a></li>
                <li class="hover:text-orange-400"><a href="{{route('events.all')}}">All Events</a></li>
                <li class="hover:text-orange-400"><a href="{{route('customer.reservations',)}}">My Reservations</a></li>
                <li class="hover:text-orange-400"><a href="{{route('logout')}}">Logout</a></li>
            </ul>
            <div>
                <button class="text-white font-medium py-[0.4rem] px-[0.75rem] cursor-pointer btn-border ">
                    <a href="">Discover Our Events</a>
                </button>
            </div>
        </nav>
    </div>
    <div>
        <p class="text-[1.75rem] mt-[1.5rem] font-medium text-center text-gray-200">ALL EVENTS :</p>
    </div>

@endsection
