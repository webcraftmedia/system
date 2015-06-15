<?php
namespace SYSTEM\DBD;

class system_todo {
    const NAME_PG                   = 'system.todo';
    const NAME_MYS                  = 'system_todo';

    const FIELD_ID                  = 'ID';
    const FIELD_CLASS               = 'class';
    const FIELD_MESSAGE             = 'message';
    const FIELD_MESSAGE_HASH        = 'message_hash';
    const FIELD_CODE                = 'code';
    const FIELD_FILE                = 'file';
    const FIELD_LINE                = 'line';
    const FIELD_TRACE               = 'trace';
    const FIELD_IP                  = 'ip';
    const FIELD_QUERYTIME           = 'querytime';
    const FIELD_TIME                = 'time';
    const FIELD_SERVER_NAME         = 'server_name';
    const FIELD_SERVER_PORT         = 'server_port';
    const FIELD_REQUEST_URI         = 'request_uri';
    const FIELD_POST                = 'post';
    const FIELD_HTTP_REFERER        = 'http_referer';
    const FIELD_HTTP_USER_AGENT     = 'http_user_agent';
    const FIELD_USER                = 'user';
    const FIELD_THROWN              = 'thrown';
    
    const FIELD_COUNT               = 'count';
    const FIELD_TYPE                = 'type';
        const FIELD_TYPE_EXCEPTION  = 0;
        const FIELD_TYPE_USER       = 1;
        const FIELD_TYPE_REPORT     = 2;
    const FIELD_STATE               = 'state';
        const FIELD_STATE_OPEN      = 0;
        const FIELD_STATE_CLOSED    = 1;
    const FIELD_PRIORITY            = 'priority';
    const FIELD_TIME_CLOSED         = 'time_closed';
}