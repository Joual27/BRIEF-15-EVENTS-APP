@extends('main')


@section('title','Events')

@section('content')

    <body class="h-screen bg-pink-100">
    <div class="flex">
        <aside class="flex">
            <div class="flex flex-col items-center w-16 h-screen py-4 space-y-8 bg-gradient-to-b from-pink-800 ">
                <a href="#">
                    <img class="w-16 h-22" src="{{url('img/EVENTO.png')}}" alt="">
                </a>

                <a href="" class="p-1.5 text-white focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 hover:text-purple-500">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4.5V19c0 .6.4 1 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.2M20 9v3.2"/>
                    </svg>
                </a>

                <a href="" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-purple-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </a>

                <a href="" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg class="w-6 h-6 hover:text-purple-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Z"/>
                    </svg>
                </a>

                <a href="" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg class="w-6 h-6 text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                    </svg>
                </a>

            </div>

            <div class="h-screen py-8 overflow-y-auto bg-gradient-to-b from-indigo-800 border-l border-r sm:w-64 w-60  dark:border-indigo-500">
                <h2 class="px-5 py-5 text-lg font-medium text-gray-800 dark:text-white">Accounts</h2>
                @foreach($users as $user)
                    <div class="space-y-4">
                        <div class="flex items-center w-full px-5 py-2 transition-colors duration-200 gap-x-2 bg-gradient-to-r from-indigo-600   focus:outline-none">
                            <img class="object-cover w-8 h-8 rounded-full" src="{{url('img/avatar.png')}}" alt="">

                            <div class="text-left rtl:text-right hover:text-white">
                                <h1 class="text-sm font-medium text-gray-800 capitalize ">{{$user->name}}</h1>

                                <p class="text-xs text-gray-100 ">{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>

        <section class="w-full">
            <div class="w-full">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center">
                        @if(session('success'))
                            <div id="successMessage" class=" flex justify-center ml-[-150px] alert alert-success ">
                                <div class="bg-green-500 rounded-md px-3  text-white font-medium  text-lg">
                                    <h1 class="mt-1">{{ session('success') }}</h1>
                                </div>
                            </div>
                        @endif
                        @if(session('delete'))
                            <div id="deleteMessage" class=" flex justify-center ml-[-150px] alert alert-success ">
                                <div class="bg-green-700 rounded-md px-3  text-white font-medium  text-lg">
                                    <h1 class="mt-1">{{session('delete')}}</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-2xl leading-6 font-bold  py-3 text-gray-900">
                            Stats
                        </h3>

                        <div class="flex gap-5">


                            <div class="relative bg-gradient-to-b from-indigo-300 w-[360px] h-[130px] pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow-md rounded-lg overflow-hidden">
                                <dt>
                                    <div class="absolute bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Organisateurs</p>
                                </dt>
                                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{$organisateurCount}}
                                    </p>
                                </dd>
                            </div>

                            <div class="relative bg-gradient-to-b from-indigo-300 w-[360px] h-[130px] pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow-md rounded-lg overflow-hidden">
                                <dt>
                                    <div class="absolute bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Clients</p>
                                </dt>
                                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{$clientCount}}
                                    </p>
                                </dd>
                            </div>

                            <div class="relative bg-gradient-to-b from-indigo-300 w-[360px] h-[130px] pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow-md rounded-lg overflow-hidden">
                                <dt>
                                    <div class="absolute bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Events</p>
                                </dt>
                                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{$eventCount}}
                                    </p>
                                </dd>
                            </div>
                            <div class="relative bg-gradient-to-b from-indigo-300 w-[360px] h-[130px] pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow-md rounded-lg overflow-hidden">
                                <dt>
                                    <div class="absolute bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Reservations</p>
                                </dt>
                                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{$reservationCount}}
                                    </p>
                                </dd>
                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <div class="p-5">
                <table id="table">
                    <thead class="bg-gradient-to-t from-indigo-600">
                    <th class="text-lg">Organisateur</th>
                    <th class="text-lg">Event</th>
                    <th class="text-lg">Date</th>
                    <th class="text-lg">Siege</th>
                    <th class="text-lg">Price</th>
                    <th class="text-lg">Action</th>
                    </thead>
                    @foreach($events as $event)
                        <tbody class="bg-indigo-200 text-lg font-medium">
                        <td>{{$event->user->name}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->date}}</td>
                        <td>{{$event->siege}}</td>
                        <td>{{$event->price}}$</td>
                        <td class="flex gap-3 justify-center">
                            <form action="" method="post">
                                @csrf
                                <button type="submit" class="accept">
                                    <svg class="w-8 h-8  dark:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm13.7-1.3a1 1 0 0 0-1.4-1.4L11 12.6l-1.8-1.8a1 1 0 0 0-1.4 1.4l2.5 2.5c.4.4 1 .4 1.4 0l4-4Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                            <form action="" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="decline">
                                    <svg class="w-8 h-8 dark:text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </section>
    </div>
    <script src="{{url('js/messages.js')}}"></script>
    </body>
