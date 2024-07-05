<!-- resources/views/categories/edit.blade.php -->
<h2>Edit TYPE</h2>
<form action="/tipe/{{ $tipe->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="type">TYPE:</label>
        <textarea name="type" class="form-control" placeholder="Enter type">{{ $tipe->type }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
