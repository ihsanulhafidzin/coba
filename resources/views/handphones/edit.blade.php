<!-- resources/views/handphones/edit.blade.php -->

<h1>Edit Handphone</h1>
<form action="{{ route('handphones.update', $handphone->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="merek">Merek:</label>
        <input type="text" name="merek" id="merek" value="{{ $handphone->merek }}">
    </div>
    <div>
        <label for="warna">Warna:</label>
        <input type="text" name="warna" id="warna" value="{{ $handphone->warna }}">
    </div>
    <div>
        <label for="ram">Ram:</label>
        <input type="text" name="ram" id="ram" value="{{ $handphone->ram }}">
    </div>
    <div>
        <label for="harga">Harga:</label>
        <input type="text" name="harga" id="harga" value="{{ $handphone->harga }}">
    </div>
    <div>
        <label for="type">Tipe:</label>
        <select name="type" id="type">
            @foreach ($tipes as $tipe)
                <option value="{{ $tipe->id }}" @if ($handphone->tipe_id == $tipe->id) selected @endif>
                    {{ $tipe->type }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit">Simpan Perubahan</button>
</form>
