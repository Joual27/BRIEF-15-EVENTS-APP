<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{--    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}" media="all" />--}}
    <title>Reservation : {{$reservation->reservation_id}}</title>
</head>

<body>

    <section>
        <div style="color: orange ; text-align: center ; ">
            <h1>Ticket Reference : {{$reservation->reservation_id}}</h1>
        </div>
        <div>
            <article >
                <section style="text-align: center">
                    <time style="text-align: center; text-decoration: underline ;">
                        <span>{{\Carbon\Carbon::parse($reservation->date)->day}}</span>, <span>{{\Carbon\Carbon::parse($reservation->date)->monthName}}, {{\Carbon\Carbon::parse($reservation->date)->year}}</span>
                    </time>
                </section>
                <section style="text-align: center ; margin-top: 1rem ; ">
                    <small>category : <span style="color : gray; font-weight: bold ">{{$reservation->category_name}}</span></small>
                    <h3>event title : <span style="color : rgb(234 88 12);  ">{{$reservation->title}}</span></h3>
                    <div style="text-align: center">
                        <time >
                            <span>{{\Carbon\Carbon::parse($reservation->date)->format('H:i')}}</span>
                        </time>
                    </div>
                    <div style="text-align: center; text-decoration: underline ; color: orange">
                        <p>Seat Number : {{$reservation->seat_number}}</p>
                    </div>
                </section>
            </article>
        </div>
    </section>

</body>

</html>


