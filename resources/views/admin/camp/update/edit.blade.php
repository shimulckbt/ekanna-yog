<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('ক্যাম্প ডিটেইলস পরিবর্তন') }}
      </h2>
   </x-slot>

   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{url('admin/camp/update/'.$camps->id)}}" method="post" enctype="multipart/form-data">
            @csrf


            <input type="hidden" name="id" value="{{$camps->id}}">
            <input type="hidden" name="old_camp_image" value="{{$camps->camp_image}}">
            <input type="hidden" name="old_blog_image" value="{{$camps->blog_image}}">

            <div class="mb-6">
               <label for="camp_title" class="block mb-2 text-sm font-medium text-gray-900">ক্যাম্প টাইটেল</label>
               <input value="{{$camps->camp_title}}" type="text" name="camp_title" id="camp_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ক্যাম্প টাইটেল লিখুন" required>
            </div>

            <div class="mb-6">
               <label for="location" class="block mb-2 text-sm font-medium text-gray-900">লোকেশন</label>
               <input value="{{$camps->location}}" type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="লোকেশন যুক্ত করুন">
            </div>

            <div class="mb-6">
               <label for="organizer" class="block mb-2 text-sm font-medium text-gray-900">সঞ্চালকের নাম</label>
               <input value="{{$camps->organizer}}" type="text" name="organizer" id="organizer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="সঞ্চালকের নাম যুক্ত করুন">
            </div>

            <div class="mb-6">
               <label for="member" class="block mb-2 text-sm font-medium text-gray-900">সদস্য সংখ্যা</label>
               <input value="{{$camps->member}}" type="number" name="member" id="member" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="সদস্য সংখ্যা যুক্ত করুন">
            </div>

            <div class="mb-6">
               <label for="camp_image" class="block mb-2 text-sm font-medium text-gray-900">ক্যাম্প ছবি যুক্ত করুন</label>
               <input value="{{$camps->camp_image}}" type="file" name="camp_image" id="camp_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
               @error('camp_image')
               <span class="text-red-700">{{$message}}</span>
               @enderror
            </div>

            <div class="mb-6">
               <label for="blog_title" class="block mb-2 text-sm font-medium text-gray-900">ব্লগ টাইটেল</label>
               <input value="{{$camps->blog_title}}" type="text" name="blog_title" id="blog_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ব্লগ টাইটেল যুক্ত করুন">
            </div>

            <div class="mb-6">
               <label for="blog_image" class="block mb-2 text-sm font-medium text-gray-900">ব্লগ ছবি যুক্ত করুন</label>
               <input value="{{$camps->blog_image}}" type="file" name="blog_image" id="blog_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
               @error('blog_image')
               <span class="text-red-700">{{$message}}</span>
               @enderror
            </div>

            <div class="mb-6">
               <label for="blog" class="block mb-2 text-sm font-medium text-gray-900">ব্লগ লিখুন</label>
               <textarea id="blog" name="blog" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="আপনার ব্লগটি লিখুন...">{{$camps->blog}}</textarea>
            </div>
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">নতুন যুক্ত করুন</button>


         </form>

      </div>
   </div>
</x-app-layout>