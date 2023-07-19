<?php 

function shossain_meta(array $shossain_meta){
    $shossain_meta[] = array(
         'id'=> 'more-options',
         'title'=>'More',
         'object_types'=>array('post'),
         'fields'=> array(
             array(
                 'name' => 'Author name',
                 'type' => 'text',
                 'context'      => 'side',
                 'priority'     => 'high', 
                 'id' => 'authname',
                ),
             )
        );
    
    $shossain_meta[] = array(
         'id'=> 'resume-field',
         'title'=>'More',
         'object_types'=>array('video'),
         'fields'=> array(
             array(
                 'name' => 'Youtube Video Link',
                 'type' => 'text',
                 'context'      => 'side',
                 'priority'     => 'high', 
                 'id' => 'videolink',
                )
             ),
        );
        
        $shossain_meta[] = array(
         'id'=> 'targetlink',
         'title'=>'Taget Link',
         'object_types'=>array('ad'),
         'fields'=> array(
             array(
                 'name' => 'Target Link',
                 'type' => 'text_url',
                 'context'      => 'side',
                 'priority'     => 'high', 
                 'id' => 'targetlink',
                )
             ),
        );
        return $shossain_meta;
}
add_filter('cmb2_meta_boxes','shossain_meta');