<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('ভিডিও লিংক') }}
      </h2>
   </x-slot>

   <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         @if(session('success'))
         <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <span class="font-medium">{{session('success')}}</span>
         </div>
         @endif
         @if(session('error'))
         <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            <span class="font-medium">{{session('error')}}</span>
         </div>
         @endif
         <a href="{{route('video-link.add')}}"><button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">নতুন যুক্ত করুন</button></a>
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
                                 টাইটেল
                              </th>
                              <th scope="col" width="15%" class="text-left py-3 px-6 text-xs font-medium tracking-wider text-gray-900 uppercase">
                                 ইউটিউব লিঙ্ক
                              </th>
                              <th scope="col" width="15%" class="text-center py-3 text-xs font-medium tracking-wider text-gray-900 uppercase">
                                 প্রক্রিয়া
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <!-- Abou Contents -->
                           @foreach($videoLinks as $videoLink)
                           <tr class="bg-white border-b">
                              <td scope="row" class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                 {{$videoLinks->firstItem()+$loop->index}}
                              </td>
                              <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                 {{$videoLink->title}}
                              </td>

                              <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                 {{$videoLink->video_link}}
                              </td>

                              <td class="px-6 text-sm text-center whitespace-nowrap">
                                 <a href="{{url('admin/home/video/edit/'.$videoLink->id)}}"><button class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">দেখুন</button></a>
                                 <a href="{{url('admin/home/video/delete/'.$videoLink->id)}}"><button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2">মুছুন</button></a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     {{$videoLinks->links()}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>