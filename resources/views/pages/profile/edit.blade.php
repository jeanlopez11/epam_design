@extends('layouts.master', ['title' => __('Profile')])

@section('workspace')
    @if (session('status') === 'password-updated' || session('status') === 'profile-updated')
        <div class="alert alert_success">
            <strong class="uppercase"><bdi>Exitoso!</bdi></strong>
            Los cambios se guardaron correctamente.
            <button class="dismiss la la-times" data-dismiss="alert"></button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert_danger">
            <strong class="uppercase"><bdi>Error!</bdi></strong>
            No se puedo guardar los cambios.
            <button class="dismiss la la-times" data-dismiss="alert"></button>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('pages.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('pages.profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>
@endsection
