				<div id="sidebar1" class="sidebar threecol last clearfix" role="complementary">
				
					<?php get_search_form(); ?>

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="help">
						
							<p>Por favor, ative alguns widgets.</p>
						
						</div>

					<?php endif; ?>

				</div>