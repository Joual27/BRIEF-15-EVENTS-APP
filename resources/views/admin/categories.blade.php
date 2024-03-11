@extends('main')


@section('title','Categories')

@section('content')

    <body class="relative">
    <div class="flex gap-20">
        <aside class="flex">
            <div class="flex flex-col items-center w-16 h-screen py-4 space-y-8 bg-gradient-to-b from-pink-800 ">
                <a href="#">
                    <img class="w-16 h-22" src="{{url('img/EVENTO.png')}}" alt="">
                </a>

                <a href="{{route('admin.dashboard')}}" class="p-1.5 text-white focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 hover:text-purple-500">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4.5V19c0 .6.4 1 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.2M20 9v3.2"/>
                    </svg>
                </a>

                <a href="{{route('users')}}" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-purple-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </a>

                <a href="{{route('categories')}}" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg class="w-6 h-6 hover:text-purple-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Z"/>
                    </svg>
                </a>

                <a href="{{route('logout')}}" class="p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-white hover:bg-purple-100">
                    <svg class="w-6 h-6 text-white hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                    </svg>
                </a>

            </div>
        </aside>
        <div>

            <div class="absolute p-10 flex right-0">
                <button id="add_cat" class="text-white font-medium text-md bg-pink-600 px-[0.6rem] py-[0.3rem] rounded-lg hover:bg-pink-500">Add Category</button>
            </div>

            <div class="flex flex-wrap gap-5">

                @foreach($categories as $category)
                    <div class="relative mt-10 bg-gradient-to-b from-pink-300 w-[300px] h-[130px] pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow-md rounded-lg overflow-hidden">
                        <dt>
                            <div class="absolute bg-pink-500 rounded-md p-3">
                                <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 3a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5Zm0 12a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H5Zm12 0a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-2Zm0-12a2 2 0 0 0-2 2v2c0 1.1.9 2 2 2h2a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2Z"/>
                                    <path fill-rule="evenodd" d="M10 6.5c0-.6.4-1 1-1h2a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1ZM10 18c0-.6.4-1 1-1h2a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1Zm-4-4a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v2c0 .6-.4 1-1 1Zm12 0a1 1 0 0 1-1-1v-2a1 1 0 1 1 2 0v2c0 .6-.4 1-1 1Z" clip-rule="evenodd"/>
                                </svg>

                            </div>
                        </dt>
                        <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                            <p class="text-2xl mt-1 font-semibolmedium text-gray-600">
                                {{$category->name}}
                            </p>
                        </dd>
                        <div class="flex justify-center gap-3 items-center">
                            <form action="{{route('categories.delete',$category)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg class="w-8 h-8  dark:text-gray-400 cursor-pointer hover:text-red-600 duration-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                </button>
                            </form>
                            <button class=" btnUpdate  z-10">
                                <a href="{{route('categories.edit',$category)}}">
                                    <svg class="w-9 h-9 dark:text-gray-400 cursor-pointer hover:text-blue-600 duration-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.4 1.6a2 2 0 0 1 0 2.7l-6 6-3.4.7.7-3.4 6-6a2 2 0 0 1 2.7 0Z"/>
                                    </svg>
                                </a>
                            </button>

                        </div>
                    </div>
                @endforeach


            </div>

        </div>

    </div>


    <div id="add_category_form" class="absolute w-full h-full inset-0 bg-gray-700 backdrop-filter bg-opacity-50 backdrop-blur-md z-20 flex items-center justify-center scale-0 duration-300">
        <div class="relative bg-gray-200 rounded-xl w-[30%] mx-auto h-[275px]">
            <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">
                <img id="closeAddForm" src="{{asset('images/close.png')}}" alt="" class="w-[25px] h-[25px] cursor-pointer" >
            </div>
            <div class="flex flex-col gap-[1rem] items-center mx-auto pt-[4rem] w-[80%] h-[100%]">
                <p class="underline text-gray-700 font-medium text-center">Add Category Form</p>
                <form action="{{route('categories.add')}}" class="flex flex-col items-center justify-center gap-[1.5rem] w-full" method="POST">
                    @csrf
                    <input type="text" name="category" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Category Name">
                    <button type="submit" class="btn-border w-[30%] py-[0.4rem] bg-black text-white font-medium">Add</button>
                </form>
            </div>
        </div>
    </div>






   <script>
      document.addEventListener('DOMContentLoaded',function (){
          let addCatBtn = document.getElementById('add_cat');
          let add_category_form = document.getElementById('add_category_form');
          addCatBtn.addEventListener('click',function (){
              add_category_form.classList.remove('scale-0');
              add_category_form.classList.add('scale-100');
          })


          let closeAddForm = document.getElementById('closeAddForm');

          closeAddForm.addEventListener('click',function (){
              add_category_form.classList.remove('scale-100');
              add_category_form.classList.add('scale-0');
          })



      })
   </script>
    </body>
