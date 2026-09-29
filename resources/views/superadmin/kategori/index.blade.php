@extends('layouts.superadmin')

@section('title', 'Kelola Kategori')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Kategori</h2>
        <a href="{{ route('superadmin.kategori.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="card shadow card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategori as $index => $k)
                            <tr>
                                <td>{{ $kategori->firstItem() + $index }}</td>
                                <td><strong>{{ $k->nama_kategori }}</strong></td>
                                <td class="text-center" style="width: 150px;">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('superadmin.kategori.edit', $k->id) }}" class="btn btn-sm btn-warning text-dark">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('superadmin.kategori.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?');">
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
                                <td colspan="3" class="text-center text-muted py-4">Belum ada kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3 d-flex justify-content-end">
                {{ $kategori->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
