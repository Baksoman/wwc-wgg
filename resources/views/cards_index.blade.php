@extends('layout')
@section('header')
    <style>
        .card-body label {
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: white;
        }

        .gradient {
            background-image: linear-gradient(180deg,
                    hsl(256deg 47% 32%) 0%,
                    hsl(258deg 52% 35%) 13%,
                    hsl(258deg 52% 40%) 30%,
                    hsl(259deg 53% 50%) 50%,
                    hsl(261deg 58% 60%) 100%
                );
        }

        .form-label {
            resize: vertical;
            max-height: 80vh;
        }

        @keyframes purple-glow {
            0% {
                box-shadow: 0 0 20px 5px rgba(60, 20, 120, 0.6);
            }

            50% {
                box-shadow: 0 0 40px 15px rgba(98, 24, 180, 0.9);
            }

            100% {
                box-shadow: 0 0 20px 5px rgba(60, 20, 120, 0.6);
            }
        }

        @keyframes glowing-lite {
            0% {
                filter: drop-shadow(0px 0px 5px rgba(255, 253, 208, 0.8));
            }

            50% {
                filter: drop-shadow(0px 0px 10px rgba(255, 255, 220, 1));
            }

            100% {
                filter: drop-shadow(0px 0px 5px rgba(255, 253, 208, 0.8));
            }
        }

        .card-body {
            animation: purple-glow 4s infinite;
        }

        .card-container {
            animation: glowing-lite 4s infinite;
        }

        .poppins {
            font-family: 'Poppins', Arial, Helvetica, sans-serif;
        }

        .antiqua {
            font-family: 'Uncial Antiqua', Arial, Helvetica, sans-serif;
        }

        .racing {
            font-family: 'Racing Sans One', Arial, Helvetica, sans-serif;
        }

        @media (max-width: 700px) {
            .card-preview {
                display: none;
            }
        }

        @keyframes glowing {
            0% {
                filter: drop-shadow(0px 0px 10px rgba(255, 253, 208, 0.8)) drop-shadow(0px 0px 20px rgba(255, 253, 180, 0.6));
            }

            50% {
                filter: drop-shadow(0px 0px 20px rgba(255, 255, 220, 1)) drop-shadow(0px 0px 30px rgba(255, 253, 190, 0.9));
            }

            100% {
                filter: drop-shadow(0px 0px 10px rgba(255, 253, 208, 0.8)) drop-shadow(0px 0px 20px rgba(255, 253, 180, 0.6));
            }
        }

        .card-view {
            transition: .5s ease !important;
        }

        .card-view:hover {
            transition: .5s ease !important;
            cursor: pointer !important;
            transform: scale(1.05) !important;
            animation: none !important;
        }

        .bg-div-2 {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.3);
        }

        .hero-text {
            position: relative;
            font-family: 'Uncial Antiqua', serif;
            font-weight: bold;
            color: #FFFDD0;
            font-size: 6rem;
            text-align: center;
            animation: glowing 4s ease-in-out infinite;
        }

        .hero-text span {
            line-height: 7rem;   
            transition: all .5s ease !important;   
        }

        .hero-text span:hover {
            font-size: 7rem;
            transition: all .5s ease;
            cursor: pointer;
        }

        @media (max-width: 1024px) {
            .hero-text span {
                font-size: 4rem;
                line-height: normal;
            }

            .hero-text span:hover {
                font-size: 5rem;
                transition: all .5s ease;
                cursor: pointer;
            }
        }

        @media (max-width: 500px) {
            .hero-text span {
                font-size: 3rem;
                line-height: normal;
            }

            .hero-text span:hover {
                font-size: 4rem;
                transition: all .5s ease;
                cursor: pointer;
            }
        }
    </style>
@endsection

