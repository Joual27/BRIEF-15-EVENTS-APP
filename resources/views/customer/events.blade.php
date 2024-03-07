@extends('main')


@section('title','Events')

@section('content')
    <div>
        <img class="absolute w-full h-[25vh] inset-0 z-[-10] object-cover" src="{{asset('images/events-bg.jpg')}}" alt="">
        <div class="bg-black opacity-70 absolute w-full h-[25vh] inset-0 z-[-1]">

        </div>
    </div>
    <div class="h-[150px] flex items-center w-[80%] mx-auto justify-center z-20 bg-transparent">
        <nav class="flex justify-between w-full">
            <div>
                <p class="bg-gradient-to-t from-purple-500 via-red-800 to-blue-400 inline-block text-transparent bg-clip-text text-[1.5rem] font-medium">X-EVENTO</p>
            </div>
            <ul class="flex ml-[4rem] text-gray-300 items-center justify-center  font-medium text-[1.25rem] gap-[40px] ">
                <li class="hover:text-orange-400"><a href="">Home</a></li>
                <li class="hover:text-orange-400"><a href="">Logout</a></li>
            </ul>
            <div>
                <button class="text-white font-medium py-[0.4rem] px-[0.75rem] cursor-pointer btn-border ">
                    <a href="">Discover Our Events</a>
                </button>
            </div>
        </nav>
    </div>
    <div>
        <p class="text-[1.75rem] mt-[1.5rem] font-medium text-center text-gray-200">ALL EVENTS :</p>
    </div>
    <section class="mt-[1.5rem] bg-gray-200 min-h-[75vh] pt-[2rem] w-full">
        <div id="events" class="w-[80%] mx-auto flex flex-col gap-[1rem]">

        </div>
        <div id="pagination" class="flex w-full gap-[1rem] justify-end mt-[1rem] px-[17.5%]">
        </div>

    </section>
    <div id="confirm_reservation" class="absolute w-full h-full inset-0 bg-gray-700 backdrop-filter bg-opacity-50 backdrop-blur-md flex items-center justify-center hidden" style="position: fixed ; z-index: 10000">
        <div class="relative bg-gray-200 rounded-xl w-[20%] mx-auto pt-[4rem] pb-[2rem]">
            <div class="forget-top-div absolute w-full h-[40px] bg-red-300 inset-0 rounded-t-xl flex justify-end pr-[1.5rem] items-center">
                <img id="close-btn" src="{{asset('images/close.png')}}" alt="" class="w-[25px] h-[25px] cursor-pointer" >
            </div>
            <p class="mb-[1rem] text-green-500 font-medium text-center" id="confirmation_msg"></p>
            <div class="flex flex-col items-center gap-[1rem]">
                <img class="w-[70px] h-[70px] rounded-full" src="{{asset('images/booking.png')}}" alt="booking icon">
                <p class="font-medium text-orange-600 ">Confirm Reservation</p>

                <div class="flex w-full gap-[15px] justify-center">
                    <button id="confirm_btn" class="bg-indigo-500 text-white font-medium px-[0.5rem] py-[0.25rem] rounded-lg hover:bg-indigo-400">Confirm</button>
                    <button id="cancel_btn" class="bg-red-500 text-white font-medium px-[0.5rem] py-[0.25rem] rounded-lg hover:bg-red-400">Cancel</button>
                </div>
            </div>

        </div>
    </div>

