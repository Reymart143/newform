@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 table-responsive">
            <br/>
            <div align ="right">
                <button type="button" name="create_record" id="create_record" class="btn btn-success"> <i class="bi bi-plus-square"></i>action </button>
        </div>
    <br />
        <table class="table table-striped table-bordered " id="user_datatable">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Age</th>
                    <th>Phone Number</th>
                    <th>Blood Type</th>
                    <th>Gender</th>
                    <th>Region</th>
                    <th>Province</th>
                    <th>Municipality</th>
                    <th>Barangay</th>
                    <th>Purok</th>
                    <th>Username</th>
                    <th width="180px">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    var table = $('#user_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'age', name: 'age'},
            {data: 'number', name: 'number'},
            {data: 'bloodtype', name: 'bloodtype'},
            {data: 'gender', name: 'gender'},
            {data: 'region', name: 'region'},
            {data: 'province', name: 'province'},
            {data: 'city', name: 'city'},
            {data: 'barangay', name: 'barangay'},
            {data: 'purok', name: 'purok'},
            {data: 'username', name: 'username'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#create_record').click(function(){
        $('.modal-title').text('Add New Record');
        $('#action_button').val('Add');
        $('#action').val('Add');
        $('#form_result').html('');

        $('#formModal').modal('show');

    })

</script>

@endsection

