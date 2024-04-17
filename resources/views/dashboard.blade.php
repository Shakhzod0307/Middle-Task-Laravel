<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="p-3 text-gray-900">
                    @if(auth()->user()->role->name == 'manager')
                        <p class="flex items-center justify-center font-extrabold text-xl text-blue-500">
                            {{ __("Received Applications") }}
                        </p>
                        @foreach($applications as $application)
                        <div class='mt-3 flex items-center justify-center'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                                <div class="flex w-full items-center justify-between border-b pb-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                        <div class="text-lg font-bold text-slate-700">{{$application->user->name}}</div>
                                    </div>
                                    <div class="flex items-center space-x-8">
                                        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">ID: {{$application->user_id}}</button>
                                        <div class="text-xs text-neutral-500">{{$application->created_at}}</div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-6">
                                    <div class="mb-3 text-xl font-bold">{{$application->subject}}</div>
                                    <div class="text-sm text-neutral-600">{{$application->message}}</div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between text-slate-500">
                                        {{$application->user->email}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="store-filter clearfix">
                            @if($applications->count()>0) {{ $applications->links('pagination::bootstrap-4') }}@endif
                        </div>

                    @else
                        <!-- component -->
                        <div class="max-w-md mx-auto p-8 bg-white rounded-md shadow-md">
                            @if(Session('success'))
                                <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold"></strong>
                                    <span class="block sm:inline">{{Session('success')}}</span>
                                    <button id="close-btn" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 6.354 5.646a.5.5 0 1 0-.708.708L9.293 10l-3.647 3.646a.5.5 0 1 0 .708.708L10 10.707l3.646 3.647a.5.5 0 0 0 .708-.708L10.707 10l3.647-3.646a.5.5 0 0 0 0-.708z"/></svg>
                                    </button>
                                </div>
                                <script>
                                    document.getElementById('close-btn').addEventListener('click', function() {
                                        document.getElementById('alert').style.display = 'none';
                                    });
                                </script>
                            @endif
                            <h2 class="text-2xl font-semibold mb-6">Submit Your Application</h2>
                            <form action="{{route('applications.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Subject</label>
                                    <input type="text" id="name" name="subject" placeholder="" required
                                           class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                </div>
                                <div class="mb-6">
                                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Your Message</label>
                                    <textarea id="message" name="message" rows="6" placeholder=""
                                              class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                                    <input type="file" id="file" name="file" placeholder=""
                                           class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                </div>
                                <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                                    Send
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
