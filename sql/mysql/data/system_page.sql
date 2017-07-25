REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (0, 42, 'start', 'start', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saistart_sys_sai', 'init_saistart_sys_sai', '\\SYSTEM\\SAI\\saistart_sys_sai');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (1, 42, 'todo', 'start', 0, 1, 0, '#todo_entries', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=todolist', 'init_saistart_sys_sai_todo', '\\SYSTEM\\SAI\\saistart_sys_sai');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (2, 42, 'log', 'start', 0, 1, 0, '#log_entries', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log&action=filter', 'init_saistart_sys_sai_log', '\\SYSTEM\\SAI\\saistart_sys_sai');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (10, 42, 'api', 'api', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_api', 'init_saimod_sys_api', '\\SYSTEM\\SAI\\saimod_sys_api');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (11, 42, 'all', 'api', 10, 0, 0, '#tab_api', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_api&action=list&group=${group}', 'init_saimod_sys_api_list', '\\SYSTEM\\SAI\\saimod_sys_api');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (12, 42, 'delete', 'api', 10, 0, 1, '#tab_api', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_api&action=deletedialog&group=${group}&ID=${id}', 'init_saimod_sys_api_delete', '\\SYSTEM\\SAI\\saimod_sys_api');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (13, 42, 'new', 'api', 10, 0, 1, '#tab_api', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_api&action=newdialog', 'init_saimod_sys_api_new', '\\SYSTEM\\SAI\\saimod_sys_api');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (20, 42, 'cache', 'cache', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_cache', 'init_saimod_sys_cache', '\\SYSTEM\\SAI\\saimod_sys_cache');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (30, 42, 'config', 'config', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_config', 'init_saimod_sys_config', '\\SYSTEM\\SAI\\saimod_sys_config');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (31, 42, 'basics', 'config', 30, 0, 0, '#tab_config', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_config&action=basics', 'init_saimod_sys_config_basics', '\\SYSTEM\\SAI\\saimod_sys_config');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (32, 42, 'database', 'config', 30, 0, 1, '#tab_config', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_config&action=database', 'init_saimod_sys_config_database', '\\SYSTEM\\SAI\\saimod_sys_config');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (33, 42, 'sai', 'config', 30, 0, 1, '#tab_config', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_config&action=sai', 'init_saimod_sys_config_sai', '\\SYSTEM\\SAI\\saimod_sys_config');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (40, 42, 'cron', 'cron', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_cron', 'init_saimod_sys_cron', '\\SYSTEM\\SAI\\saimod_sys_cron');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (50, 42, 'docu', 'docu', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_docu&cat=${cat}', 'init_saimod_sys_docu', '\\SYSTEM\\SAI\\saimod_sys_docu');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (51, 42, 'cat', 'docu', 50, 0, 0, '#tab_docu', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_docu&action=cat&cat=${cat}', 'init_saimod_sys_docu_cat', '\\SYSTEM\\SAI\\saimod_sys_docu');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (55, 42, 'doc', 'docu', 51, 0, 0, '#tab2_docu', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_docu&action=doc&cat=${cat}&doc=${doc}', 'init_saimod_sys_docu_doc', '\\SYSTEM\\SAI\\saimod_sys_docu');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (60, 42, 'files', 'files', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_files', 'init_saimod_sys_files', '\\SYSTEM\\SAI\\saimod_sys_files');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (61, 42, 'list', 'files', 60, 0, 0, '#tab_files', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_files&action=tab&name=${folder}', 'init_saimod_sys_files_list', '\\SYSTEM\\SAI\\saimod_sys_files');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (70, 42, 'log', 'log', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log', 'init_saimod_sys_log', '\\SYSTEM\\SAI\\saimod_sys_log');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (71, 42, 'list', 'log', 70, 0, 0, '#tab_log', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log&action=filter&filter=${filter}&search=${search}&page=${page}', 'init_saimod_sys_log_log', '\\SYSTEM\\SAI\\saimod_sys_log');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (72, 42, 'stats', 'log', 70, 0, 1, '#tab_log', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log&action=stats', 'init_saimod_sys_log_stats', '\\SYSTEM\\SAI\\saimod_sys_log');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (73, 42, 'error', 'log', 70, 0, 1, '#tab_log', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log&action=error&error=${error}', '', '');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (80, 42, 'login', 'login', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_login', 'init_saimod_sys_login', '\\SYSTEM\\SAI\\saimod_sys_login');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (81, 42, 'register', 'login', 80, 0, 1, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_login&action=registerform', 'init_saimod_sys_register', '\\SYSTEM\\SAI\\saimod_sys_login');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (82, 42, 'resetpassword', 'login', 80, 0, 1, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_login&action=resetpassword', 'init_saimod_sys_resetpassword', '\\SYSTEM\\SAI\\saimod_sys_login');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (90, 42, 'mod', 'mod', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_mod', 'init_saimod_sys_mod', '\\SYSTEM\\SAI\\saimod_sys_mod');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (91, 42, 'system', 'mod', 90, 0, 0, '#tab_mod', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_mod&action=system', 'init_saimod_sys_mod_system', '\\SYSTEM\\SAI\\saimod_sys_mod');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (92, 42, 'project', 'mod', 90, 0, 1, '#tab_mod', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_mod&action=project', 'init_saimod_sys_mod_project', '\\SYSTEM\\SAI\\saimod_sys_mod');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (93, 42, 'lib', 'mod', 90, 0, 1, '#tab_mod', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_mod&action=lib', 'init_saimod_sys_mod_lib', '\\SYSTEM\\SAI\\saimod_sys_mod');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (100, 42, 'security', 'security', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_security', 'init_saimod_sys_security', '\\SYSTEM\\SAI\\saimod_sys_security');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (101, 42, 'users', 'security', 100, 0, 0, '#tab_security', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_security&action=users&filter=${filter}&search=${search}&page=${page}', 'init_saimod_sys_security_users', '\\SYSTEM\\SAI\\saimod_sys_security');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (102, 42, 'rights', 'security', 100, 0, 1, '#tab_security', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_security&action=rights', 'init_saimod_sys_security_rights', '\\SYSTEM\\SAI\\saimod_sys_security');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (103, 42, 'user', 'security', 100, 0, 1, '#tab_security', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_security&action=user&username=${username}', 'init_saimod_sys_security_user', '\\SYSTEM\\SAI\\saimod_sys_security');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (104, 42, 'newright', 'security', 100, 0, 1, '#tab_security', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_security&action=newright', 'init_saimod_sys_security_newright', '\\SYSTEM\\SAI\\saimod_sys_security');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (105, 42, 'delright', 'security', 100, 0, 1, '#tab_security', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_security&action=deleterightconfirm&id=${id}', 'init_saimod_sys_security_delright', '\\SYSTEM\\SAI\\saimod_sys_security');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (110, 42, 'text', 'text', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_text', 'init_saimod_sys_text', '\\SYSTEM\\SAI\\saimod_sys_text');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (111, 42, 'tag', 'text', 110, 0, 0, '#tab_content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_text&action=tag&tag=${tag}&filter=${filter}&search=${search}&page=${page}', 'init_saimod_sys_text_tag', '\\SYSTEM\\SAI\\saimod_sys_text');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (112, 42, 'notag', 'text', 110, 0, 1, '#tab_content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_text&action=notag', 'init_saimod_sys_text_notag', '\\SYSTEM\\SAI\\saimod_sys_text');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (115, 42, 'edittext', 'text', 110, 0, 1, '#tab_content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_text&action=edittext&id=${id}&lang=${lang}', '', '');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (116, 42, 'editor', 'text', 115, 0, 1, '#tab_editor', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_text&action=editor&id=${id}&lang=${lang}', 'init_saimod_sys_text_editor', '\\SYSTEM\\SAI\\saimod_sys_text');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (120, 42, 'todo', 'todo', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo', 'init_saimod_sys_todo', '\\SYSTEM\\SAI\\saimod_sys_todo');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (121, 42, 'todolist', 'todo', 120, 0, 0, '#tab_todo', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=todolist&filter=${filter}&search=${search}&page=${page}', 'init_saimod_sys_todo_todo', '\\SYSTEM\\SAI\\saimod_sys_todo');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (122, 42, 'doto', 'todo', 120, 0, 1, '#tab_todo', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=dotolist&filter=${filter}&search=${search}&page=${page}', 'init_saimod_sys_todo_doto', '\\SYSTEM\\SAI\\saimod_sys_todo');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (123, 42, 'stats', 'todo', 120, 0, 1, '#tab_todo', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=stats', 'init_saimod_sys_todo_stats', '\\SYSTEM\\SAI\\saimod_sys_todo');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (124, 42, 'todoopen', 'todo', 120, 0, 1, '#tab_todo', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=todo&todo=${todo}', 'init_saimod_sys_todo_todoopen', '\\SYSTEM\\SAI\\saimod_sys_todo');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (125, 42, 'todoclose', 'todo', 120, 0, 1, '#tab_todo', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=todo&todo=${todo}', 'init_saimod_sys_todo_todoclose', '\\SYSTEM\\SAI\\saimod_sys_todo');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (126, 42, 'new', 'todo', 120, 0, 1, '#tab_todo', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=new', 'init_saimod_sys_todo_new', '\\SYSTEM\\SAI\\saimod_sys_todo');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (130, 42, 'page', 'page', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_page', 'init_saimod_sys_page', '\\SYSTEM\\SAI\\saimod_sys_page');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (131, 42, 'all', 'page', 130, 0, 0, '#tab_page', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_page&action=list&group=${group}', 'init_saimod_sys_page_list', '\\SYSTEM\\SAI\\saimod_sys_page');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (132, 42, 'delete', 'page', 130, 0, 1, '#tab_page', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_page&action=deletedialog&group=${group}&ID=${id}', 'init_saimod_sys_page_delete', '\\SYSTEM\\SAI\\saimod_sys_page');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (133, 42, 'new', 'page', 130, 0, 1, '#tab_page', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_page&action=newdialog', 'init_saimod_sys_page_new', '\\SYSTEM\\SAI\\saimod_sys_page');

REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (140, 42, 'git', 'git', -1, 0, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_git', 'init_saimod_sys_git', '\\SYSTEM\\SAI\\saimod_sys_git');