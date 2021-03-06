<?php

namespace Group\Listeners;

use Group\Events\HttpEvent;
use Group\Events\KernalEvent;

class ExceptionListener extends \Listener
{
    public function setMethod()
    {
        return 'onException';
    }

    public function onException(\Event $event)
    {   
        $response = new \Response($event -> getTrace(), 500);
        \EventDispatcher::dispatch(KernalEvent::RESPONSE, new HttpEvent(null, $response));   
    }
}
