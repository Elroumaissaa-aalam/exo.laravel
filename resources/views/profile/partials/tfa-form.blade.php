<section class="space-y-6">
 <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Activate Two-Factor Authentication') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        {{ __('For added security, enable two-factor authentication (2FA) on your account. This will require a verification code in addition to your password when logging in.') }}
    </p>
</header>


    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'activate-2fa-auth')"
    > {{ __($user->tfa ? "Turn Off" : "Activate") }} {{ __(' Two-Factor Authentication') }}</x-primary-button>

    <x-modal name="activate-2fa-auth" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.tfa_switch') }}" class="p-6">
            @csrf
            @method('PUT')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to enable the 2FA ?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        {{ __('For added security, enable two-factor authentication (2FA) on your account. This will require a verification code in addition to your password when logging in.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                  {{ __($user->tfa ? "Turn Off" : "Activate") }}  {{ __(' Two-Factor Authentication') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>
