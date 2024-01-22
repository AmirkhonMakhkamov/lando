<div
class="modal fade"
id="publishModal"
tabindex="-1"
aria-labelledby="publishModalLabel"
aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-5 border-0">
            <div class="modal-body">
                <form method="POST" id="publishForm">

                    <input type="hidden" name="landingHash" value="<?= $landingHash; ?>">

                    <div class="px-lg-2 px-md-2 px-1 py-2">
                        <div class="mb-3">
                            <div class="input-group rounded-top-4 border border-light border-bottom-0 bg-light-subtle">
                                <span
                                    class="input-group-text rounded-top-4 border-0 ps-4 pe-1 text-muted  bg-light bg-none"
                                    id="basic-addon-internalDomain">
                                    preview.landoai.com/
                                </span>
                                <input
                                    type="text"
                                    class="form-control text-lowercase border-0 ps-0 rounded-top-4 bg-light no-focus bg-none py-3"
                                    name="internalDomain"
                                    id="internalDomain"
                                    autocomplete="off"
                                    value="<?= $previewDetails['title']; ?>"
                                    aria-describedby="basic-addon-internalDomain"
                                >
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary py-2 w-100 d-flex align-items-center justify-content-center m-0 rounded-top-0 rounded-bottom-4"
                                id="publishBtn"
                                form="publishForm"
                                >
                                <p class="fw-500">Publish</p>
                            </button>
                        </div>

                        <button
                            type="button"
                            class="btn hover border-0 w-100 text-center d-flex align-items-center justify-content-center"
                            >
                            <i class="bx bx-link d-block font-18 me-1"></i>
                            <p class="font-15">Connect Your Domain</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>