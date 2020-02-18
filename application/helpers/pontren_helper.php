<?php

function is_logged_in() {
	$ci = get_instance();
	if(!$ci->session->userdata('email')) {
		redirect('auth');
	} else {
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);
		$kueriMenu = $ci->db->get_where('tb_usermenu', ['alias' => $menu])->row_array();
		$menu_id = $kueriMenu['id'];
		$access = $ci->db->get_where('tb_access', [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		]);
		if($access->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}

 function check_access($role_id, $menu_id) {
 	$ci = get_instance();

 	$result = $ci->db->get_where('tb_access', [
 		'role_id' => $role_id,
 		'menu_id' => $menu_id
 	]);

 	if($result->num_rows() > 0) {
 		return "checked='checked'";
 	}
 }