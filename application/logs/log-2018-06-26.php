<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-06-26 09:53:31 --> Severity: Parsing Error --> parse error /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 180
ERROR - 2018-06-26 09:53:36 --> Severity: Parsing Error --> parse error /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 180
ERROR - 2018-06-26 09:53:41 --> Severity: Parsing Error --> parse error /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 180
ERROR - 2018-06-26 09:55:24 --> Query error: Unknown column 'doctor.CARD_CODE' in 'where clause' - Invalid query: SELECT `doctor`.`DR_CODE` as `d_DR_CODE`, `doctor`.`E_TITLE` as `d_E_TITLE`, `doctor`.`C_TITLE`, `doctor`.`E_NAME`, `doctor`.`C_NAME`, `doctor`.`APS_EXPIRY_DATE`, `doctor`.`MPS_EXPIRY_DATE`, `doctor`.`BR_EXPIRY_DATE`, `doctor`.`TERM_DATE`, `doctor`.`STATUS`, `center`.`CENTER_CODE`, `center`.`E_NAME` as `c_E_NAME`, `center`.`C_NAME` as `c_C_NAME`, `center`.`TEL` as `c_TEL`, `center`.`FAX` as `c_FAX`, `doctor_card`.`CARD_CODE` as `d_CARD_CODE`
FROM `doctor`
JOIN `doctor_card` ON `doctor`.`DR_CODE` =  `doctor_card`.`DR_CODE`
LEFT JOIN `doctor_consult_hour` ON `doctor_consult_hour`.`DR_CODE` = `doctor`.`DR_CODE`
LEFT JOIN `center` ON `center`.`CENTER_CODE` = `doctor_consult_hour`.`CENTER_CODE`
WHERE (doctor.CARD_CODE LIKE '%june%') AND (`doctor`.`DR_CODE` LIKE '%abcd%') AND (`center`.`TEL` LIKE '%2723%')
ORDER BY `doctor`.`STATUS` ASC, `doctor`.`DR_CODE` ASC, `doctor_consult_hour`.`AUTO_NO` ASC
 LIMIT 10
ERROR - 2018-06-26 09:55:59 --> Query error: Unknown column 'doctor.CARD_CODE' in 'where clause' - Invalid query: SELECT `doctor`.`DR_CODE` as `d_DR_CODE`, `doctor`.`E_TITLE` as `d_E_TITLE`, `doctor`.`C_TITLE`, `doctor`.`E_NAME`, `doctor`.`C_NAME`, `doctor`.`APS_EXPIRY_DATE`, `doctor`.`MPS_EXPIRY_DATE`, `doctor`.`BR_EXPIRY_DATE`, `doctor`.`TERM_DATE`, `doctor`.`STATUS`, `center`.`CENTER_CODE`, `center`.`E_NAME` as `c_E_NAME`, `center`.`C_NAME` as `c_C_NAME`, `center`.`TEL` as `c_TEL`, `center`.`FAX` as `c_FAX`, `doctor_card`.`CARD_CODE` as `d_CARD_CODE`
FROM `doctor`
JOIN `doctor_card` ON `doctor`.`DR_CODE` =  `doctor_card`.`DR_CODE`
LEFT JOIN `doctor_consult_hour` ON `doctor_consult_hour`.`DR_CODE` = `doctor`.`DR_CODE`
LEFT JOIN `center` ON `center`.`CENTER_CODE` = `doctor_consult_hour`.`CENTER_CODE`
WHERE (doctor.CARD_CODE LIKE '%june%') AND (`doctor`.`DR_CODE` LIKE '%abcde%') AND (`center`.`TEL` LIKE '%2723%')
ORDER BY `doctor`.`STATUS` ASC, `doctor`.`DR_CODE` ASC, `doctor_consult_hour`.`AUTO_NO` ASC
 LIMIT 10
