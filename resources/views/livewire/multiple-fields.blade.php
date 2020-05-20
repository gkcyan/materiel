<div>
    {{-- In work, do what you enjoy. --}}
    
    @foreach ($fields as $key =>$value )

    <div class=" form-inline">
        
        <!-- Libelle Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('libelle', __('models/entreprises.fields.libelle').':') !!}
                {!! Form::text('libelle[]', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Actif Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('actif', __('models/entreprises.fields.actif').':') !!}
                {!! Form::text('actif[]', null, ['class' => 'form-control']) !!}
            </div>

            <span class="btn btn-success col-sm-1" wire:click="addfields"> Ajouter </span>
            <span class="btn btn-warning col-sm-1" wire:click="removefields({{ $key }})"> Retirer </span>
           

    </div>
    <br/><br/>
    @endforeach
    <br/><br/><br/><br/><br/>
    
    
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('entreprises.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
        </div>


</div>