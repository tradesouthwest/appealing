<?php 
/** 
 * Comments count to display on blog or home 
 */ 
if ( is_front_page() && is_home() || is_home() ) :  
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					printf(
						/* translators: %s: post title */
						esc_html_x( '1 Response to &ldquo;%s&rdquo;', 'comments title', 'appealing' ),
						'<span>' . esc_html( get_the_title() ) . '</span>'
					);
				} else { 
					printf( 
						/* translators: 1: number of comments, 2: post title */
						esc_html( _nx(
							'%1$s Response to &ldquo;%2$s&rdquo;',
							'%1$s Responses to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'appealing'
						) ),
						esc_attr( number_format_i18n( $comments_number ) ),
						'<span>' . esc_html( get_the_title() ) . '</span>'
					);
				}
else : 

				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					printf(
						/* translators: %s: post title */
						esc_html_e( '1 Response', 'appealing' )
					);
				} else { 
					printf( 
						/* translators: 1: number of comments, 2: post title */
						esc_html( _nx(
							'%1$s Response',
							'%1$s Responses',
							$comments_number,
							'comments title',
							'appealing'
						) ),
						esc_attr( number_format_i18n( $comments_number ) )
					);
				}
endif;
			?>
