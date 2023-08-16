<div>
    <main class="my-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 prose">
        <h1>Unsubscribe</h1>
        <p>
            {{_("By entering your email below, you will be unsubscribed, and we will completely remove your information from our database.")}}
        </p>
        <form wire:submit.prevent="unsubscribe" class="mt-6">
            @csrf
            <x-label>{{__("Enter your email address")}}</x-label>
            <x-input wire:model="email" type="email" class="block mt-2 w-full sm:w-1/3" />
            <x-input-error for="email" />

            <x-button type="submit" class="mt-4">{{__("Unsubscribe")}}</x-button>
        </form>

        @if (session()->has('unsubscribed'))
            <div class="inline-flex items-center mt-6 px-3 py-2 bg-emerald-300 text-lg font-medium rounded-md text-emerald-900">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                </svg>
                <span class="ml-3">{{__("You have successfully unsubscribed!")}}</span>
            </div>
        @endif
    </main>
</div>
