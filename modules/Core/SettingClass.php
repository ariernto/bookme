<?php

	namespace Modules\Core;

	use Modules\Core\Abstracts\BaseSettingsClass;

	class SettingClass extends BaseSettingsClass
	{
		const UPLOAD_DRIVER=['uploads','s3'];
		public static function getSettingPages()
		{
			return [
//				[
//					'id'        => 'uploads',
//					'title'     => __("Upload Settings"),
//					'position'  => 110,
//					'view'      => "Core::admin.settings.groups.uploads",
//					"keys"      => [
//						'upload_max_width',
//						'upload_max_height',
//						'uploads_max_size',
//					],
//					'html_keys' => [
//					]
//				]
			];
		}
	}
