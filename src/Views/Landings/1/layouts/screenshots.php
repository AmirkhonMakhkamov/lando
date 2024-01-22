<?php if (!empty($previewData['screenshots'][0])): ?>
	<section id="screens" class="relative z-20 pt-[110px]">
		<div class="container">
			<div class="wow fadeInUp mx-auto mb-10 max-w-[690px] text-center">
				<h2 class="mb-4 text-3xl font-bold text-black dark:text-white sm:text-4xl md:text-[44px] md:leading-tight">
					App Screenshots
				</h2>
			</div>
		</div>

		<div class="container">
			<div class="wow fadeInUp mx-auto max-w-[1000px]">
				<div class="swiper mySwiper relative z-20 swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
					<div class="absolute top-0 left-0 right-0 z-50 mx-auto w-full md:w-1/3">
						<img src="assets/images/mobile-frame.png" alt="mobile-frame" class="mx-auto max-w-full">
					</div>

					<div class="swiper-wrapper py-2" style="transform: translate3d(-148px, 0px, 0px); transition-duration: 0ms;">

						<?php foreach ($previewData['screenshots'] as $screenshot_key => $screenshot_value): ?>
							<div class="swiper-slide" style="width: 118px; margin-right: 30px;" data-swiper-slide-index="<?= $screenshot_key; ?>">
								<div class="mx-auto w-full max-w-[262px] xs:max-w-[265px]">
									<img src="include/image.php?image=<?= $screenshot_value; ?>" alt="screenshot" class="mx-auto w-full rounded-2xl" style="height: 573px!important; object-fit: cover;">
								</div>
							</div>
						<?php endforeach; ?>

					</div>

					<div class="flex items-center justify-center space-x-4 pt-20">
						<button class="swiper-button-prev">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_46_342)">
									<path d="M6.52334 10.8334L10.9933 15.3034L9.81501 16.4817L3.33334 10L9.815 3.51836L10.9933 4.69669L6.52334 9.16669L16.6667 9.16669L16.6667 10.8334L6.52334 10.8334Z" fill="currentColor"></path>
								</g>

								<defs>
									<clipPath id="clip0_46_342">
										<rect width="20" height="20" fill="white" transform="translate(20 20) rotate(180)"></rect>
									</clipPath>
								</defs>
							</svg>
						</button>

						<button class="swiper-button-next">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_46_337)">
									<path d="M13.4767 9.16664L9.00667 4.69664L10.185 3.51831L16.6667 9.99998L10.185 16.4816L9.00667 15.3033L13.4767 10.8333H3.33334V9.16664H13.4767Z" fill="currentColor"></path>
								</g>

								<defs>
									<clipPath id="clip0_46_337">
										<rect width="20" height="20" fill="white"></rect>
									</clipPath>
								</defs>
							</svg>
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="absolute left-0 top-0 -z-10">
			<svg width="95" height="190" viewBox="0 0 95 190" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cy="95" r="77" stroke="url(#paint0_linear_47_26)" stroke-width="36"></circle>
				<defs>
				 	<linearGradient id="paint0_linear_47_26" x1="-117.84" y1="190" x2="117.828" y2="25.9199" gradientUnits="userSpaceOnUse">
				 		<stop stop-color="#8EA5FE" class="svg_stop_color_blue-1"></stop>
				 		<stop offset="0.541667" stop-color="#BEB3FD" class="svg_stop_color_blue-2"></stop>
				 		<stop offset="1" stop-color="#90D1FF" class="svg_stop_color_blue-3"></stop>
				 	</linearGradient>
				</defs>
			</svg>
		</div>
	</section>
<?php endif; ?>