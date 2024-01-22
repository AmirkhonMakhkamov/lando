<?php
class MyLandingsView {
	public function getLandings($result){
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
			    echo '
			    	<div class="col-lg-4 col-md-4 col-12 mb-3 align-self-center">
			    		<div class="border border-light rounded-3 p-3 bg-white">
			    			<div class="d-flex align-items-center mb-2">
			    				<img src="'.$row["logo_landing"].'" width="70" class="rounded-3 d-block">
			    				<div class="px-4">
			    					<span class="font-20 show2lines">
			    						'.$row["title_landing"].'
			    					</span>
			    					<small class="text-muted show3lines pt-2">
			    						'.$row["pageDescription_landing"].'
			    					</small>
			    				</div>
			    			</div>

			    			<div class="d-flex align-items-center justify-content-between mt-3">
			    				<button
			    					type="button"
			    					class="btn hover border border-light px-3 d-flex align-items-center"
			    					onclick="deleteLandingModal($(this), \''.$row["id_landing"].'\', \''.$row["title_landing"].'\')"
			    					>
			    					<i class="lni lni-trash-can font-13 d-block me-2"></i>
			    					<span>Delete</span>
			    				</button>

			    				<button
			    					type="button"
			    					class="btn hover border border-light px-3 d-flex align-items-center"
			    					onclick="new_preview_id(\''.$row["hash_landing"].'\')"
			    					>
			    					<i class="lni lni-eye font-13 d-block me-2"></i>
			    					<span>Preview</span>
			    				</button>
			    			</div>
			    		</div>
			    	</div>
			    ';
			}
		}else{
			echo '
				<div class="col-12">
					<div class="bg-white border border-light rounded-3">
						<div class="py-5 my-5 text-center">
							<img src="../public/assets/img/shared/404.png" width="120">
							<h6 class="mt-3">Landings not found</h6>
							<h6 class="text-muted font-15 mt-2">You dont have any landings yet</h6>

							<button
								type="button"
								class="btn btn-success text-dark py-2 px-4 mt-4 fw-500"
								onclick="new_landing();"
								>
								<span class="">New Landing</span>
							</button>
						</div>
					</div>
				</div>
			';
		}
	}
}