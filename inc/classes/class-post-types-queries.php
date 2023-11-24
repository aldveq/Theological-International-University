<?php
/**
 * Class Post Types Queries
 *
 * PHP version 8
 *
 * @category Themes
 * @package  Theological_International_University
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

namespace TIU_THEME\Inc; // phpcs:ignore

use TIU_THEME\Inc\Traits\Singleton; // phpcs:ignore
use \WP_Query; // phpcs:ignore
/**
 * Class Post Types Queries
 */
class POST_TYPES_QUERIES {
	use Singleton; // phpcs:ignore

	/**
	 * Getting Professor Post Type Data
	 *
	 * @return array $professors_post_data Professors Post Data
	 */
	public function get_professor_post_type_data() { 
		$professors_post_data = array();

		$professors_query = new WP_Query(
			array(
				'post_type'      => 'professors',
				'posts_per_page' => -1, // phpcs:ignore
				'orderby'        => 'date',
				'no_found_rows'  => true,
			)
		);

		if ( $professors_query->have_posts() ) {
			while ( $professors_query->have_posts() ) {
				$professors_query->the_post();

				$professor_obj = (object) array(
					'image'    => wp_get_attachment_image( 
						carbon_get_post_meta( get_the_ID(), 'professor_image' ), 
						'professor_img_size', 
						false,
						array(
							'class'   => 'card-img-top trans_200',
							'laoding' => 'lazy',
						)
					),
					'name'     => get_the_title(),
					'position' => carbon_get_post_meta( get_the_ID(), 'professor_position' ),
					'socials'  => carbon_get_post_meta( get_the_ID(), 'professor_socials_data' ),
				);

				array_push( $professors_post_data, $professor_obj );
			}
		}

		wp_reset_postdata();

		return $professors_post_data;
	}

	/**
	 * Getting Diploma Data By Student User
	 *
	 * @param string $current_user_id Current User Id.
	 * @return array|null $diploma_data_array Diploma Data Array 
	 */
	public function get_diploma_by_student_user( $current_user_id ) {
		$diploma_data_array = array();

		$diploma_query = new WP_Query(
			array(
				'post_type'  => 'diplomas',
				'meta_query' => array( // phpcs:ignore
					array(
						'key'                   => 'diploma_user_association',
						'carbon_field_property' => 'id',
						'compare'               => '=',
						'value'                 => $current_user_id,
					),
					array(
						'key' => 'diplomas_info',
					),
				),
			) 
		);

		if ( $diploma_query->have_posts() ) :
			while ( $diploma_query->have_posts() ) :
				$diploma_query->the_post();

				array_push(
					$diploma_data_array,
					array(
						'diploma_source' => carbon_get_post_meta( 
							get_the_ID(), 
							'diplomas_info' 
						),
					)
				);

			endwhile;
		endif;

		wp_reset_postdata();

		if ( is_array( $diploma_data_array ) && count( $diploma_data_array ) > 0 ) :
			return $diploma_data_array[0]['diploma_source'];
		else :
			return null;
		endif;
	}
}
