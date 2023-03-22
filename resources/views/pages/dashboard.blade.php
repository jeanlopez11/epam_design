{{-- <x-master> --}}
@extends('layouts.master', ['title' =>  __('Dashboard')  ])

@section('workspace')
    <h2 class="font-semibold text-xl leading-tight">
        {{ __('Dashboard') }}
    </h2>
    {{-- @livewire('cuentas.show-cuentas') --}}
    {{-- https://epam.altura.services/aflowmin/aflow4/captcha.jsp?P=3 --}}
    {{-- https://epam.altura.services/aflowmin/aflow4/forma.jsp?P=1 --}}
@endsection

{{-- </x-master> --}}
