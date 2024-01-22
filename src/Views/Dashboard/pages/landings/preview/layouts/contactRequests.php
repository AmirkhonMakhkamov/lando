<div
	class="offcanvas offcanvas-end border-0"
	tabindex="-1" id="offcanvas-contactRequests"
	aria-labelledby="offcanvas-contactRequests-label"
	>
	<div class="offcanvas-header">
	  	<h5
	  		class="offcanvas-title"
	  		id="offcanvas-contactRequests-label">
	  		Contact Requests
	  	</h5>
	  	<div>
	  		<button
	  			type="button" class="btn btn-light border-0 p-2"
	  			class="btn-close"
	  			data-bs-dismiss="offcanvas"
	  			aria-label="Close"
	  		>
	  			<i class="lni lni-close font-15 d-block"></i>
	  		</button>
	  	</div>
	</div>
	<div class="offcanvas-body">
		<div class="contactRequests--content">

			<?php if ($contactRequestsData->num_rows > 0): ?>
				<?php while ($contactRequestsRow = $contactRequestsData->fetch_assoc()): ?>
					<div class="card border border-light rounded-3 mb-3">
						<div class="card-body">
							<h6>
								<?= htmlspecialchars($contactRequestsRow["name_contactRequest"]) ?>
							</h6>
							<a href="mailto:<?= htmlspecialchars($contactRequestsRow["email_contactRequest"]) ?>" class="text-primary">
								<?= htmlspecialchars($contactRequestsRow["email_contactRequest"]) ?>
							</a>
							<p class="mt-2">
								<?= htmlspecialchars($contactRequestsRow["message_contactRequest"]) ?>
							</p>
							<small class="text-muted d-block mt-2">
								<?= htmlspecialchars($contactRequestsRow["date_contactRequestF"]) ?>
							</small>
							<div class="d-flex align-items-center mt-3">
								<a
									href="mailto:<?= htmlspecialchars($contactRequestsRow["email_contactRequest"]) ?>"
									class="btn hover border border-light px-3 rounded-3 d-flex align-items-center"
								>
									<i class="lni lni-envelope font-13 d-block me-2"></i>
									<span>Reply</span>
								</a>
							</div>

						</div>
					</div>
				<?php endwhile; ?>
			<?php else: ?>
			    <p class="text-center">No records found.</p>
			<?php endif; ?>

		</div>
	</div>
</div>
