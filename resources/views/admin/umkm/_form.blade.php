<form action="{{ isset($umkm) ? route('admin.umkm.update', $umkm->id) : route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($umkm))
    @method('PUT')
    @endif

    <!-- Nama Pemilik -->
    <div class="mb-4">
        <label for="owner_name" class="block font-medium">Nama Pemilik</label>
        <input type="text" name="owner_name" id="owner_name" class="w-full border rounded px-3 py-2"
            value="{{ old('owner_name', $umkm->owner_name ?? '') }}" required>
        @error('owner_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <!-- Nama UMKM -->
    <div class="mb-4">
        <label for="name" class="block font-medium">Nama UMKM</label>
        <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2"
            value="{{ old('name', $umkm->name ?? '') }}" required>
        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <!-- Alamat -->
    <div class="mb-4">
        <label for="address" class="block font-medium">Alamat</label>
        <textarea name="address" id="address" rows="3" class="w-full border rounded px-3 py-2" required>{{ old('address', $umkm->address ?? '') }}</textarea>
        @error('address') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <!-- Nomor Telepon -->
    <div class="mb-4">
        <label for="phone" class="block font-medium">Nomor HP / WhatsApp</label>
        <input type="text" name="phone" id="phone" class="w-full border rounded px-3 py-2"
            value="{{ old('phone', $umkm->phone ?? '') }}" required>
        @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <!-- Jenis Usaha -->
    <div class="mb-4">
        <label for="business_type_id" class="block font-medium">Jenis Usaha</label>
        <select name="business_type_id" id="business_type_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih Jenis Usaha --</option>
            @foreach($businessTypes as $type)
            <option value="{{ $type->id }}" {{ old('business_type_id', $umkm->business_type_id ?? '') == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
            @endforeach
        </select>
        @error('business_type_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <!-- NIB -->
    <div class="mb-4">
        <label for="nib" class="block font-medium">NIB (Nomor Induk Berusaha)</label>
        <input type="text" name="nib" id="nib" class="w-full border rounded px-3 py-2"
            value="{{ old('nib', $umkm->nib ?? '') }}">
        @error('nib') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <!-- No. Sertifikat Halal -->
    <div class="mb-4">
        <label for="halal_cert_number" class="block font-medium">Nomor Sertifikat Halal</label>
        <input type="text" name="halal_cert_number" id="halal_cert_number" class="w-full border rounded px-3 py-2"
            value="{{ old('halal_cert_number', $umkm->halal_cert_number ?? '') }}">
        @error('halal_cert_number') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <!-- Logo (opsional) -->
    <div class="mb-4">
        <label for="logo" class="block font-medium">Upload Logo (Opsional)</label>
        <input type="file" name="logo" id="logo" class="w-full border rounded px-3 py-2">
        @if(isset($umkm) && $umkm->logo)
        <p class="mt-2 text-sm">Logo saat ini: <a href="{{ asset('storage/logos/' . $umkm->logo) }}" target="_blank" class="text-blue-500 underline">Lihat Logo</a></p>
        @endif
        @error('logo') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <!-- Submit -->
    <div class="mt-6">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
    </div>
</form>