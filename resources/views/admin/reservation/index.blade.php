<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{route('admin.reservation.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Reservation</a>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Table
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Guest
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $r)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$r->first_name}} {{$r->last_name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$r->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$r->res_date}}
                            </td>
                            <td class="px-6 py-4">
                                {{$r->table->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$r->guest_number}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex space-x-2">
                                 <a href="{{route('admin.reservation.edit',$r->id)}}" class="px-4 py2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                 <form method="POST" action="{{route('admin.reservation.destroy', $r->id)}} " 
                                     class="px-4 py2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                     onsubmit="confirm('are you sure ?');">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit">Delete</button>
                                 </form>
                                </div>
                             </td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</x-admin-layout>