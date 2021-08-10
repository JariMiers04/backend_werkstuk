<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->name}} 's profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-left mb-2 font-bold">Update your name, password or email</h2>
{{--                    for form layout -> https://www.youtube.com/watch?v=XVxyY_owL_M&ab_channel=LaravelDaily see 3:54--}}
                    <form action="{{route("addCourse")}}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                <x-label for="name" value="Your name"></x-label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ Auth::user()->name}}"></x-input>
                                </div>
                                <div>
                                    <x-label for="email" value="Email"></x-label>
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth::user()->email}}"></x-input>
                                </div>
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="new_password" value="New password"></x-label>
                                    <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password"></x-input>
                                </div>
                                <div>
                                    <x-label for="confirm_password" value="Confirm password"></x-label>
                                    <x-input id="confirm_password" class="block mt-1 w-full" type="password" name="confirm_password"></x-input>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{__("Update")}}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
