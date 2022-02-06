<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold font-atma text-xl text-gray-800 leading-tight">
         {{ __('এবাউট পেজ কন্টেন্ট') }}
      </h2>
   </x-slot>

   <div class="py-8 px-20">
      <div class="flex flex-col">
         <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
               <div class="overflow-hidden shadow-md sm:rounded-lg">
                  <table class="min-w-full">
                     <thead class="bg-gray-300">
                        <tr>
                           <th scope="col" width="5%" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                              SL
                           </th>
                           <th scope="col" width="15%" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                              Title
                           </th>
                           <th scope="col" width="50%" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                              Description
                           </th>
                           <th scope="col" width="15%" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                              Image
                           </th>
                           <th scope="col" width="15%" class="text-center py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- Product 1 -->
                        <tr class="bg-white border-b">
                           <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                              1
                           </td>
                           <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                              Apple MacBook Pro 17"
                           </td>
                           <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                              Sliver
                           </td>
                           <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                              Laptop
                           </td>
                           <td class="px-6 text-sm text-center text-gray-500 whitespace-nowrap">
                              <a href="{{route('about.edit')}}"><button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 ">Edit</button></a>

                              <a href="{{route('about.delete')}}"><button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2">Delete</button></a>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>