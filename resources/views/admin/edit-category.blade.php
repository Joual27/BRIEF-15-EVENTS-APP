@extends('main')

@section('title','Edit category')

@section('content')
    <div id="update_category_form" class="absolute w-full h-full inset-0 bg-gray-700 backdrop-filter bg-opacity-50 backdrop-blur-md z-20 flex items-center justify-center duration-300">
        <div class="relative bg-gray-200 rounded-xl w-[30%] mx-auto h-[275px]">
            <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">
                <img id="closeAddForm" src="{{asset('images/close.png')}}" alt="" class="w-[25px] h-[25px] cursor-pointer" >
            </div>
            <div class="flex flex-col gap-[1rem] items-center mx-auto pt-[4rem] w-[80%] h-[100%]">
                <p class="underline text-gray-700 font-medium text-center">Update Category Form</p>
                <form action="{{route('categories.update',$category)}}" class="flex flex-col items-center justify-center gap-[1.5rem] w-full" method="POST">
                    @csrf
                    <input type="text" name="category" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" value="{{$category->name}}" placeholder="Category Name">
                    <button type="submit" class="btn-border w-[30%] py-[0.4rem] bg-black text-white font-medium">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
