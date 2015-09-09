<?php
namespace SYSTEM\SQL;

class system_log {
    const NAME_PG                   = 'system.log';
    const NAME_MYS                  = 'system_log';

    const FIELD_ID                  = 'ID';
    const FIELD_CLASS               = 'class';
    const FIELD_MESSAGE             = 'message';
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
}