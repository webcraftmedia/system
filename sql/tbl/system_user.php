<?php

namespace SYSTEM\SQL;

class system_user {

    const NAME_PG = 'system.user';
    const NAME_MYS = 'system_user';   

    const FIELD_ID = 'id';
    const FIELD_USERNAME = 'username';
    const FIELD_PASSWORD_SHA = 'password_sha';
    const FIELD_PASSWORD_MD5 = 'password_md5';
    const FIELD_EMAIL = 'email';
    const FIELD_JOINDATE = 'joindate';
    const FIELD_LOCALE = 'locale';
    const FIELD_LAST_ACTIVE = 'last_active';
    const FIELD_EMAIL_CONFIRMED = 'email_confirmed';
}