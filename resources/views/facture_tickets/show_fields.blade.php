<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/facture_tickets.fields.id').':') !!}
    <p>{{ $factureTicket->id }}</p>
</div>

<!-- Facture Id Field -->
<div class="form-group">
    {!! Form::label('facture_id', __('models/facture_tickets.fields.facture_id').':') !!}
    <p>{{ $factureTicket->facture_id }}</p>
</div>

<!-- Ticket Id Field -->
<div class="form-group">
    {!! Form::label('ticket_id', __('models/facture_tickets.fields.ticket_id').':') !!}
    <p>{{ $factureTicket->ticket_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/facture_tickets.fields.created_at').':') !!}
    <p>{{ $factureTicket->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/facture_tickets.fields.updated_at').':') !!}
    <p>{{ $factureTicket->updated_at }}</p>
</div>

