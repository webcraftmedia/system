<?php

/*
//call=
INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (0, 0, -1, NULL, 'call', NULL);

    //call=page&page=
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (1, 0, 0, 'page', 'page', NULL);

    //call=sensor
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (140, 1, 1, 'sensor', 'sensorid', 'INT');

    //call=geopoint
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (41, 1, 1, 'geopoint', 'lat', 'ALL');
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (42, 1, 1, 'geopoint', 'long', 'ALL');
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (43, 1, 1, 'geopoint', 'radius', 'ALL');
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (45, 1, 1, 'geopoint', 'datatype', 'ALL');

    //call=geopoint&explore=1
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (46, 0, 1, 'geopoint', 'explore', 'FLAG');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (47, 1, 46, NULL, 'lat', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (48, 1, 46, NULL, 'long', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (49, 1, 46, NULL, 'radius', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (51, 1, 46, NULL, 'datatype', 'ALL');

    //call=log
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (135, 1, 0, 'log', 'json', 'ALL');

    //call=map&algo=
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (5, 0, 0, 'map', 'algo', NULL);
        //call=map&algo=&key=1
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (6, 0, 5, NULL, 'key', 'FLAG');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (16, 1, 6, NULL, 'type', 'ALL');

        //call=map&algo=&markers=1
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (7, 0, 5, NULL, 'markers', 'FLAG');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (17, 1, 7, NULL, 'x', 'UINT');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (18, 1, 7, NULL, 'y', 'UINT');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (19, 1, 7, NULL, 'zoom', 'UINT');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (20, 1, 7, NULL, 'from', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (21, 1, 7, NULL, 'to', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (22, 1, 7, NULL, 'type', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (23, 1, 7, NULL, 'provider', 'ALL');

        //call=map&algo=&animation=1
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (8, 0, 5, NULL, 'animation', 'FLAG');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (34, 1, 8, NULL, 'x', 'UINT');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (35, 1, 8, NULL, 'y', 'UINT');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (36, 1, 8, NULL, 'zoom', 'UINT');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (37, 1, 8, NULL, 'from', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (38, 1, 8, NULL, 'to', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (39, 1, 8, NULL, 'type', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (40, 1, 8, NULL, 'provider', 'ALL');

        //call=map&algo=
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (9, 1, 5, NULL, 'x', 'UINT');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (10, 1, 5, NULL, 'y', 'UINT');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (11, 1, 5, NULL, 'zoom', 'UINT');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (12, 1, 5, NULL, 'from', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (13, 1, 5, NULL, 'to', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (14, 1, 5, NULL, 'type', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (15, 1, 5, NULL, 'provider', 'ALL');   

    //call=account&action=
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (60, 0, 0, 'account', 'action', NULL);        
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (61, 1, 60, 'login', 'username', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (62, 1, 60, 'login', 'password', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (63, 1, 60, 'login', 'hashed', 'ALL');

        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (64, 1, 60, 'check', 'rightid', 'ALL');

        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (65, 1, 60, 'create', 'username', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (66, 1, 60, 'create', 'password', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (67, 1, 60, 'create', 'email', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (68, 1, 60, 'create', 'hashed', 'ALL');

        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (120, 0, 60, 'login', 'compatibility', 'FLAG');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (121, 1, 120, NULL, 'username', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (122, 1, 120, NULL, 'password', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (123, 1, 120, NULL, 'hashed', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (125, 0, 60, 'available', 'compatibility', 'FLAG');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (126, 1, 125, NULL, 'username', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (130, 0, 60, 'create', 'compatibility', 'FLAG');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (131, 1, 130, NULL, 'username', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (132, 1, 130, NULL, 'password', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (133, 1, 130, NULL, 'email', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (134, 1, 130, NULL, 'hashed', 'ALL');

    //call=analysis&action=&mthd=
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (70, 0, 0, 'analysis', 'action', NULL);
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (71, 0, 70, NULL, 'mthd', NULL);
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (72, 1, 71, 'within', 'lat', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (73, 1, 71, 'within', 'lng', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (74, 1, 71, 'within', 'when', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (75, 1, 71, 'gettotal', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (76, 1, 71, 'gettotal', 'intval', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (77, 1, 71, 'getseries', 'useruid', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (78, 1, 71, 'projection24', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (79, 1, 71, 'projection24', 'intval', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (80, 1, 71, 'get', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (81, 1, 71, 'get', 'acronym', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (82, 1, 71, 'gethist', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (83, 1, 71, 'gethist', 'sort', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (84, 1, 71, 'is', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (85, 1, 71, 'is', 'acronym', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (86, 1, 71, 'getbyuser', 'useruid', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (87, 1, 71, 'getallcond', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (88, 1, 71, 'getallcond', 'acronym', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (89, 1, 71, 'getalldefs', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (90, 1, 71, 'getalldefs', 'acronym', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (91, 1, 71, 'all', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (92, 1, 71, 'all', 'last', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (93, 1, 71, 'own', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (94, 1, 71, 'own', 'last', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (95, 1, 71, 'register', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (96, 1, 71, 'register', 'regid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (97, 1, 71, 'register', 'deviceid', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (98, 1, 71, 'fetch', 'useruid', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (99, 1, 71, 'fetch', 'last', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (100, 1, 71, 'explore', 'lat', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (101, 1, 71, 'explore', 'lng', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (102, 1, 71, 'explore', 'radius', 'ALL');
            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (103, 1, 71, 'explore', 'endtime', 'ALL');

            INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (104, 1, 71, 'citybyzip', 'zip', 'ALL');

    //call=input&type=
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (110, 0, 0, 'input', 'type', NULL);
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (111, 1, 110, 'data', 'source', 'ALL');
        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (112, 1, 110, 'data', 'json', 'ALL');

        INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (113, 1, 110, 'deviceinfo', 'json', 'ALL');

    //call=locale
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (145, 1, 0, 'locale', 'request', 'ARRAYINT');
    INSERT INTO `APICalls` (`ID`, `Flag`, `ParentID`, `ParentValue`, `Name`, `AllowedValues`) VALUES (146, 1, 0, 'locale', 'lang', 'LANG');

*/

