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
                    @cannot('manageAllData')
                        <h2 class="text-left mb-2 font-bold">You do not have acces to this page.</h2>
                    @endcannot
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
                                            <option @if (old('users') == $user->id) selected="selected" @endif value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                <div>
                                    <x-label for="fieldsOfStudy" value="Select Field of Study"></x-label>
                                    <select name="fieldsOfStudy" id="fieldsOfStudy" value="" class="w-full rounded">
                                    @foreach($fieldOfStudy as $fos)
                                        <option @if (old('fieldsOfStudy') == $fos->id) selected="selected" @endif value="{{$fos->id}}">{{$fos->name}} </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="fieldsOfStudyYear" value="Select year of field of study"></x-label>
                                    <select name="fieldsOfStudyYear" id="fieldsOfStudyYear" value="" class="w-full rounded">
                                        @for($i=1;$i<=7;$i++)
                                            <option @if (old('fieldsOfStudyYear') == $i) selected="selected" @endif value="{{$i}}">Year {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div>
                                    <x-label for="courses" value="Select Course"></x-label>
                                    <select name="courses" id="courses" value="" class="w-full rounded">
                                    @foreach($courses as $course)
                                        <option @if (old('courses') == $course->id) selected="selected" @endif value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="days" value="Select Day"></x-label>
                                    <select name="days" id="days" value="" class="w-full rounded">
                                    @foreach($days as $day)
                                        <option @if (old('days') == $day->id) selected="selected" @endif value="{{$day->id}}">{{$day->name}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="times" value="Select which hour"></x-label>
                                    <select name="times" id="times" value="" class="w-full rounded">
{{--                                    @for($i=1;$i<=8;$i++)--}}
                                        @foreach($times as $time)
                                        <option @if (old('times') == $time->id) selected="selected" @endif value="{{$time->id}}">Class Block {{$time->id}}</option>
                                            @endforeach
{{--                                    @endfor--}}
                                    </select>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{__("Create new block")}}
                            </x-button>
                            </div>
                        </form>

                        <h2 class="text-left mb-2 font-bold">Create a new Course</h2>
                        <form action="{{route('addCourse')}}" method="POST">
                            @csrf
                            <x-label for="course" value="Name of the new course"></x-label>
                            <x-input id="course" type="text" name="name" required class="w-full rounded"></x-input>

                            <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{__("Add Course")}}
                            </x-button>
                            </div>
                        </form>

                        <h2 class="text-left mb-2 font-bold">Delete Course(s)</h2>
                        <form action="{{route("deleteCourse")}}" method="POST">
                            @csrf
                            <table class="text-center mx-auto">
                                <thead>
                                <th>Course</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    {{--                                <div class="">--}}
                                    <tr>
                                        <td class="py-2 px-12 border-b-2 border-gray-300">{{$course->name}}</td>
                                        <td class="py-2 px-12 border-b-2 border-gray-300 "><x-button class="text-white font-bold 2xl bg-red-700" value="{{$course->id}}" name="deleteCourse">DELETE</x-button></td>
                                    </tr>
                                    {{--                                </div>--}}
                                @endforeach
                                </tbody>
                            </table>
                        </form>

                        <h2 class="text-left mb-2 font-bold">Create a new Field of Study</h2>
                        <form action="{{route("addFieldOfStudy")}}" method="POST">
                            @csrf
                            <x-label for="fosName" value="Name of the new field of study"></x-label>
                            <x-input type="text" name="fosName" id="fosName" class="w-full rounded" required></x-input>

                            <x-label for="fosYear" value="The year of the new field of study"></x-label>
                            <x-input type="text" name="fosYear" id="fosYear" class="w-full rounded" required></x-input>

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
                                            <td class="py-2 px-12 border-b-2 border-gray-300"><x-button class="text-white font-bold 2xl bg-red-700" value="{{$fos->id}}" name="deleteFos">Delete</x-button></td>
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
