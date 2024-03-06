@extends('main')


@section('title','Dashboard')

@section('content')

    <div>
        <img class="absolute w-full h-[30vh] inset-0 z-[-10] object-cover" src="{{asset('images/organizer-bg.jpg')}}" alt="">
        <div class="bg-black opacity-70 absolute w-full h-[30vh] inset-0 z-[-1]">

        </div>
    </div>
    <div class="h-[150px] flex items-center w-[80%] mx-auto justify-center z-20 bg-transparent">
        <nav class="flex justify-between w-full">
            <div>
                <p class="bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text text-[1.5rem] font-medium">X-EVENTO</p>
            </div>
            <ul class="flex ml-[4rem] text-gray-300 items-center justify-center  font-medium text-[1.25rem] gap-[40px] ">
                <li class="hover:text-orange-400"><a href="" >My Events</a></li>
                <li class="hover:text-orange-400"><a href="">Stats</a></li>
                <li class="hover:text-orange-400"><a href="">All Events</a></li>
            </ul>
            <div>
                <button class="text-white font-medium py-[0.4rem] px-[0.75rem] cursor-pointer btn-border ">
                    <a href="">Discover Our Events</a>
                </button>
            </div>
        </nav>
    </div>

    <div>
        <p class="text-[1.75rem] mt-[3rem] font-medium text-center text-gray-200">Organizer Dashboard</p>
    </div>


    <section class="mt-[3rem] bg-gray-200 min-h-[100vh]">
        <div class="w-[80%] mx-auto py-[2rem] flex flex-col gap-[2rem] ">
            <div class="flex justify-between">
                <p class="font-medium text-gray-600 text-[1.35rem] underline">MY EVENTS:</p>
                <button id="add_event_btn" class="px-[0.6rem] py-[0.3rem] btn-border text-gray-600 font-medium hover:text-white"> +  Add Event</button>
            </div>
            <div class="flex justify-between flex-wrap gap-[1rem]">
                <div class="relative w-[30%] min-h-[310px] ">
                    <div class="absolute inset-0 bg-black  opacity-50 rounded-xl z-10"></div>
                    <img src="{{asset('images/party.jpg')}}" class="absolute inset-0 object-cover w-full h-full rounded-xl z-0" alt="">
                    <div class="absolute top-0 left-0 w-full h-full flex flex-col z-20">
                        <div class="h-[30%] flex flex-col justify-center px-[1rem] py-[0.75rem]">
                            <p class="text-[1.5rem] font-bold text-red-200 uppercase font-mono">Event Title</p>
                        </div>
                        <div class="px-[1rem]">
                            <p class="text-white font-medium text-[0.9rem]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, enim?</p>
                        </div>

                        <div class="flex mt-[0.5rem] gap-[1rem] flex-col px-[1rem]">
                            <div class="flex gap-[5px] items-center">
                                <img src="{{asset('images/clock.png')}}" class="w-[30px] h-[30px]" alt="clock image">
                                <p class="font-medium text-white">:</p>
                                <p class="font-medium text-white">16 december 2023 - 11.00 PM</p>
                            </div>
                            <div class="flex gap-[5px]">
                                <img src="{{asset('images/location.png')}}" class="w-[30px] h-[30px]" alt="clock image">
                                <p class="font-medium text-white">:</p>
                                <p class="font-medium text-white">Massira Stadium</p>
                            </div>
                            <div class="flex gap-[5px]">
                                <img src="{{asset('images/attendance.png')}}" class="w-[30px] h-[30px]" alt="clock image">
                                <p class="font-medium text-white">:</p>
                                <p class="font-medium text-white">500 persons</p>
                            </div>
                        </div>

                        <div class="px-[1rem] w-full flex justify-end gap-[0.75rem]  items-center">
                            <img src="{{asset('images/edit.png')}}" class="w-[35px] h-[35px] cursor-pointer" alt="">
                            <img src="{{asset('images/delete.png')}}" class="w-[35px] h-[35px] cursor-pointer" alt="">

                        </div>

                    </div>
                </div>
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
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-violet-600">1.6M</dd>
                        </dl>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Events On Hold</dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-violet-600">19.2K</dd>
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
            </d>
        </div>
    </section>


    <div id="add_event_form" class="absolute w-full h-full inset-0 bg-gray-700 backdrop-filter bg-opacity-50 backdrop-blur-md  flex items-center justify-center hidden" style="position: fixed ; z-index: 10000">
        <div class="relative bg-gray-200 rounded-xl w-[30%] mx-auto ">
            <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">
                <img id="close-btn" src="{{asset('images/close.png')}}" alt="" class="w-[25px] h-[25px] cursor-pointer" >
            </div>
            <div class="flex flex-col gap-[1rem] items-center mx-auto pt-[4rem] w-[80%] h-[100%]">
                <p class="underline text-gray-700 font-medium text-center">Add Event Form</p>
                <form action="" class="flex flex-col items-center justify-center gap-[1rem] w-full" method="POST">
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

                    </select>
                    <button type="submit" class="btn-border w-[30%]  py-[0.4rem] bg-black text-white font-medium mb-[1rem]">Submit</button>
                </form>

            </div>
        </div>
    </div>



@endsection



<script>
   document.addEventListener('DOMContentLoaded',function (){
       document.getElementById('add_event_btn').addEventListener('click',function (){
           document.getElementById('add_event_form').classList.remove('hidden');
       })

       document.getElementById('close-btn').addEventListener('click',function (){
           document.getElementById('add_event_form').classList.add('hidden');
       })
   })
</script>
