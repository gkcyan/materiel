@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/type_zones.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('type_zones.show_fields')
                    <a href="{{ route('typeZones.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
