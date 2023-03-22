<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>    

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label class="label block mb-2" for="current_password">{{__('Current Password')}}</label>
            <x-text-input id="current_password" name="current_password" type="password" class="form-control" :value="old('current_password', $user->current_password)" required />
            <x-input-error id="current_password" class="block mt-2 invalid-feedback" :messages="$errors->get('current_password')" />
        </div>

        <div>
            <label class="label block mb-2" for="password">{{__('New Password')}}</label>
            <x-text-input id="password" name="password" type="password" class="form-control" required autocomplete="password" />
            <x-input-error id="password" class="block mt-2 invalid-feedback" :messages="$errors->get('password')" />
        </div>

        <div>
            <label class="label block mb-2" for="password_confirmation">{{__('Confirm Password')}}</label>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required autocomplete="password_confirmation" />
            <x-input-error id="password_confirmation" class="block mt-2 invalid-feedback" :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
