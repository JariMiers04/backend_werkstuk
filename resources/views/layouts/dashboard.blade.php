<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timetable') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                        <tr>
                            <th style="width: 120px"></th>
                            @foreach($days as $day)
                                <th class="border-b-2">{{$day->name}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($times as $time)
                            <tr>
                                <td class="border-r-2">{{$time->start_time}} - {{$time->end_time}}</td>
                                @foreach($days as $day)
                                    <td class="h-28 bg-gray-100 border border-white">
                                        @foreach($blocks as $block)
                                            @cannot('manageAllData')
                                                @if (Auth::id() == $block->user->id && $block->day == $day && $block->time == $time)
                                                    <h3 class="text-center mt-2 font-medium text-gray-600">{{$block->user->name}}</h3>
                                                    <p class="text-center">{{\App\Models\Course::find($block->coursesFos->course_id)->name}},
                                                        ClassRoom {{$block->room->id}}
                                                    <p class="text-center text-sm text-gray-400 italic">{{$block->year}} {{\App\Models\FieldsOfStudy::find($block->coursesFos->fields_of_study_id)->name}}
                                                    </p>
                                                @endif
                                            @elsecan('manageAllData')
                                                @if ($block->day == $day && $block->time == $time)
                                                    <h3 class="text-center mt-2 font-medium text-gray-600">{{$block->user->name}}</h3>
                                                    <p class="text-center">{{\App\Models\Course::find($block->coursesFos->course_id)->name}},
                                                        ClassRoom {{$block->room->id}}
                                                    <p class="text-center text-sm text-gray-400 italic">{{$block->year}} {{\App\Models\FieldsOfStudy::find($block->coursesFos->fields_of_study_id)->name}}
                                                    </p>
                                                @endif
                                            @endcannot
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
