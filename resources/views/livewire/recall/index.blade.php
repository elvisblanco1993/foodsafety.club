<div>
    <h2 class="text-xl font-normal">{{__("Latest recalls")}}</h2>

    <ul class="mt-6 list-none text-sm">
        @forelse ($recalls as $recall)
            <li @class([
                "mt-2 border border-slate-200 transition-all px-4 py-2",
                'hover:border-red-500' => $recall->status === 'Ongoing',
                'hover:border-emerald-500' => $recall->status !== 'Ongoing'
            ])>
                <div x-data="{ showDialog: false }">
                    <button class="w-full text-left" x-on:click="showDialog = true; $nextTick(() => $refs.dialog.showModal())">
                        <div class="sm:flex items-center">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-slate-500">
                                    <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2">{{ $recall->report_date }}</span>
                            </div>
                            <div class="mt-2 sm:mt-0 sm:ml-4 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-slate-500">
                                    <path fill-rule="evenodd" d="M4.5 2A1.5 1.5 0 003 3.5v13A1.5 1.5 0 004.5 18h11a1.5 1.5 0 001.5-1.5V7.621a1.5 1.5 0 00-.44-1.06l-4.12-4.122A1.5 1.5 0 0011.378 2H4.5zm2.25 8.5a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5zm0 3a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2">{{ $recall->recall_number }}</span>
                            </div>
                            <div class="mt-2 sm:mt-0 sm:ml-4 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-slate-500">
                                    <path fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2">{{ $recall->city . ', ' . $recall->state }}</span>
                            </div>
                        </div>

                        <div class="block mt-2 text-slate-700">
                            <span class="text-black font-semibold">Product:</span> {{ Str::limit($recall->product_description, 150, '...') }}
                        </div>
                        <div class="block mt-1 text-slate-700">
                            <span class="text-black font-semibold">Recalling Firm:</span> {{ $recall->recalling_firm }}
                        </div>
                        <div class="block mt-1 text-slate-700">
                            <span class="text-black font-semibold">Reason:</span> {{ Str::limit($recall->reason_for_recall, 150, '...') }}
                        </div>
                    </button>

                    <dialog x-ref="dialog" class="max-w-5xl rounded-lg shadow-md p-4 mx-auto">
                        <div @class([
                            '-m-4 px-6 py-4 flex items-center justify-between',
                            'bg-red-500' => $recall->status === 'Ongoing',
                            'bg-emerald-500' => $recall->status !== 'Ongoing'
                        ])>
                            <div class="text-white text-lg">
                                <span class="font-bold">Recall Number:</span> {{ $recall->recall_number }}
                            </div>
                            <button x-on:click="showDialog = false; $refs.dialog.close()" class="align-right">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="block mt-6">
                            <p class="mt-2 grid grid-cols-3 gap-4 px-3 py-2 hover:bg-slate-100">
                                <strong class="col-span-1">Recall Number:</strong>
                                <span class="col-span-2">{{ $recall->recall_number }}</span>
                            </p>
                            <p class="mt-2 grid grid-cols-3 gap-4 px-3 py-2 hover:bg-slate-100">
                                <strong class="col-span-1">Status:</strong>
                                <span class="col-span-2">{{ $recall->status }}</span>
                            </p>
                            <p class="mt-2 grid grid-cols-3 gap-4 px-3 py-2 hover:bg-slate-100">
                                <strong class="col-span-1">Reported on:</strong>
                                <span class="col-span-2">{{ $recall->report_date }}</span>
                            </p>
                            <p class="mt-2 grid grid-cols-3 gap-4 px-3 py-2 hover:bg-slate-100">
                                <strong class="col-span-1">Product description:</strong>
                                <span class="col-span-2">{{ $recall->product_description }}</span>
                            </p>
                            <p class="mt-2 grid grid-cols-3 gap-4 px-3 py-2 hover:bg-slate-100">
                                <strong class="col-span-1">Reported by:</strong>
                                <span class="col-span-2">{{ $recall->recalling_firm }}</span>
                            </p>
                            <p class="mt-2 grid grid-cols-3 gap-4 px-3 py-2 hover:bg-slate-100">
                                <strong class="col-span-1">Recall reason:</strong>
                                <span class="col-span-2">{{ $recall->reason_for_recall }}</span>
                            </p>
                            <p class="mt-2 grid grid-cols-3 gap-4 px-3 py-2 hover:bg-slate-100">
                                <strong class="col-span-1">Distribution areas:</strong>
                                <span class="col-span-2">{{ $recall->distribution_pattern }}</span>
                            </p>
                            <p class="mt-2 grid grid-cols-3 gap-4 px-3 py-2 hover:bg-slate-100">
                                <strong class="col-span-1">Product quantity:</strong>
                                <span class="col-span-2">{{ $recall->product_quantity }}</span>
                            </p>
                        </div>

                    </dialog>

                </div>
            </li>
        @empty

        @endforelse
    </ul>

    <div class="mt-6">
        {{ $recalls->links() }}
    </div>
</div>
