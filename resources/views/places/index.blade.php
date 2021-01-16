@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <x:notify-messages />
                <div class="card-header">Add New Place</div>
                <div class="card-body">
                    <a href="{{ route('places.create') }}" class="btn btn-primary btn-sm float-right">Add New Place</a>
                    <table class="table table-hovered" id="tablePlace">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Place Name</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="" method="post" id="deleteForm">
    @csrf
    @method("DELETE")
    <input type="submit" value="Hapus" style="display:none">
</form>
@endsection

@push('DataTables')
<link rel="stylesheet" href="{{asset('/vendor/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@push('scripts')
<script src="{{asset('/vendor/datatables/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/vendor/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/datatables/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/vendor/datatables/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function(){
            $('#tablePlace').DataTable({
                processing:true,
                serverSide:true,
                ajax: '{{ route('place.data') }}',
                columns:[
                    {data: 'DT_RowIndex',orderable:false,searchable:false},
                    {data: 'place_name'},
                    {data: 'action'}
                ]
            })
        });
    </script>
@endpush
