<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias;

use Gov\DpeRS\ApiAdapter\Middleware\Service\ApiTools;
use Datetime;
use DateInterval;

class GetAllByDefaultRangeHandler
{

    private $params;

    private $bearer;

    private $configs;

    private $apiTools;

    public function __construct(array $params, $bearer, array $configs)
    {
        $this->params = $params;
        $this->bearer = $bearer;
        $this->configs = $configs;
        $this->apiTools = new ApiTools();
    }

    public function handle()
    {
        $range = $this->getRangeDate();
        $params = [
            'defensor' => $this->params['id_defensor'],
            'dataInicio' => $range['start'],
            'dataFim' => $range['end']
        ];

        $url = $this->configs['EXTERNAL_API_PORTAL'] . $this->configs['EXTERNAL_API_PORTAL_AUDIENCIA'];
        $url = sprintf($url, http_build_query($params));
        return $this->apiTools->getWithBearer($url, 'GET', $this->bearer);
    }

    private function getRangeDate()
    {
        $todayWeekDay = date('w');

        switch ($todayWeekDay) {
            case 0:
                $dateEnd = new \DateTime();
                $dateStart = new \DateTime();
                $dateStart->sub(new \DateInterval('P6D'));
                break;
            case 1:
                $dateEnd = new \DateTime();
                $dateEnd->add(new \DateInterval('P6D'));
                $dateStart = new \DateTime();
                break;
            case 2:
                $dateEnd = new \DateTime();
                $dateEnd->add(new \DateInterval('P5D'));
                $dateStart = new \DateTime();
                $dateStart->sub(new \DateInterval('P1D'));
                break;
            case 3:
                $dateEnd = new \DateTime();
                $dateEnd->add(new \DateInterval('P4D'));
                $dateStart = new \DateTime();
                $dateStart->sub(new \DateInterval('P2D'));
                break;
            case 4:
                $dateEnd = new \DateTime();
                $dateEnd->add(new \DateInterval('P3D'));
                $dateStart = new \DateTime();
                $dateStart->sub(new \DateInterval('P3D'));
                break;
            case 5:
                $dateEnd = new \DateTime();
                $dateEnd->add(new \DateInterval('P2D'));
                $dateStart = new \DateTime();
                $dateStart->sub(new \DateInterval('P4D'));
                break;
            case 6:
                $dateEnd = new \DateTime();
                $dateEnd->add(new \DateInterval('P1D'));
                $dateStart = new \DateTime();
                $dateStart->sub(new \DateInterval('P5D'));
                break;
        }

        return [
            'end' => $dateEnd->format('d/m/Y'),
            'start' => $dateStart->format('d/m/Y')
        ];
    }
}
