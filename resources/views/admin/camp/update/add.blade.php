<x-app-layout>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('ক্যাম্প যুক্ত করুন') }}
      </h2>
   </x-slot>

   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{route('camp.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
               <label for="camp_title" class="block mb-2 text-sm font-medium text-gray-900">টাইটেল</label>
               <input type="text" name="camp_title" id="camp_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="আপডেটের টাইটেল লিখুন" required>
            </div>

            <div class="mb-6">
               <label for="location" class="block mb-2 text-sm font-medium text-gray-900">ক্যাম্পের নাম পছন্দ করুন</label>
               <select name="" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                  <option value="" selected="" disabled>পছন্দ করুন</option>
                  <option value="">একান্নযোগ</option>
               </select>
            </div>

            <div class="mb-6">
               <label for="organizer" class="block mb-2 text-sm font-medium text-gray-900">আপডেটের তারিখ</label>
               <input type="date" name="organizer" id="organizer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="mb-6">
               <label for="camp_image" class="block mb-2 text-sm font-medium text-gray-900">ছবি যুক্ত করুন</label>
               <input type="file" name="camp_image" id="camp_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
               @error('camp_image')
               <span class="text-red-700">{{$message}}</span>
               @enderror
            </div>

            <div class="mb-6">
               <label for="blog" class="block mb-2 text-sm font-medium text-gray-900">সংক্ষিপ্ত বিবরণ</label>
               <textarea id="blog" name="blog" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="বিবরণ লিখুন..."></textarea>
            </div>
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">যুক্ত করুন</button>
         </form>

      </div>
   </div>
</x-app-layout>