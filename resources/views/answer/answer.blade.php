<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="p-3 text-gray-900">
                    <div class="max-w-md mx-auto p-8 bg-white rounded-md shadow-md">
                            @if(Session('success'))
                                <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold"></strong>
                                    <span class="block sm:inline">{{Session('success')}}</span>
                                    <button id="close-btn" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 6.354 5.646a.5.5 0 1 0-.708.708L9.293 10l-3.647 3.646a.5.5 0 1 0 .708.708L10 10.707l3.646 3.647a.5.5 0 0 0 .708-.708L10.707 10l3.647-3.646a.5.5 0 0 0 0-.708z"/></svg>
                                    </button>
                                </div>
                            @endif
                            @if(Session('error'))
                                <div id="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold"></strong>
                                    <span class="block sm:inline">{{Session('error')}}</span>
                                    <button id="close-btn" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 6.354 5.646a.5.5 0 1 0-.708.708L9.293 10l-3.647 3.646a.5.5 0 1 0 .708.708L10 10.707l3.646 3.647a.5.5 0 0 0 .708-.708L10.707 10l3.647-3.646a.5.5 0 0 0 0-.708z"/></svg>
                                    </button>
                                </div>
                                <script>
                                    document.getElementById('close-btn').addEventListener('click', function() {
                                        document.getElementById('alert').style.display = 'none';
                                    });
                                </script>
                            @endif
                            <h2 class="text-2xl font-semibold mb-6">Submitting Answer #{{ $application->id }}</h2>
                            <form action="{{route('answer.store',$application->id)}}" method="POST">
                                @csrf

                                <div class="mb-6">
                                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Your Answer</label>
                                    <textarea id="message" name="answer" rows="6" placeholder=""
                                              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                                </div>

                                <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                                    Answer
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
