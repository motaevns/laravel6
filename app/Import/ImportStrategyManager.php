<?php

namespace App\Import;

use App\Import\Strategy\ImportInterface;
use App\Import\Strategy\CsvImportStrategy;
use App\Import\Strategy\TxtImportStrategy;

class ImportStrategyManager implements ImportStrategyServiceInterface
{
    /**
     * @var ImportInterface[]|array
     */
    protected $importStrategies = [];

    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * ImportStrategyManager constructor.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @param Strategy\ImportInterface[]                   $importStrategies
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app, $importStrategies = [])
    {

        $this->importStrategies = $importStrategies;
        $this->app = $app;
    }

    public function getImportStrategy(string $type): ImportInterface
    {
        return $this->app->make($this->getAvailableImportStrategies()[$type]);
    }

    /**
     * @return ImportInterface[]
     */
    public function getAvailableImportStrategies(): array
    {
        return $this->importStrategies;
    }

}
