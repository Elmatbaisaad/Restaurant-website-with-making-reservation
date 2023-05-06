<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{route('admin.reservation.index')}}"
                 class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Return</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <form method="POST" action="{{route('admin.reservation.update',$reservation->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">First Name</label>
                        <input type="text" id="first_name" value="{{$reservation->first_name}}" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('first_name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="mb-6">
                        <label for="last_name"  class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
                        <input type="text" value="{{$reservation->last_name}}" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('last_name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="text" value="{{$reservation->email}}" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('email')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="mb-6">
                        <label for="tel_number" class="block mb-2 text-sm font-medium text-gray-900 ">Phone Number</label>
                        <input type="number" value="{{$reservation->tel_number}}" id="tel_number" name="tel_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('tel_number')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="mb-6">
                        <label for="res_date" class="block mb-2 text-sm font-medium text-gray-900 ">Reservation Date</label>
                        <input type="datetime-local" {{ date('Y-m-d\T10:00:00', time()) }}"
                        max="{{ date('Y-m-d\T23:00:00', strtotime('+2 weeks', time())) }}"
                        step="900" value="{{$reservation->res_date}}" id="res_date" name="res_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('res_date')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                     <div class="mb-6">
                        <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 ">Guest Number</label>
                        <input type="number" id="guest_number" value="{{$reservation->guest_number}}" name="guest_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('guest_number')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                                  <div class="mt-1 " >
                                    <label for="table_id" class="block mb-2 text-sm font-medium text-gray-900 ">Table</label>

                                    <select  id="table_id" name="table_id" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-white" >
                                      @foreach ($tables as $table)
                                      <option value="{{$table->id}}" @selected($table->id == $reservation->table_id)>
                                              {{$table->name}} ({{$table->guest_number}} Guests)
                                      </option>
                                      @endforeach
                                          
                                      
                                    </select>
                                              </div>
                                              @error('table_id')
                                              <div class="text-sm text-red-500">{{ $message }}</div>
                                              @enderror
                        <div class="mt-6 p-4">
                            <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white " type="submit">Update</button>

                        </div>  
                    </div>
                    
                    </form>
            </div>

        </div>
    </div>
</x-admin-layout>