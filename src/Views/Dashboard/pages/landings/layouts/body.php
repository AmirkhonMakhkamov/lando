<div class="py-3">
	<div class="container">
		<div class="row">
			<?php if ($myLandingsData->num_rows > 0): ?>
				<?php while ($myLandingsRow = $myLandingsData->fetch_assoc()): ?>
					<div class="col-lg-4 col-md-4 col-12 mb-3 align-self-center">
						<div class="border border-light rounded-3 p-3 bg-white">
							<div class="d-flex align-items-center mb-2">
								<img
								src="<?= htmlspecialchars($myLandingsRow["logo_landing"]) ?>"
								width="70"
								class="rounded-3 d-block">
								<div class="px-4">
									<span class="font-20 show2lines">
										<?= htmlspecialchars($myLandingsRow["title_landing"]) ?>
									</span>
									<small class="text-muted show3lines pt-2">
										<?= htmlspecialchars($myLandingsRow["pageDescription_landing"]) ?>
									</small>
								</div>
							</div>

							<div class="d-flex align-items-center justify-content-between mt-3">
								<button
									type="button"
									class="btn hover border border-light px-3 d-flex align-items-center"
									onclick="
										deleteLandingModal(
											$(this),
											'<?= htmlspecialchars($myLandingsRow["id_landing"]) ?>',
											'<?= htmlspecialchars($myLandingsRow["title_landing"]) ?>'
										)
									"
									>
									<i class="lni lni-trash-can font-13 d-block me-2"></i>
									<span>Delete</span>
								</button>

								<button
									type="button"
									class="btn hover border border-light px-3 d-flex align-items-center"
									onclick="new_preview_id('<?= htmlspecialchars($myLandingsRow["hash_landing"]) ?>')"
									>
									<i class="lni lni-control-panel font-13 d-block me-2"></i>
									<span>Details</span>
								</button>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php
			// $myLandingsView->getLandings($myLandingsController->getLandings())
			?>
		</div>
	</div>

	<div class="modal fade" id="deleteLandingModal" tabindex="-1" aria-labelledby="deleteLandingModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered">
			<div class="modal-content rounded-4 border-0 p-2">
				<div class="modal-body p-3">
					<h5 class="mb-2">
				    	Delete landing
				    </h5>

				    <span class="text-muted">
				    	Are you sure you want to delete this landing?
				    </span>

				    <small class="d-block mt-2 font-monospace text-primary o7" id="deleteLandingConfirmTitle">
				    	
				    </small>

				    <div class="mt-3 d-flex justify-content-between">
				    	<button
				    		type="button"
				    		class="btn btn-danger w-100 me-1 d-flex justify-content-center align-items-center"
				    		id="deleteLandingConfirmBtn"
				    		onclick="deleteLanding($(this));"
				    		data-lid=""
				    		>
				    		<i class="lni lni-trash-can font-15 d-block me-1"></i>
				    		<span class="d-block">Delete</span>
				    	</button>

				    	<button
				    		type="button"
				    		class="btn hover border ms-1 border-light w-100"
				    		data-bs-dismiss="modal"
				    		>
				    		<span>Cancel</span>
				    	</button>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>