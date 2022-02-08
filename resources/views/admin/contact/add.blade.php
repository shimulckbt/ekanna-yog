<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('কন্টাক্ট পেজ কন্টেন্ট') }}
      </h2>
   </x-slot>

   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <form action="{{route('contact.store')}}" method="post">
            @csrf
            <div class="mb-6">
               <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">নাম</label>
               <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="First Name" required>
            </div>
            <div class="mb-6">
               <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">টাইটেল</label>
               <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Last Name">
            </div>
            <div class="mb-6">
               <label for="email" class="block mb-2 text-sm font-medium text-gray-900">ইমেইল</label>
               <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="mb-6">
               <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">মোবাইল</label>
               <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="mb-6">
               <label for="message" class="block mb-2 text-sm font-medium text-gray-900">বার্তা লিখুন</label>
               <textarea id="message" name="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="আপনার বার্তা লিখুন..."></textarea>
            </div>
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">নতুন যুক্ত করুন</button>
         </form>

      </div>
   </div>
</x-app-layout>