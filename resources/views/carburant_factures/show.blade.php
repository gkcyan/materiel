@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/carburant_factures.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('carburant_factures.show_fields')
                    <a href="{{ route('carburantFactures.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
