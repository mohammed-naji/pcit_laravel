<?php

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

it('returns formatted JSON responses for post endpoints', function () {
    Storage::fake();

    $post = Post::factory()->create([
        'title' => ['en' => 'English title', 'ar' => 'Arabic title'],
        'content' => ['en' => 'English content', 'ar' => 'Arabic content'],
        'image' => null,
    ]);

    $this->getJson('/api/posts')
        ->assertSuccessful()
        ->assertJsonPath('message', 'Posts retrieved successfully.')
        ->assertJsonPath('data.0.title.en', 'English title')
        ->assertJsonStructure(['data', 'links', 'meta']);

    $this->getJson("/api/posts/{$post->id}")
        ->assertSuccessful()
        ->assertJsonPath('message', 'Post retrieved successfully.')
        ->assertJsonPath('data.id', $post->id);

    $created = $this->postJson('/api/posts', [
        'title_en' => 'Created title',
        'title_ar' => 'عنوان جديد',
        'content_en' => 'Created content',
        'content_ar' => 'محتوى جديد',
    ])
        ->assertCreated()
        ->assertJsonPath('message', 'Post created successfully.')
        ->assertJsonPath('data.title.en', 'Created title');

    $this->putJson("/api/posts/{$post->id}", [
        'title_en' => 'Updated title',
        'title_ar' => 'عنوان محدث',
        'content_en' => 'Updated content',
        'content_ar' => 'محتوى محدث',
    ])
        ->assertSuccessful()
        ->assertJsonPath('message', 'Post updated successfully.')
        ->assertJsonPath('data.title.en', 'Updated title');

    $imagePath = 'uploads/images/post.jpg';
    Storage::put($imagePath, 'image contents');
    $createdPost = Post::findOrFail($created->json('data.id'));
    $createdPost->update(['image' => $imagePath]);

    $this->deleteJson("/api/posts/{$createdPost->id}")
        ->assertSuccessful()
        ->assertJsonPath('message', 'Post deleted successfully.');

    Storage::assertMissing($imagePath);
});
