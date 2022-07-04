<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="img/1.png">
        <link href="{{ asset('/css/bootstrap.rtl.css') }}" type="text/css" rel="stylesheet">
        <title>lobby</title>


        <style>
            @font-face {
                font-family: Vazir;
                src: url("font/Vazir-Regular.eot");
                src: url("font/Vazir-Regular.woff") format("woff"),
                url("font/Vazir-Regular.ttf") format("ttf"),
                url("font/Vazir-Regular.woff2") format("woff2");
            }
            body{
                direction: rtl;
                font-family: Vazir;
            }

        </style>
    </head>
    <body class="antialiased">
    <!-- نوار سایت -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="img/1.png" alt=""  height="30" class="d-inline-block align-text-top">
                        lobby
                    </a>
                </div>
            </nav>            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- جدول سایت -->
    <ol class="list-group list-group">
        @foreach($messages as $message)

            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{$message->name}}</div>
                    {{$message->text}}
                </div>
                <span class="badge bg-primary rounded-pill">{{$message->created_at}}</span>
            </li>
        @endforeach
    </ol>
    <!-- Button trigger modal -->
    <button type="button" style="position:fixed; bottom: 8px; left: 100px; width: 50px; height: 50px; border-radius: 100%;" id="btn-new-message" class="btn-outline-primary btn-new-message" data-bs-toggle="modal" data-bs-target="#exampleModal">
        +
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ثبت پیام جدید</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/send-message">
                        <div class="row">
                            <div class="col">
                                <input name="id" type="text" class="form-control" placeholder="ایدی" aria-label="First name">
                            </div>

                            <div class="col">
                                <input  name="name" type="text" class="form-control" placeholder="نام" aria-label="Last name">
                            </div>
                            <hr>
                            <div class="col">
                                <input  type="text" name="text" class="form-control" placeholder="متن پیام" aria-label="Last name">
                            </div>
                            <div class="col">
                                <input  type="number" name="age" min="1" class="form-control" placeholder="سن" aria-label="Last name">
                            </div>
                            <hr>
                            <div class="col">
                                <input  type="password" name="password1" class="form-control" placeholder="گذرواژه" aria-label="Last name">
                            </div>

                            <div class="col">
                                <input  type="password" name="password2" class="form-control" placeholder="گذرواژه" aria-label="Last name">
                            </div>
                            <hr>
                            <div class="col">
                                <input type="email" name="email" required class="form-control" placeholder="ایمیل" aria-label="Last name">
                            </div>
                <div class="modal-footer">
                    <form class="col-12 mt-2">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="btn btn-primary">ثبت پیام</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    </body>

</html>
