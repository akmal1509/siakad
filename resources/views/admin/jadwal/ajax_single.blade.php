<div class="form-group">
    <label for="guru_id">Guru</label>
    <select id="guru_id" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror select2bs4">
        <option value="{{ $guru->guru->id }}">{{ $guru->guru->nama_guru }}</option>
    </select>
</div>
