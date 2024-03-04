@extends('main')

@section('title','Registration')

@section('content')

    <div>
        <img class="absolute w-full h-screen inset-0 z-[-10] object-cover" src="{{asset('images/register-bg.jpg')}}" alt="registration page background">
    </div>

    <div class="bg-black opacity-70 absolute w-full h-screen z-[-1]"></div>


    <div class="w-[60%]  mx-auto z-10 flex justify-center rounded-xl items-center h-full p-10">
        <div
            class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                <div
                    class="block rounded-lg bg-white shadow-lg dark:bg-gray-950">
                    <div class="g-0 lg:flex w-full lg:flex-wrap">
                        <div class="px-4 md:px-0 lg:w-6/12">
                            <div class="md:mx-6 md:p-12">
                                <div class="text-center">
                                    <h4 class="bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text text-[1.5rem] text-shadow-md font-medium">
                                       X-EVENTO
                                    </h4>
                                </div>

                                <div class="flex w-[65%] mx-auto my-[3rem] md:max-w-xl mx-4 rounded shadow">
                                    <button id="organizer-register" class="w-full flex justify-center font-medium px-2 py-2 text-white">Organizer</button>
                                    <button id="customer-register"  class="w-full flex justify-center font-medium px-2 py-2 choice-btn text-white ">Customer</button>

                                </div>
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

                                <form id="customer-form" action="{{route('register.customer')}}" method="POST">
                                    @csrf
                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="text"
                                            class="block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            name="name"
                                            placeholder="Full Name"/>
                                    </div>
                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="text"
                                            name="email"
                                            class="block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            placeholder="email"/>
                                    </div>


                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="password"
                                            class=" block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            name="password"
                                            placeholder="Password" />

                                    </div>
                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="password"
                                            class=" block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            name="confirm_password"
                                            placeholder="Confirm Password" />

                                    </div>

                                    <div class="mb-12 pb-1 pt-1 text-center">
                                        <button
                                            type="submit"
                                            class="btn-border px-[1.25rem] py-[0.3rem]">
                                            Register
                                        </button>
                                    </div>


                                </form>

                                <form id="organizer-form" class="hidden" action="{{route('register.organizer')}}" method="POST">
                                    @csrf
                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="text"
                                            name="name"
                                            class="block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            placeholder="Full Name"
                                        />

                                    </div>

                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="text"
                                            name="organization"
                                            class="block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            placeholder="Organization Name" />

                                    </div>
                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="text"
                                            name="email"
                                            class="block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            placeholder="email"/>
                                    </div>


                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="password"
                                            class=" block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            name="password"
                                            placeholder="Password" />

                                    </div>
                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="password"
                                            class=" block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            name="confirm_password"
                                            placeholder="Confirm Password" />

                                    </div>

                                    <div class="mb-12 pb-1 pt-1 text-center">
                                        <button type="submit"
                                            class="btn-border px-[1.25rem] py-[0.3rem]">
                                            Register
                                        </button>
                                    </div>


                                </form>
                                <div class="flex items-center justify-between pb-6">
                                    <p class="mb-0 mr-2 text-gray-200 font-medium underline">Already have an account?</p>
                                    <button class="btn-border px-[1.2rem]"><a href="{{route('login')}}">Login</a></button>
                                </div>

                            </div>
                        </div>

                        <div class="w-[50%]">
                            <img class="w-full rounded-tr-xl min-h-[76.5vh] rounded-br-xl object-cover" src="{{asset('images/auth.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

<script defer src="{{asset('js/register.js')}}"></script>