class ApiClass extends \SYSTEM\API\apiloginclass {

    //DB hook for loginapi
    protected static function getUserDBInfo(){
        return new SQL\dasenseuser();}

    //#OLD
        //public static function call_account_flag_login(){}
        //public static function call_account_flag_loginstudy(){}
        //public static function call_account_flag_available(){}
        //public static function call_account_flag_registration(){}
        //public static function call_account_flag_registrationstudy(){}
        //public static function call_account_flag_protocol(){}
               
        //public static function flag_log(){we should better log somewhere in the admin interface}        

    //#Sensor & Geopoint
        public static function call_page_page_sensor($sensorid){
            return page_sensor::json($sensorid);}
        public static function call_page_page_geopoint($lat,$long,$radius,$datatype){
            return page_geopoint::json($lat, $long, $radius, $datatype);}
        public static function call_page_page_geopoint_flag_explore($lat,$long,$radius,$datatype){
            return page_geopoint_explore::json($lat, $long, $radius, $datatype);}

    //#Old logincalls
        public static function call_account_action_login_flag_compatibility($username, $password, $hashed){
            return DasenseLogin::login($username, $password, $hashed);}
        public static function call_account_action_available_flag_compatibility($username){
            return DasenseLogin::available($username);}
        public static function call_account_action_create_flag_compatibility($username,$password,$email,$hashed){
            return DasenseRegistration::create($username, $password, $email, $hashed);}
     
    //Logging system
        public static function call_log($json){
            return ProtocolLogger::protocol($json);}

    //#Input    
        public static function call_input_type_deviceinfo($json){
            $pars = new JSONParser($json);
            return $pars->input_deviceinfo();}
        public static function call_input_type_data($source,$json){
            $pars = new JSONParser($json, $source);
            return $pars->input_data();}

    //#Imageoverlays
        public static function call_map_algo_heatmapStd($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new heatmapStd_algo();
            return $imggen->generateTile($x,$y,$zoom,$time_start,$time_end,$type,$provider);}
        public static function call_map_algo_heatmapStd_flag_key($type){
            $imggen = new heatmapStd_algo();
            return $imggen->generateMapKey($type);}
        public static function call_map_algo_heatmapStd_flag_markers($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new heatmapStd_algo();
            return $imggen->getMarkers($x,$y,$zoom,$time_start,$time_end,$type,$provider);}

        public static function call_map_algo_heatmapRect($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new heatmapRect_algo();
            return $imggen->generateTile($x,$y,$zoom,$time_start,$time_end,$type,$provider);}
        public static function call_map_algo_heatmapRect_flag_key($type){
            $imggen = new heatmapRect_algo();
            return $imggen->generateMapKey($type);}
        public static function call_map_algo_heatmapRect_flag_markers($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new heatmapRect_algo();
            return $imggen->getMarkers($x,$y,$zoom,$time_start,$time_end,$type,$provider);}

        public static function call_map_algo_speedmap($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new speedmap_algo();
            return $imggen->generateTile($x,$y,$zoom,$time_start,$time_end,$type,$provider);}
        public static function call_map_algo_speedmap_flag_key($type){
            $imggen = new speedmap_algo();
            return $imggen->generateMapKey($type);}
        public static function call_map_algo_speedmap_flag_markers($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new speedmap_algo();
            return $imggen->getMarkers($x,$y,$zoom,$time_start,$time_end,$type,$provider);}

        public static function call_map_algo_differencemap($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new differencemap_algo();
            return $imggen->generateTile($x,$y,$zoom,$time_start,$time_end,$type,$provider);}
        public static function call_map_algo_differencemap_flag_key($type){
            $imggen = new differencemap_algo();
            return $imggen->generateMapKey($type);}
        public static function call_map_algo_differencemap_flag_markers($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new differencemap_algo();
            return $imggen->getMarkers($x,$y,$zoom,$time_start,$time_end,$type,$provider);}

