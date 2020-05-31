<div>
    {{-- The best athlete wants his opponent at his best. --}}

    

    
    <div class=" form-inline col-sm-12">
                    <!-- Libelle Field -->
            <div class="form-group ">
                {!! Form::label('libelle', __('models/entreprises.fields.libelle').':') !!}
                {!! Form::text('libelle',null, ['class' => 'form-control']) !!}

                
            

            <!-- Actif Field -->
            
                {!! Form::label('actif', __('models/entreprises.fields.actif').':') !!}
                {!! Form::text('actif', null, ['class' => 'form-control']) !!}

                
            </div>
            
            
    </div>
    
    <br/><br/><br/>
   
   
    
    
                <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('entreprises.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
                
            
            </div>
</div>
