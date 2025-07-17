<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('For your security, please enter the 2FA verification code from your authenticator app or email to complete the login process.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification code has been sent to your email address.') }}
        </div>
    @endif

    <div class="mt-4">
        <form method="POST" action="/pass/2fa">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-input-label for="tfa" :value="__('2FA Code')" />
                <x-text-input id="tfa" class="block mt-1 w-full text-center tracking-widest text-xl" type="text"
                    name="tfa" inputmode="numeric" maxlength="6" placeholder="••••••" required autofocus />
                <x-input-error :messages="$errors->get('tfa')" class="mt-2" />
            </div>

            <div>
                <x-primary-button class="w-full justify-center">
                    {{ __('Verify Code') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