@endsection



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script defer>
            function fetchEvents(url = '/events/all') {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        updateEvents(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching events:', error);
                    }
                });
            }

            function updateEvents(data) {
                $('#events').empty();

                $.each(data.data, function (index, row) {
                    let event_date = new Date(row.date);
                    let minutes = event_date.getMinutes() === 0 ? '00' : event_date.getMinutes();
                    let imagePath = 'storage/uploads/' + row.image;
                    let days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    let event_day = event_date.getDay();
                    let event_dayName = days[event_day];

                    $('#events').append(`
            <div class="relative w-[65%] mx-auto rounded-xl ">
                    <div id='event_data' class="absolute z-20 w-full h-[100%] text-white flex flex-col items-center px-[2rem] py-[1.5rem]">
                        <div class="flex justify-between w-full pr-[0.75rem] h-[20%] items-center">
                            <p class="text-[1.5rem] font-bold text-red-200 uppercase font-mono">${row.title}</p>
                            <div class="flex gap-[5px] items-center" data-date='${row.date}'>
                                  <p class="text-white font-medium text-[1.1rem]">${event_dayName}</p>
                                  <p class="text-[1.75rem] text-pink-600 font-bold">${event_date.getDate()}/${event_date.getMonth()}</p>
                            </div>
                        </div>
                        <div class="flex justify-between w-full items-center mt-[2.5rem] mb-[0.75rem]">
                            <div class=" flex gap-[0.5rem] justify-center ">
                                <div class="flex gap-[5px] items-center">
                                    <img src="{{asset('images/location.png')}}" class="w-[25px] h-[25px]" alt="">
                                    <p class=" text-[1.25rem] text-white font-medium">:</p>
                                    <p class="uppercase text-white font-medium">${row.venue}</p>
                                </div>
                                <div class="h-[40px] bg-white w-[2px] rounded-md"></div>
                                <div class="flex gap-[5px] items-center">
                                    <img src="{{asset('images/attendance.png')}}" class="w-[25px] h-[25px]" alt="">
                                    <p class=" text-[1rem] text-white font-medium">:</p>
                                    <p class="uppercase text-white font-medium">${row.number_of_seats}</p>
                                </div>
                                <div class="h-[40px] bg-white w-[2px] rounded-md"></div>
                                <div class="flex gap-[5px] items-center">
                                    <p id='validation_type' class="uppercase text-white font-medium">${(row.validation_type == 'auto') ? 'Open Doors' : 'By validation'}</p>
                                </div>
                                <div class="h-[40px] bg-white w-[2px] rounded-md"></div>
                                <div class="flex gap-[5px] items-center">
                                    <img src="{{asset('images/clock.png')}}" class="w-[25px] h-[25px]" alt="">
                                    <p class=" text-[1rem] text-white font-medium">:</p>
                                    <p class='font-medium text-white'>${event_date.getHours() + ':' + minutes }</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex justify-end gap-[1rem] px-[1rem]">
                            <button class="btn-border text-white px-[0.4rem] py-[0.25rem]">See More</button>
                            <button id='book_btn' class="login-btn px-[0.5rem] py-[0.25rem] text-white font-medium" data-id='${row.id}'>Book</button>
                        </div>
                    </div>
                    <div class="relative ">
                        <img src="{{ asset('${imagePath}') }}" class="inset-0 w-full h-[200px] rounded-xl object-cover z-0" alt="">
                        <div class="absolute w-full h-[200px] rounded-xl bg-black inset-0 opacity-40 z-10"></div>
                    </div>
                </div>
        `);
                });

                $('#pagination').empty();
                if (data.prev_page_url) {
                    $('#pagination').append(`<button class='px-[0.4rem] py-[0.2rem] btn-border bg-white text-black font-medium' onclick="fetchEvents('${data.prev_page_url}')">Previous</button>`);
                }
                if (data.next_page_url) {
                    $('#pagination').append(`<button class='px-[0.4rem] py-[0.2rem] btn-border bg-white text-black font-medium' onclick="fetchEvents('${data.next_page_url}')">Next</button>`);
                }

            }
            $(document).ready(function() {
                fetchEvents();


                $('#events').on('click','#book_btn',function (){
                    $('#confirmation_msg').removeClass('hidden');
                    $('#confirmation_msg').text('');

                    let event_id = $(this).data('id');
                    let validation_type = $(this).closest('#event_data').find('#validation_type').text();
                    $('#confirm_reservation').removeClass('hidden');
                    console.log(validation_type);

                    $('#confirm_btn').on('click',function (){
                      $.ajax({
                          url : '/event/book',
                          type : 'POST',
                          dataType : 'json',
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          data : {
                            book : 1,
                            event_id : event_id,
                            validation_type : validation_type
                          },
                          success : function (response){
                            if(response.success){
                                if(validation_type == 'Open Doors'){
                                    $('#confirmation_msg').text('Reservation done');
                                    setTimeout(function (){
                                        $('#confirmation_msg').addClass('hidden');
                                        $('#confirm_reservation').addClass('hidden');
                                    },2000)

                                }
                                else{
                                    $('#confirmation_msg').text("Request done , Wait for admin's approval !");
                                    setTimeout(function (){
                                        $('#confirmation_msg').addClass('hidden');
                                        $('#confirm_reservation').addClass('hidden');

                                    },2000)
                                }
                            }
                          }
                      })
                    })
                })

                $('#close-btn').on('click',function (){
                    $('#confirm_reservation').addClass('hidden');
                })


                $('#cancel_btn').on('click',function (){
                    $('#confirm_reservation').addClass('hidden');
                })
            });



</script>
