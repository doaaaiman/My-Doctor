<?php

use Illuminate\Database\Seeder;
use App\Link;

class InsertLinks extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $link = Link::create(['title' => 'CMS', 'parent_id' => 0, 'show_in_menu' => 1, 'order_id' => 1]);
        // First Menu Blade & Pages childrens
       Link::create(['title' => 'Slider', 'url' => '/admin/slider', 'route' => 'admin.slider', 'parent_id' => $link->id]);
//        Link::create(['title' => 'Articles', 'url' => '/admin/article', 'route' => 'admin.article',
//            'parent_id' => $link->id, 'new_window' => 1]);
        Link::create(['title' => 'Menu', 'url' => '/admin/menu', 'route' => 'admin.menu',
            'parent_id' => $link->id, 'new_window' => 1]);

        $link = Link::create(['title' => 'Doctors', 'parent_id' => 0, 'show_in_menu' => 1, 'order_id' => 1]);
        // First Menu Blade & Pages childrens
        Link::create(['title' => 'Manage Doctors', 'url' => '/admin/doctors', 'route' => 'admin.doctors', 'parent_id' => $link->id]);
        Link::create(['title' => 'Manage Speciality', 'url' => '/admin/specialty', 'route' => 'admin.specialty', 'parent_id' => $link->id]);
        Link::create(['title' => 'Manage Posts', 'url' => '/admin/post', 'route' => 'admin.post', 'parent_id' => $link->id]);
        
        
        $link = Link::create(['title' => 'Patients', 'parent_id' => 0, 'show_in_menu' => 1, 'order_id' => 1]);
        // First Menu Blade & Pages childrens
        Link::create(['title' => 'Manage Patients', 'url' => '/admin/patient', 'route' => 'admin.patient', 'parent_id' => $link->id]);
        Link::create(['title' => 'Patients questions', 'url' => '/admin/question', 'route' => 'admin.question', 'parent_id' => $link->id]);
    }

}
