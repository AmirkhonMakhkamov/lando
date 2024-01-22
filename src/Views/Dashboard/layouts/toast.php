<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast bg-primary-subtle border-primary" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="lni lni-checkmark font-12 bg-primary text-light p-2 rounded-circle d-block me-2"></i>
                    <span class="d-block" id="successToastMsg"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>

<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="errorToast" class="toast bg-danger-subtle border-danger" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="lni lni-bug font-12 bg-danger text-light p-2 rounded-circle d-block me-3"></i>
                    <span class="d-block" id="errorToastMsg">
                        Something went wrong.<br/>Please try again later.
                    </span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>