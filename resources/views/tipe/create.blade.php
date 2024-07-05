<h2>Add Tipe</h2>
<form action="/tipes" method="POST">
    @csrf
    <div class="form-group">
        <label for="type">Type:</label>
        <input type="text" name="type" class="form-control" placeholder="Enter name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
