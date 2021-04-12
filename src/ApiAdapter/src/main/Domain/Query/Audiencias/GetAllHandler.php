<?php
declare(strict_types = 1);
namespace Gov\DpeRS\ApiAdapter\Domain\Query\Audiencias;

use Gov\DpeRS\ApiAdapter\Middleware\Service\ApiTools;

class GetAllHandler
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
        $this->apiTools= new ApiTools();
    }

    public function handle()
    {
        $params = [
            'defensor' => $this->params['id_defensor'],
            'dataInicio' => $this->params['data_ini'],
            'dataFim' => $this->params['data_end']
        ];
        $url = $this->configs['EXTERNAL_API_PORTAL'] . $this->configs['EXTERNAL_API_PORTAL_AUDIENCIA'];
        $url = sprintf($url, http_build_query($params));
        return $this->apiTools->getWithBearer($url, 'GET', $this->bearer);
    }
}
