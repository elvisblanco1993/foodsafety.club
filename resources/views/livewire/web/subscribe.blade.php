<div>
    <x-highlight-button wire:click="$toggle('modal')">{{__("Get notified")}}</x-highlight-button>

    <x-dialog-modal wire:model="modal" maxWidth="md">
        <x-slot name="title">
            <p class="text-lg font-medium text-slate-900">{{ __("Get Notified") }}</p>
        </x-slot>
        <x-slot name="content">
            <p class="">{{ __("Enter your email to receive realtime notifications about food recalls in the United States.") }}</p>

            <label for="email-address" class="sr-only">{{__("Email address")}}</label>
            <x-input id="email-address" name="email" wire:model="email" type="email" autocomplete="email" required
                placeholder="{{__('your@email.com')}}" class="w-full mt-3"
            />

            <p class="mt-2 text-xs text-slate-500">
                {!! __("By subscribing to the Food Safety Club, you agree to our <a href='/terms-of-service' class='text-yellow-600 underline'>terms and conditions</a>.") !!}
            </p>
        </x-slot>
        <x-slot name="footer">
            <x-highlight-button wire:click="subscribe">
                {{__("Subscribe")}}
            </x-highlight-button>
        </x-slot>
    </x-dialog-modal>
</div>
