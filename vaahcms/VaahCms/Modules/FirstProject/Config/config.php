<?php

return [
    "name"=> "FirstProject",
    "title"=> "Module for VaahCMS",
    "slug"=> "firstproject",
    "thumbnail"=> "https://img.site/p/300/160",
    "is_dev" => env('MODULE_FIRSTPROJECT_ENV')?true:false,
    "excerpt"=> "FirstProject Manangement for Admin",
    "description"=> "FirstProject Manangement for Admin",
    "download_link"=> "",
    "author_name"=> "vaah",
    "author_website"=> "https://vaah.dev",
    "version"=> "0.0.1",
    "is_migratable"=> true,
    "is_sample_data_available"=> true,
    "db_table_prefix"=> "vh_firstproject_",
    "providers"=> [
        "\\VaahCms\\Modules\\FirstProject\\Providers\\FirstProjectServiceProvider"
    ],
    "aside-menu-order"=> null
];
