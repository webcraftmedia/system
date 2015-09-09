<?php

namespace SYSTEM\SQL;

class system_api {
    const NAME_PG                   = 'system.api';
    const NAME_MYS                  = 'system_api';

    const FIELD_ID                  = 'ID';
    const FIELD_GROUP               = 'group';
    const FIELD_TYPE                = 'type';
    const FIELD_PARENTID            = 'parentID';
    const FIELD_PARENTVALUE         = 'parentValue';
    const FIELD_NAME                = 'name';    
    const FIELD_VERIFY              = 'verify';

    const VALUE_TYPE_COMMAND        = 0;
    const VALUE_TYPE_COMMAND_FLAG   = 1;
    const VALUE_TYPE_PARAM          = 2;
    const VALUE_TYPE_PARAM_OPT      = 3;
    const VALUE_TYPE_STATIC         = 4;
}