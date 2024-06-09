<?php

namespace Modules\Core\Contracts;

interface HookActionContract
{

    /**
     * Add Admin Menu
     *
     * @param string $title
     * @param string $slug
     * @param array $args
     * @return void
     */

    public function addAdminMenu(string $title, string $slug, array $args = []): void;
}
