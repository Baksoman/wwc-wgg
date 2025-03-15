@extends('layout')
@section('header')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .card-body label {
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: white;
        }
    </style>

    <body>
        <div class="relative w-screen h-screen">
            <img src="{{ asset('images/enchantedForest_bg.jpg') }}" alt="bg"
                class="w-screen h-screen object-fill absolute z-[-10]">
            <div class="h-screen flex justify-center items-center ">
                <div
                    class="card w-[50vw] h-[50vh]  bg-white/15 shadow-lg shadow-[rgba(31,38,135,0.37)] backdrop-blur-[4px] border border-white/18">
                    <div class="card-body">
                        <form action="/updateData/{{ $card->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="textHelp" value="{{ $card->title }}">
                            </div>

                            {{-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Font</label>
                                <select type="form-select" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="textHelp">
                                    <option selected>Font</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Arial">Arial</option>
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="textHelp" value="{{ $card->description }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Picture</label>
                                <input type="file" name="picture" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="textHelp" value="{{ $card->picture }}">
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection