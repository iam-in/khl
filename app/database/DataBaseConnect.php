<?php

namespace App\database;

use Illuminate\Database\Capsule\Manager as Capsule;

class DataBaseConnect
{
    /**
     * @var array
     */
    private array $config;

    /**
     * @var array
     */
    private array $configMig;

    public function __construct()
    {
        $this->config = (include __DIR__ . '/../database/database.global.php');
        $this->configMig = (include __DIR__ . '/../database/database.mig.php');
    }

    /**
     * @return Capsule
     */
    public function getConfigOrm(): Capsule
    {
        $capsule = new Capsule();
        $capsule->addConnection($this->config);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        return $capsule;
    }

    /**
     * config phpmig
     *
     * @return array
     */
    public function getConfigMig(): array
    {
        return $this->configMig;
    }
}
