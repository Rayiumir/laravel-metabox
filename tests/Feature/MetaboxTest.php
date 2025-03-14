<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MetaboxTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_deletion()
    {
        $post = Post::factory()->create();
        $post->addMetabox('metabox_field', 'Test Value');

        $this->assertDatabaseHas('posts', ['id' => $post->id]);
        $this->assertDatabaseHas('metaboxes', [
            'model_type' => Post::class,
            'model_id' => $post->id,
            'key' => 'metabox_field',
            'value' => 'Test Value',
        ]);

        $post->delete();

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
        $this->assertDatabaseMissing('metaboxes', [
            'model_type' => Post::class,
            'model_id' => $post->id,
            'key' => 'metabox_field',
            'value' => 'Test Value',
        ]);
    }
}
