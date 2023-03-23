@extends('layouts.master', ['title' => __('Dashboard')])
{{-- <h2 class="font-semibold text-xl leading-tight"> --}}
{{-- {{ __('Dashboard') }} --}}
{{-- </h2>  --}}
@section('workspace')
    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <h1>{{ __('Dashboard') }}</h1>
    </section>

    <div class="grid grid-cols-1  gap-5 w-full">
        <div>
            <!-- Style 3 -->
            <div class="card p-5">
                <h3>{{ __('Contracts') }}</h3>
                <div class="mt-5">
                    <div id="sortable-style-3" class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-5">
                        {{-- @foreach ($consultaObjeto as $consulta)
                            <div class="card border border-divider px-4 py-8 text-center">
                                <span class="text-primary text-5xl leading-none la la-sun"></span>
                                <p class="mt-2">{{ __('Contract Code') }}:{{$consulta->idDeuda ?? ''}}</p>
                                <div class="text-primary mt-5 text-3xl leading-none">18</div>
                            </div>
                            <div class="card border border-divider px-4 py-8 text-center">
                                <span class="text-primary text-5xl leading-none la la-sun"></span>
                                <p class="mt-2">{{ __('Codigo Medidor') }}: {{$consulta->idDeudaAlterno ?? '' }}</p>
                                <div class="text-primary mt-5 text-3xl leading-none">18</div>
                            </div>
                            <div class="card border border-divider px-4 py-8 text-center">
                                <span class="text-primary text-5xl leading-none la la-sun"></span>
                                <p class="mt-2">{{ __('Value') }}: {{$consulta->valor ?? '' }}	</p>
                                <div class="text-primary mt-5 text-3xl leading-none">18</div>
                            </div>
                        @endforeach --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/js/Sortable.min.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js') }}"></script> -->
@endsection
