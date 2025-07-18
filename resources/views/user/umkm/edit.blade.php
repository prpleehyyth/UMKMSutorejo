<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Edit Data UMKM</h2>

        <form method="POST" action="{{ route('user.umkm.update') }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div>
                <label class="block">Nama UMKM</label>
                <input type="text" name="name" value="{{ old('name', $umkm->name) }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block">Deskripsi</label>
                <textarea name="description" class="w-full border rounded p-2">{{ old('description', $umkm->description) }}</textarea>
            </div>

            <div>
                <label class="block">Alamat</label>
                <input type="text" name="address" value="{{ old('address', $umkm->address) }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block">NIB</label>
                <input type="text" name="nib" value="{{ old('nib', $umkm->nib) }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block">Pendapatan</label>
                <input type="text" name="revenue" value="{{ old('revenue', $umkm->revenue) }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block">Jenis Usaha</label>
                <select name="business_type_id" class="w-full border rounded p-2">
                    <option value="">Pilih Jenis Usaha</option>
                    @foreach ($businessTypes as $type)
                    <option value="{{ $type->id }}" {{ old('business_type_id', $umkm->business_type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Link Google Maps</label>
                <input type="text" name="google_maps_link" value="{{ old('google_maps_link', $umkm->google_maps_link) }}" class="w-full border rounded p-2">
            </div>

            <!-- Nomor Surat Sertifikat Halal -->
            <div class="mb-4">
                <label for="halal_certified" class="block font-semibold">Nomor Sertifikat Halal</label>
                <input type="text" name="halal_certified" id="halal_certified" value="{{ old('halal_certified', $umkm->halal_certified) }}" class="w-full rounded border-gray-300">
            </div>

            <!-- Upload Logo UMKM -->
            <div class="mb-4">
                <label for="logo" class="block font-semibold">Logo UMKM</label>
                @if ($umkm->logo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $umkm->logo) }}" alt="Logo UMKM" class="h-20">
                </div>
                @endif
                <input type="file" name="logo" id="logo" class="w-full border-gray-300">
            </div>


            <div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>