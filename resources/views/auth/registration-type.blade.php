@extends('main')


@section('title','Registration Type')


@section('content')

    <div class="absolute w-full h-full inset-0 bg-black flex items-center justify-center ">
        <div class="relative bg-gray-200 rounded-xl w-[22.5%] mx-auto h-[275px]">
            <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">
            </div>

            <p class="text-gray-600 font-medium py-[1rem] text-center">REGISTER AS : </p>

            <div class="w-full flex justify-center gap-[5rem]  pl-[10%] items-center">
                <div class="w-[40%] flex flex-col justify-center gap-[1.4rem]">
                    <img src="{{asset('images/customer.png')}}" class="w-[125px] h-[125px] rounded-full" alt="customer icon">
                    <form action="{{route('register.social.customer')}}" method="POST" >
                        @csrf
                        <input type="hidden" name="social_id" value="{{\Illuminate\Support\Facades\Session::get('social_user')->id}}">
                        <input type="hidden" name="name" value="{{\Illuminate\Support\Facades\Session::get('social_user')->name}}"/>
                        <input type="hidden" name="email" value="{{\Illuminate\Support\Facades\Session::get('social_user')->email}}"/>
                        <button class="px-[0.7rem]  ml-[0.5rem] py-[0.35rem] rounded-lg font-medium text-white bg-violet-500 hover:bg-violet-400" type="submit">Customer</button>
                    </form>
                </div>
                <div class="w-[40%] flex flex-col justify-center gap-[1.4rem]">
                    <img src="{{asset('images/organizer.png')}}" class="w-[125px] h-[125px] rounded-full" alt="customer icon">
                    <form action="{{route('register.social.organizer')}}" method="POST" >
                        @csrf
                        <input type="hidden" name="social_id" value="{{\Illuminate\Support\Facades\Session::get('social_user')->id}}">
                        <input type="hidden" name="name" value="{{\Illuminate\Support\Facades\Session::get('social_user')->name}}"/>
                        <input type="hidden" name="email" value="{{\Illuminate\Support\Facades\Session::get('social_user')->email}}" />
                        <button class="px-[0.7rem] ml-[0.5rem] py-[0.35rem] rounded-lg font-medium text-white bg-pink-500 hover:bg-pink-400" type="submit">Organizer</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

@endsection
