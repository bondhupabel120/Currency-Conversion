<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | {{ $appName }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <!-- Navbar -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{ route('index') }}">Currency Conversion</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link btn-sm btn-info" href="{{ url('/login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- Navbar -->

    <!-- Body -->
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Most Conversion</h5>
                            @if ($most_conversion)
                                <h6 class="card-subtitle mb-2 text-muted">{{ $most_conversion->name ?? '' }} - {{ $most_conversion->conversion ?? '' }} times</h6>
                            @else
                                <h6 class="text-danger">No Conversion Still Now</h6>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Total Amount Converted</h5>
                            @if ($users->count() > 0)
                                @foreach ($users as $user)
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $user->name }} - {{ $user->userConversion->sum('send_amount') ?? '' }} {{ $user->currency }}</h6>
                                @endforeach
                            @else
                                <h6 class="text-danger">No Conversion Still Now</h6>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Third Highest Amount of Transactions</h5>
                            @if ($third_highests->count() > 0)
                                @foreach ($third_highests as $third_highest)
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $third_highest->name }} - {{ $third_highest->third ?? 0 }} {{ $third_highest->currency }}</h6>
                                @endforeach
                            @else
                                <h6 class="text-danger">No Conversion Still Now</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Body -->

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted fixed-bottom">
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © {{ \Carbon\Carbon::now()->format('Y') }} Copyright:
            <a class="text-reset fw-bold" href="javascript:void(0);">Currency Conversion</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>
