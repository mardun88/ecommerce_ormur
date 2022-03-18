@extends('admin.admin_layouts')

@section('admin_content')

 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">
 
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Brand Table</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Brand List
        <a href="" class="btn btn-sm btn-warning" style="float:right;"data-toggle="modal" data-target="#modaldemo3">Add New</a>
      </h6>

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">ID</th>
              <th class="wd-15p">Brand Name</th>
              <th class="wd-15p">Brand logo</th>
              <th class="wd-20p">Action</th>
            </tr>
          </thead>
          @foreach ( $brand as $row )
          <tbody>
            <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->brand_name}}</td>
              <td><img src="{{ URL::to($row->brand_logo) }}" height="70px;" width="80px;" ></td>
              <td>
                <a href="{{URL::to('edit/brand/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{URL::to('delete/brand/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->

    {{-- <p class="tx-11 tx-uppercase tx-spacing-2 mg-t-40 mg-b-10 tx-gray-600">Javascript Code</p>
    <pre><code class="javascript pd-20">$('#datatable1').DataTable({
responsive: true,
language: {
searchPlaceholder: 'Search...',
sSearch: '',
lengthMenu: '_MENU_ items/page',
}
});</code></pre> --}}

    
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

 <!-- LARGE MODAL -->
<div id="modaldemo3" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <div class="modal-body pd-20">
        <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data" >
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Brand Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
            placeholder="Brand Name" name="brand_name">            
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Brand Logo</label>
            <input type="file" class="form-control" aria-describedby="emailHelp" 
            placeholder="Brand Logo" name="brand_logo">
          </div>
          </div><!-- modal-body -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-info pd-x-20">Submit</button>
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<script>
  $(function(){
    'use strict';

    $('#datatable1').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

    $('#datatable2').DataTable({
      bLengthChange: false,
      searching: false,
      responsive: true
    });

    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

  });
</script>
    
@endsection