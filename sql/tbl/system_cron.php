<?php

namespace SYSTEM\SQL;

class system_cron {
    const NAME_PG                   = 'system.cron';
    const NAME_MYS                  = 'system_cron';

    const FIELD_CLASS               = 'class';
    const FIELD_MIN                 = 'min';
    const FIELD_HOUR                = 'hour';
    const FIELD_DAY                 = 'day';
    const FIELD_DAY_WEEK            = 'day_week';    
    const FIELD_MONTH               = 'month';
    const FIELD_DAY_MONTH           = 'day_month';
    const FIELD_LAST_RUN            = 'last_run';
    const FIELD_STATUS              = 'status';
}