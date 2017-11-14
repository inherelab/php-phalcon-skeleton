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
    /**
     * display api docs by swagger-ui
     */
    public function indexAction()
    {
        $this->view->partial('swagger-ui', [
            'baseUrl' => '/swagger-ui/',
            'jsonFile' => '/docs/swagger.json',
        ]);
    }

    /**
     * gen swagger api json
     */
    public function genAction()
    {
        $res = $this->response;
        $echo = (bool)$this->request->getQuery('echo', 0);
//        $refresh = (bool)$this->request->getQuery('refresh', 0);

        $sTime = date('Y-m-d H:i:s');
        $dirs = [
//            get_path('app'),
            get_path('resources/swagger-docs')
        ];
//        de($dirs);
        $swagger = \Swagger\scan($dirs[0]);
        $eTime = date('Y-m-d H:i:s');

        // Setting a header
        $res->setHeader('Content-Type', 'application/json');

        if ($echo) {
            $res->setContent($swagger);
        } else {
            $writeLen = file_put_contents(get_path('web/swagger-ui/docs/swagger.json'), $swagger);

            $res->setJsonContent([
                'start' => $sTime,
                'done' => $eTime,
                'writeLen' => $writeLen,
            ]);
        }

        return $res;
    }
}