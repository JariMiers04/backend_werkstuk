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
                                        <select name="users" id="users" value="" class="w-full rounded">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                <div>
                                    <x-label for="fieldsOfStudy" value="Select Field of Study"></x-label>
                                    <select name="fieldsOfStudy" id="fieldsOfStudy" value="" class="w-full rounded">
                                    @foreach($fieldOfStudy as $fos)
                                        <option value="{{$fos->id}}">{{$fos->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="year" value="Select year of field of study"></x-label>
                                    <x-input type="number" min="1" max="7" name="year" class="rounded"></x-input>
                                </div>

                                <div>
                                    <x-label for="courses" value="Select Course"></x-label>
                                    <select name="courses" id="courses" value="" class="rounded">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="days" value="Select Day"></x-label>
                                    <select name="days" id="days" value="" class="rounded">
                                    @foreach($days as $day)
                                        <option value="{{$day->id}}">{{$day->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="start_time" value="Select start hour"></x-label>
                                    <select name="start_time" id="start_time" value="" class="rounded">
                                    @foreach($times as $time)
                                        <option value="{{$time->id}}">{{$time->start_time}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="end_time" value="Select end hour"></x-label>
                                    <select name="end_time" id="end_time" value="" class="rounded">
                                    @foreach($times as $time)
                                        <option value="{{$time->id}}">{{$time->end_time}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{__("Save")}}
                            </x-button>
                            </div>
                        </form>

                        <h2 class="text-left mb-2 font-bold">Create a new Course</h2>
                        <form action="{{route('addCourse')}}" method="POST">
                            @csrf
                            <x-label for="course" value="Name of the new course"></x-label>
                            <x-input id="course" type="text" name="name" required></x-input>

                            <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{__("Add Course")}}
                            </x-button>
                            </div>
                        </form>

                        <h2 class="text-left mb-2 font-bold">Delete Course(s)</h2>
                        <form action="{{route("deleteCourse")}}" method="POST">
                            @csrf
                            @foreach($courses as $course)
{{--                                <div class="">--}}
                                <x-button class="text-white font-bold 2xl bg-red-700" value="{{$course->id}}">DELETE {{$course->name}}</x-button>
{{--                                </div>--}}
                            @endforeach
                        </form>

                        <h2 class="text-left mb-2 font-bold">Create a new Field of Study</h2>
                        <form action="{{route("addFieldOfStudy")}}" method="POST">
                            @csrf
                            <x-label for="fosName" value="Name of the new field of study"></x-label>
                            <x-input type="text" name="fosName" id="fosName" required></x-input>

                            <x-label for="fosYear" value="The year of the new field of study"></x-label>
                            <x-input type="number" name="fosYear" id="fosYear" max="7" min="1" required></x-input>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-3">
                                    {{__("Save New Field of Study")}}
                                </x-button>
                            </div>
                        </form>

                        <h2 class="text-left mb-2 font-bold">Delete Field(s) of Study</h2>
                        <form action="{{route("deleteFieldOfStudy")}}" method="POST">
                            @csrf

                                <table class="text-center mx-auto">
                                    <thead>
                                    <th>Field of Study year</th>
                                    <th>Field of Study name</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($fieldOfStudy as $fos)
                                        <tr>
                                            <td class="py-2 px-12 border-b-2 border-gray-300">{{$fos->year}}</td>
                                            <td class="py-2 px-12 border-b-2 border-gray-300">{{$fos->name}}</td>
                                            <td class="py-2 px-12 border-b-2 border-gray-300"><x-button class="text-white font-bold 2xl bg-red-700" value="{{$fos->id}}" name="deleteUser">Delete</x-button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
