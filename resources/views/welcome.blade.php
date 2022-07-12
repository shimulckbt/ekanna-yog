<!DOCTYPE html>
<html lang="bn" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- Fonts -->

    <!-- Styles -->


    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>একান্নযোগ</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="text-white">
    <!-- Hero Section Starts Here -->
    <div class="h-full w-full bg-cover"
        style="background-image:url({{ isset($homeStarts->image) ? asset($homeStarts->image) : 'https://images.pexels.com/photos/10204089/pexels-photo-10204089.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260' }}); background-attachment:fixed;">
        <!-- Navbar -->
        <header class="py-6">
            <div class="container flex justify-between items-center mx-auto px-24">
                <a href="{{ route('home') }}">
                    <div class="text-3xl"><img class="h-20" src="{{ asset('images/51yog.png') }}" alt="">
                    </div>
                </a>
                <div class="space-x-16 text-xl">
                    <a href="{{ route('home') }}" class="">হোম </a>
                    <a href="{{ route('camp') }}">ক্যাম্প</a>
                    <a href="{{ route('about') }}">সম্পর্কে</a>
                    <a href="#contact">যোগাযোগ</a>
                </div>
            </div>
        </header>
        <!-- Main Hero -->
        <div
            class="container mt-16 flex flex-col justify-center text-center items-center space-y-12 mx-auto px-24 pt-12 pb-20">
            <h1 class="text-7xl">{{ isset($homeStarts->title) ? $homeStarts->title : 'খালি' }}</h1>
            <p class="px-48">{{ isset($homeStarts->description) ? $homeStarts->description : 'খালি' }}</p>
            <div>
                <a href="{{ isset($homeStarts->yt_link) ? $homeStarts->yt_link : '#' }}" target="_blank"
                    class="self-center text-2xl text-center bg-red-900 hover:bg-red-600 px-4 py-2 rounded-xl"><i
                        class="fab fa-youtube pr-2"></i>একান্নযোগ</a>
            </div>
        </div>
    </div>
    <!-- Running Section -->
    <div class="bg-orange-100 h-full w-full">
        <div
            class="container flex flex-col justify-center text-center text-black items-center space-y-12 mx-auto px-24 py-16">
            <h1 class="text-5xl font-semibold">চলমান কর্মশালা</h1>
            <!-- Slider -->
            <div class="flex flex-row justify-center text-center text-black items-start space-x-24">
                <div class="w-1/2">
                    <img src="{{ isset($runningWork->image) ? asset($runningWork->image) : 'https://images.pexels.com/photos/10204089/pexels-photo-10204089.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260' }}"
                        alt="name" class="h-96 rounded-xl" />
                </div>
                <div class="flex flex-col w-1/2 py-8 space-y-12">
                    <h1 class="text-xl font-semibold">{{ isset($runningWork->title) ? $runningWork->title : 'খালি' }}
                    </h1>
                    <p>{{ isset($homeStarts->description) ? $homeStarts->description : 'খালি' }}</p>
                    <div>
                        <a href="{{ isset($runningWork->yt_link) ? $runningWork->yt_link : '#' }}" target="_blank"
                            class="flex justify-center text-2xl font-semibold text-red-900 text-center items-center hover:text-red-600 px-4 py-2 rounded-xl">দেখুন<i
                                class="fab fa-youtube pl-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Upcoming Section -->
    <div class="bg-orange-50 h-full w-full">
        <div
            class="container flex flex-col justify-center text-center text-black items-center content-center space-y-12 mx-auto px-24 py-16">
            <h1 class="text-5xl font-semibold">আসন্ন কর্মশালা</h1>
            <!-- Section -->
            <h1 class="text-xl font-semibold">{{ isset($upcomingWork->title) ? $upcomingWork->title : 'খালি' }}</h1>
            <img src="{{ isset($upcomingWork->image) ? asset($upcomingWork->image) : 'https://images.pexels.com/photos/10204089/pexels-photo-10204089.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260' }}"
                alt="name" class="h-96 rounded-xl" />
            <p class="px-48">{{ isset($upcomingWork->description) ? $upcomingWork->description : 'খালি' }}</p>
            <div>
                <a href="#"
                    class="flex justify-center text-xl font-semibold text-red-900 text-center items-center hover:text-red-600 rounded-xl">আরো
                    দেখুন</a>
            </div>
        </div>
    </div>

    <!-- Video Section -->

    <div class="aspect-video">
        <iframe
            src="{{ 'https://www.youtube.com/embed/' . (isset($videoLink->video_link) ? $videoLink->video_link : 'WfJYsQ1XK48') . '?autoplay=1&mute=1&loop=1&controls=0' }}"
            allow="autoplay" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen class="w-full h-full"></iframe>
    </div>

    <!-- Form -->

    <div id="contact" class="bg-orange-50 h-full w-full">
        <div
            class="container flex flex-col justify-center text-center text-black items-center content-center space-y-12 mx-auto px-24 py-16">
            <h1 class="text-5xl font-semibold">যোগাযোগ</h1>
            <form action="{{ route('contactHome.store') }}" method="post" class="w-full max-w-lg text-left">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-first-name">
                            নামের প্রথমাংশ
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" name="first_name" placeholder="নামের প্রথমাংশ..." />
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            নামের শেষাংশ
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" name="last_name" type="text" placeholder="নামের শেষাংশ..." />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            ইমেইল
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="email" name="email" type="email" placeholder="আপনার ইমেইল..." />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-password">
                            বার্তা লিখুন
                        </label>
                        <textarea name="message"
                            class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                            placeholder="আপনার বার্তা লিখুন..." id="message"></textarea>
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3">
                        <button
                            class="shadow bg-red-900 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Send
                        </button>
                    </div>
                    <div class="md:w-2/3"></div>
                </div>
            </form>
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <div class="h-full w-full">
        <div
            class="container flex flex-col justify-center text-center text-black items-center content-center space-y-4 mx-auto px-24 py-8">
            <div class="flex flex-row justify-center text-center text-xl items-center space-x-4">
                <div>
                    <a href="{{ isset($footerLink->facebook) ? $footerLink->facebook : '#' }}" target="_blank"
                        class="text-black hover:text-red-900"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div>
                    <a href="{{ isset($footerLink->instagram) ? $footerLink->instagram : '#' }}" target="_blank"
                        class="text-black hover:text-red-900"><i class="fab fa-instagram"></i></a>
                </div>
                <div>
                    <a href="{{ isset($footerLink->youtube) ? $footerLink->youtube : '#' }}" target="_blank"
                        class="text-black hover:text-red-900"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <p class="text-xs">
                © 2022 ekannayog.com | Downloading or saving this content is
                prohibited.
            </p>
        </div>
    </div>
</body>

</html>
