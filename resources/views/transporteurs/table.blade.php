@section('css')
    @include('layouts.datatables_css')
@endsection



<div class="box collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Title</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
          <i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body" style="display: none;">
        {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
    </div>
    <!-- /.box-body -->
    <div class="box-footer" style="display: none;">
      Footer
    </div>
    <!-- /.box-footer-->
  </div>



@push('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush