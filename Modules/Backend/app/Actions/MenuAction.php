<?php

namespace Modules\Backend\Actions;

use Modules\Core\Abstracts\Action;
use Modules\Core\Facades\Hook;
use Modules\Core\Facades\HookAction;

class MenuAction extends Action
{
    public function handle()
    {
        // Hook::addAction(self::BACKEND_CALL_ACTION, [$this, "addBackendMenu"]);
        $this->addBackendMenu();
    }

    public function addBackendMenu()
    {
        HookAction::addAdminMenu(
            "Dashboard",
            'dashboard',
            [
                'icon' => '
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                        <path d="M12 12l8 -4.5" />
                        <path d="M12 12l0 9" />
                        <path d="M12 12l-8 -4.5" />
                        <path d="M16 5.25l-8 4.5" />
                ',
                'position' => 1,
            ]
        );

        HookAction::addAdminMenu(
            "Dashboard 1",
            'dashboard',
            [
                'icon' => 'fa fa-dashboard',
                'position' => 1,
                'parent' => 'dashboard',
            ]
        );

        HookAction::addAdminMenu(
            "Updates",
            'updates',
            [
                'icon' => 'fa fa-arrow-circle-o-up',
                'position' => 1,
                'parent' => 'dashboard',
            ]
        );

        HookAction::addAdminMenu(
            "Plugins",
            'plugins',
            [
                'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                        <path d="M12 12l8 -4.5" />
                        <path d="M12 12l0 9" />
                        <path d="M12 12l-8 -4.5" />
                        <path d="M16 5.25l-8 4.5" />
                ',
                'position' => 1,
            ]
        );

        HookAction::addAdminMenu(
            "Themes",
            'themes',
            [
                'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                        <path d="M12 12l8 -4.5" />
                        <path d="M12 12l0 9" />
                        <path d="M12 12l-8 -4.5" />
                        <path d="M16 5.25l-8 4.5" />
                ',
                'position' => 1,
            ]
        );
    }
}