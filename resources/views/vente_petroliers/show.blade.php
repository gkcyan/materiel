@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/vente_petroliers.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('vente_petroliers.show_fields')
                    <a href="{{ route('ventePetroliers.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
