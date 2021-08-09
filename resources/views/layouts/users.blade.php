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
                    <table>
                        <thead>
                        <tr>ID</tr>
                        <tr>NAAM</tr>
                        <tr>EMAIL</tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>{{$user->id}}</tr>
                        <tr>{{$user->name}}</tr>
                        <tr>{{$user->email}}</tr>
                            @can("manageAllData")
                                <form action="" method="POST">
                                    <button name="" value="{{$user->id}}">Delete</button>
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
