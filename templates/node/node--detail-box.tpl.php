<div class="four columns">

	<div class="detail-box">

		<div class="detail-entry">

			<i class="detail-icon <?php print render($content['field_detail_icon']); ?>"></i>

			<h5><?php print render($content['field_detail_caption']); ?></h5>

			<p>
				<?php print render($content['field_detail_info']); ?>
			</p>

		</div><!--/ .detail-entry-->

		<div data-color-state="<?php if (render($content['field_detail_color'])): ?>#<?php print render($content['field_detail_color']); ?> <?php endif; ?>" data-color-hover="" class="transform"></div>

	</div><!--/ .detail-box-->

</div><!--/ .columns-->