<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        {{-- <div>
            <x-input-label for="cedula" :value="__('Cedula')" />
            <x-text-input onkeypress="return Validations.valideKeyLetter(event)" id="cedula" name="cedula" type="text" class="mt-1 block w-full" :value="old('cedula', $user->cedula)" required autofocus autocomplete="cedula" disabled/>
            <x-input-error class="mt-2" :messages="$errors->get('cedula')" />
        </div> --}}
        
        <div class="mt-5">
            <label class="label block mb-2" for="cedula">{{__('Cedula')}}</label>
            <x-text-input onkeypress="return Validations.valideKeyLetter(event)" id="cedula" name="cedula" type="text" class="form-control" :value="old('cedula', $user->cedula)" required autofocus autocomplete="cedula" disabled/>
            <x-input-error id="cedula" class="block mt-2 invalid-feedback" :messages="$errors->get('cedula')" />
        </div>
        
        <div class="mt-5">
            <label class="label block mb-2" for="name">{{__('First Name')}}</label>
            <x-text-input onkeypress="return Validations.validateOnlyLetter(event)" id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error id="name" class="block mt-2 invalid-feedback" :messages="$errors->get('name')" />
        </div>

        <div class="mt-5">
            <label class="label block mb-2" for="last_name">{{__('Last Name')}}</label>
            <x-text-input onkeypress="return Validations.validateOnlyLetter(event)" id="last_name" name="last_name" type="text" class="form-control" :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
            <x-input-error id="last_name" class="block mt-2 invalid-feedback" :messages="$errors->get('last_name')" />
        </div>
        <div class="mt-5">
            <label class="label block mb-2" for="phone_number">{{__('Phone Number')}}</label>
            <x-text-input onkeypress="return Validations.validateOnlyLetter(event)" id="phone_number" name="phone_number" type="text" class="form-control" :value="old('phone_number', $user->phone_number)" required autofocus autocomplete="phone_number" />
            <x-input-error id="phone_number" class="block mt-2 invalid-feedback" :messages="$errors->get('phone_number')" />
        </div>

        <div>
            <label class="label block mb-2" for="email">{{__('Email')}}</label>
            <x-text-input onkeypress="return Validations.validateOnlyLetter(event)" id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autofocus autocomplete="email" />
            <x-input-error id="email" class="block mt-2 invalid-feedback" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
