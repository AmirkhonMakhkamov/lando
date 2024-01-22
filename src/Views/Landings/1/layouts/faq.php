<?php if (!empty($previewData['faq'][0])): ?>
	<section id="faq" class="relative z-10 bg-[#F8FAFB] py-[110px] dark:bg-[#15182B]">
		<div class="container">
			<div class="wow fadeInUp mx-auto mb-14 max-w-[690px] text-center lg:mb-[70px]">
				<h2 class="mb-4 text-3xl font-bold text-black dark:text-white sm:text-4xl md:text-[44px] md:leading-tight">
					Frequently Asked Questions
				</h2>
				<p class="text-base text-body">
					Got questions about <?= $previewData['title_first']; ?>? Find quick answers here. Can't find what you're looking for? Contact our support team for help.
				</p>
			</div>

			<div class="faqs wow fadeInUp mx-auto w-full max-w-[785px] rounded-lg bg-white px-6 py-[6px] shadow-card dark:bg-black dark:shadow-card-dark">

				<?php foreach ($previewData['faq'] as $faq): ?>
					<div class="faq border-b border-stroke last-of-type:border-none dark:border-stroke-dark">
						<button class="faq-btn relative flex w-full justify-between py-6 px-[18px] text-left text-base font-medium text-black dark:text-white sm:px-[26px] sm:text-lg">
							<?= $faq['question']; ?>
						</button>

						<div class="faq-content h-auto overflow-hidden border-t border-stroke px-[18px] dark:border-stroke-dark sm:px-[26px]">
							<p class="text-base text-body">
								<?= $faq['answer']; ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
		</div>

		<div class="absolute right-0 -top-24 -z-10">
			<svg width="95" height="190" viewBox="0 0 95 190" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="95" cy="95" r="77" stroke="url(#paint0_linear_49_603)" stroke-width="36"></circle>
				<defs>
					<linearGradient id="paint0_linear_49_603" x1="0" y1="0" x2="224.623" y2="130.324" gradientUnits="userSpaceOnUse">
						<stop stop-color="#FF8FE8" class="svg_stop_color_pink-1"></stop>
						<stop offset="1" stop-color="#FFC960" class="svg_stop_color_pink-2"></stop>
					</linearGradient>
				</defs>
			</svg>
		</div>

		<div class="absolute left-0 bottom-0 -z-10">
			<svg width="95" height="190" viewBox="0 0 95 190" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cy="95" r="77" stroke="url(#paint0_linear_52_83)" stroke-width="36"></circle>
				<defs>
					<linearGradient id="paint0_linear_52_83" x1="-117.84" y1="190" x2="117.828" y2="25.9199" gradientUnits="userSpaceOnUse">
						<stop stop-color="#8EA5FE" class="svg_stop_color_blue-1"></stop>
						<stop offset="0.541667" stop-color="#BEB3FD" class="svg_stop_color_blue-2"></stop>
						<stop offset="1" stop-color="#90D1FF" class="svg_stop_color_blue-3"></stop>
					</linearGradient>
				</defs>
			</svg>
		</div>
	</section>
<?php endif; ?>