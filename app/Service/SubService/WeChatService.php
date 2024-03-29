<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Service\SubService;

use EasyWeChat\MiniApp\Contracts\Application;
use Han\Utils\Service;
use Hyperf\Codec\Json;
use Hyperf\Di\Annotation\Inject;
use JetBrains\PhpStorm\ArrayShape;

class WeChatService extends Service
{
    #[Inject]
    protected Application $application;

    public function dump()
    {
        var_dump($this->application::class);
    }

    #[ArrayShape(['open_id' => 'string'])]
    public function login(string $code)
    {
        $application = $this->application;
        $response = $application->getClient()->get('/sns/jscode2session', [
            'appid' => $application->getAccount()->getAppId(),
            'secret' => $application->getAccount()->getSecret(),
            'js_code' => $code,
            'grant_type' => 'authorization_code',
        ]);
        return Json::decode($response->getContent());
    }
}
