<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{route('admin.tables.index')}}"
                 class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Return</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <form method="POST" action="{{route('admin.tables.store')}}">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="mb-6">
                        <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 ">Guest number</label>
                        <input type="number" name="guest_number" id="guest_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('guest_number')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="mt-1 " >
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>

                        <select  id="status" name="status" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-white" >
                          
                            @foreach (App\Enums\TableStatus::cases() as $status)
                            <option value="{{$status->value}}">
                                    {{$status->name}}
                            </option>
                            @endforeach
                          
                        </select>
                                  </div>
                                  @error('status')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                     <br>
                                  <div class="mt-1 " >
                                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>

                                    <select  id="location" name="location" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-white" >
                                      @foreach (App\Enums\TableLocation::cases() as $location)
                                      <option value="{{$location->value}}">
                                              {{$location->name}}
                                      </option>
                                      @endforeach
                                          
                                      
                                    </select>
                                              </div>
                                              @error('location')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                        
                        <div class="mt-6 p-4">
                            <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white " type="submit">Submit</button>

                        </div>  
                    </div>
                    
                    </form>
            </div>

        </div>
    </div>
</x-admin-layout>