@extends('main')

@section('title','Edit Event')


@section('content')s
    <div id="add_event_form" class="absolute w-full h-full inset-0 bg-gray-700 backdrop-filter bg-opacity-50 backdrop-blur-md  flex items-center justify-center ">
        <div class="relative bg-gray-200 rounded-xl w-[30%] mx-auto ">
            <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">

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
                <p class="underline text-gray-700 font-medium text-center">Update Event Form</p>
                <form action="{{route('event.update',$event)}}" class="flex flex-col items-center justify-center gap-[1rem] w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Event Title" value="{{$event->title}}">
                    <textarea name="description" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none resize-none h-[100px]" placeholder="Event Description" >{{$event->description}}"</textarea>
                    <input type="datetime-local" name="date" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Date of event" value="{{$event->date}}">
                    <input type="text" name="venue" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Venue" value="{{$event->venue}}">
                    <input type="text" name="number_of_seats" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Number Of Seats" value="{{$event->number_of_seats}}">
                    <input type="text" name="price_per_seat" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none" placeholder="Price per seat" value="{{$event->price_per_seat}}">
                    <select name="validation_type" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none">
                        <option value="">choose validation type</option>
                        <option value="auto" {{ ($event->validation_type == 'auto') ? 'selected' : ''  }}>Automatic</option>
                        <option value="by_validation" {{ ($event->validation_type == 'by_validation') ? 'selected' : ''  }}>By Validation</option>
                    </select>
                    <select name="category_id" class=" w-full bg-slate-200  font-medium text-gray-500 px-[0.5rem] py-[0.5rem] rounded-lg focus:outline-none mb-[2rem]" readonly>
                        <option value="">choose event's category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ ($event->category_id == $category->id) ? 'selected' : ''}} >{{$category->name}}</option>
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
@endsection
