<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    protected $with = ['category'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public static function getMetaData($url){
        $tags = get_meta_tags($url);

        $meta_tags = [];
        $title = false;
        $image = false;
        $author = false;
        $description = false;
        $site = false;

        $meta_tags['url'] = $url;


        foreach($tags as $index => $tag){
            if(strpos($index, 'image') && $image == false){
                $meta_tags['image'] = $tag;
                $image = true;
            }
            if(strpos($index, 'title') && $title == false){
                $meta_tags['title'] = htmlspecialchars_decode($tag);
                $title = true;
            }
            if(strpos($index, 'description') && $description == false){
                $meta_tags['description'] = htmlspecialchars_decode($tag);
                $description = true;
            }
            if( strpos($index, 'author') && $author == false){
                $meta_tags['author'] = $tag;
                $author = true;
            }
            if( strpos($index, 'site') && $site == false){
                $meta_tags['site'] = $tag;
                $site = true;
            }
        }

        if(!array_key_exists('image', $meta_tags)){
            if(isset($tags['image'])){
                $meta_tags['image'] = $tags['image'];
            }else{
                $meta_tags['image'] = 'images/nopicture.gif';
            }
        }
        if(!array_key_exists('title', $meta_tags)){
            if(isset($tags['title'])){
                $meta_tags['title'] = htmlspecialchars_decode($tags['title']) ;
            }else{
                $meta_tags['title'] = 'none';
            }
        }
        if(!array_key_exists('description', $meta_tags)){
            if(isset($tags['description'])){
                $meta_tags['description'] = htmlspecialchars_decode($tags['description']) ;
            }else{
                $meta_tags['description'] = 'none';
            }
        }
        if(!array_key_exists('author', $meta_tags)){
            if(isset($tags['author'])){
                $meta_tags['author'] = $tags['author'];
            }else{
                $meta_tags['author'] = 'images/nopicture.gif';
            }
        }
        if(!array_key_exists('site', $meta_tags)){
            if(isset($tags['site'])){
                $meta_tags['site'] = $tags['site'];
            }else{
                $meta_tags['site'] = 'none';
            }
        }

        return $meta_tags;
    }
}
