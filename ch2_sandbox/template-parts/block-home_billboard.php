<?php
/**
 * Template part for displaying a Billboard.
 */

if ( get_field( 'hide' ) != 1 ):
	wp_enqueue_script( 'rotator', get_template_directory_uri() . '/assets/js/typed-min.js', array( jquery ), '1', true );


	$background_image = get_field( 'background_image' );
	$background       = $background_image['url']; ?>
    <section
            class="block rotating billboard style-1 accent-<?php the_field( 'accent_color' ); ?>"
            style="background-image: url('<?php echo $background; ?>'); background-position: <?php the_field( 'focus' ); ?>;">
        <div class="outer-block-wrapper"> <!-- extend with needed container -->
            <div class="inner-block-wrapper"> <!-- probably extend with row or -->
                <!-- Stuff goes here -->


							<?php
							$longest = 0;
							if ( have_rows( 'rotating_words' ) ) : ?>
								<?php while ( have_rows( 'rotating_words' ) ) : the_row(); ?>
									<?php $word = get_sub_field( 'word' );
									if ( strlen( $word ) > $longest ) {
										$longest = strlen( $word );
									}
								endwhile;
							endif;
							?>
                <div class="billboard--title">
                    <h3><?php the_field( 'heading_pre' ); ?>
                        <span class="text-wrap"
                              style="display: inline-block; width: <?php echo $longest * .5; ?>em;"><span
                                    class="change-text"></span></span> <?php the_field( 'heading_post' ); ?></h3>

                </div>


                <div class="billboard--content">
                    <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->


									<?php if ( get_field( 'copy' ) ): ?>
                      <div class="copy"> <?php the_field( 'copy' ); ?></div>
									<?php endif; ?>

									<?php if ( get_field( 'button_link' ) ): ?>
                      <a class="button"
                         href="<?php the_field( 'button_link' ); ?>"> <?php the_field( 'button_text' ); ?></a>
									<?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function (e) {
            Typed.new('.change-text', {
							<?php $numrows = count( get_field( 'rotating_words' ) );
							$row = 0; ?>
                strings: [<?php if ( have_rows( 'rotating_words' ) ) : ?>
									<?php while ( have_rows( 'rotating_words' ) ) : the_row(); ?>
									<?php $word = get_sub_field( 'word' );
									$row ++;
									if ( $row != $numrows ):
										echo '"' . $word . '", ';
									else:
										echo '"' . $word . '"';
									endif;
									endwhile;
									endif; ?>],
                typeSpeed: 50,
                backDelay: 2000,
                loop: true,

            })
            ;
        });

    </script>
<?php endif; ?>