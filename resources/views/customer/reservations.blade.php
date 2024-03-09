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
                <li class="hover:text-orange-400"><a href="{{route('customer.reservations')}}">My Reservations</a></li>
            </ul>
            <div>
                <button class="text-white font-medium py-[0.4rem] px-[0.75rem] cursor-pointer btn-border ">
                    <a href="">Discover Our Events</a>
                </button>
            </div>
        </nav>
    </div>
    <div>
        <p class="text-[1.75rem] mt-[1.5rem] font-medium text-center text-gray-200">My reseravations :</p>
    </div>

    <section class="w-[80%] mx-auto mt-[7rem]">
        <div class="flex flex-wrap gap-[1rem] w-full">
            @foreach($reservations as $reservation)
                <article class="bg-white w-[47.5%] relative flex">
                    <section class="date ">
                        <time class="text-orange-500">
                            <span class="text-orange-500">{{\Carbon\Carbon::parse($reservation->date)->day}}</span><span>{{\Carbon\Carbon::parse($reservation->date)->monthName}}</span>
                        </time>
                    </section>
                    <section class="card-cont">
                        <small class="text-gray-600 font-semibold text-[0.9rem]">{{$reservation->category_name}}</small>
                        <h3 class="text-[1rem] font-medium text-gray-800">{{$reservation->title}}</h3>
                        <div class="even-date">
                            <i class="fa fa-calendar"></i>
                            <time >
                                <span class="text-orange-500 font-medium">{{\Carbon\Carbon::parse($reservation->date)->format('H:i')}}</span>
                            </time>
                        </div>
                        <div class=" flex gap-[5px]">
                            <p class="text-orange-500 font-medium underline">Seat Number</p>
                            <p class="text-orange-500 font-medium">:</p>
                            <p>{{((!empty($reservation->validated))) ? $reservation->seat_number : '-'}}</p>
                        </div>
                        <div class="absolute bottom-[1rem] right-[1.5rem] w-full flex justify-end gap-[1rem]">
                            @if($reservation->validated)
                                 <div class="flex justify-center bg-green-500 px-[0.5rem] py-[0.25rem] items-center font-medium text-white rounded-lg">
                                    <p>Validated</p>
                                 </div>
                                <div>

                                </div>
                            @elseif($reservation->refused_at)
                                <div class="flex justify-center bg-red-500 px-[0.5rem] py-[0.25rem] items-center font-medium text-white rounded-lg">
                                    <p>Refused</p>
                                </div>
                            @else
                                <div class="flex justify-center bg-orange-500 px-[0.5rem] py-[0.25rem] items-center font-medium text-white rounded-lg">
                                    <p>Pending</p>
                                </div>
                            @endif

                        </div>
                    </section>
                </article>
            @endforeach
        </div>
        <div class="flex justify-end w-full mt-[1.5rem]">
            {{$reservations->links()}}
        </div>
    </section>


@endsection