        public static function call_map_algo_tramlines($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new tramlines_algo();
            return $imggen->generateTile($x,$y,$zoom,$time_start,$time_end,$type,$provider);}
        public static function call_map_algo_tramlines_flag_key($type){
            $imggen = new tramlines_algo();
            return $imggen->generateMapKey($type);}
        public static function call_map_algo_tramlines_flag_markers($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new tramlines_algo();
            return $imggen->getMarkers($x,$y,$zoom,$time_start,$time_end,$type,$provider);}

        public static function call_map_algo_tram($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new tram_algo();
            return $imggen->generateTile($x,$y,$zoom,$time_start,$time_end,$type,$provider);}
        public static function call_map_algo_tram_flag_key($type){
            $imggen = new tram_algo();
            return $imggen->generateMapKey($type);}
        public static function call_map_algo_tram_flag_markers($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new tram_algo();
            return $imggen->getMarkers($x,$y,$zoom,$time_start,$time_end,$type,$provider);}

        public static function call_map_algo_animationTest($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new animationTest_algo();
            return $imggen->generateTile($x,$y,$zoom,$time_start,$time_end,$type,$provider);}
        public static function call_map_algo_animationTest_flag_key($type){
            $imggen = new animationTest_algo();
            return $imggen->generateMapKey($type);}
        public static function call_map_algo_animationTest_flag_markers($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new animationTest_algo();
            return $imggen->getMarkers($x,$y,$zoom,$time_start,$time_end,$type,$provider);}
        public static function call_map_algo_animationTest_flag_animation($x,$y,$zoom,$time_start,$time_end,$type,$provider){
            $imggen = new animationTest_algo();
            return $imggen->getAnimation($x,$y,$zoom,$time_start,$time_end,$type,$provider);}

    //#Analysis API        
        // insert new bonus area
        public static function call_analysis_action_barea_mthd_insert($pswd,$json){
            return BonusAreaController::insert($pswd, $json);}
        // get all bonus areas
        public static function call_analysis_action_barea_mthd_getall(){
            return BonusAreaController::getall();}
        // get all active bonus areas
        public static function call_analysis_action_barea_mthd_getallactive(){
            return BonusAreaController::getallactive();}
        // within a bonus area?
        public static function call_analysis_action_barea_mthd_within($lat,$lng,$when){
            return BonusAreaController::within($lat, $lng, $when);}

        // get total statistics
        public static function call_analysis_action_statistic_mthd_gettotal($useruid,$intval){
            return StatisticsController::getTotalUserStatistics($useruid,$intval);}
        // get series statistics
        public static function call_analysis_action_statistic_mthd_getseries($useruid){
            return StatisticsController::getTotalSeriesStatistics($useruid);}
        // get 24 map projection
        public static function call_analysis_action_statistic_mthd_projection24($useruid,$intval){
            return StatisticsController::getProjection24($intval, $useruid);}

        // get own rank
        public static function call_analysis_action_rank_mthd_get($useruid,$acronym){
            return RankController::getRank($useruid, $acronym);}
        // get own history ranks
        public static function call_analysis_action_rank_mthd_gethist($useruid,$sort){
            return RankController::getRankHistoryByUser($useruid, $sort);}
        // questions calls
        public static function call_analysis_action_rank_mthd_is($useruid,$acronym){
            return RankController::isRank($useruid, $acronym);}

        // get all achievements by userUID
        public static function call_analysis_action_achievement_mthd_getbyuser($useruid){
            return AchievementController::getReachedAchievements($useruid);}
        // get all defined achievements conditions
        public static function call_analysis_action_achievement_mthd_getallcond($useruid, $acronym){
            return AchievementController::getAllAchievementDefinitionCondition($acronym, $useruid);}
        // get all defined achievements
        public static function call_analysis_action_achievement_mthd_getalldefs($useruid, $acronym){
            return AchievementController::getAllAchievementDefinitionCondition($acronym, $useruid);}

        // get current ranking all
        public static function call_analysis_action_ranking_mthd_all($useruid,$last){
            return RankingController::getRankingAll($useruid,$last);}
        // get current ranking own
        public static function call_analysis_action_ranking_mthd_own($useruid,$last){
            return RankingController::getRankingOwn($useruid,$last);}

        // get explore factor
        public static function call_analysis_action_data_mthd_explore($lat,$lng,$radius,$endtime){
            return DataController::getExplore($lat, $lng, $radius, $endtime);}
        // get cities by postal code
        public static function call_analysis_action_data_mthd_citybyzip($zip){
            return DataController::queryByZip($zip);}

        // store registration id
        public static function call_analysis_action_ctwodm_mthd_register($useruid, $regid, $deviceid){
            return MessageController::handleRegistrationId($regid, $useruid, $deviceid);}
        // fetch new messages
        public static function call_analysis_action_ctwodm_mthd_fetch($useruid, $last){
            return MessageController::fetchAllData($useruid,$last);}

    // call=locale
        public static function call_locale($request,$lang){
            $starttime = microtime(true);
            return JsonResult::toString($starttime, \SYSTEM\locale::getStrings($request, $lang));}

    //TODO remove -> backend
        public function call_preprocessing1233423DONOTCALL(){
            PreprocessAll::process();
        }
};