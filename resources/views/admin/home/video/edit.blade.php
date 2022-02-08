<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('ভিডিও লিংক পরিবর্তন') }}
      </h2>
   </x-slot>

   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{url('admin/home/video/update/'.$videoLinks->id)}}" method="post">
            @csrf
            <div class="mb-6">
               <label for="title" class="block mb-2 text-sm font-medium text-gray-900">টাইটেল</label>
               <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="টাইটেল যুক্ত করুন" value="{{$videoLinks->title}}" required>
            </div>
            <div class="mb-6">
               <label for="video_link" class="block mb-2 text-sm font-medium text-gray-900">ভিডিও লিংক</label>
               <input type="text" name="video_link" id="video_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ভিডিও লিংক যুক্ত করুন" value="{{$videoLinks->video_link}}">
            </div>
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">পরিবর্তন করুন</button>
         </form>

      </div>
   </div>
</x-app-layout>