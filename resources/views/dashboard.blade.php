<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="p-3 text-gray-900">
                    @if(auth()->user()->role->name == 'manager')
                        <p class="flex items-center justify-center font-extrabold text-xl text-blue-500">
                            {{ __("Received Applications") }}
                        </p>

                        <div class='mt-3 flex items-center justify-center'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                                <div class="flex w-full items-center justify-between border-b pb-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                        <div class="text-lg font-bold text-slate-700">Joe Smith</div>
                                    </div>
                                    <div class="flex items-center space-x-8">
                                        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">ID: 2</button>
                                        <div class="text-xs text-neutral-500">2 hours ago</div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-6">
                                    <div class="mb-3 text-xl font-bold">Nulla sed leo tempus, feugiat velit vel, rhoncus neque?</div>
                                    <div class="text-sm text-neutral-600">Aliquam a tristique sapien, nec bibendum urna. Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec. Curabitur eget feugiat massa</div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between text-slate-500">
                                        manager@company.com
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        <!-- component -->
                        <div class="max-w-md mx-auto p-8 bg-white rounded-md shadow-md">
                            <h2 class="text-2xl font-semibold mb-6">Submit Your Application</h2>
                            <form action="#" method="POST" enctype="multipart/form-data">
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
                                    <input type="file" id="file" name="file" placeholder="" required
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
