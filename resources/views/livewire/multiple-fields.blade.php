<div>
    {{-- The best athlete wants his opponent at his best. --}}

    @foreach ($fields as $key =>$value )

    
    <div class=" form-inline col-sm-12">
                    <!-- Libelle Field -->
            <div class="form-group ">
                {!! Form::label('libelle', __('models/entreprises.fields.libelle').':') !!}
                {!! Form::text('libelle[][libelle]',null, ['class' => 'form-control']) !!}

                
            

            <!-- Actif Field -->
            
                {!! Form::label('actif', __('models/entreprises.fields.actif').':') !!}
                {!! Form::text('actif[][actif]', "$value", ['class' => 'form-control']) !!}

                <span class="btn btn-warning " wire:click="removefields({{ $key }})"> Retirer </span>
            </div>
            
            
    </div>
    
    <br/><br/><br/>
    @endforeach
   
    
    
                <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('entreprises.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
                <span class="btn btn-success " wire:click="addfields"> Ajouter </span> 
            
            </div>
</div>
