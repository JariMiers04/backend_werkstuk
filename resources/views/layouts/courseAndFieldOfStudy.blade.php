<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses and Fields Of Study') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('manageAllData')
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <h2 class="text-left mb-2 font-bold">Add a new Timeblock</h2>
                        <form action="{{route("addBlock")}}" method="POST">
                            <div>

                                    <div>
                                        @csrf
                                        <x-label for="users" value="Select Teacher"></x-label>
                                        <select name="users" id="users" value=""></select>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </div>

                                <div>
                                    <x-label for="fieldsOfStudy" value="Select Field of Study"></x-label>
                                    <select name="fieldsOfStudy" id="fieldsOfStudy" value=""></select>
                                    @foreach($fieldOfStudy as $fos)
                                        <option value="{{$fos->id}}">{{$fos->name}}</option>
                                    @endforeach
                                </div>

                                <div>
                                    <x-label for="year" value="Select year of field of study"></x-label>
                                    <x-input type="number" min="1" max="7" name="year"></x-input>
                                </div>

                                <div>
                                    <x-label for="courses" value="Select Course"></x-label>
                                    <select name="courses" id="courses" value=""></select>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </div>

                                <div>
                                    <x-label for="days" value="Select Day"></x-label>
                                    <select name="days" id="days" value=""></select>
                                    @foreach($days as $day)
                                        <option value="{{$day->id}}">{{$day->name}}</option>
                                    @endforeach
                                </div>

                                <div>
                                    <x-label for="start_time" value="Select start hour"></x-label>
                                    <select name="start_time" id="start_time" value=""></select>
                                    @foreach($times as $time)
                                        <option value="{{$time->id}}">{{$time->start_time}}</option>
                                    @endforeach
                                </div>

                                <div>
                                    <x-label for="end_time" value="Select end hour"></x-label>
                                    <select name="end_time" id="end_time" value=""></select>
                                    @foreach($times as $time)
                                        <option value="{{$time->id}}">{{$time->end_time}}</option>
                                    @endforeach
                                </div>

                            <x-button class="ml-3">
                                {{__("Save")}}
                            </x-button>
                            </div>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
