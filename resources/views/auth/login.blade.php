@extends('main')

@section('title','Login')

@section('content')

    <div>
        <img class="absolute w-full h-screen inset-0 z-[-10] object-cover" src="{{asset('images/register-bg.jpg')}}" alt="registration page background">
    </div>

    <div class="bg-black opacity-70 absolute w-full h-screen z-[-1] "></div>


    <div class="w-[60%] mx-auto z-10 flex justify-center items-center h-full p-10">
        <div
            class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                <div
                    class="block rounded-lg bg-white shadow-lg dark:bg-gray-950">
                    <div class="g-0 lg:flex w-full lg:flex-wrap">
                        <div class="px-4 md:px-0 lg:w-6/12">
                            <div class="md:mx-6 md:p-12">
                                <div class="text-center">
                                    <h4 class="bg-gradient-to-t from-purple-500 mb-[3rem] via-red-800 to-blue-400 inline-block text-transparent bg-clip-text text-[1.5rem] text-shadow-md font-medium">
                                        X-EVENTO
                                    </h4>
                                </div>
                                @if($msg = \Illuminate\Support\Facades\Session::get('success'))
                                    <div id="success_msg" class="text-center mb-[3rem]">
                                          <p class="text-green-600 text-[1.1rem] text-shadow-md font-medium">{{$msg}}</p>
                                    </div>
                                    @if($status = \Illuminate\Support\Facades\Session::get('status'))
                                        <p id="status" class="text-gray-600 font-medium">{{$status}}</p>
                                    @endif
                                    <script>
                                        let msg = document.getElementById('success_msg');
                                        setTimeout(function (){
                                            msg.classList.add('hidden');
                                        },2500)

                                        let status = document.getElementById('status');
                                        setTimeout(function (){
                                            status.classList.add('hidden');
                                        },2500)
                                    </script>
                                @endif
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
                                <form action="{{route('sign-in')}}" method="POST">
                                    @csrf
                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="text"
                                            class="block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            name="email"
                                            placeholder="email"/>
                                    </div>
                                    <div class="relative mb-[1.5rem]" data-te-input-wrapper-init>
                                        <input
                                            type="password"
                                            name="password"
                                            class=" block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none "
                                            placeholder="Password"/>
                                    </div>
                                    <div class="mb-[1.5rem] relative flex justify-end">
                                        <p id="reset-password" class="underline text-gray-300 font-medium text-[0.9rem] cursor-pointer hover:text-gray-500" >forgot password?</p>
                                    </div>

                                    <div class="mb-12 pb-1 pt-1 text-center">
                                        <button
                                            type="submit"
                                            class="btn-border px-[1.25rem] py-[0.3rem]">
                                            Log In
                                        </button>
                                    </div>

                                    <div class="w-full mx-auto my-[3rem]">
                                        <a
                                            class="mb-3 flex w-[80%] mx-auto gap-[10px]  items-center justify-center rounded bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#d93025] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.3),0_4px_18px_0_rgba(217,48,37,0.2)] focus:bg-red-700 focus:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.3),0_4px_18px_0_rgba(217,48,37,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.3),0_4px_18px_0_rgba(217,48,37,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(217,48,37,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.2),0_4px_18px_0_rgba(217,48,37,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.2),0_4px_18px_0_rgba(217,48,37,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.2),0_4px_18px_0_rgba(217,48,37,0.1)]"
                                            style="background-color: #3b5998"
                                            href="{{route('redirect.facebook')}}"
                                            role="button"
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="mr-2 h-3.5 w-3.5"
                                                fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                            </svg>
                                            Continue with Facebook
                                        </a>
                                        <a class="mb-3 flex w-[80%] mx-auto gap-[15px]  items-center justify-center rounded bg-red-600 px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#d93025] transition duration-150 ease-in-out  hover:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.3),0_4px_18px_0_rgba(217,48,37,0.2)] focus:bg-red-700 focus:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.3),0_4px_18px_0_rgba(217,48,37,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.3),0_4px_18px_0_rgba(217,48,37,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(217,48,37,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.2),0_4px_18px_0_rgba(217,48,37,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.2),0_4px_18px_0_rgba(217,48,37,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(217,48,37,0.2),0_4px_18px_0_rgba(217,48,37,0.1)]"
                                           style="background-color: #DB4437"
                                           href="{{route('redirect.google')}}"
                                           role="button"
                                           data-te-ripple-init
                                           data-te-ripple-color="light">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48">
                                                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                            </svg>
                                            <p class="mr-[22px]">Continue with Google</p>
                                        </a>
                                    </div>

                                </form>

                                <div class="flex items-center justify-between pb-6">
                                    <p class="mb-0 mr-2 text-gray-200 font-medium underline">Doesn't have an account yet?</p>
                                    <button class="btn-border px-[1.2rem]"><a href="{{route('register')}}">Register</a></button>
                                </div>
                            </div>
                        </div>

                        <div class="w-[50%]">
                            <img class="w-full rounded-tr-xl min-h-[67.5vh] rounded-br-xl object-cover" src="{{asset('images/auth.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="forgot-pw" class="absolute w-full h-full inset-0 bg-gray-700 backdrop-filter bg-opacity-50 backdrop-blur-md z-20 flex items-center justify-center hidden   ">
        <div class="relative bg-gray-200 rounded-xl w-[30%] mx-auto h-[275px]">
             <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">
                 <img id="close-btn" src="{{asset('images/close.png')}}" alt="" class="w-[25px] h-[25px] cursor-pointer" >
             </div>
            <div class="flex flex-col gap-[1rem] items-center mx-auto pt-[4rem] w-[80%] h-[100%]">
                <p class="underline text-gray-700 font-medium text-center">You will receive an email if an account related to the entered email exists </p>
                <form action="{{route('password.send.reset.link')}}" class="flex flex-col items-center justify-center gap-[1.5rem] w-full" method="POST">
                    @csrf
                    <input type="text" name="email" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Email Address">
                    <button type="submit" class="btn-border w-[30%]  py-[0.4rem] bg-black text-white font-medium">Reset Password</button>
                </form>

            </div>
        </div>
    </div>


@endsection

<script >
    document.addEventListener('DOMContentLoaded',function (){
        document.getElementById('close-btn').addEventListener('click',function (){
            document.getElementById('forgot-pw').classList.add('hidden');
        })

        document.getElementById('reset-password').addEventListener('click',function (){
            document.getElementById('forgot-pw').classList.remove('hidden');
        })
    })

</script>
