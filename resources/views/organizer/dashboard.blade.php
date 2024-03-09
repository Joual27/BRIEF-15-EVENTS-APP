@extends('main')


@section('title','Dashboard')

@section('content')

    <div>
        <img class="absolute w-full h-[30vh] inset-0 z-[-10] object-cover" src="{{asset('images/organizer-bg.jpg')}}" alt="">
        <div class="bg-black opacity-70 absolute w-full h-[30vh] inset-0 z-[-1]">

        </div>
    </div>
    <div class="h-[150px] flex items-center w-[80%] mx-auto justify-center z-20 bg-transparent">
        <nav class="flex justify-between w-full items-center">
            <div>
                <p class="bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text text-[1.5rem] font-medium">X-EVENTO</p>
            </div>
            <ul class="flex ml-[4rem] text-gray-300 items-center justify-center  font-medium text-[1.25rem] gap-[40px] ">
                <li class="hover:text-orange-400"><a href="" >My Events</a></li>
                <li class="hover:text-orange-400"><a href="">Stats</a></li>
                <li class="hover:text-orange-400"><a href="">Logout</a></li>
            </ul>

                <div id="notifs" class="relative h-32 w-32 mt-[75px] cursor-pointer">
                    <div class="absolute left-0 top-0 bg-red-500 rounded-full">
                        <span id="notifications_count" data-count="0" class="text-sm text-white p-1">0</span>
                    </div>
                    <div class="p-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            class="text-gray-600 w-6 h-6"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
                            />
                        </svg>
                    </div>
                </div>

        </nav>
    </div>

    <div>
        <p class="text-[1.75rem] mt-[3rem] font-medium text-center text-gray-200">Organizer Dashboard</p>
    </div>




    <section class="mt-[3rem] bg-gray-200 min-h-[100vh] pt-[1.5rem]">
        @if($msg = \Illuminate\Support\Facades\Session::get('success'))
            <div id="success_msg" class="w-[20%] mx-auto h-[50px] bg-green-500 flex justify-center items-center font-medium text-white mb-[1.5rem] rounded-xl">
                <p>{{$msg}}</p>
            </div>

            <script>
                let msg = document.getElementById('success_msg');
                setTimeout(function (){
                    msg.classList.add('hidden');
                },2500)
            </script>
        @endif
            @if($msg = \Illuminate\Support\Facades\Session::get('deleted'))
                <div id="delete_msg" class="w-[20%] mx-auto h-[50px] bg-red-500 flex justify-center items-center font-medium text-white mb-[1.5rem] rounded-xl">
                    <p>{{$msg}}</p>
                </div>

                <script>
                    let msg = document.getElementById('delete_msg');
                    setTimeout(function (){
                        msg.classList.add('hidden');
                    },2500)
                </script>
            @endif
        <div class="w-[80%] mx-auto py-[2rem] flex flex-col gap-[2rem] ">
            <div class="flex justify-between">
                <p class="font-medium text-gray-600 text-[1.35rem] underline">MY EVENTS:</p>
                <button id="add_event_btn" class="px-[0.6rem] py-[0.3rem] btn-border text-gray-600 font-medium hover:text-white"> +  Add Event</button>
            </div>
            <div class="flex flex-wrap gap-[3.33%] z-0">
               @foreach($events as $event)
                    <div class="relative w-[30%] min-h-[285px] ">
                        <div class="absolute inset-0 bg-black opacity-60 rounded-xl z-10"></div>
                        <img src="{{asset('storage/uploads/'. $event->image)}}" class="absolute inset-0 object-cover w-full h-full rounded-xl z-0" alt="">
                        <div class="absolute top-0 left-0 w-full h-full flex flex-col z-20">
                            <div class="h-[30%] flex flex-col justify-center px-[1rem] py-[0.75rem]">
                                <p class="text-[1.5rem] font-bold text-red-200 uppercase font-mono">{{$event->title}}</p>
                            </div>
                            <div class="px-[1rem]">
                                <p class="text-white font-medium text-[0.9rem]">{{$event->description}}</p>
                            </div>

                            <div class="flex mt-[0.5rem] gap-[1rem] flex-col px-[1rem]">
                                <div class="flex gap-[5px] items-center">
                                    <img src="{{asset('images/clock.png')}}" class="w-[30px] h-[30px]" alt="clock image">
                                    <p class="font-medium text-white">:</p>
                                    <p class="font-medium text-white">{{$event->date}}</p>
                                </div>
                                <div class="flex gap-[5px]">
                                    <img src="{{asset('images/location.png')}}" class="w-[30px] h-[30px]" alt="clock image">
                                    <p class="font-medium text-white">:</p>
                                    <p class="font-medium text-white">{{$event->venue}}</p>
                                </div>
                                <div class="flex gap-[5px]">
                                    <img src="{{asset('images/attendance.png')}}" class="w-[30px] h-[30px]" alt="clock image">
                                    <p class="font-medium mt-[0.00000000000001px] text-white">:</p>
                                    <p class="font-medium text-white">{{$event->number_of_seats}}</p>
                                </div>
                            </div>

                            <div class="px-[1rem] w-full flex justify-end gap-[0.75rem]  items-center">
                                @if(empty($event->validated_at))
                                    <div class="bg-orange-500 text-white font-medium px-[0.5rem] py-[0.2rem] rounded-md">
                                        <p>Pending</p>
                                    </div>
                                @else()
                                    <div class="bg-green-500 text-white font-medium px-[0.5rem] py-[0.2rem] rounded-md">
                                        <p>Validated</p>
                                    </div>
                                @endif

                                @if($event->date < now())
                                        <div class="bg-red-500 text-white font-medium px-[0.5rem] py-[0.2rem] rounded-md">
                                            <p>Closed</p>
                                        </div>
                                @else
                                        <div class="bg-indigo-500 text-white font-medium px-[0.5rem] py-[0.2rem] rounded-md">
                                            <p>Upcoming</p>
                                        </div>
                                @endif
                                    <a href="{{route('event.edit',$event)}}"><img src="{{asset('images/edit.png')}}" class="w-[35px] h-[35px] cursor-pointer" alt=""></a>
                                    <form action="{{ route('event.delete', $event) }}" class="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')"><img src="{{asset('images/delete.png')}}" class="mt-[1rem] w-[35px] h-[35px] cursor-pointer" alt=""></button>
                                    </form>


                            </div>

                        </div>
                    </div>
               @endforeach

            </div>
        </div>

        <div class="my-[2rem] ">
            <div>
                <p class="font-medium text-gray-600 text-[1.35rem] underline text-center">Stats :</p>
            </div>
            <div class="grid grid-cols-1 w-[80%] mx-auto gap-5 sm:grid-cols-4 mt-[4rem]">
                <div class="bg-white h-[130px] overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6 ">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Validated Events</dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-violet-600">{{$validated_events}}</dd>
                        </dl>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Events On Hold</dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-violet-600">{{$pending_events}}</dd>
                        </dl>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total Sold Tickets</dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-violet-600">4.9K</dd>
                        </dl>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Remaining tickets</dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-violet-600">166.7K</dd>
                        </dl>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <div id="add_event_form" class="absolute w-full h-full inset-0 bg-gray-700 backdrop-filter bg-opacity-50 backdrop-blur-md  flex items-center justify-center @if((!$errors->any())) hidden @endif" style="position: fixed ; z-index: 10000">
        <div class="relative bg-gray-200 rounded-xl w-[30%] mx-auto ">
            <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">
                <img id="close-btn" src="{{asset('images/close.png')}}" alt="" class="w-[25px] h-[25px] cursor-pointer" >
            </div>
            <div class="flex flex-col gap-[1rem] items-center mx-auto pt-[4rem] w-[80%] h-[100%]">
                @if ($errors->any())
                    <div id="errors" class="w-full mx-auto bg-red-300 font-medium mb-[3rem] text-red-700 rounded-lg px-[2.5%] py-[0.5rem]">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <script>
                        setTimeout(function (){
                            document.getElementById('errors').classList.add('hidden');
                        },2000)
                    </script>
                @endif
                <p class="underline text-gray-700 font-medium text-center">Add Event Form</p>
                <form action="{{route('event.add')}}" class="flex flex-col items-center justify-center gap-[1rem] w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Event Title">
                    <textarea name="description" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none resize-none h-[100px]" placeholder="Event Description"></textarea>
                    <input type="datetime-local" name="date" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Date of event">
                    <input type="text" name="venue" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Venue">
                    <input type="text" name="number_of_seats" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Number Of Seats">
                    <input type="text" name="price_per_seat" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Price per seat">
                    <select name="validation_type" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none">
                        <option value="">choose validation type</option>
                        <option value="auto">Automatic</option>
                        <option value="by_validation">By Validation</option>
                    </select>
                    <select name="category_id" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none mb-[2rem]">
                        <option value="">choose event's category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="grid w-full items-center gap-1.5 mt-[-1.5rem]">
                        <label class="ml-[0.5rem] text-sm text-gray-400 font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Event's Banner</label>
                        <input name="image" type="file" class="flex h-10 w-full rounded-md border border-input bg-slate-200 px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
                    </div>
                    <button type="submit" class="btn-border w-[30%]  py-[0.4rem] bg-black text-white font-medium mb-[1rem]">Submit</button>
                </form>

            </div>
        </div>
    </div>


    <div id="notifications" class="absolute top-[85px] right-[9%] w-[250px] h-[300px] bg-slate-100 z-100 rounded-lg hidden" style="overflow-y: scroll;">
        <div class="flex w-[95%] mx-auto rounded-xl justify-between px-3 bg-white items-center gap-1 rounded-lg border border-gray-100 my-3">
            <div>
                <span class="font-mono">Emma would like to connect with you</span>
            </div>
            <div class="flex gap-2">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div id="notification_alert" class="flex w-96 shadow-lg rounded-lg fixed bottom-[2rem] right-[2rem] z-100 hidden ">
        <div class="bg-orange-400 py-4 px-6 rounded-l-lg flex items-center">
            <img src="{{asset('images/bell.png')}}" class="w-[35px] h-[30px]" alt="">
        </div>
        <div class="px-4 py-6 bg-orange-100 rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
            <div class="text-gray-500 font-medium">You have a new notification</div>
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path></svg>
            </button>
        </div>
    </div>

@endsection



    <script defer src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script defer src="{{asset('js/events.js')}}"></script>




<script defer>
   document.addEventListener('DOMContentLoaded',function (){
       document.getElementById('add_event_btn').addEventListener('click',function (){
           document.getElementById('add_event_form').classList.remove('hidden');
       })

       document.getElementById('close-btn').addEventListener('click',function (){
           document.getElementById('add_event_form').classList.add('hidden');
       })

   })

</script>
