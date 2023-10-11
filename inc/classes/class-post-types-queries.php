<?php

/**
* @package Theological_International_University
*/

namespace TIU_THEME\Inc;

use TIU_THEME\Inc\Traits\Singleton;
use \WP_Query;

class POST_TYPES_QUERIES {
	use Singleton;

	public function get_professor_post_type_data()
	{

		$professors_post_data = [];

		$professors_query = new WP_Query(array(
			'post_type' => 'professors',
			'posts_per_page' => -1,
			'orderby' => 'date',
			'no_found_rows' => true,
		));

		if ($professors_query->have_posts()) {
			while ($professors_query->have_posts()) {
				$professors_query->the_post();

				$professor_obj = (object) array(
					'image' => wp_get_attachment_image( 
						carbon_get_post_meta(get_the_ID(), 'professor_image'), 
						'professor_img_size', 
						false,
						array(
							'class' => 'card-img-top trans_200',
							'laoding' => 'lazy'
						)
					),
					'name' => get_the_title(),
					'position' => carbon_get_post_meta( get_the_ID(), 'professor_position' ),
					'socials' => carbon_get_post_meta( get_the_ID(), 'professor_socials_data' ),
				);

				array_push($professors_post_data, $professor_obj);
			}
		}

		wp_reset_postdata();

		return $professors_post_data;
	}

	public function get_diploma_by_student_user($current_user_id)
	{
		$diploma_data_array = [];

		$diploma_query = new WP_Query( array(
			'post_type'=>'diplomas',
			'meta_query' => array(
				array(
					'key' => 'diploma_user_association',
					'carbon_field_property' => 'id',
					'compare' => '=',
					'value' => $current_user_id,
				),
				array(
					'key' => 'diplomas_info',
				),
			),
		) );

		if ($diploma_query->have_posts()):
			while ($diploma_query->have_posts()):
				$diploma_query->the_post();

				array_push($diploma_data_array, array(
					'diploma_source' => carbon_get_post_meta( 
						get_the_ID(), 
						'diplomas_info' 
					),
				));

			endwhile;
		endif;

		wp_reset_postdata();

		if (is_array($diploma_data_array) && count($diploma_data_array) > 0):
			return $diploma_data_array[0]['diploma_source'];
		else:
			return null;
		endif;
	}
}