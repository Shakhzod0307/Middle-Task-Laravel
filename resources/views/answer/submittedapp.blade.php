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
                    <p class="flex items-center justify-center font-extrabold text-xl text-blue-500">
                        {{ __("Your Applications") }}
                    </p>
                    @foreach($applications as $application)
                        <div class='mt-3 flex items-center justify-center'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                                <div class="flex w-full items-center justify-between border-b pb-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                        <div class="text-lg font-bold text-slate-700">Name: {{$application->user->name}}</div>
                                    </div>
                                    <div class="flex items-center space-x-8">
{{--                                        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">ID: {{$application->user_id}}</button>--}}
                                        <div class="text-xs text-neutral-500">Date: {{$application->created_at}}</div>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div>
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
                                    @if($application->file_url)
                                        <div class="items-center p-10 mt-3 border-2 hover:bg-gray-100 transition">
                                            <a  href="{{asset('storage/'.$application->file_url)}}" target="_blank">
                                                <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     width="30px" height="30px" viewBox="0 0 61.994 61.994"
                                                     xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M54.988,23.789l-0.031-0.113c-0.025-0.193-0.07-0.38-0.135-0.572l-0.064-0.192l-0.046-0.099
                                                        c-0.103-0.222-0.222-0.418-0.358-0.597l-0.033-0.068L33.05,0.884c-0.248-0.248-0.537-0.446-0.9-0.613l-0.253-0.094
                                                        c-0.187-0.064-0.378-0.109-0.581-0.137L31.169,0H17C11.486,0,7,4.485,7,10v41.994c0,5.514,4.486,10,10.001,10h27.996
                                                        c5.515,0,9.998-4.484,9.998-10V24.073L54.988,23.789z M48.994,51.993c0,2.203-1.793,3.997-3.997,3.997H17
                                                        c-2.205,0-3.999-1.794-3.999-3.997V9.999C13.001,7.794,14.794,6,17,6h10.921v11.072c0,5.514,4.486,10.001,10,10.001h11.072V51.993
                                                        z"/>
                                                    <path d="M14.675,34.112c0,1.291,1.046,2.337,2.337,2.337h26.487c1.291,0,2.337-1.047,2.337-2.337s-1.046-2.337-2.337-2.337H17.012
                                                        C15.721,31.775,14.675,32.822,14.675,34.112z"/>
                                                    <path d="M43.499,38.008H17.012c-1.291,0-2.337,1.047-2.337,2.336c0,1.291,1.046,2.338,2.337,2.338h26.487
                                                        c1.291,0,2.337-1.047,2.337-2.338C45.836,39.055,44.79,38.008,43.499,38.008z"/>
                                                    <path d="M43.499,44.24H17.012c-1.291,0-2.337,1.046-2.337,2.337s1.046,2.337,2.337,2.337h26.487c1.291,0,2.337-1.047,2.337-2.337
                                                        S44.79,44.24,43.499,44.24z"/>
                                                </g>
                                            </g>
                                    </svg>
                                            </a>
                                        </div>
                                    @endif

                                </div>
                                <div>
                                    <hr class="font-bold">
                                    @if(!$application->answer)
                                        <h6 class="text-indigo-700 ">Waiting...</h6>
                                    @else
                                        <h6 class="text-indigo-700 ">Answer</h6>
                                        <p>{{$application->answer->answer}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="store-filter clearfix">
                        @if($applications->count()>0) {{ $applications->links('pagination::bootstrap-4') }}@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
