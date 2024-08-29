
@extends('layout')
@section('content')
    <div class="w-full px-10 py-5  overflow-x-auto">
        <div class="w-full flex justify-between items-center pb-5">
            <h2 class="text-xl inline-block  font-bold">Nasabah List</h2>
            
        </div>
        <table class="table-fixed w-full" id="nasabah-table" >
            <thead>
                <tr class="text-center text-xs bg-slate-500 text-white">
                    <th class="w-[10px] ">ID</th>
                    <th class="w-[] ">Nama</th>
                    <th class="w-[] ">Tempat Lahir</th>
                    <th class="w-[] ">Tanggal Lahir</th>
                    <th class="w-[] ">Jenis Kelamin</th>
                    <th class="w-[] ">Pekerjaan</th>
                    <th class="w-[200px] ">Alamat</th>
                    <th class="w-[] ">Nominal Setor</th>
                    <th class="w-[140px] ">Status</th>
                    <th class="w-[130px] ">Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            let no = 1;
            $('#nasabah-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('nasabah.approved.data') }}',
                columns: [
                    {
                        data: 'id',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {
                            return no++ ;
                        }
                    },
                    {
                        data: 'nama',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {
                            return data;
                        }
                    },
                    {
                        data: 'tempat_lahir',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {
                            return data;
                        }
                    },
                    {
                        data: 'tanggal_lahir',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {
                            return data;
                        }
                    },
                    {
                        data: 'jenis_kelamin',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {
                            return data;
                        }
                    },
                    {
                        data: 'pekerjaan_id',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {
                            return data;
                        }
                    },
                    {
                        data: 'alamat_id',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {
                            return data;
                        }
                    },
                    {
                        data: 'nominal_setor',
                        className: "text-left text-xs",
                        "render": function ( data, type, row ) {
                            return `Rp. ${data}`;
                        }
                    },
                    {
                        data: 'status',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {

                            return `<a href="{{ url('nasabah/approved/${row.id}') }}" class="px-4 py-1 ${data === 'Disetujui' ? 'bg-emerald-500' : 'bg-blue-500'} text-white text-xs font-semibold rounded">${data}</a>`;
                        }
                    },
                    {
                        data: 'action',
                        className: "text-center text-xs",
                        "render": function ( data, type, row ) {
                            return `<a href="{{ url('nasabah/approved/${row.id}') }}" class="px-4 py-1 bg-emerald-500 text-white text-xs font-semibold rounded">Approve Nasabah</a>`;
                        }
                    },
                    
                ]
            });
        });
    </script>
@endsection
