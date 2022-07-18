<?php
$config = [
		'admin_validation' => [
								[
									'field'=>'username',
									'title'=>'User Name',
									'rules'=>'required',
								],
								[
									'field'=>'password',
									'title'=>'Password',
									'rules'=>'required',
								]
								
						],
		'category_validation' => [
								[
									'field'=>'cname',
									'title'=>'Category name',
									'rules'=>'required',
								]
								// [
								// 	'field'=>'type',
								// 	'title'=>'Category type',
								// 	'rules'=>'required',
								// ]
						],
		]
?>