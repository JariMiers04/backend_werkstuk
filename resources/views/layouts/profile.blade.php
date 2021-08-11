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
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <form action="{{route("updateUser")}}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <input type="hidden" name="id" value="{{ Auth::user()->id}}">
                                <div>
                                <x-label for="name" value="Your name"></x-label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ Auth::user()->name}}"></x-input>
                                </div>
                                <div>
                                    <x-label for="email" value="Email"></x-label>
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" readonly value="{{ Auth::user()->email}}"></x-input>
                                </div>
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="new_password" value="New password"></x-label>
                                    <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password"></x-input>
                                </div>
                                <div>
                                    <x-label for="new_password_confirmation" value="Confirm password"></x-label>
                                    <x-input id="new_password_confirmation" class="block mt-1 w-full" type="password" name="new_password_confirmation"></x-input>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{__("Update")}}
                            </x-button>
                        </div>
                    </form>
                        <br>
                    <h2 class="text-left mb-2 font-bold">Your availabilities</h2>

                    <form action="{{route("updateNonAvailabilities")}}" method="POST">
                        @csrf
                        <table>
                            <thead>
                            <tr>

{{--                            @foreach($days as $day)--}}
    <th></th>
                                <th class="px-8">Monday</th>
                                <th class="px-8">Dinsdag</th>
                                <th class="px-8">Woensdag</th>
                                <th class="px-8">Donderdag</th>
                                <th class="px-8">Vrijdag</th>
                                </tr>
                            </thead>
{{--                            @endforeach--}}
                            <tbody>
                            @for($i=0; $i<8; $i++)
<tr class="align-middle">
    <td><h2> Time Block {{$i}}</h2></td>
    @foreach($days as $day)
        <td class="py-2 px-12 border-b-2 border-gray-100"><input type="checkbox"
                                                                 class="mx-6 rounded"
                                                                 name="availabilities[]"
                                                                 value="{{$day->id}}-{{$i}}"/>
        </td>
@endforeach

                            @endfor
                            </tbody>
                        </table>
                        <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3">
                            {{__("Save")}}
                        </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
