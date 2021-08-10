<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="text-center mx-auto">
                        <thead>
                        <th>ID</th>
                        <th>NAAM</th>
                        <th>EMAIL</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                        <td class="py-2 px-12 border-b-2 border-gray-300">{{$user->id}}</td>
                        <td class="py-2 px-12 border-b-2 border-gray-300">{{$user->name}}</td>
                        <td class="py-2 px-12 border-b-2 border-gray-300">{{$user->email}}</td>
                            </tr>
                            @can("manageAllData")
                                <form action="" method="POST">
                                    <button class="text-red-700 font-bold" value="{{$user->id}}">Delete</button>
                                </form>
                            @endcan
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