ERROR - 2018-06-26 09:56:23 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:01:53 --> Query error: Unknown column 'doctor.CARD_CODE' in 'where clause' - Invalid query: SELECT `doctor`.`DR_CODE` as `d_DR_CODE`, `doctor`.`E_TITLE` as `d_E_TITLE`, `doctor`.`C_TITLE`, `doctor`.`E_NAME`, `doctor`.`C_NAME`, `doctor`.`APS_EXPIRY_DATE`, `doctor`.`MPS_EXPIRY_DATE`, `doctor`.`BR_EXPIRY_DATE`, `doctor`.`TERM_DATE`, `doctor`.`STATUS`, `center`.`CENTER_CODE`, `center`.`E_NAME` as `c_E_NAME`, `center`.`C_NAME` as `c_C_NAME`, `center`.`TEL` as `c_TEL`, `center`.`FAX` as `c_FAX`, `doctor_card`.`CARD_CODE` as `d_CARD_CODE`
FROM `doctor`
JOIN `doctor_card` ON `doctor`.`DR_CODE` =  `doctor_card`.`DR_CODE`
LEFT JOIN `doctor_consult_hour` ON `doctor_consult_hour`.`DR_CODE` = `doctor`.`DR_CODE`
LEFT JOIN `center` ON `center`.`CENTER_CODE` = `doctor_consult_hour`.`CENTER_CODE`
WHERE (doctor.CARD_CODE LIKE '%june%') AND (`doctor`.`DR_CODE` LIKE '%abcd%')
ORDER BY `doctor`.`STATUS` ASC, `doctor`.`DR_CODE` ASC, `doctor_consult_hour`.`AUTO_NO` ASC
 LIMIT 10
ERROR - 2018-06-26 10:09:22 --> Severity: Warning --> is_array() expects exactly 1 parameter, 2 given /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 124
ERROR - 2018-06-26 10:11:28 --> Severity: Notice --> Undefined variable: field_search /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 124
ERROR - 2018-06-26 10:11:28 --> Severity: Error --> Cannot access empty property /Library/WebServer/Documents/cicool/system/core/Model.php 77
ERROR - 2018-06-26 10:12:01 --> Severity: Notice --> Undefined variable: field_search /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 124
ERROR - 2018-06-26 10:12:01 --> Severity: Warning --> is_array() expects exactly 1 parameter, 2 given /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 124
ERROR - 2018-06-26 10:13:16 --> Severity: Notice --> Undefined variable: field_search /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 124
ERROR - 2018-06-26 10:13:16 --> Severity: Error --> Cannot access empty property /Library/WebServer/Documents/cicool/system/core/Model.php 77
ERROR - 2018-06-26 10:15:18 --> Severity: Warning --> is_array() expects exactly 1 parameter, 2 given /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 124
ERROR - 2018-06-26 10:15:24 --> Severity: Warning --> is_array() expects exactly 1 parameter, 2 given /Library/WebServer/Documents/cicool/application/models/Model_doctor.php 124
ERROR - 2018-06-26 10:27:02 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:27:07 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:28:04 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:28:06 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:28:22 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:28:24 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:28:40 --> Severity: Notice --> Undefined index: HTTP_REFERER /Library/WebServer/Documents/cicool/application/core/My_Controller.php 476
ERROR - 2018-06-26 10:28:41 --> Severity: Notice --> Undefined index: HTTP_REFERER /Library/WebServer/Documents/cicool/application/core/My_Controller.php 476
ERROR - 2018-06-26 10:30:22 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:32:16 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `partner_card`
WHERE `CARD_CODE` = 'csrf'
AND `STATUS` = 'ACTIVE'
ERROR - 2018-06-26 10:32:30 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `partner_card`
WHERE `CARD_CODE` = '619'
AND `STATUS` = 'ACTIVE'
ERROR - 2018-06-26 10:32:54 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 10:32:59 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:34:13 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:34:15 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:34:26 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:34:28 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 337
ERROR - 2018-06-26 10:34:28 --> Severity: Notice --> Undefined variable: CLASS_CODEs_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 344
ERROR - 2018-06-26 10:34:28 --> Severity: Notice --> Undefined property: stdClass::$company_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 359
ERROR - 2018-06-26 10:34:28 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 382
ERROR - 2018-06-26 10:34:28 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 395
ERROR - 2018-06-26 10:34:37 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:34:46 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:37:45 --> Some variable did not contain a value.
ERROR - 2018-06-26 10:37:54 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `partner_card`
WHERE `CARD_CODE` = '2'
AND `STATUS` = 'ACTIVE'
ERROR - 2018-06-26 11:27:52 --> Severity: Notice --> Undefined variable: query /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line_tmp.php 199
ERROR - 2018-06-26 11:27:52 --> Severity: Error --> Call to a member function result() on null /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line_tmp.php 199
ERROR - 2018-06-26 11:28:42 --> Severity: Notice --> Undefined variable: query /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line_tmp.php 199
ERROR - 2018-06-26 11:28:42 --> Severity: Error --> Call to a member function result() on null /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line_tmp.php 199
ERROR - 2018-06-26 11:29:14 --> Severity: Notice --> Undefined variable: query /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line_tmp.php 199
ERROR - 2018-06-26 11:29:14 --> Severity: Error --> Call to a member function result() on null /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line_tmp.php 199
ERROR - 2018-06-26 13:01:06 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line_temp`
WHERE (`BATCH_NO` LIKE '%%' OR `CARD_CODE` LIKE '%%' OR `CLASS_CODE` LIKE '%%' OR `VOUCHER_NO` LIKE '%%' OR `TREATMENT_DATE` LIKE '%%' OR `DR_CODE` LIKE '%%' OR `CREATOR` LIKE '%%' OR `CREATE_DATE` LIKE '%%' OR `LAST_MODIFIER` LIKE '%%' OR `LAST_UPDATE` LIKE '%%' OR `UF1` LIKE '%%' OR `UF2` LIKE '%%' OR `UF3` LIKE '%%' OR `STATUS` LIKE '%%' )
AND `STATUS` = 'OPEN'
ORDER BY `CREATE_DATE` DESC, `BATCH_NO` ASC
 LIMIT 10
ERROR - 2018-06-26 13:01:10 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line_temp`
WHERE (`BATCH_NO` LIKE '%%' OR `CARD_CODE` LIKE '%%' OR `CLASS_CODE` LIKE '%%' OR `VOUCHER_NO` LIKE '%%' OR `TREATMENT_DATE` LIKE '%%' OR `DR_CODE` LIKE '%%' OR `CREATOR` LIKE '%%' OR `CREATE_DATE` LIKE '%%' OR `LAST_MODIFIER` LIKE '%%' OR `LAST_UPDATE` LIKE '%%' OR `UF1` LIKE '%%' OR `UF2` LIKE '%%' OR `UF3` LIKE '%%' OR `STATUS` LIKE '%%' )
AND `STATUS` = 'OPEN'
ORDER BY `CREATE_DATE` DESC, `BATCH_NO` ASC
 LIMIT 10
