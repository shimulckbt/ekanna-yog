<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('কন্টাক্ট পেজ কন্টেন্ট') }}
      </h2>
   </x-slot>

   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{url('admin/footer/update/'.$footers->id)}}" method="post">
            @csrf
            <div class="mb-6">
               <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900">ফেসবুক লিঙ্ক</label>
               <input type="text" name="facebook" id="facebook" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ফেসবুক লিঙ্ক যুক্ত করুন" value="{{$footers->facebook}}" required>
            </div>
            <div class="mb-6">
               <label for="youtube" class="block mb-2 text-sm font-medium text-gray-900">ইউটিউব লিঙ্ক</label>
               <input type="text" name="youtube" id="youtube" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ইউটিউব লিঙ্ক যুক্ত করুন" value="{{$footers->youtube}}">
            </div>
            <div class="mb-6">
               <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900">ইন্সটাগ্রাম</label>
               <input type="text" name="instagram" id="instagram" placeholder="ইন্সটাগ্রাম লিঙ্ক যুক্ত করুন" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{$footers->instagram}}">
            </div>
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">পরিবর্তন করুন</button>
         </form>

      </div>
   </div>
</x-app-layout>