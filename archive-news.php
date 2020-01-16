<?php
/**
 * Template Name: archive-news

 */

?>

<?php get_header(); ?>

<main class="l-main">
	<div class="l-main__content">
		<section>
			<?php
			if ( isset( $_SERVER['REQUEST_URI'] ) ) {
				$url = sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) );
			}
			
			$current_event_type_term = get_query_var( 'event_taxonomy' );
			$current_news_type_term  = get_query_var( 'news_taxonomy' );
			?>

			<?php var_dump( $current_event_type_term ); ?>
			<?php var_dump( $current_news_type_term ); ?>

			<div class="c-heading c-heading--page-title">
				<h2 class="c-heading__text">
					NEWS
				</h2>
			</div>

			<div class="p-news-refine">
				<div class="p-news-refine__cat">
					<span class="p-news-refine__cat-text">イベントの種類を選択：</span>
					<ul class="p-news-refine__cat-list">
						<li class="p-news-refine__cat-item
							<?php
							if ( '' === $current_event_type_term ) {
								echo ' p-news-refine__cat-item--current';
							} else {
								echo '';
							}
							?>
						">
							<a href="
								<?php
								if ( '' === $current_news_type_term ) {
									echo '';
								} else {
									echo esc_url( get_news_archive_link( 'all', $current_news_type_term ) );
								}
								?>
							">
								すべて
							</a>
						</li>
						<?php
						$event_terms = get_terms(
							'event_taxonomy',
							array(
								'hide_empty' => false,
							)
						);
						?>
						<?php foreach ( $event_terms as $event_term ) : ?>
							<li class="p-news-refine__cat-item
								<?php
								if ( strpos( $url, esc_html( $event_term->slug ) ) !== false ) {
									echo ' p-news-refine__cat-item--current';
								} else {
									echo '';
								}
								?>
							">
								<a href="
									<?php
									if ( '' === $current_news_type_term ) {
										echo esc_url( get_news_archive_link( $event_term->slug, 'all' ) );
									} else {
										echo esc_url( get_news_archive_link( $event_term->slug, $current_news_type_term ) );
									}
									?>
								">
									<?php echo esc_html( $event_term->name ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="p-news-refine__cat">
					<span class="p-news-refine__cat-text">ニュースの種類を選択：</span>
					<ul class="p-news-refine__cat-list">
						<li class="p-news-refine__cat-item
							<?php
							if ( '' === $current_news_type_term ) {
								echo ' p-news-refine__cat-item--current';
							} else {
								echo '';
							}
							?>
						">
							<a href="
								<?php
								if ( '' === $current_event_type_term ) {
									echo '';
								} else {
									echo esc_url( get_news_archive_link( $current_event_type_term, 'all' ) );
								}
								?>
							">
								すべて
							</a>
						</li>
						<?php
						$news_terms = get_terms(
							'news_taxonomy',
							array(
								'hide_empty' => false,
							)
						);
						?>
						<?php foreach ( $news_terms as $news_term ) : ?>
							<li class="p-news-refine__cat-item
								<?php
								if ( strpos( $url, esc_html( $news_term->slug ) ) !== false ) {
									echo ' p-news-refine__cat-item--current';
								} else {
									echo '';
								}
								?>
							">
								<a href="
									<?php
									if ( '' === $current_event_type_term ) {
										echo esc_url( get_news_archive_link( 'all', $news_term->slug ) );
									} else {
										echo esc_url( get_news_archive_link( $current_event_type_term, $news_term->slug ) );
									}
									?>
								">
									<?php echo esc_html( $news_term->name ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="p-news-panel">
				<ul class="c-panel c-panel--col3">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : ?>
							<?php the_post(); ?>
							<li class="c-panel__item">
								<a href="<?php the_permalink(); ?>">
									<div class="c-panel__inner">
										<div class="c-panel__image">
											<?php if ( has_post_thumbnail() ) : ?>
												<?php the_post_thumbnail( 'full' ); ?>
											<?php else : ?>
												<img src="assets/img/logo_ogp-white.png" alt="">
											<?php endif; ?>
										</div>
										<div class="c-panel__text">
											<p class="c-paragraph"><?php the_title(); ?></p>
										</div>
										<div class="p-news-panel__info">
											<span class="p-news-panel__date">
												<?php echo esc_html( get_the_date() ); ?>
											</span>
											<span class="p-news-panel__cat">
												<?php
												if ( $event_terms = get_the_terms( $post->ID, 'event_taxonomy' ) ) {
													foreach ( $event_terms as $event_term ) {
														echo esc_html( $event_term->name );
													}
												}
												?>
											</span>
											<span class="p-news-panel__cat">
												<?php
												if ( $news_terms = get_the_terms( $post->ID, 'news_taxonomy' ) ) {
													foreach ( $news_terms as $news_term ) {
														echo esc_html( $news_term->name );
													}
												}
												?>
											</span>
										</div>
									</div>
								</a>
							</li>
						<?php endwhile; ?>
					<?php else : ?>
							<?php echo 'お探しの記事はございませんでした。'; ?>
					<?php endif; ?>
				</ul>
			</div>
			<?php if ( have_posts() ) : ?>
				<?php
				the_posts_pagination(
					array(
						'prev_text' => '<img src="/assets/img/icons/icon_arrow-right.svg" alt="PREV">',
						'next_text' => '<img src="/assets/img/icons/icon_arrow-right.svg" alt="NEXT">',
						'type'      => 'list',
					)
				);
				?>
			<?php endif; ?>
		</section>
	</div>
</main>

<?php get_footer(); ?>
