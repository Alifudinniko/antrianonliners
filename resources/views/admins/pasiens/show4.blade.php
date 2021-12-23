<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Pasien</div>
                @if($message = Session::get('status'))
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <p>{{$message}}</p>
                </div>
                @endif
                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-success">Tambah</a>
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                        </tr>
					</thead>
					<tbody>

					</tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
       $('#tbl_list').DataTable({
           "aLengthMenu": [
                    [5,10, 25, 50, 100, 200, -1],
                    [5,10, 25, 50, 100, 200, "All"]
                ],
            paging: true,
            processing: true,
            serverSide: true,
            ajax: '{{ url('pasien/json') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },

            ]
        });
     });
    </script>


