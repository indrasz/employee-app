@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10">
                <a href="{{ route('dashboard.employee.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Tambah Data Karyawan
                </a>
                <a href="{{ route('dashboard.download-pdf') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg ml-3">
                    Download PDF
                </a>
            </div>
            
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div> 
    
    @push('addon-script')

        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    { data: 'id', name: 'id', width: '5%'},
                    { data: 'name', name: 'name' },
                    { data: 'position', name: 'position' },
                    { data: 'gender', name: 'gender' },
                    { data: 'status', name: 'status' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '28%'
                    },
                ],
            });
            
        </script>

    @endpush
   

    {{-- <div class="ml-7 mt-7 ">
        <a href="{{ route('dashboard.employee.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
            + Tambah Data Karyawan
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5 mt-5 ml-5">Data Karyawan</h2>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>                       
                        </thead>
                        <tbody>
                          @forelse($items as $item)
                            <td class="border text-center px-6 py-4">{{ $item->id }}</td>
                            <td   class="border text-center px-6 py-4">{{ $item->name }}</td>
                            <td class="border text-center px-6 py-4">{{ $item->position }}</td>
                            <td class="border text-center px-6 py-4">{{ $item->address }}</td>
                            <td class="border text-center px-6 py-4">{{ $item->gender }}</td>
                            <td class="border text-center px-6 py-4">{{ $item->status }}</td>
                            <td class="border text-center px-6 py-4">
                                <a class="inline-block border border-blue-700 bg-blue-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline" 
                                    href="{{ route('dashboard.employee.show',  $item->id) }}">
                                    Show
                                </a>
                                <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                                    href="{{ route('dashboard.employee.edit',  $item->id) }}">
                                    Edit
                                </a>
                                <form class="inline-block" action="{{ route('dashboard.employee.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                                        Hapus
                                    </button>
                                </form>
                            </td>
                            @empty
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}


    
@endsection

