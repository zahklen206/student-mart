@extends('layouts.superadmin')

@section('title', 'Kelola Admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Akun Admin</h2>
        <a href="{{ route('superadmin.admin.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus me-1"></i> Tambah Admin
        </a>
    </div>

    <div class="card shadow card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Bergabung Sejak</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $index => $admin)
                            <tr>
                                <td>{{ $admins->firstItem() + $index }}</td>
                                <td><strong>{{ $admin->name }}</strong></td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->created_at->format('d M Y') }}</td>
                                <td class="text-center" style="width: 150px;">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('superadmin.admin.edit', $admin->id) }}" class="btn btn-sm btn-warning text-dark">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('superadmin.admin.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun admin ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada akun admin terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3 d-flex justify-content-end">
                {{ $admins->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
