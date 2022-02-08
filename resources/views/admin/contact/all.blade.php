<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('এবাউট পেজ কন্টেন্ট') }}
      </h2>
   </x-slot>

   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         @if(session('success'))
         <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <span class="font-medium">{{session('success')}}</span>
            <!-- <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8" data-collapse-toggle="alert-1" aria-label="Close">
               <span class="sr-only">Close</span>
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
               </svg>
            </button> -->
         </div>
         @endif
         @if(session('error'))
         <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            <span class="font-medium">{{session('error')}}</span>
         </div>
         @endif
         <a href="{{route('contact.add')}}"><button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">নতুন যুক্ত করুন</button></a>
         <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden shadow-md sm:rounded-lg">
                     <table class="min-w-full">
                        <thead class="bg-gray-300">
                           <tr>
                              <th scope="col" width="5%" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-900 uppercase">
                                 ক্রম
                              </th>
                              <th scope="col" width="15%" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-900 uppercase">
                                 নাম
                              </th>
                              <th scope="col" width="15%" class="text-left py-3 px-6 text-xs font-medium tracking-wider text-gray-900 uppercase">
                                 ইমেইল
                              </th>
                              <th scope="col" width="50%" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-900 uppercase">
                                 বার্তা
                              </th>
                              <th scope="col" width="15%" class="text-center py-3 text-xs font-medium tracking-wider text-gray-900 uppercase">
                                 প্রক্রিয়া
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Abou Contents -->
                           @foreach($contacts as $contact)
                           <tr class="bg-white border-b">
                              <td scope="row" class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                 {{$contacts->firstItem()+$loop->index}}
                              </td>
                              <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                 {{$contact->first_name.' '.$contact->last_name}}
                              </td>

                              <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                 {{$contact->email}}
                              </td>

                              <td class="text-center py-4 px-6 h-1 text-sm text-gray-800 overflow-y-auto whitespace-wrap">
                                 <textarea class="border-none bg-transparent outline-none resize-none" disabled cols="40" rows="1">{{$contact->message}}</textarea>
                              </td>

                              <td class="px-6 text-sm text-center whitespace-nowrap">
                                 <a href="{{url('admin/contact/edit/'.$contact->id)}}"><button class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">দেখুন</button></a>
                                 <a href="{{url('admin/contact/delete/'.$contact->id)}}"><button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2">মুছুন</button></a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     {{$contacts->links()}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>