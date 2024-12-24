<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService {
    public function store($data) {
        try {
            DB::beginTransaction();
            $tadIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $data['main_image']    = Storage::disk('public')->put('/images', $data['main_image']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $post                  = Post::firstOrCreate($data);
            $post->tags()->attach($tadIds);
            DB::commit();

        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500 );
        }
    }

    public function update($data, $post){
        try {
            DB::beginTransaction();
            $tadIds = $data['tag_ids'];
            unset($data['tag_ids']);
            if(isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if(isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $post->update($data);
            $post->tags()->sync($tadIds);
            DB::commit();
        }

        catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }

}
