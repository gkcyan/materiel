<!-- Libelle Field -->


<div class="box-header with-border">
    <h3 class="box-title">{{ $transporteur->libelle }} | {{ $transporteur->interlocuteur }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <tbody>
      <tr>
       
        <th colspan="4">Entreprise</th>
        
      </tr>
      <tr>
        <td>
             <div class="form-group col-sm-12">
                  {!! Form::label('libelle', __('models/transporteurs.fields.libelle').':') !!}
                  <p>{{ $transporteur->libelle }}</p>
              </div>
        </td>
        <td>
          <!-- Compte Cont Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('compte_cont', __('models/transporteurs.fields.compte_cont').':') !!}
              <p>{{ $transporteur->compte_cont }}</p>
          </div>
    </td>
    <td>
      <div class="form-group col-sm-12">
          {!! Form::label('reg_com', __('models/transporteurs.fields.reg_com').':') !!}
          <p>{{ $transporteur->reg_com }}</p>
      </div>
      </td>
        <td>
            
              <!-- Type Field -->
              <div class="form-group col-sm-12">
                  {!! Form::label('type', __('models/transporteurs.fields.type').':') !!}
                  <p>{{ $transporteur->type }}</p>
                </div>
          </td>
        
      </tr>
      <tr>
          <th colspan="4">Interlocuteur</th>
        
      </tr>
      <tr>
        <td><div class="form-group col-sm-12">
          {!! Form::label('interlocuteur', __('models/transporteurs.fields.interlocuteur').':') !!}
          <p>{{ $transporteur->interlocuteur }}</p>
          
          </div>
      
      </td>
        <td>
          <!-- Interlo Cont Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('interlo_cont', __('models/transporteurs.fields.interlo_cont').':') !!}
              <p>{{ $transporteur->interlo_cont }}</p>
          </div>
          </td>
        <td>
          <!-- Interlo Email Field -->
              <div class="form-group col-sm-12">
                  {!! Form::label('interlo_email', __('models/transporteurs.fields.interlo_email').':') !!}
                  {{ $transporteur->interlo_email }}
              </div>
        </td>
        <td><div class="form-group col-sm-12">
          {!! Form::label('statut', __('models/transporteurs.fields.statut').':') !!}
          {{ $transporteur->statut }}
          
      </div></td>
      </tr>
      <tr>
        
        <td colspan="4"><!-- Iobservation Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('observations', __('models/transporteurs.fields.observations').':') !!}
              <p>{{ $transporteur->observations }}</p>
          </div></td>
        
      </tr>
    </tbody></table>
  </div>
  <!-- /.box-body -->
  <div class="clearfix">
      
  </div>
