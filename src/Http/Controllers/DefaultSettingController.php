<?php

namespace Cendekia\SettingTool\Http\Controllers;

use Cendekia\SettingTool\Http\Controllers\BaseController;
use Unisharp\Setting\Setting;

class DefaultSettingController extends BaseController
{
    protected $tool;

    public function __construct(Setting $tool)
    {
        $this->tool = $tool;
    }
    /**
     * Load setting
     * @return void
     */
    protected function process($request): void
    {
        try {
            $this->setting = [
                'app' => $this->tool->get('app') ?? config('nova_setting.app'),
                'admin' => $this->tool->get('admin') ?? config('nova_setting.admin'),
            ];
        } catch (\Exception $e) {
            $this->message = "Uh-oh, unable to load setting.";
            $this->statusCode = 400;
        }
    }
}