<x-admin-layout>
    <x-slot name="header">Edit UMKM</x-slot>

    <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST">
        @include('admin.umkm._form')
    </form>
</x-admin-layout>