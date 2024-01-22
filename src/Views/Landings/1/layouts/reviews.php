<?php if (!empty($previewData['reviews'][0])): ?>
	<section id="testimonials" class="relative z-10 pt-[110px] pb-[60px]">
		<div class="container">
			<div class="wow fadeInUp mx-auto mb-14 max-w-[690px] text-center lg:mb-[70px]">
				<h2 class="mb-4 text-3xl font-bold text-black dark:text-white sm:text-4xl md:text-[44px] md:leading-tight">
					What Users Say
				</h2>
			</div>
		</div>

		<div class="container overflow-hidden lg:max-w-[1160px]">
			<div class="-mx-6 flex flex-wrap">

				<?php foreach ($previewData['reviews'] as $review): ?>
				<div class="w-full px-6 lg:w-1/2">
				    <div class="wow fadeInUp mb-[50px] rounded-lg bg-white py-9 px-7 shadow-card dark:bg-dark dark:shadow-card-dark sm:px-9 lg:px-7 xl:px-9">
				        <div class="mb-5 border-b border-stroke dark:border-stroke-dark">
				            <p class="pb-9 text-base text-body"><?= $review['content']; ?></p>
				        </div>
				        <div class="items-center justify-between sm:flex lg:block xl:flex">
				            <div class="mb-3 flex items-center sm:mb-0 lg:mb-3 xl:mb-0">
				                <div class="mr-4 h-[56px] w-full max-w-[56px] rounded-full">
				                    <?php if (empty(trim($review['img']))): ?>
				                        <img src="assets/images/user-placeholder.png" alt="author" class="object-cover object-center rounded-full" width="60" height="60">
				                    <?php else: ?>
				                        <img src="include/image.php?image=<?= $review['img']; ?>" alt="author" class="object-cover object-center rounded-full" width="60" height="60">
				                    <?php endif; ?>
				                </div>
				                <div>
				                    <h5 class="text-base font-medium text-black dark:text-white text-capitalize"><?= $review['name']; ?></h5>
				                </div>
				            </div>
				            <div class="flex items-center space-x-3 sm:justify-end lg:justify-start xl:justify-end">
				                <div class="flex items-center space-x-[6px]">
				                    <?php 
				                    $rating = preg_match('/\d/', $review['rating'], $matches) ? $matches[0] : 0;

				                    for ($i = 0; $i < intval($rating); $i++): ?>
				                        <i class="bx bxs-star text-[22px] text-warning"></i>
				                    <?php endfor;

				                    for ($i = 0; $i < (5 - intval($rating)); $i++): ?>
				                        <i class="bx bxs-star text-[22px] text-light"></i>
				                    <?php endfor; ?>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
				<?php endforeach; ?>
			
			</div>
		</div>
	</section>
<?php endif; ?>