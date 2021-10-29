<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Emloyee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Data Karyawan</h2>
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

</x-app-layout>
