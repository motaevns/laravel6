<?php

namespace App\Http\Controllers\Import;

use Illuminate\Http\Request;
use App\Import\Strategy\CsvImportStrategy;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Import\ImportStrategyServiceInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CsvImportController extends BaseController implements ImportInterfaceController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * @var ImportStrategyServiceInterface
     */
    protected $importStrategyService;

    public function __construct(ImportStrategyServiceInterface $importStrategyService)
    {
        $this->importStrategyService = $importStrategyService;
    }

    public function import(Request $request)
    {
        $importStrategy = $this->importStrategyService->getImportStrategy(CsvImportStrategy::TYPE);

        return view('welcome')
            ->with('method', 'CSV')
            ->with('importResult', $importStrategy->import('my-import.csv'));
    }

}
