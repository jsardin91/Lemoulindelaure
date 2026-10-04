<?php
/** A quiet reading template for native Journal posts. */
defined( 'ABSPATH' ) || exit;

if ( 'post' !== get_post_type() ) {
	require get_template_directory() . '/single.php';
	return;
}

get_header( 'v3' );
?>
<main id="contenu" class="site-main lmdl-article" aria-label="Article du Journal">
	<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class( 'lmdl-article__entry' ); ?>>
		<div class="lmdl-article__opening">
		<header class="lmdl-article__header">
			<a class="lmdl-article__back" href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">← Journal</a>
			<p class="v3-folio">Le Moulin de Laure · Le Journal</p>
			<h1><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="lmdl-article__standfirst"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
			<p class="lmdl-article__meta">
				<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<?php
				$author_id = (int) get_post_field( 'post_author', get_the_ID() );
				$author_name = get_the_author_meta( 'display_name', $author_id );
				if ( $author_name ) {
					echo '<span aria-hidden="true">·</span> ';
					if ( 'Laure Moulin' === $author_name ) {
						echo '<a href="' . esc_url( home_url( '/a-propos/' ) ) . '">' . esc_html( $author_name ) . '</a>';
					} else {
						echo esc_html( $author_name );
					}
				}
				?>
			</p>
		</header>
		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="lmdl-article__cover">
				<?php the_post_thumbnail( 'large', array( 'loading' => 'eager', 'fetchpriority' => 'high', 'alt' => get_the_title() ) ); ?>
				<?php
				$caption = get_the_post_thumbnail_caption();
				if ( $caption && ! preg_match( '/peinture|peint(?:e)? par Laure|œuvre originale/iu', $caption ) ) { echo '<figcaption>' . esc_html( $caption ) . '</figcaption>'; }
				?>
			</figure>
		<?php endif; ?>
		</div>
		<div class="lmdl-article__body lmdl-reading">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<nav class="lmdl-article__pages" aria-label="Pages de l’article">', 'after' => '</nav>' ) ); ?>
		</div>
		<?php echo lmdl_v3_faq_preview( array( 'choose', 'how' ), 'lmdl-article-faq-title', 'Une question en chemin ?' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
		<footer class="lmdl-article__footer lmdl-reading">
			<div><p class="v3-folio">La page suivante</p><a class="v3-editorial-link" href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">Tous les articles du Journal <span aria-hidden="true">↗</span></a></div>
			<?php echo lmdl_v3_image( 'logo/signature-transparent.png', '', 'lmdl-article__signature' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in helper. ?>
		</footer>
	</article>
	<?php endwhile; ?>
</main>
<?php get_footer( 'v3' ); ?>
