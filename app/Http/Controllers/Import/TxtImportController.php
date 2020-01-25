<?php

namespace App\Http\Controllers\Import;

use Illuminate\Http\Request;
use App\Import\Strategy\TxtImportStrategy;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Import\ImportStrategyServiceInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TxtImportController extends BaseController implements ImportInterfaceController
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
        $importStrategy = $this->importStrategyService->getImportStrategy(TxtImportStrategy::TYPE);

        return view('welcome')
            ->with('method', 'TXT')
            ->with('importResult', $importStrategy->import('my-import.txt'));
    }

}
