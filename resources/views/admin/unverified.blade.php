<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">UMKM Belum Diverifikasi</h2>
                    <p class="text-sm text-gray-500">Kelola dan verifikasi pendaftaran UMKM baru</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-sm text-gray-500">{{ now()->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</span>
                @if(isset($umkms) && count($umkms) > 0)
                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full">
                    {{ count($umkms) }} menunggu verifikasi
                </span>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-6 space-y-6">
        <!-- Enhanced Notifications -->
        @if(session('success'))
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-400 p-4 rounded-r-lg shadow-sm" role="alert" id="success-alert">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
                <button type="button" class="text-green-400 hover:text-green-600 transition-colors" onclick="closeAlert('success-alert')">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-400 p-4 rounded-r-lg shadow-sm" role="alert" id="error-alert">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
                <button type="button" class="text-red-400 hover:text-red-600 transition-colors" onclick="closeAlert('error-alert')">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        @endif

        <!-- Filter and Search -->
        <div class="bg-white shadow-sm rounded-lg p-4">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-3 sm:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari nama UMKM atau pemilik..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <select id="sortSelect" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="name">Nama A-Z</option>
                    </select>
                </div>
                <div class="flex items-center space-x-3">
                    @if(isset($umkms) && count($umkms) > 0)
                    <button onclick="verifyAllSelected()" id="verifyAllBtn"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Verifikasi Terpilih
                    </button>
                    @endif
                    <button onclick="refreshData()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Refresh
                    </button>
                </div>
            </div>
        </div>

        <!-- Enhanced Table -->
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full" id="umkmTable">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">
                                <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center space-x-1">
                                    <span>Informasi UMKM</span>
                                </div>
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pemilik
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Daftar
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="umkmTableBody">
                        @forelse($umkms as $index => $umkm)
                        <tr class="hover:bg-gray-50 transition-colors duration-150" data-umkm-id="{{ $umkm->id }}">
                            <td class="px-4 py-4">
                                <input type="checkbox" class="umkm-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    value="{{ $umkm->id }}">
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                            <span class="text-white font-medium text-sm">
                                                {{ strtoupper(substr($umkm->name, 0, 2)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $umkm->name }}</div>
                                        @if(isset($umkm->category))
                                        <div class="text-sm text-gray-500">{{ $umkm->category }}</div>
                                        @endif
                                        @if(isset($umkm->address))
                                        <div class="text-xs text-gray-400 max-w-xs truncate">{{ $umkm->address }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8">
                                        <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">{{ $umkm->user->name ?? '-' }}</div>
                                        @if(isset($umkm->user->email))
                                        <div class="text-sm text-gray-500">{{ $umkm->user->email }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-500">
                                <div class="flex flex-col">
                                    <span>{{ $umkm->created_at->timezone('Asia/Jakarta')->format('d M Y') }}</span>
                                    <span class="text-xs text-gray-400">{{ $umkm->created_at->diffForHumans() }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Menunggu Verifikasi
                                </span>
                            </td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.umkm.show', $umkm->id) }}"
                                        class="text-blue-600 hover:text-blue-900 font-medium text-sm transition-colors">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Detail
                                    </a>
                                    <button onclick="showVerificationModal({{ $umkm->id }}, '{{ addslashes($umkm->name) }}')"
                                        class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Verifikasi
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Semua UMKM sudah diverifikasi!</h3>
                                    <p class="text-gray-500 text-center max-w-sm">
                                        Tidak ada UMKM yang menunggu verifikasi saat ini. Halaman akan otomatis diperbarui ketika ada pendaftaran baru.
                                    </p>
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                        Kembali ke Dashboard
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination (if needed) -->
        @if(isset($umkms) && method_exists($umkms, 'links'))
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-b-lg">
            {{ $umkms->links() }}
        </div>
        @endif
    </div>

    <!-- Verification Modal -->
    <div id="verificationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border max-w-md shadow-lg rounded-lg bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Konfirmasi Verifikasi</h3>
                <div class="mt-4 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Apakah Anda yakin ingin memverifikasi UMKM "<span id="umkmName" class="font-medium"></span>"?
                    </p>
                    <p class="text-xs text-gray-400 mt-2">
                        Tindakan ini akan mengaktifkan UMKM dan memberikan akses penuh kepada pemilik.
                    </p>
                </div>
                <div class="flex items-center justify-center px-4 py-3 space-x-3">
                    <button id="confirmVerification"
                        class="px-6 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors">
                        Ya, Verifikasi
                    </button>
                    <button id="cancelVerification"
                        class="px-6 py-2 bg-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden z-40">
        <div class="bg-white rounded-lg p-6 flex items-center space-x-3">
            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600"></div>
            <span class="text-gray-700">Memproses verifikasi...</span>
        </div>
    </div>

    @push('scripts')
    <script>
        let currentUmkmId = null;
        let selectedUmkms = [];

        // Modal functions
        function showVerificationModal(umkmId, umkmName) {
            currentUmkmId = umkmId;
            document.getElementById('umkmName').textContent = umkmName;
            document.getElementById('verificationModal').classList.remove('hidden');
        }

        function hideVerificationModal() {
            document.getElementById('verificationModal').classList.add('hidden');
            currentUmkmId = null;
        }

        // Verification functions
        function verifyUmkm(umkmId) {
            document.getElementById('loadingOverlay').classList.remove('hidden');

            fetch(`/admin/umkm/${umkmId}/verify`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('loadingOverlay').classList.add('hidden');
                    if (data.success) {
                        showToast('UMKM berhasil diverifikasi!', 'success');
                        // Remove row from table
                        document.querySelector(`tr[data-umkm-id="${umkmId}"]`).remove();
                        updateStats();
                    } else {
                        showToast('Gagal memverifikasi UMKM!', 'error');
                    }
                })
                .catch(error => {
                    document.getElementById('loadingOverlay').classList.add('hidden');
                    showToast('Terjadi kesalahan!', 'error');
                });
        }

        function verifyAllSelected() {
            if (selectedUmkms.length === 0) return;

            if (confirm(`Verifikasi ${selectedUmkms.length} UMKM terpilih?`)) {
                document.getElementById('loadingOverlay').classList.remove('hidden');

                Promise.all(selectedUmkms.map(id =>
                        fetch(`/admin/umkm/${id}/verify`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                            },
                        })
                    ))
                    .then(() => {
                        document.getElementById('loadingOverlay').classList.add('hidden');
                        showToast(`${selectedUmkms.length} UMKM berhasil diverifikasi!`, 'success');
                        selectedUmkms.forEach(id => {
                            document.querySelector(`tr[data-umkm-id="${id}"]`).remove();
                        });
                        selectedUmkms = [];
                        updateCheckboxes();
                        updateStats();
                    })
                    .catch(error => {
                        document.getElementById('loadingOverlay').classList.add('hidden');
                        showToast('Terjadi kesalahan!', 'error');
                    });
            }
        }

        // Search and filter functions
        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const sortBy = document.getElementById('sortSelect').value;
            const rows = Array.from(document.querySelectorAll('#umkmTableBody tr[data-umkm-id]'));

            // Filter
            rows.forEach(row => {
                const umkmName = row.querySelector('td:nth-child(2) .text-sm.font-medium').textContent.toLowerCase();
                const ownerName = row.querySelector('td:nth-child(3) .text-sm.font-medium').textContent.toLowerCase();

                if (umkmName.includes(searchTerm) || ownerName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Sort visible rows
            const visibleRows = rows.filter(row => row.style.display !== 'none');

            visibleRows.sort((a, b) => {
                switch (sortBy) {
                    case 'name':
                        const nameA = a.querySelector('td:nth-child(2) .text-sm.font-medium').textContent;
                        const nameB = b.querySelector('td:nth-child(2) .text-sm.font-medium').textContent;
                        return nameA.localeCompare(nameB);
                    case 'oldest':
                        const dateA = new Date(a.querySelector('td:nth-child(4) span').textContent);
                        const dateB = new Date(b.querySelector('td:nth-child(4) span').textContent);
                        return dateA - dateB;
                    default: // newest
                        const dateC = new Date(a.querySelector('td:nth-child(4) span').textContent);
                        const dateD = new Date(b.querySelector('td:nth-child(4) span').textContent);
                        return dateD - dateC;
                }
            });

            // Reorder in DOM
            const tbody = document.getElementById('umkmTableBody');
            visibleRows.forEach(row => tbody.appendChild(row));
        }

        // Checkbox functions
        function updateCheckboxes() {
            const checkboxes = document.querySelectorAll('.umkm-checkbox');
            const selectAllCheckbox = document.getElementById('selectAll');
            const verifyAllBtn = document.getElementById('verifyAllBtn');

            selectedUmkms = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            selectAllCheckbox.checked = checkboxes.length > 0 && selectedUmkms.length === checkboxes.length;
            selectAllCheckbox.indeterminate = selectedUmkms.length > 0 && selectedUmkms.length < checkboxes.length;

            if (verifyAllBtn) {
                verifyAllBtn.disabled = selectedUmkms.length === 0;
                verifyAllBtn.textContent = `Verifikasi Terpilih (${selectedUmkms.length})`;
            }
        }

        // Utility functions
        function showToast(message, type = 'success') {
            // Create toast notification
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
                type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
            }`;
            toast.textContent = message;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        function updateStats() {
            // Update header count
            const remaining = document.querySelectorAll('#umkmTableBody tr[data-umkm-id]').length;
            const badge = document.querySelector('.bg-yellow-100');
            if (badge && remaining === 0) {
                badge.remove();
            } else if (badge) {
                badge.textContent = `${remaining} menunggu verifikasi`;
            }
        }

        function refreshData() {
            location.reload();
        }

        function closeAlert(alertId) {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Modal events
            document.getElementById('confirmVerification').addEventListener('click', function() {
                if (currentUmkmId) {
                    hideVerificationModal();
                    verifyUmkm(currentUmkmId);
                }
            });

            document.getElementById('cancelVerification').addEventListener('click', hideVerificationModal);

            // Search and filter events
            document.getElementById('searchInput').addEventListener('input', filterTable);
            document.getElementById('sortSelect').addEventListener('change', filterTable);

            // Checkbox events
            document.getElementById('selectAll').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.umkm-checkbox');
                checkboxes.forEach(cb => cb.checked = this.checked);
                updateCheckboxes();
            });

            document.querySelectorAll('.umkm-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', updateCheckboxes);
            });

            // Initialize
            updateCheckboxes();

            // Auto-hide success notification
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.opacity = '0';
                    setTimeout(function() {
                        successAlert.remove();
                    }, 300);
                }, 5000);
            }

            // Close modal when clicking outside
            document.getElementById('verificationModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    hideVerificationModal();
                }
            });

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    hideVerificationModal();
                }
                if (e.ctrlKey || e.metaKey) {
                    switch (e.key) {
                        case 'a':
                            e.preventDefault();
                            document.getElementById('selectAll').click();
                            break;
                        case 'Enter':
                            if (selectedUmkms.length > 0) {
                                e.preventDefault();
                                verifyAllSelected();
                            }
                            break;
                        case 'r':
                            e.preventDefault();
                            refreshData();
                            break;
                    }
                }
            });

            // Auto-refresh every 5 minutes
            setInterval(function() {
                const notification = document.createElement('div');
                notification.className = 'fixed bottom-4 right-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
                notification.textContent = 'Memeriksa data terbaru...';
                document.body.appendChild(notification);

                setTimeout(() => {
                    notification.remove();
                    // In real implementation, you would check for new data via AJAX
                    // For now, we'll just show the notification
                }, 2000);
            }, 300000); // 5 minutes

            // Tooltips for buttons
            const tooltips = [{
                    selector: '#verifyAllBtn',
                    text: 'Ctrl+Enter untuk verifikasi semua terpilih'
                },
                {
                    selector: '.bg-blue-600',
                    text: 'Ctrl+R untuk refresh data'
                },
                {
                    selector: '#selectAll',
                    text: 'Ctrl+A untuk pilih semua'
                }
            ];

            tooltips.forEach(tooltip => {
                const element = document.querySelector(tooltip.selector);
                if (element) {
                    element.title = tooltip.text;
                }
            });
        });

        // Progressive Web App features
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(registration => console.log('SW registered'))
                .catch(error => console.log('SW registration failed'));
        }

        // Performance monitoring
        function logPerformance() {
            if (window.performance && window.performance.timing) {
                const loadTime = window.performance.timing.loadEventEnd - window.performance.timing.navigationStart;
                console.log(`Page load time: ${loadTime}ms`);
            }
        }

        window.addEventListener('load', logPerformance);
    </script>
    @endpush

    @push('styles')
    <style>
        /* Custom scrollbar */
        .overflow-x-auto::-webkit-scrollbar {
            height: 8px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Smooth transitions */
        .transition-colors {
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out;
        }

        /* Loading animation */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        /* Hover effects */
        .hover\:bg-gray-50:hover {
            background-color: #f9fafb;
        }

        /* Focus styles */
        .focus\:ring-2:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            box-shadow: 0 0 0 2px #3b82f6;
        }

        .focus\:ring-blue-500:focus {
            box-shadow: 0 0 0 2px #3b82f6;
        }

        .focus\:ring-green-500:focus {
            box-shadow: 0 0 0 2px #10b981;
        }

        .focus\:ring-gray-300:focus {
            box-shadow: 0 0 0 2px #d1d5db;
        }

        .focus\:border-transparent:focus {
            border-color: transparent;
        }

        /* Checkbox styles */
        input[type="checkbox"]:indeterminate {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M4 8h8'/%3e%3c/svg%3e");
            border-color: #3b82f6;
            background-color: #3b82f6;
        }

        /* Modal backdrop blur */
        .modal-backdrop {
            backdrop-filter: blur(4px);
        }

        /* Notification animations */
        .notification-enter {
            animation: slideInRight 0.3s ease-out;
        }

        .notification-exit {
            animation: slideOutRight 0.3s ease-in;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        /* Table row animations */
        tbody tr {
            transition: all 0.2s ease-in-out;
        }

        tbody tr:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Button loading state */
        .btn-loading {
            position: relative;
            color: transparent;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 50%;
            margin-left: -8px;
            margin-top: -8px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-right-color: transparent;
            animation: spin 1s linear infinite;
        }

        /* Responsive improvements */
        @media (max-width: 640px) {
            .table-container {
                font-size: 14px;
            }

            .table-container th,
            .table-container td {
                padding: 8px 12px;
            }

            .btn-group {
                flex-direction: column;
                width: 100%;
            }

            .btn-group>* {
                width: 100%;
                margin-bottom: 8px;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .dark-mode {
                background-color: #1f2937;
                color: #f9fafb;
            }

            .dark-mode .bg-white {
                background-color: #374151;
            }

            .dark-mode .text-gray-900 {
                color: #f9fafb;
            }

            .dark-mode .text-gray-500 {
                color: #9ca3af;
            }

            .dark-mode .border-gray-200 {
                border-color: #4b5563;
            }
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none !important;
            }

            .table-container {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            tbody tr:hover {
                background-color: transparent !important;
                transform: none !important;
                box-shadow: none !important;
            }
        }
    </style>
    @endpush
</x-admin-layout>