<div
    class="modal fade"
    id="loginModal"
    tabindex="-1"
    aria-labelledby="loginModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-5 border-0 bg-light">
            <div class="modal-body p-4">
                <div class="text-center">
                    <a
                    type="button"
                    class="btn bg-white border d-flex w-100 py-2 align-items-center justify-content-center"
                    href="<?= $googleAuthLink ?>" onclick="clearBeforeunload()">
                        <img
                        src="public/assets/img/home/login/google.png"
                        width="25"
                        class="d-block">
                        <span class="d-block px-3">
                            Continue with Google
                        </span>
                    </a>

                    <a
                    type="button"
                    class="btn bg-dark text-white border d-flex w-100 py-2 mt-3 align-items-center justify-content-center"
                    href="javascript:;" onclick="clearBeforeunload()">
                        <i class="lni lni-apple-brand text-white font-25"></i>
                        <span class="d-block px-3">
                            Continue with Apple
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>