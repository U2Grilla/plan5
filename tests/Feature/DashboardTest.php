<?php

use Inertia\Testing\AssertableInertia as Assert;

test('the admin dashboard is rendered', function () {
    $this->withoutVite();

    $this->get(route('dashboard.index'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('admin/Dashboard')
        );
});
