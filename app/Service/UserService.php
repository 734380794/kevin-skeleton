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

namespace App\Service;

use App\Service\Dao\UserDao;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class UserService extends Service
{
    #[Inject]
    protected UserDao $userDao;

    public function info(int $id)
    {
        return $this->userDao->first($id);
    }
}
