<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{route('admin.categories.store')}}"
                 class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Return</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">
                <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                      <label class="block mb-2 text-sm font-medium text-gray-900 " for="image">Image</label> 
                      <input id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file"  />
                      @error('image')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <br>
                      <div class="mb-6">
                      
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="description">Description</label> 
                    <textarea id="description" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="4" ></textarea> 
                        </div>
                        @error('description')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                        
                        <div class="mt-6 p-4">
                            <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white " type="submit">Add</button>

                        </div>  
                    </div>
                    
                    </form>
            </div>

        </div>
    </div>
</x-admin-layout>