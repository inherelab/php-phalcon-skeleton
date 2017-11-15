<?php
/**
 * @see App\Controllers\HomeController::indexAction()
 * @SWG\Swagger(
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="User extension information module",
 *         @SWG\License(name="MIT")
 *     ),
 *     host="petstore.swagger.io",
 *     basePath="/v1",
 *     schemes={"http", "https"},
 *     consumes={"application/json"},
 *     produces={"application/json"},
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     ),
 *     @SWG\Definition(definition="Pets",
 *         type="array",
 *         @SWG\Items(ref="#/definitions/Pet")
 *     )
 * )
 */