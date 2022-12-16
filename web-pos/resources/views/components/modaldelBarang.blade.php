<div class="modal fade" id="modalDEL{{ $product->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header"><span
                    class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                        class="bx bxs-trash fs-6"></i></span>
                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Penhapusan <span class="text-danger"><strong>Permanen</strong></span> </p>
                <div>
                    <p class="mb-0">Apakah anda yakin ingin menghapus data produk
                    </p><strong class="text-danger">{{ $product->namaPrd }} &nbsp?</strong>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <form action="produk/destroy/{{ $product->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>

                </form>
            </div>
        </div>
    </div>
</div>
