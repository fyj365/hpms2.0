ERROR - 2018-07-05 16:04:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND (`doctor_card`.`CARD_CODE` LIKE '%fiona%')
ORDER BY `doctor`.`STATUS` ASC, `' at line 6 - Invalid query: SELECT `doctor`.`DR_CODE` as `d_DR_CODE`, `doctor`.`E_TITLE` as `d_E_TITLE`, `doctor`.`C_TITLE`, `doctor`.`E_NAME`, `doctor`.`C_NAME`, `doctor`.`APS_EXPIRY_DATE`, `doctor`.`MPS_EXPIRY_DATE`, `doctor`.`BR_EXPIRY_DATE`, `doctor`.`TERM_DATE`, `doctor`.`STATUS`, `center`.`CENTER_CODE`, `center`.`E_NAME` as `c_E_NAME`, `center`.`C_NAME` as `c_C_NAME`, `center`.`TEL` as `c_TEL`, `center`.`FAX` as `c_FAX`, `doctor_card`.`CARD_CODE` as `d_CARD_CODE`
FROM `doctor`
LEFT JOIN `doctor_card` ON `doctor`.`DR_CODE` =  `doctor_card`.`DR_CODE`
LEFT JOIN `doctor_consult_hour` ON `doctor_consult_hour`.`DR_CODE` = `doctor`.`DR_CODE`
LEFT JOIN `center` ON `center`.`CENTER_CODE` = `doctor_consult_hour`.`CENTER_CODE`
WHERE  AND (`doctor_card`.`CARD_CODE` LIKE '%fiona%')
ORDER BY `doctor`.`STATUS` ASC, `doctor`.`DR_CODE` ASC, `doctor_consult_hour`.`AUTO_NO` ASC
 LIMIT 10
ERROR - 2018-07-05 16:22:48 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:22:48 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:22:48 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 722
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: first_center /Library/WebServer/Documents/cicool/application/controllers/administrator/Doctor.php 760
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 627
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 627
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 793
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 802
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 812
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 822
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 832
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 842
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 852
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 883
ERROR - 2018-07-05 16:29:01 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 894
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: first_center /Library/WebServer/Documents/cicool/application/controllers/administrator/Doctor.php 760
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 627
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 627
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 793
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 802
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 812
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 822
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 832
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 842
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 852
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 883
ERROR - 2018-07-05 16:29:04 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 894
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: first_center /Library/WebServer/Documents/cicool/application/controllers/administrator/Doctor.php 760
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 793
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 802
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 812
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 822
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 832
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 842
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 852
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 883
ERROR - 2018-07-05 16:31:46 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 894
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: first_center /Library/WebServer/Documents/cicool/application/controllers/administrator/Doctor.php 760
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 793
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 802
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 812
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 822
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 832
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 842
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 852
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 870
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 883
ERROR - 2018-07-05 16:31:51 --> Severity: Notice --> Undefined variable: doctor_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 894
ERROR - 2018-07-05 16:33:58 --> Severity: Notice --> Undefined variable: first_center /Library/WebServer/Documents/cicool/application/controllers/administrator/Doctor.php 760
ERROR - 2018-07-05 16:35:13 --> Severity: Notice --> Undefined variable: first_center /Library/WebServer/Documents/cicool/application/controllers/administrator/Doctor.php 760
ERROR - 2018-07-05 16:38:39 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 782
ERROR - 2018-07-05 16:39:33 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:39:33 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:39:33 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 722
ERROR - 2018-07-05 16:40:21 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:40:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:40:21 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 722
ERROR - 2018-07-05 16:40:46 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:40:46 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:40:46 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 722
ERROR - 2018-07-05 16:41:04 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:41:04 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:41:04 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 722
ERROR - 2018-07-05 16:42:21 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:42:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:42:21 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 580
ERROR - 2018-07-05 16:42:21 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 580
ERROR - 2018-07-05 16:42:21 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 736
ERROR - 2018-07-05 16:42:59 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:42:59 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:42:59 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 580
ERROR - 2018-07-05 16:42:59 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 580
ERROR - 2018-07-05 16:42:59 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 736
ERROR - 2018-07-05 16:43:55 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:43:55 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:43:55 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 737
ERROR - 2018-07-05 16:55:46 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 782
ERROR - 2018-07-05 16:57:51 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:57:51 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:57:51 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 736
ERROR - 2018-07-05 16:58:00 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:58:00 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 16:58:00 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 736
ERROR - 2018-07-05 16:59:24 --> Severity: Notice --> Undefined variable: doctor_consult_hour /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:59:24 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 562
ERROR - 2018-07-05 16:59:24 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 737
ERROR - 2018-07-05 17:04:25 --> Severity: Notice --> Undefined variable: doctor_center /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:04:25 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:04:25 --> Severity: Notice --> Undefined variable: has_consult /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 574
ERROR - 2018-07-05 17:04:25 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 735
ERROR - 2018-07-05 17:04:25 --> Severity: Notice --> Undefined variable: has_cards /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 877
ERROR - 2018-07-05 17:04:25 --> Severity: Notice --> Undefined variable: has_special_fee /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 914
ERROR - 2018-07-05 17:05:42 --> Severity: Notice --> Undefined variable: doctor_center /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:05:42 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:05:42 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 735
ERROR - 2018-07-05 17:05:42 --> Severity: Notice --> Undefined variable: has_cards /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 877
ERROR - 2018-07-05 17:05:42 --> Severity: Notice --> Undefined variable: has_special_fee /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 914
ERROR - 2018-07-05 17:06:47 --> Severity: Notice --> Undefined variable: doctor_center /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:06:47 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:06:47 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 735
ERROR - 2018-07-05 17:06:47 --> Severity: Notice --> Undefined variable: has_cards /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 877
ERROR - 2018-07-05 17:06:47 --> Severity: Notice --> Undefined variable: has_special_fee /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 914
ERROR - 2018-07-05 17:07:05 --> Severity: Notice --> Undefined variable: doctor_center /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:07:05 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:07:05 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 735
ERROR - 2018-07-05 17:07:05 --> Severity: Notice --> Undefined variable: has_cards /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 877
ERROR - 2018-07-05 17:07:05 --> Severity: Notice --> Undefined variable: has_special_fee /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 914
ERROR - 2018-07-05 17:09:09 --> Severity: Notice --> Undefined variable: doctor_center /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:09:09 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:09:09 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 735
ERROR - 2018-07-05 17:09:09 --> Severity: Notice --> Undefined variable: has_cards /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 877
ERROR - 2018-07-05 17:09:09 --> Severity: Notice --> Undefined variable: has_special_fee /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 914
ERROR - 2018-07-05 17:09:14 --> Severity: Notice --> Undefined variable: doctor_center /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:09:14 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 561
ERROR - 2018-07-05 17:09:14 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 735
ERROR - 2018-07-05 17:09:14 --> Severity: Notice --> Undefined variable: has_cards /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 877
ERROR - 2018-07-05 17:09:14 --> Severity: Notice --> Undefined variable: has_special_fee /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 914
ERROR - 2018-07-05 18:08:07 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 780
ERROR - 2018-07-05 18:08:31 --> Severity: Notice --> Undefined variable: has_payment /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_update.php 781
