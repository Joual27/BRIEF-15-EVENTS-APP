<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}" media="all" />
    <title>Reservation : {{$reservation->reservation_id}}</title>
</head>

<body>

<section class="container">
    <h1>Your ticket : </h1>
    <div class="row">
        <article class="card fl-left">
            <section class="date">
                <time>
                    <span>Date : {{ \Carbon\Carbon::parse($reservation->date)->day }}</span><span>{{ \Carbon\Carbon::parse($reservation->date)->format('M') }}</span>
                </time>
            </section>
            <section class="card-cont">
                <small>Category : {{ $reservation->category_name }}</small>
                <h3>EVENT : {{ $reservation->title }}</h3>
                <div class="even-date">
                    <i class="fa fa-calendar"></i>
                    <time>
                        <span>{{ \Carbon\Carbon::parse($reservation->date)->format('l j F Y') }}</span>
                    </time>
                </div>
                <div class="even-info">
                    <i class="fa fa-map-marker"></i>
                    <p>VENUE :{{ $reservation->venue }}</p>
                </div>
            </section>
        </article>

    </div>
</section>

</section>


</body>

</html>


