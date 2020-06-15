@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/bareme_Penalite_Transports.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('bareme_penalite_transports.show_fields')
                    <a href="{{ route('baremePenaliteTransports.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
