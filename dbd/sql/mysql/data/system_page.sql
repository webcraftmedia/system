INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (0, 'start', 42, 'start', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saistart_sys_sai', 'init_saistart_sys_sai', '\\SYSTEM\\SAI\\saistart_sys_sai');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (1, 'todo', 42, 'start', 0, 0, '#todo_entries', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=todolist', '', '');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (2, 'log', 42, 'start', 0, 0, '#log_entries', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log&action=filter', '', '');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (10, 'api', 42, 'api', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_api', 'init_saimod_sys_api', '\\SYSTEM\\SAI\\saimod_sys_api');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (20, 'cache', 42, 'cache', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_cache', 'init_saimod_sys_cache', '\\SYSTEM\\SAI\\saimod_sys_cache');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (30, 'config', 42, 'config', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_config', 'init_saimod_sys_config', '\\SYSTEM\\SAI\\saimod_sys_config');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (40, 'cron', 42, 'cron', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_cron', 'init_saimod_sys_cron', '\\SYSTEM\\SAI\\saimod_sys_cron');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (50, 'docu', 42, 'docu', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_docu', 'init_saimod_sys_docu', '\\SYSTEM\\SAI\\saimod_sys_docu');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (60, 'files', 42, 'files', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_files', 'init_saimod_sys_files', '\\SYSTEM\\SAI\\saimod_sys_files');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (70, 'log', 42, 'log', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log', 'init_saimod_sys_log', '\\SYSTEM\\SAI\\saimod_sys_log');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (71, 'list', 42, 'log', 70, 0, '#tab_log', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log&action=filter&filter=${filter}', 'init_saimod_sys_log_log', '\\SYSTEM\\SAI\\saimod_sys_log');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (72, 'stats', 42, 'log', 70, 1, '#tab_log', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log&action=stats', 'init_saimod_sys_log_stats', '\\SYSTEM\\SAI\\saimod_sys_log');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (73, 'error', 42, 'log', 70, 1, '#tab_log', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_log&action=error&error=${error}', '', '');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (80, 'login', 42, 'login', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_login', 'init_saimod_sys_login', '\\SYSTEM\\SAI\\saimod_sys_login');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (90, 'mod', 42, 'mod', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_mod', 'init_saimod_sys_mod', '\\SYSTEM\\SAI\\saimod_sys_mod');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (100, 'security', 42, 'security', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_security', 'init_saimod_sys_security', '\\SYSTEM\\SAI\\saimod_sys_security');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (110, 'text', 42, 'text', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_text', 'init_saimod_sys_text', '\\SYSTEM\\SAI\\saimod_sys_text');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (120, 'todo', 42, 'todo', -1, 0, '#content', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo', 'init_saimod_sys_todo', '\\SYSTEM\\SAI\\saimod_sys_todo');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (121, 'todolist', 42, 'todo', 120, 0, '#tab_todo', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=todolist', 'init_saimod_sys_todo_todo', '\\SYSTEM\\SAI\\saimod_sys_todo');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (122, 'doto', 42, 'todo', 120, 1, '#tab_todo', '/sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=dotolist', 'init_saimod_sys_todo_doto', '\\SYSTEM\\SAI\\saimod_sys_todo');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (123, 'stats', 42, 'todo', 120, 1, '#tab_todo', '/sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=stats', 'init_saimod_sys_todo_stats', '\\SYSTEM\\SAI\\saimod_sys_todo');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (124, 'todoopen', 42, 'todo', 120, 1, '#tab_todo', '/sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=todo&todo=${todo}', 'init_saimod_sys_todo_todoopen', '\\SYSTEM\\SAI\\saimod_sys_todo');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (125, 'todoclose', 42, 'todo', 120, 1, '#tab_todo', '/sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=todo&todo=${todo}', 'init_saimod_sys_todo_todoclose', '\\SYSTEM\\SAI\\saimod_sys_todo');
INSERT INTO `system_page` (`id`, `name`, `group`, `state`, `parent_id`, `type`, `div`, `url`, `func`, `php_class`) VALUES (126, 'new', 42, 'todo', 120, 1, '#tab_todo', './sai.php?sai_mod=.SYSTEM.SAI.saimod_sys_todo&action=new', 'init_saimod_sys_todo_new', '\\SYSTEM\\SAI\\saimod_sys_todo');