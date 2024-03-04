@extends('main')


@section('title','Reset Password')


@section('content')

    <div class="absolute w-full h-full inset-0 bg-black  flex items-center justify-center ">
        <div class="relative bg-gray-200 rounded-xl w-[30%] mx-auto h-[325px]">
            <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">
            </div>
            <div class="flex flex-col gap-[1rem] items-center mx-auto pt-[4rem] w-[80%] h-[100%]">

                <form action="{{route('password.update')}}" class="flex flex-col items-center justify-center gap-[1.5rem] w-full" method="POST">
                    @csrf
                    <input type="hidden" value="{{$token}}" name="token">
                    <input type="text" name="email" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Email Address" readonly value="{{\Illuminate\Support\Facades\Session::get('email')}}">
                    <input type="password" name="password" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Password">
                    <input type="password" name="password_confirmation" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Confirm Password">
                    <button type="submit" class="btn-border w-[30%]  py-[0.4rem] bg-black text-white font-medium">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

@endsection
