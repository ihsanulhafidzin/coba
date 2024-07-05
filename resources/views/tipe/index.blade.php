<!-- resources/views/categories/index.blade.php -->
<h2>Tipe</h2>
<a href="/tipes/create" class="btn btn-primary mb-2">Add Category</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tipe as $tipe)
            <tr>
                <td>{{ $tipe->id }}</td>
                <td>{{ $tipe->type }}</td>
                <td>

                    <a href="/tipe/{{ $tipe->id }}/edit" class="btn btn-sm btn-
info">Edit</a>

                    <form action="/tipe/{{ $tipe->id }}" method="POST" style="display:
inline">
                        @csrf

                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