@section('content')
    <main class="w-full h-full overflow-hidden">

        {{-- div 1 --}}
        <div class="relative w-screen h-screen">

            {{-- Background --}}
            <img src="{{ asset('images/enchantedForest_bg_flip.jpg') }}" alt="bg"
            class="w-screen h-screen object-cover absolute z-[-10]">

            {{-- Hero Text --}}
            <div class="w-screen h-screen flex flex-col items-center justify-center">
                <p class="hero-text" data-aos="fade" data-aos-duration="700" data-aos-easing="ease">
                    <span>B</span><span>e</span><span>y</span><span>o</span><span>n</span><span>d</span> 
                    <span>T</span><span>h</span><span>e</span> 
                    <span>I</span><span>m</span><span>a</span><span>g</span><span>i</span><span>n</span><span>a</span><span>t</span><span>i</span><span>o</span><span>n</span>
                </p>
                <p class="relative text-center text-[#fffdd0] racing text-3xl lg:text-4xl"
                data-aos="fade-down" data-aos-delay="300" data-aos-duration="500" data-aos-easing="ease">Where creativity meets limitless possibilities</p>
            </div>
        </div>

        {{-- div 2 --}}
        <div class="relative w-screen h-screen">

            {{-- Background --}}
            <img src="{{ asset('images/enchantedForest_bg.jpg') }}" alt="bg"
                class="bg-div-2 w-screen h-screen object-cover absolute z-[-10] overflow-x-hidden">

            {{-- Generator + Preview Div --}}
            <div class="h-screen flex flex-wrap justify-center items-center gap-[4vw]">
                
                {{-- Card Generator --}}
                <div
                    class="card min-w-[20rem] w-[50vw] h-auto bg-white/15 shadow-lg shadow-[rgba(31,38,135,0.37)] backdrop-blur-[4px] border border-white/18">
                    <div class="card-body">

                        {{-- Card Generator Form --}}
                        <form action="/insertData" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- Title Input --}}
                            <div class="mb-3">
                                <label for="titleInput" class="form-label text-white">Title</label>
                                <input type="text" name="title" id="titleInput"
                                    class="form-control bg-transparent text-white placeholder-gray-300 shadow-lg shadow-[rgba(75,0,130,0.5)] 
                                    backdrop-blur-[4px] border border-purple-500/25 focus:outline-none focus:ring-2 focus:ring-purple-500/50"
                                    placeholder="Enter title..." value="{{ old('title') }}" required>
                            </div>

                            {{-- Description Input --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <textarea type="text" name="description" id="descInput"
                                    class="form-control bg-transparent text-white placeholder-gray-300 shadow-lg shadow-[rgba(75,0,130,0.5)] backdrop-blur-[4px] border border-purple-500/25 focus:outline-none focus:ring-2 focus:ring-purple-500/50"" placeholder="Enter description..." required>{{ old('description') }}</textarea>
                            </div>

                            {{-- Picture Input --}}
                            <div class="mb-3">
                                <label class="form-label min-w-[19vw] w-auto ">Picture (jpg, jpeg,
                                    png) max 2MB</label>
                                <input type="file" name="picture" id="imageInput"
                                    class="form-control max-w-[15rem] bg-transparent text-white placeholder-gray-300 shadow-lg shadow-[rgba(75,0,130,0.5)] 
                                    backdrop-blur-[4px] border border-purple-500/25 focus:outline-none focus:ring-2 focus:ring-purple-500/50""
                                    accept=" image/*">
                            </div>

                            {{-- Colors Input --}}
                            <div class="flex gap-[4vw]">

                                {{-- Title Color Input --}}
                                <div class="flex flex-col items-center">
                                    <label for="exampleInputEmail1"
                                        class="form-label w-auto text-center text-sm md:text-xl">Title
                                        Color</label>
                                    <input type="color" name="colorTitle" id="colorTitleInput" value="#ffffff"
                                        class="h-10 w-10 border rounded-lg">
                                </div>

                                {{-- Description Color Input --}}
                                <div class="flex flex-col items-center">
                                    <label for="exampleInputEmail1"
                                        class="form-label w-auto text-center text-xs md:text-xl">Description
                                        Color</label>
                                    <input type="color" name="colorDesc" id="colorDescInput" value="#ffffff"
                                        class="h-10 w-10 border rounded-lg">
                                </div>

                                {{-- Background Color Input --}}
                                <div class="flex flex-col items-center">
                                    <label for="exampleInputEmail1"
                                        class="form-label w-auto text-center text-xs md:text-xl">Background
                                        Color</label>
                                    <input type="color" name="colorBg" id="colorBgInput" value="#ffffff"
                                        class="h-10 w-10 border rounded-lg">
                                </div>
                            </div>

                            {{-- Generate Button --}}
                            <div class="mt-4">
                                <button type="submit"
                                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-[#402C79] to-[#5A3E9D] text-white font-medium shadow-md 
                                                    hover:brightness-90 hover:shadow-lg transition-all duration-300 ease-in-out">Generate
                                    Card</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Card Preview div--}}
                <div class="card-preview mb-10">
                    <p class="poppins text-3xl text-white font-bold text-center">Preview Card</p>
                    <div class="card-container flex flex-col items-center min-w-[20rem] w-auto transition duration-500">

                        {{-- BG Preview --}}
                        <div id="cardPreview"
                            class="max-w-sm rounded-2xl bg-white/100 overflow-hidden w-[20vw] h-[60vh] shadow-lg space-y-4 mt-4 border border-white/18">
                            
                            {{-- Image Preview --}}
                            <img id="imagePreview" class="w-auto h-[14rem] object-cover rounded-xl"
                                src="{{ asset('images/enchantedForest_bg.jpg') }}" alt="Input your Image`" />

                            {{-- Title Preview --}}
                            <div class="relative">
                                <h2 id="titlePreview" class="text-2xl ml-3 mr-3 poppins font-bold text-gray-800">
                                    Title Preview
                                </h2>
                            </div>

                            {{-- Description Preview --}}
                            <div class="relative">
                                <p id="descPreview" class="text-gray-600 ml-3 mr-3 text-md poppins text-justify">
                                    Description Preview
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Random Card div --}}
            <div class="absolute z-10 left-1/2 transform -translate-x-1/2 bottom-0 h-auto">
                <div class="flex flex-col items-center gap-2">

                    {{-- Card Count Option --}}
                    <select id="cardCount"
                        class="w-[8.5rem] h-[2rem] rounded-xl bg-gradient-to-b from-[#402C79] to-[#5A3E9D] 
                            text-white font-medium shadow-md hover:brightness-95 hover:shadow-lg 
                            focus:ring focus:ring-purple-300 transition-all duration-300 ease-in-out
                            appearance-none px-4">
                        <option value="1" class="bg-[#5A3E9D] text-center text-white">1 Card</option>
                        <option value="2" class="bg-[#5A3E9D] text-center text-white">2 Cards</option>
                        <option value="3" class="bg-[#5A3E9D] text-center text-white">3 Cards</option>
                        <option value="4" class="bg-[#5A3E9D] text-center text-white">4 Cards</option>
                        <option value="5" class="bg-[#5A3E9D] text-center text-white">5 Cards</option>
                        <option value="6" class="bg-[#5A3E9D] text-center text-white">6 Cards</option>
                        <option value="7" class="bg-[#5A3E9D] text-center text-white">7 Cards</option>
                        <option value="8" class="bg-[#5A3E9D] text-center text-white">8 Cards</option>
                        <option value="9" class="bg-[#5A3E9D] text-center text-white">9 Cards</option>
                        <option value="10" class="bg-[#5A3E9D] text-center text-white">10 Cards</option>
                    </select>

                    {{-- Generate Button --}}
                    <button id="runSeederBtn" class="w-[12rem] h-[3rem] rounded-xl bg-gradient-to-r from-[#402C79] to-[#5A3E9D] text-white font-medium shadow-md hover:brightness-90 hover:shadow-lg transition-all duration-300 ease-in-out">Generate Random Cards</button>
                </div>
            </div>

            {{-- Wave --}}
            <svg class="absolute bottom-0 z-[-9]" width="100%" height="100%" viewBox="0 0 1000 1000"
                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" overflow="auto" shape-rendering="auto">
                <defs>
                    <path id="wavepath"
                        d="M 0 2000 0 500 Q 109 368 218 500 t 218 0 218 0 218 0 218 0 218 0 218 0  v1000 z" />
                    <path id="motionpath" d="M -436 0 0 0" />
                </defs>
                <g>
                    <use xlink:href="#wavepath" y="329" fill="#3f2b77">
                        <animateMotion dur="5s" repeatCount="indefinite">
                            <mpath xlink:href="#motionpath" />
                        </animateMotion>
                    </use>
                </g>
            </svg>
        </div>

        <div class="gradient relative z-[10] h-full w-screen flex flex-col justify-center items-center p-4">

            {{-- Search div --}}
            <div class="flex flex-row items-center">

                {{-- Back Button --}}
                @if(request('search'))
                    <a href="{{ route('cards_index') }}"
                        class="w-[3.5rem] h-[3.5rem] mb-4 bg-gray-100 hover:bg-gray-200 text-white-700 rounded-full p-3 shadow-md transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                @endif

                {{-- Search --}}
                <form class="mb-4" action="{{ route('cards_index') }}" method="GET">
                    <div class="relative w-[60vw] md:w-[80vw] border-2 border-gray-100 m-4 rounded-lg">
                        <div class="absolute top-4 left-3">
                            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                            placeholder="Search Title, Description..." />
                        <div class="absolute top-2 right-2">
                            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-[#402C79]">
                                Search
                            </button>
                        </div>
                    </div>
                </form>

            </div>

            {{-- Cards Showcase div --}}
            <div class="flex flex-wrap justify-center gap-12">
                @php
                    $card_datareversed = $card_data->reverse();
                @endphp
                @foreach ($card_datareversed as $data)
                            @csrf

                            {{-- Card Container --}}
                            <div class="card-container flex flex-col items-center min-w-[20rem] w-auto transition duration-500"
                                data-id="{{ $data->id }}">
                                {{-- Card Body --}}
                                <div class="card-view max-w-sm rounded-2xl overflow-hidden w-[20rem] h-[30rem] bg-[{{ $data->colorBg }}] shadow-lg space-y-4 mb-6"
                                    data-aos="fade-up" data-aos-duration="500" data-aos-easing="ease-in-out"
                                    data-aos-anchor-placement="top-bottom">
                                    @php
                                        $dummyImages = File::files(public_path('dummy_pict'));
                                        $randomDummyImage = count($dummyImages) > 0 ? asset('dummy_pict/' . $dummyImages[array_rand($dummyImages)]->getFilename()) : asset('images/enchanted_forest.jpg');
                                    @endphp
                                    @if ($data->picture == null)
                                        <img class="w-auto h-[14rem] object-cover rounded-xl" src="{{ asset($randomDummyImage) }}" />
                                    @else
                                        <img class="w-auto h-[14rem] object-cover rounded-xl"
                                            src="{{ asset('card_pictures/' . $data->picture) }}" />
                                    @endif


                                    {{-- Title Section --}}
                                    <div class="relative">
                                        <h2 id="title-{{ $data->id }}"
                                            class="text-xl poppins font-bold mr-3 ml-3 text-[{{ $data->colorTitle }}]">
                                            {{$data->title}}
                                        </h2>
                                        <button
                                            class="btn-edit-title hidden absolute right-0 top-0 mr-3 px-2 py-1 text-sm bg-white/15 shadow-lg shadow-[rgba(31,38,135,0.37)] backdrop-blur-[4px] border border-white/18 text-white rounded-md hover:bg-black/20 transition duration-300 edit-title"
                                            data-id="{{ $data->id }}">
                                            ✏️
                                        </button>
                                    </div>

                                    {{-- Description Section --}}
                                    <div class="relative">
                                        <p id="desc-{{ $data->id }}"
                                            class="text-[{{ $data->colorDesc }}] text-md mr-3 ml-3 poppins text-justify">
                                            {{$data->description}}
                                        </p>
                                        <button
                                            class="btn-edit-desc absolute hidden right-0 top-0 mr-3 px-2 py-1 text-sm bg-white/15 shadow-lg shadow-[rgba(31,38,135,0.37)] backdrop-blur-[4px] border border-white/18 text-white rounded-md hover:bg-black/20 transition duration-300 edit-description"
                                            data-id="{{ $data->id }}">
                                            ✏️
                                        </button>
                                    </div>
                                </div>

                                {{-- Delete Button --}}
                                <button type="button" id="{{ $data->id }}"
                                    class="btn-delete hidden mt-3 px-4 py-2 rounded-lg bg-gradient-to-r from-red-500 to-red-700 text-white font-medium shadow-md hover:shadow-lg hover:from-red-600 hover:to-red-800 transition duration-300 delete">
                                    🗑️ Delete
                                </button>
                            </div>
                @endforeach
            </div>

    </main>
@endsection
@section('script')
    <script defer>
        document.querySelectorAll("[data-id]").forEach(card => {
            card.addEventListener("click", function () {
                let btnEditTitle = this.querySelector(".btn-edit-title");
                let btnEditDesc = this.querySelector(".btn-edit-desc");
                let btnDelete = this.querySelector(".btn-delete");
                btnEditTitle.classList.toggle("hidden");
                btnEditDesc.classList.toggle("hidden");
                btnDelete.classList.toggle("hidden");
            });
        });

        $(document).on('click', '.delete', function () {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this card!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"

            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        window.location = "/deleteData/" + $(this).attr('id');
                    }, 1000);
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your card has been deleted.",
                        icon: "success",
                        timer: 1500,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });
                }
            });
        });

        @if (session('successInsert'))
            Swal.fire({
                title: "{{ session('successInsert') }}",
                timer: 1500,
                timerProgressBar: true,
                icon: "success",
                showConfirmButton: false
            });
        @endif

            @if ($errors->any())
                let errors = @json($errors->all());

                Swal.fire({
                    icon: 'error',
                    title: 'Input Error',
                    html: errors.join('<br>'),
                });
            @endif

        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Handle Edit Title
        document.querySelectorAll(".edit-title").forEach(button => {
        button.addEventListener("click", function () {
            let cardId = this.dataset.id;
            let titleElement = document.getElementById(`title-${cardId}`);

            Swal.fire({
                title: "Edit Title",
                input: "text",
                inputValue: titleElement.innerText,
                showCancelButton: true,
                confirmButtonText: "Save",
                preConfirm: (newTitle) => {
                    if (!newTitle.trim()) {
                        Swal.showValidationMessage("Title cannot be empty!");
                        return false;
                    }
                    return newTitle;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/updateTitle/${cardId}`, {
                        method: "PUT",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ title: result.value })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            titleElement.innerText = result.value;
                            Swal.fire({
                                title: "Updated!",
                                text: "Title updated successfully",
                                timer: 1500,
                                icon: "success",
                                showConfirmButton: false
                            })
                        } else {
                            Swal.fire({
                                title: "Validation Error!",
                                icon: "error",
                                html: data.errors ? data.errors.join("<br>") : data.message,
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "Something went wrong. Please try again.",
                        });
                        console.error("Error:", error);
                    });
                    }
                });
            });
        });


        // Handle Edit Description
        document.querySelectorAll(".edit-description").forEach(button => {
        button.addEventListener("click", function () {
            let cardId = this.dataset.id;
            let descElement = document.getElementById(`desc-${cardId}`);

            Swal.fire({
                title: "Edit Description",
                input: "textarea",
                inputValue: descElement.innerText,
                showCancelButton: true,
                confirmButtonText: "Save",
                preConfirm: (newDesc) => {
                    if (!newDesc.trim()) {
                        Swal.showValidationMessage("Description cannot be empty!");
                        return false;
                    }
                    return newDesc;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/updateDescription/${cardId}`, {
                        method: "PUT",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ description: result.value })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            descElement.innerText = result.value;
                            Swal.fire({
                                title: "Updated!",
                                text: "Description updated successfully",
                                timer: 1500,
                                icon: "success",
                                showConfirmButton: false
                            })
                        } else {
                            Swal.fire({
                                title: "Validation Error!",
                                icon: "error",
                                html: data.errors ? data.errors.join("<br>") : data.message,
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "Something went wrong. Please try again.",
                        });
                        console.error("Error:", error);
                    });
                    }
                });
            });
        });

        document.getElementById("titleInput").addEventListener("input", function () {
            document.getElementById("titlePreview").innerText = this.value || "Title Preview";
        });

        document.getElementById("descInput").addEventListener("input", function () {
            document.getElementById("descPreview").innerText = this.value || "Description Preview";
        });

        document.getElementById("colorTitleInput").addEventListener("input", function () {
            document.getElementById("titlePreview").style.color = this.value;
        });

        document.getElementById("colorDescInput").addEventListener("input", function () {
            document.getElementById("descPreview").style.color = this.value;
        });

        document.getElementById("colorBgInput").addEventListener("input", function () {
            document.getElementById("cardPreview").style.backgroundColor = this.value;
        });

        document.getElementById("imageInput").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById("imagePreview").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('runSeederBtn').addEventListener('click', function () {
            let count = document.getElementById('cardCount').value;

            fetch('/runSeeder', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ count: count })
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: "Success!",
                    text: data.message,
                    timer: 1500,
                    icon: "success",
                    showConfirmButton: false
                });

                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            })
            .catch(error => {
                Swal.fire({
                    title: "Error!",
                    text: "Something went wrong. Please try again.",
                    icon: "error",
                    confirmButtonColor: "#d33",
                    confirmButtonText: "OK"
                });
                console.error('Error:', error);
            });
        });
    </script>
@endsection