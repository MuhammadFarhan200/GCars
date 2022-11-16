<div class="modal fade" id="editMerek-{{ $merek->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('merek.update', $merek->id) }}" method="post">
        @csrf
        @method('put')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Merek</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Merek</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $merek->nama }}"
              required autocomplete="off">
            @error('nama')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Slug</label>
            <input type="text" id="slug" readonly class="form-control" value="{{ $merek->slug }}">
            @error('slug')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.querySelector('#nama').addEventListener('keyup', function() {
    document.querySelector('#slug').value = this.value.toLowerCase()
      .trim()
      .replace(/[^\w\s-]/g, '')
      .replace(/[\s_-]+/g, '-')
      .replace(/^-+|-+$/g, '');
  });
</script>
