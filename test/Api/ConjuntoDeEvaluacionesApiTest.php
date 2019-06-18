<?php

namespace APIHub\Client;


use \APIHub\Client\ApiException;
use \APIHub\Client\Interceptor\KeyHandler;
use \APIHub\Client\Interceptor\MiddlewareEvents;


class ConjuntoDeEvaluacionesApiTest extends \PHPUnit_Framework_TestCase
{

    protected $apiInstance;
    protected $signer;


    /**
     * Setup before running each test case
     */
    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');

        $this->signer = new \APIHub\Client\Interceptor\KeyHandler(null, null, $password);
        
        $events = new \APIHub\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = \GuzzleHttp\HandlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));

        $client = new \GuzzleHttp\Client([
            'handler' => $handler,
            'verify' => false
        ]);
        $this->apiInstance = new \APIHub\Client\Api\ConjuntoDeEvaluacionesApi($client);
    }


    public function testIgh()
    {
        
        $x_api_key = "your_api_key";
        $cve_usuario = "your_cve_usuario";
        $password = "your_password";
        $cve_empresa = "your_cve_empresa"
        $body = new \APIHub\Client\Model\Consulta();

        $body->setFechaInicial("XXXXXX");
        $body->setFechaFinal("XXXXXX");
        $body->setCorreoElectronico("XXXXXX");
        $body->setFolioEmpresa("XXXXXX");
        

        try {
            $result = $this->apiInstance->getIGH($x_api_key, $cve_usuario, $password,$cve_empresa, $body);
            $this->signer->close();
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ConjuntoDeEvaluacionesApi->getIGH: ', $e->getMessage(), PHP_EOL;
        }
    }
}
