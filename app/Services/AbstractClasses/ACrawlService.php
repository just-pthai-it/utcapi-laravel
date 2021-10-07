<?php

namespace App\Services\AbstractClasses;

use App\BusinessClass\CrawlQLDTData;
use App\Repositories\Contracts\AccountRepositoryContract;
use App\Repositories\Contracts\SchoolYearRepositoryContract;
use App\Services\Contracts\CrawlExamScheduleServiceContract;
use App\Services\Contracts\CrawlModuleScoreServiceContract;
use App\Services\Contracts\Guest\CrawlExamScheduleGuestServiceContract;
use App\Services\Contracts\Guest\CrawlModuleScoreGuestServiceContract;
use Exception;
use Illuminate\Support\Facades\Cache;

abstract class ACrawlService implements CrawlModuleScoreServiceContract,
                                        CrawlExamScheduleServiceContract,
                                        CrawlModuleScoreGuestServiceContract,
                                        CrawlExamScheduleGuestServiceContract
{
    protected CrawlQLDTData $crawl;
    protected AccountRepositoryContract $accountDepository;
    protected SchoolYearRepositoryContract $schoolYearRepository;
    protected array $school_year_list;

    /**
     * CrawlModuleScoreService constructor.
     * @param CrawlQLDTData $crawl
     * @param AccountRepositoryContract $accountDepository
     * @param SchoolYearRepositoryContract $schoolYearRepository
     */
    public function __construct (CrawlQLDTData                $crawl,
                                 AccountRepositoryContract    $accountDepository,
                                 SchoolYearRepositoryContract $schoolYearRepository)
    {
        $this->crawl                = $crawl;
        $this->accountDepository    = $accountDepository;
        $this->schoolYearRepository = $schoolYearRepository;
    }

    /**
     * @throws Exception
     */
    public function crawl ($id_student)
    {
        $this->_verifyAccount($id_student);
    }

    /**
     * @throws Exception
     */
    public function crawlAll ($id_student)
    {
        $this->_verifyAccount($id_student);
    }

    /**
     * @throws Exception
     */
    private function _verifyAccount ($id_student)
    {
        $qldt_password = $this->_getQLDTPassword($id_student);
        $this->_loginQLDT($id_student, $qldt_password);
    }

    private function _getQLDTPassword ($id_student) : string
    {
        return $this->accountDepository->getQLDTPassword($id_student);
    }

    /**
     * @throws Exception
     */
    private function _loginQLDT ($id_student, $password) : void
    {
        $this->crawl->loginQLDT($id_student, $password);
    }

    protected function _insertMultiple ($data)
    {
        $arr = [];
        foreach ($data as $school_year)
        {
            foreach ($school_year as $module)
            {
                $module['id_school_year'] = $this->_getIDSchoolYear($module['school_year']);
                unset($module['school_year']);
                $arr[] = $module;
            }
        }
        $this->_customInsertMultiple($arr);
    }

    protected function _upsert ($data)
    {
        $this->_getSchoolYears();
        foreach ($data as $school_year)
        {
            foreach ($school_year as $module)
            {
                $module['id_school_year'] = $this->_getIDSchoolYear($module['school_year']);
                unset($module['school_year']);
                $this->_customUpsert($module);
            }
        }
    }

    protected function _customInsertMultiple ($data)
    {
    }

    protected function _customUpsert ($data)
    {
    }

    protected function _updateDataVersion ($id_student)
    {
    }

    protected function _getSchoolYears ()
    {
//        $this->school_year_list = Cache::remember('school_year_list', 30000, function ()
//        {
//            return $this->schoolYearRepository->getMultiple();
//        });

        $this->school_year_list = $this->schoolYearRepository->getMultiple();
    }

    private function _destroyCacheSchoolYears ()
    {
        Cache::forget('school_year_list');
    }

    private function _getIDSchoolYear ($school_year)
    {
        if (!isset($this->school_year_list[$school_year]))
        {
            if ($this->schoolYearRepository->get($school_year) == null)
            {
                $this->schoolYearRepository->insert(['school_year' => $school_year]);
            }
            $this->_destroyCacheSchoolYears();
            $this->_getSchoolYears();
        }

        return $this->school_year_list[$school_year];
    }
}
