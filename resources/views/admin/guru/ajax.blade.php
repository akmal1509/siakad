<div class="form-group">
    <label for="guru_id">Guru</label>
    <select id="guru_id" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror select2bs4">
        <option value="">-- Pilih Guru --</option>
        @foreach ($guru as $data)
            <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
        @endforeach
    </select>
</div>
