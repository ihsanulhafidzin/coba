<!-- resources/views/handphones/index.blade.php -->
<h1>Daftar Handphone</h1>
<a href="{{ route('handphones.create') }}" class="btn btn-primary">Tambah Handphone</a>
<table>
    <thead>
        <tr>
            <th>Merek</th>
            <th>Warna</th>
            <th>Ram</th>
            <th>Harga</th>
            <th>Tipe</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($handphones as $handphone)
            <tr>
                <td>{{ $handphone->merek }}</td>
                <td>{{ $handphone->warna }}</td>
                <td>{{ $handphone->ram }}</td>
                <td>{{ $handphone->harga }}</td>
                <td>{{ $handphone->type->type }}</td>
                <td>

                    <a href="{{ route('handphones.edit', $handphone->id) }}">Edit</a>
                    <form action="{{ route('handphones.destroy', $handphone->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
