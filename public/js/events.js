
function fetchRequests(response){
    $('#notifications').empty();
    $.each(response,function (index,row){
        notification_time = moment(row.created_at);
        let minutesDifference = notification_time.diff(Date.now(), 'minutes');
        let hoursDiff = notification_time.diff(Date.now(), 'hours');
        let diff;
        if (minutesDifference < 60) {
            diff = minutesDifference + ' minutes ago';
        } else if (minutesDifference < 1440 && hoursDiff < 24)  {
            diff = hoursDiff + 'hours ago';
        } else {
            diff = notification_time.fromNow(true) + ' ago';
        }
        $('#notifications').append(`
             <div class="flex w-[95%] mx-auto rounded-xl justify-between px-3 bg-white items-center gap-1 rounded-lg border border-gray-100 my-3">
                <div>
                    <p class="font-mono">${row.customer.user.name} would like to book a place at your event : <span class="text-orange-500 font-medium pr-[10px]">${row.event.title}</span>  <span class="text-[0.9rem] text-gray-400 font-medium">${diff}</span></p>
                </div>
                <div class="flex gap-2">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
             </div>
        `)
    })
}

$(document).ready(function (){

     setInterval(function (){
         let requestsCount= $('#notifications_count').data('count');
         $.ajax({
             url : '/requests/count',
             type : 'GET',
             dataType : 'json',
             success : function (response){
                 $('#notifications_count').data('count' , response.count) ;
                 $('#notifications_count').text(response.count);
                 if(requestsCount < response.count){
                     $('#notification_alert').fadeIn();
                     setTimeout(function (){
                         $('#notification_alert').fadeOut();
                     },2000)
                 }
             },
             error: function(xhr, status, error) {
                 console.error('Error fetching events:', error);
             }
         })
         $.ajax({
             url : '/requests/pending',
             type : 'GET',
             dataType : 'json',
             success : function (response){
                 fetchRequests(response);
             },
             error: function(xhr, status, error) {
                 console.error('Error fetching events:', error);
             }
         })

     },2500)


    $('#notification_alert').click(function (){
        $('#notifications').removeClass('hidden');
        $(this).addClass('hidden');
    })


    $('#notifs').click(function (){
        if($('#notifications').hasClass('hidden')){
            $('#notifications').removeClass('hidden');
        }
        else{
            $('#notifications').addClass('hidden');
        }

    })




})
