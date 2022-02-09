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
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="text-white">
   <div class="bg-black h-full w-full">
      <!-- Navbar -->
      <header class="py-6">
         <div class="container flex justify-between items-center mx-auto px-24">
            <a href="{{route('home')}}">
               <div class="text-3xl"><img class="h-20" src="{{asset('images/51yog.png')}}" alt=""></div>
            </a>
            <div class="space-x-16 text-xl">
               <a href="{{route('home')}}" class="">হোম </a>
               <a href="{{route('camp')}}">ক্যাম্প</a>
               <a href="{{route('about')}}">সম্পর্কে</a>
               <a href="#contact">যোগাযোগ</a>
            </div>
         </div>
      </header>
   </div>

   <!-- Camp Detail -->
   <div class="bg-orange-100 h-full">
      <div class="container flex flex-col justify-center text-center text-black items-center space-y-12 py-16 mx-auto px-24">
         <!-- Slider -->
         <div class="flex flex-row justify-center text-center text-black items-start space-x-2">
            <div class="w-1/2">
               <img src="./4X4A2737.JPG" alt="name" class="h-96 rounded-xl" />
            </div>
            <div class="flex flex-col text-left w-1/2 py-8 space-y-4">
               <h1 class="text-xl font-semibold">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel,
                  voluptate.
               </h1>
               <h1 class="text-lg text-red-600 font-semibold italic">
                  <span>স্থানঃ </span>একান্নযোগ
               </h1>
               <div class="space-y-2">
                  <h1 class="text-lg font-semibold">
                     <span>সংগঠনঃ </span>একান্নযোগ
                  </h1>
                  <h1 class="text-lg font-semibold">
                     <span>সদস্যঃ </span>১১৮<span> জন</span>
                  </h1>
               </div>
            </div>
         </div>
      </div>
   </div>

   <nav class=" py-6 bg-orange-200 text-black font-semibold">
      <div class="container flex justify-left items-center space-x-16 mx-auto px-24">
         <a href="#" class="">বিস্তারিত</a>
         <a href="#">আপডেটস</a>
      </div>
   </nav>
   <!-- Details -->
   <div class="container py-6 mx-auto px-24">

   </div>

   <!-- Footer -->
   <div class="h-full w-full">
      <div class="container flex flex-col justify-center text-center text-black items-center content-center space-y-4 mx-auto px-24 py-8">
         <div class="flex flex-row justify-center text-center text-xl items-center space-x-4">
            <div>
               <a href="" class="text-black hover:text-red-900"><i class="fab fa-facebook-f"></i></a>
            </div>
            <div>
               <a href="" class="text-black hover:text-red-900"><i class="fab fa-instagram"></i></a>
            </div>
            <div>
               <a href="" class="text-black hover:text-red-900"><i class="fab fa-youtube"></i></a>
            </div>
         </div>
         <p class="text-xs">
            © 2022 ekannayog.com | Downloading or saving this content is
            prohibited.
         </p>
      </div>
</body>

</html>