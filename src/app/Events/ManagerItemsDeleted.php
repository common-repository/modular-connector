<?php

namespace Modular\Connector\Events;

use Modular\ConnectorDependencies\Illuminate\Contracts\Queue\ShouldQueue;

class ManagerItemsDeleted extends AbstractEvent implements ShouldQueue
{
}
