<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_cannot_create_url()
    {
        $this
            ->post(route('shorturl.url.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function a_user_can_acces_to_create_url()
    {
        $user = create(\App\User::class);

        $this->actingAs($user);

        $this
            ->get(route('shorturl.url.create'))
            ->assertSee('Laravel Short Url');
    }

    /** @test */
    public function a_guest_cannot_edit_url()
    {
        $this
            ->get(route('shorturl.url.edit', ['id' => 1]))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this
            ->put(route('shorturl.url.update', ['id' => 1]))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function a_user_can_acces_to_edit_url()
    {
        $user = create(\App\User::class);

        $this->actingAs($user);

        $url = create(\Gallib\ShortUrl\Url::class);

        $this
            ->get(route('shorturl.url.edit', ['id' => 1]))
            ->assertSee('Laravel Short Url');
    }

    /** @test */
    public function a_guest_cannot_delete_url()
    {
        $this
            ->put(route('shorturl.url.destroy', ['id' => 1]))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function a_guest_cannot_list_urls()
    {
        $this
            ->get(route('shorturl.url.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function a_user_can_list_urls()
    {
        $user = create(\App\User::class);

        $this->actingAs($user);

        $this
            ->get(route('shorturl.url.index'))
            ->assertSee('Laravel Short Url');
    }
}
