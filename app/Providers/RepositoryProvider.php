<?php

declare(strict_types=1);

namespace App\Providers;

use App\Infrastructures\Repositories\Client\ClientRepository;
use App\Infrastructures\Repositories\Client\ClientRepositoryInterface;
use App\Infrastructures\Repositories\Dealing\Domain\DealingRepository;
use App\Infrastructures\Repositories\Dealing\Domain\DealingRepositoryInterface;
use App\Infrastructures\Repositories\Domain\DomainRepository;
use App\Infrastructures\Repositories\Domain\DomainRepositoryInterface;
use App\Infrastructures\Repositories\Registrar\RegistrarRepository;
use App\Infrastructures\Repositories\Registrar\RegistrarRepositoryInterface;
use App\Infrastructures\Repositories\Subdomain\SubdomainRepository;
use App\Infrastructures\Repositories\Subdomain\SubdomainRepositoryInterface;
use App\Infrastructures\Repositories\User\UserLatestCodeRepository;
use App\Infrastructures\Repositories\User\UserLatestCodeRepositoryInterface;
use App\Infrastructures\Repositories\User\UserMailSettingRepository;
use App\Infrastructures\Repositories\User\UserMailSettingRepositoryInterface;
use App\Infrastructures\Repositories\User\UserRepository;
use App\Infrastructures\Repositories\User\UserRepositoryInterface;

use Illuminate\Support\ServiceProvider;

final class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientRepositoryInterface::class, function () {
            return new ClientRepository();
        });

        $this->app->bind(DealingRepositoryInterface::class, function () {
            return new DealingRepository();
        });

        $this->app->bind(DomainRepositoryInterface::class, function () {
            return new DomainRepository();
        });

        $this->app->bind(RegistrarRepositoryInterface::class, function () {
            return new RegistrarRepository();
        });

        $this->app->bind(SubdomainRepositoryInterface::class, function () {
            return new SubdomainRepository();
        });

        $this->app->bind(UserLatestCodeRepositoryInterface::class, function () {
            return new UserLatestCodeRepository();
        });

        $this->app->bind(UserMailSettingRepositoryInterface::class, function () {
            return new UserMailSettingRepository();
        });

        $this->app->bind(UserRepositoryInterface::class, function () {
            return new UserRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}