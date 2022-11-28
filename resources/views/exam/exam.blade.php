<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Exam') }} #{{ $exam->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="h-full flex flex-col gap-4">

                <div class=" flex flex-col gap-4 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div>
                        <h1 class="text-2xl font-bold dark:text-gray-200">{{ $exam->title }}</h1>
                        <p class="text-gray-500 dark:text-gray-400">{{ $exam->description }}</p>
                    </div>

                    <div>
                        <span class="text-2xl font-bold dark:text-gray-200">Candidate</span>
                        <p class="text-gray-500 dark:text-gray-400">{{ $exam->candidate->name }}</p>
                    </div>

                    <div>
                        <a href="{{ route('exam.start', $exam->id) }}">
                            INICIAR
                        </a>
                    </div>


                </div>

            </div>
        </div>
    </div>


</x-app-layout>