ERROR - 2018-06-26 13:03:00 --> Query error: Unknown column 'DR_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line_temp`
WHERE (`BATCH_NO` LIKE '%%' OR `CARD_CODE` LIKE '%%' OR `COM_ID` LIKE '%%' OR `VOUCHER_NO` LIKE '%%' OR `TREATMENT_DATE` LIKE '%%' OR `DR_CODE` LIKE '%%' OR `CREATOR` LIKE '%%' OR `CREATE_DATE` LIKE '%%' OR `LAST_MODIFIER` LIKE '%%' OR `LAST_UPDATE` LIKE '%%' OR `UF1` LIKE '%%' OR `UF2` LIKE '%%' OR `UF3` LIKE '%%' OR `STATUS` LIKE '%%' )
AND `STATUS` = 'OPEN'
ORDER BY `CREATE_DATE` DESC, `BATCH_NO` ASC
 LIMIT 10
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:03:32 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 97
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: DR_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 98
ERROR - 2018-06-26 13:21:00 --> Severity: Notice --> Undefined index: CLASS_CODE /Library/WebServer/Documents/cicool/application/models/Model_voucher_line_tmp.php 106
ERROR - 2018-06-26 13:23:36 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_view_register.php 43
ERROR - 2018-06-26 13:23:36 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_view_register.php 80
ERROR - 2018-06-26 13:23:36 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_view_register.php 99
ERROR - 2018-06-26 13:24:15 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line_temp`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `STATUS` LIKE '%%' ESCAPE '!'
AND  `CREATOR` LIKE '%%' ESCAPE '!'
AND  `CREATE_DATE` LIKE '%%' ESCAPE '!'
AND `STATUS` = 'OPEN'
ERROR - 2018-06-26 13:24:23 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line_temp`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%test2%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `STATUS` LIKE '%%' ESCAPE '!'
AND  `CREATOR` LIKE '%%' ESCAPE '!'
AND  `CREATE_DATE` LIKE '%%' ESCAPE '!'
AND `STATUS` = 'OPEN'
ERROR - 2018-06-26 13:24:25 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line_temp`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%test2%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `STATUS` LIKE '%%' ESCAPE '!'
AND  `CREATOR` LIKE '%%' ESCAPE '!'
AND  `CREATE_DATE` LIKE '%%' ESCAPE '!'
AND `STATUS` = 'OPEN'
ERROR - 2018-06-26 13:24:25 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line_temp`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%test2%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `STATUS` LIKE '%%' ESCAPE '!'
AND  `CREATOR` LIKE '%%' ESCAPE '!'
AND  `CREATE_DATE` LIKE '%%' ESCAPE '!'
AND `STATUS` = 'OPEN'
ERROR - 2018-06-26 13:24:25 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line_temp`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%test2%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `STATUS` LIKE '%%' ESCAPE '!'
AND  `CREATOR` LIKE '%%' ESCAPE '!'
AND  `CREATE_DATE` LIKE '%%' ESCAPE '!'
AND `STATUS` = 'OPEN'
ERROR - 2018-06-26 13:26:18 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_view_register.php 43
ERROR - 2018-06-26 13:26:18 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_view_register.php 80
ERROR - 2018-06-26 13:26:18 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_view_register.php 99
ERROR - 2018-06-26 13:26:21 --> Severity: Warning --> Missing argument 2 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 13:26:21 --> Severity: Warning --> Missing argument 3 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 153
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 157
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 162
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 164
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 189
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 153
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 160
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 161
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 187
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 13:26:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 13:26:37 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_view.php 95
ERROR - 2018-06-26 13:26:44 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 13:26:45 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 13:26:46 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 13:26:46 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 13:26:46 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 13:26:47 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 13:26:47 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 13:28:07 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_view_register.php 43
ERROR - 2018-06-26 13:28:43 --> Severity: Warning --> Missing argument 2 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 13:28:43 --> Severity: Warning --> Missing argument 3 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 153
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 157
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 162
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 164
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 189
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 153
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 160
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 161
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 187
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 13:28:43 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 13:28:52 --> Severity: Warning --> Missing argument 2 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 13:28:52 --> Severity: Warning --> Missing argument 3 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 153
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 157
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 162
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 164
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 189
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 153
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 160
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 161
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 187
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 13:28:52 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 13:29:03 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_view.php 95
ERROR - 2018-06-26 13:30:51 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_update.php 110
ERROR - 2018-06-26 14:22:36 --> Severity: Warning --> Missing argument 2 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 14:22:36 --> Severity: Warning --> Missing argument 3 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 14:22:36 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 153
ERROR - 2018-06-26 14:22:36 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 157
ERROR - 2018-06-26 14:22:36 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 162
ERROR - 2018-06-26 14:22:36 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 164
ERROR - 2018-06-26 14:22:36 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 189
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 153
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 160
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 161
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 187
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:22:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 101
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 104
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:22:40 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:28:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_summ.php 154
ERROR - 2018-06-26 14:31:04 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%201805-GEN-C%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 14:31:05 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT *
FROM `voucher_line`
WHERE `BATCH_NO` LIKE '%201805-GEN-C%' ESCAPE '!'
AND  `VOUCHER_NO` LIKE '%%' ESCAPE '!'
AND  `CARD_CODE` LIKE '%%' ESCAPE '!'
AND  `CLASS_CODE` LIKE '%%' ESCAPE '!'
AND  `TREATMENT_DATE` LIKE '%%' ESCAPE '!'
AND  `RECEIVE_DATE` LIKE '%%' ESCAPE '!'
AND  `DR_CODE` LIKE '%%' ESCAPE '!'
AND  `DR_E_NAME` LIKE '%%' ESCAPE '!'
AND  `PATIENT_NAME` LIKE '%%' ESCAPE '!'
AND  `TYPE` LIKE '%%' ESCAPE '!'
AND  `FEE_AMT` LIKE '%%' ESCAPE '!'
AND  `PAY_AMT` LIKE '%%' ESCAPE '!'
ERROR - 2018-06-26 14:41:13 --> Severity: Warning --> Missing argument 2 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 14:41:13 --> Severity: Warning --> Missing argument 3 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 153
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 157
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 162
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 164
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 189
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 153
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 160
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 161
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 187
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:41:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 14:41:23 --> Severity: Warning --> Missing argument 2 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 14:41:23 --> Severity: Warning --> Missing argument 3 for Voucher_line::add() /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 144
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 153
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Undefined variable: voucher_no /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 157
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 162
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 164
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 189
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 153
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 160
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 161
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 187
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:41:23 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 14:43:11 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 150
ERROR - 2018-06-26 14:43:11 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 163
ERROR - 2018-06-26 14:43:11 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 188
ERROR - 2018-06-26 14:43:12 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:43:12 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:43:12 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:43:12 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:43:12 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 163
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 166
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 176
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 181
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 187
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 188
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 199
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 216
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 221
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined variable: CARD_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 169
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:43:30 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 166
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 176
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 181
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 187
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 188
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 199
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 216
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 221
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined variable: CARD_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 169
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:45:47 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Undefined variable: CLASS_CODE /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 189
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 200
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 217
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Undefined variable: id /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 222
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Undefined variable: CARD_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 169
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:48:18 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 385
ERROR - 2018-06-26 14:49:13 --> Severity: Notice --> Undefined variable: type_arr /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 212
ERROR - 2018-06-26 14:49:13 --> Severity: Warning --> array_intersect(): Argument #1 is not an array /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 212
ERROR - 2018-06-26 14:49:13 --> Severity: Notice --> Undefined variable: CARD_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 169
ERROR - 2018-06-26 14:49:13 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:49:13 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:49:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:49:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:49:13 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 14:50:14 --> Severity: Notice --> Undefined variable: CARD_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 169
ERROR - 2018-06-26 14:50:14 --> Severity: Notice --> Undefined property: stdClass::$CLASS_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 176
ERROR - 2018-06-26 14:50:14 --> Severity: Notice --> Undefined property: stdClass::$DR_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 198
ERROR - 2018-06-26 14:50:14 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:50:14 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:50:14 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 14:50:14 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 14:57:11 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:57:11 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:57:11 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 14:57:11 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 14:57:45 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:57:45 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:57:45 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 14:57:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 14:58:03 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 14:58:03 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 14:58:03 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 14:58:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:02:15 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 171
ERROR - 2018-06-26 15:02:15 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 175
ERROR - 2018-06-26 15:02:15 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 15:02:15 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 15:02:15 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:02:15 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:09:06 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 171
ERROR - 2018-06-26 15:09:06 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 175
ERROR - 2018-06-26 15:09:06 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 214
ERROR - 2018-06-26 15:09:06 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 219
ERROR - 2018-06-26 15:09:06 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:09:06 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:16:30 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 15:16:30 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 15:16:30 --> Severity: Notice --> Undefined variable: treatment_date /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 274
ERROR - 2018-06-26 15:16:30 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:16:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:18:48 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 15:18:48 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 15:18:48 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:18:48 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:36:41 --> Some variable did not contain a value.
ERROR - 2018-06-26 15:36:54 --> Some variable did not contain a value.
ERROR - 2018-06-26 15:37:04 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 337
ERROR - 2018-06-26 15:37:04 --> Severity: Notice --> Undefined variable: CLASS_CODEs_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 344
ERROR - 2018-06-26 15:37:04 --> Severity: Notice --> Undefined property: stdClass::$company_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 359
ERROR - 2018-06-26 15:37:04 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 382
ERROR - 2018-06-26 15:37:04 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 395
ERROR - 2018-06-26 15:55:00 --> Some variable did not contain a value.
ERROR - 2018-06-26 15:58:09 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 15:58:09 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 15:58:09 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 15:58:09 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 16:05:20 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 16:05:20 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 16:05:20 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 16:05:20 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 16:05:36 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:06:30 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:07:09 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:07:15 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:07:30 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:07:34 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:07:35 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 337
ERROR - 2018-06-26 16:07:35 --> Severity: Notice --> Undefined variable: CLASS_CODEs_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 344
ERROR - 2018-06-26 16:07:35 --> Severity: Notice --> Undefined property: stdClass::$company_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 359
ERROR - 2018-06-26 16:07:35 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 382
ERROR - 2018-06-26 16:07:35 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 395
ERROR - 2018-06-26 16:07:40 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:07:51 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:08:00 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:08:57 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:09:17 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:09:19 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:09:29 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:09:35 --> Some variable did not contain a value.
ERROR - 2018-06-26 16:09:38 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 337
ERROR - 2018-06-26 16:09:38 --> Severity: Notice --> Undefined variable: CLASS_CODEs_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 344
ERROR - 2018-06-26 16:09:38 --> Severity: Notice --> Undefined property: stdClass::$company_CODE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 359
ERROR - 2018-06-26 16:09:38 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 382
ERROR - 2018-06-26 16:09:38 --> Severity: Notice --> Undefined variable: Active_companys_num /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/company/company_view.php 395
ERROR - 2018-06-26 16:12:35 --> Some variable did not contain a value.
ERROR - 2018-06-26 17:29:54 --> Severity: Parsing Error --> parse error, expecting `']'' /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line_tmp.php 329
ERROR - 2018-06-26 17:34:48 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 17:34:48 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 17:34:48 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 17:34:48 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 17:36:01 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 17:36:01 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 17:36:01 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 17:36:01 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 17:46:10 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 17:46:10 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 17:46:10 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 17:46:10 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 17:46:59 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 17:46:59 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 206
ERROR - 2018-06-26 17:46:59 --> Severity: Notice --> Undefined variable: TYPES /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 17:46:59 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 320
ERROR - 2018-06-26 17:52:34 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:52:34 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:52:34 --> Severity: Notice --> Undefined variable: doctor /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 213
ERROR - 2018-06-26 17:52:34 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 213
ERROR - 2018-06-26 17:53:01 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:53:01 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:53:01 --> Severity: Notice --> Undefined property: stdClass::$E_TILE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 213
ERROR - 2018-06-26 17:54:08 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:54:08 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:54:08 --> Severity: Notice --> Undefined property: stdClass::$E_TILE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 213
ERROR - 2018-06-26 17:55:08 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:55:08 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:55:41 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 17:55:41 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/voucher_line/voucher_line_add.php 205
ERROR - 2018-06-26 18:01:44 --> Some variable did not contain a value.
ERROR - 2018-06-26 18:07:20 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:07:20 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:07:21 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:07:22 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:07:43 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'MTRC'
AND `CLASS_CODE` = ''
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:08:05 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:08:08 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:11:22 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:13:08 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:17:53 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` IS NULL
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:20:41 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` = 'abcd'
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:24:38 --> Query error: Unknown column 'CARD_CODE' in 'where clause' - Invalid query: SELECT *
FROM `doctor_special_fee`
WHERE `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
AND `DR_CODE` = 'abcd'
AND `TYPE` = 'GP'
ERROR - 2018-06-26 18:42:36 --> Severity: Parsing Error --> parse error /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 393
ERROR - 2018-06-26 18:54:28 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT `CENTER_CODE`
FROM `doctor_card`
WHERE `PARTNER_DR_CODE` = 'ABCD-AMC'
AND `COM_ID` IS NULL
AND `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
ERROR - 2018-06-26 18:54:35 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT `CENTER_CODE`
FROM `doctor_card`
WHERE `PARTNER_DR_CODE` = 'ABCD-AMC'
AND `COM_ID` IS NULL
AND `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
ERROR - 2018-06-26 18:57:28 --> Query error: Unknown column 'CLASS_CODE' in 'where clause' - Invalid query: SELECT `CENTER_CODE`
FROM `doctor_card`
WHERE `PARTNER_DR_CODE` = 'ABCD-AMC'
AND `COM_ID` IS NULL
AND `CARD_CODE` = 'JUNE21'
AND `CLASS_CODE` = 'A'
ERROR - 2018-06-26 18:59:33 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 411
ERROR - 2018-06-26 18:59:33 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 420
ERROR - 2018-06-26 18:59:47 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 411
ERROR - 2018-06-26 18:59:47 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 420
ERROR - 2018-06-26 19:00:05 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 411
ERROR - 2018-06-26 19:00:05 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 420
ERROR - 2018-06-26 19:00:54 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 411
ERROR - 2018-06-26 19:00:54 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 420
ERROR - 2018-06-26 19:01:13 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 411
ERROR - 2018-06-26 19:01:13 --> Severity: Notice --> Undefined variable: doctor_code /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 420
ERROR - 2018-06-26 19:03:28 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 412
ERROR - 2018-06-26 19:03:37 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 412
ERROR - 2018-06-26 19:08:44 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 413
ERROR - 2018-06-26 19:11:00 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 412
ERROR - 2018-06-26 19:13:00 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 412
ERROR - 2018-06-26 19:14:57 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/controllers/administrator/Voucher_line.php 412
