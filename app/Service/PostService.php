<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService {
    public function store($data) {
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tadIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $data['main_image']    = Storage::disk('public')->put('/images', $data['main_image']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $post                  = Post::firstOrCreate($data);

            if (isset($tadIds)){
                $post->tags()->attach($tadIds);
            }
            DB::commit();

        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500 );
        }
    }

    public function update($data, $post){
        try {
            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tadIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if(isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if(isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $post->update($data);

            if (isset($tadIds)){
                $post->tags()->sync($tadIds);
            }

            DB::commit();
        }

        catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }

}
