<?php
/**
 * The template for displaying archive pages of teams
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ch2
 */

get_header(); ?>
    <div id="primary" class="content-area ">
        <main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>
					<?php $background = get_field( 'background_image', 'cpt_team_member' );
					$background_image = $background['url'];
					?>
            <section
                    class="block billboard style-<?php the_field( 'style', 'cpt_team_member' ); ?> accent-<?php the_field( 'accent_color', 'cpt_team_member' ); ?>"
                    style="background-image: url('<?php echo $background_image; ?>'); background-position: <?php the_field( 'focus', 'cpt_team_member' ); ?>;">
                <div class="outer-block-wrapper"> <!-- extend with needed container -->
                    <div class="inner-block-wrapper"> <!-- probably extend with row or -->
                        <!-- Stuff goes here -->

											<?php if ( get_field( 'heading', 'cpt_team_member' ) ): ?>
                          <div class="billboard--title"><h3><?php the_field( 'heading', 'cpt_team_member' ); ?></h3>
                          </div>
											<?php endif; ?>
                        <div class="billboard--content">


													<?php if ( get_field( 'quote_text', 'cpt_team_member' ) ): ?>
                              <div class="quote">
																<?php the_field( 'quote_text', 'cpt_team_member' ); ?>
                              </div>
													<?php endif; ?>
													<?php the_field( 'copy', 'cpt_team_member' ); ?>
													<?php the_field( 'button_text', 'cpt_team_member' ); ?>
													<?php the_field( 'button_link', 'cpt_team_member' ); ?>

                        </div>
                    </div>
                </div>
            </section>

            <section
                    class="block general_copy default-<?php the_field( 'default_background', 'cpt_team_member' ); ?> accent-<?php //the_field( 'accent_color', 'cpt_team_member' ); ?>">
                <div class="outer-block-wrapper"> <!-- extend with needed container -->
                    <div class="inner-block-wrapper"> <!-- probably extend with row or -->
                        <!-- Stuff goes here -->
                        <div class="content">
                            <h3 class="blurb-title">Meet the Team</h3> <!--todo add field-->
													<?php the_field( 'general_copy', 'cpt_team_member' ); ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="groups">
                <div class="outer-block-wrapper"> <!-- extend with needed container -->
                    <div class="inner-block-wrapper"> <!-- probably extend with row or -->

                        <ul class="group-list">
													<?php if ( have_rows( 'groups', 'cpt_team_member' ) ) :
														$group = 1;
														while ( have_rows( 'groups', 'cpt_team_member' ) ) : the_row(); ?>
                                <li><a href="#group-<?php echo $group; ?>">    <?php the_sub_field( 'group' ); ?></a>
                                </li>
															<?php $group ++; endwhile; ?>
													<?php endif; ?>

													<?php if ( have_rows( 'stores', 'cpt_team_member' ) ) :
														$store = 1;
														//while ( have_rows( 'stores', 'cpt_team_member' ) ) : the_row();
														?>
                              <li><a href="#store-<?php echo $store; ?>">Stores<?php //the_sub_field( 'store' );
																	?></a>
                              </li>
														<?php // $store ++; endwhile;
														?>
													<?php endif; ?>
                            <li><a href="#bod">Board of Directors</a></li>

                        </ul>
                        <!-- groups--->
											<?php if ( have_rows( 'groups', 'cpt_team_member' ) ) :
												$group = 1;
												while ( have_rows( 'groups', 'cpt_team_member' ) ) : the_row(); ?>
                            <div class="group">
                                <a name="group-<?php echo $group; ?>"></a>
                                <h2 class="group-title"><?php the_sub_field( 'group' ); ?></h2>
															<?php $post_objects = get_sub_field( 'group_members' ); ?>
															<?php if ( $post_objects ): ?>
                                  <div class="members">
																		<?php foreach ( $post_objects as $post ): ?>
																			<?php setup_postdata( $post ); ?>
                                        <div class="member">

																					<?php $photo = get_field( 'photo' ); ?>
																					<?php if ( $photo ) { ?>
                                              <div class="member-photo">
                                                  <img src="<?php echo $photo['url']; ?>"
                                                       alt="<?php echo $photo['alt']; ?>"/>
                                              </div>
																					<?php } ?>
                                            <div class="name">
																							<?php the_title(); ?>
                                            </div>
                                            <div class="role">
																							<?php the_field( 'role' ); ?>
                                            </div>

                                            <div class="bio">
																							<?php the_field( 'bio' ); ?>
                                            </div>

                                            <a class="email" href="mailto:<?php the_field( 'email' ); ?>">email <?php
																							$s    = get_the_title();
																							$arr1 = explode( ' ', trim( $s ) );
																							echo $arr1[0] . "\n";
																							?></a>
                                        </div>
																		<?php endforeach; ?>
                                  </div>
																<?php wp_reset_postdata(); ?>
															<?php endif; ?>
                            </div>
													<?php $group ++; endwhile; ?>
											<?php endif; ?>


                        <!-- stores -->
											<?php if ( have_rows( 'stores', 'cpt_team_member' ) ) :
												$store = 1;
												while ( have_rows( 'stores', 'cpt_team_member' ) ) : the_row(); ?>
                            <div class="group">
                                <a name="store-<?php echo $store; ?>"></a>
                                <h2 class="group-title">Stores - <?php the_sub_field( 'store' ); ?></h2>
															<?php $post_objects = get_sub_field( 'store_members' ); ?>
															<?php if ( $post_objects ): ?>
                                  <div class="members">
																		<?php foreach ( $post_objects as $post ): ?>
																			<?php setup_postdata( $post ); ?>
                                        <div class="member">

																					<?php $photo = get_field( 'photo' ); ?>
																					<?php if ( $photo ) { ?>
                                              <div class="member-photo">
                                                  <img src="<?php echo $photo['url']; ?>"
                                                       alt="<?php echo $photo['alt']; ?>"/>
                                              </div>
																					<?php } ?>
                                            <div class="name">
																							<?php the_title(); ?>
                                            </div>
                                            <div class="role">
																							<?php the_field( 'role' ); ?>
                                            </div>

                                            <div class="bio">
																							<?php the_field( 'bio' ); ?>
                                            </div>

                                            <a class="email" href="mailto:<?php the_field( 'email' ); ?>">email <?php
																							$s    = get_the_title();
																							$arr1 = explode( ' ', trim( $s ) );
																							echo $arr1[0] . "\n";
																							?></a>
                                        </div>
																		<?php endforeach; ?>
                                  </div>
																<?php wp_reset_postdata(); ?>
															<?php endif; ?>
                            </div>
													<?php $store ++; endwhile; ?>
											<?php endif; ?>

                        <!--bod-->

											<?php if ( have_rows( 'board_of_directors', 'cpt_team_member' ) ) : ?>
                          <div class="group">
                              <a name="bod"></a>
                              <h2 class="group-title">Board of Directors</h2>
                              <div class="board">
																<?php while ( have_rows( 'board_of_directors', 'cpt_team_member' ) ) :
																	the_row(); ?>

                                    <div class="bod">
                                    <span class="board-member">
																	<?php the_sub_field( 'name' ); ?></span>
																			<?php $role = get_sub_field( 'role' );

																			if ( $role ):?>
                                          <span class="bod-divider"> - </span>
                                          <span class="role"><?php echo $role; ?></span>
																			<?php endif; ?> <span
                                                class="organization"> <?php the_sub_field( 'organization' ); ?></span>
                                    </div>
																<?php endwhile; ?>


                              </div>
                          </div>
											<?php endif; ?>

											<?php endif; //have posts ?>

            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
    <script>

    </script>
<?php
get_footer();

