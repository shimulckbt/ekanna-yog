<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('স্লাইড কন্টেন্ট') }}
      </h2>
   </x-slot>

   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{url('admin/home/upcoming/update/'.$upcomingWorks->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_image" value="{{$upcomingWorks->image}}">
            <div class="mb-6">
               <label for="title" class="block mb-2 text-sm font-medium text-gray-900">স্লাইড টাইটেল</label>
               <input type="text" name="title" id="title" value="{{$upcomingWorks->title}}" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="টাইটেল লিখুন" required>
            </div>

            <div class="mb-6">
               <label for="image" class="block mb-2 text-sm font-medium text-gray-900">ছবি যুক্ত করুন</label>
               <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="flex items-start mb-6">
               <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="বর্ণনা লিখুন...">{{$upcomingWorks->description}}</textarea>
            </div>
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">Update</button>
         </form>

      </div>
   </div>
</x-app-layout>