<x-admin-layout>
    <x-slot name="header">Tambah UMKM</x-slot>

    <form action="{{ route('admin.umkm.store') }}" method="POST">
        @include('admin.umkm._form')
    </form>
</x-admin-layout>