<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use Berkayk\OneSignal\OneSignalFacade;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendPushNotification($title, $message, $url)
    {
        OneSignalFacade::sendNotificationToAll(
            $message,
            $url,
            $data = null, 
            $buttons = null, 
            $schedule = null, 
            $title, 
            $subtitle = null
        );
    }
}
