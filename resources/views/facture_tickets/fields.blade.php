<!-- Facture Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facture_id', 'Facture Id:') !!}
    {!! Form::select('facture_id', $factureItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Ticket Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ticket_id', 'Ticket Id:') !!}
    {!! Form::select('ticket_id', $bascule_dataItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('factureTickets.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
