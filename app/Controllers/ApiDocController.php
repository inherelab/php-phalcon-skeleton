<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-11-14
 * Time: 16:06
 */

namespace App\Controllers;

use App\Components\BaseController;

/**
 * Class ApiDocController
 * @package App\Controllers
 */
class ApiDocController extends BaseController
{
    public $docUrl = '/docs/swagger.json';
    public $docPath = '';

    public function initialize()
    {
        parent::initialize();

        $this->docPath = get_path('web' . $this->docUrl);
    }

    /**
     * display api docs by swagger-ui
     */
    public function indexAction()
    {
        $refresh = (bool)$this->request->getQuery('refresh', 'int', 0);

        if ($refresh) {
            file_put_contents($this->docPath, $this->scanAndGenerate());
        }

        $this->view->partial('swagger-ui', [
            'assetPath' => '/swagger-ui',
            'jsonFile' => $this->docUrl,
        ]);
    }

    /**
     * gen swagger api json
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function genAction()
    {
        $res = $this->response;
        $echo = (bool)$this->request->getQuery('echo', 0);

        $sTime = date('Y-m-d H:i:s');
        $swagger = $this->scanAndGenerate();
        $eTime = date('Y-m-d H:i:s');

        // Setting a header
        $res->setHeader('Content-Type', 'application/json');

        if ($echo) {
            $res->setContent($swagger);
        } else {
            $writeLen = file_put_contents($this->docPath, $swagger);

            $res->setJsonContent([
                'start' => $sTime,
                'done' => $eTime,
                'writeLen' => $writeLen,
            ]);
        }

        return $res;
    }

    private function scanAndGenerate()
    {
        $dirs = [
            get_path('app'),
            get_path('resources/swagger-docs')
        ];

        return \Swagger\scan($dirs);
    }
}