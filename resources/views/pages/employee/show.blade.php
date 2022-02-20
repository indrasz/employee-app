@extends('layouts.app')


@section('content')
<div class="flex flex-wrap justify-start px-4 py-7">

    <div class="w-6/12 sm:w-4/12 px-5 py-7">
        <img src="{{ $item->galleries()->exists() ? Storage::url($item->galleries->first()->url) : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mN88B8AAsUB4ZtvXtIAAAAASUVORK5CYII=' }}" alt="..." class="shadow rounded max-w-full h-auto align-middle border-none" />
    </div>
    
</div>

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
             <div class="p-6 bg-white border-b border-gray-200">
                <table class="table-auto w-full">
                    <style>
                        th {
                            width: 20%;
                        }
                    </style>
                    <tbody>
                        <tr>
                            <th class="border px-6 py-4 text-right">ID</th>
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                        </tr>
                        <tr>
                            <th class="border px-6 py-4 text-right">Nama</th>
                            <td class="border px-6 py-4">{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <th class="border px-6 py-4 text-right">Nama</th>
                            <td class="border px-6 py-4">{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <th class="border px-6 py-4 text-right">Jabatan</th>
                            <td class="border px-6 py-4">{{ $item->position }}</td>
                        </tr>
                        <tr>
                            <th class="border px-6 py-4 text-right">Alamat</th>
                            <td class="border px-6 py-4">{{ $item->address }}</td>
                        </tr>
                        <tr>
                            <th class="border px-6 py-4 text-right">Gender</th>
                            <td class="border px-6 py-4">{{ $item->gender }}</td>
                        </tr>
                        <tr>
                            <th class="border px-6 py-4 text-right">Status</th>
                            <td class="border px-6 py-4">{{ $item->status }}</td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
    
   

