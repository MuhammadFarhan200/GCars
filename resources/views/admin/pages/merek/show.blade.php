<div class="modal fade" id="showMerek-{{ $merek->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Merek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Merek</label>
                    <input type="text" class="form-control" name="nama" value="{{ $merek->nama }}"
                        id="" readonly>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $merek->slug }}"
                        id="" readonly>
                </div>
                <div class="form-group">
                    <label for="">Jumlah mobil dengan merek <b>{{ $merek->nama }}</b></label>
                    <input type="number" class="form-control" value="{{ $merek->mobil->count() }}"
                        id="" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
