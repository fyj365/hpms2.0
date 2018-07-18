fy
ERROR - 2018-06-28 21:22:22 --> Query error: Unknown column '$id' in 'where clause' - Invalid query: SELECT *
FROM `doctor_card`
WHERE `DR_CODE` = `$id`
ERROR - 2018-06-28 21:22:43 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2018-06-28 21:23:39 --> Severity: Notice --> Undefined index: has_doctor_partner /Library/WebServer/Documents/cicool/application/controllers/administrator/Doctor.php 1251
ERROR - 2018-06-28 21:25:28 --> Severity: Notice --> Undefined variable: has_card /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 838
ERROR - 2018-06-28 21:30:20 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::sort_by() /Library/WebServer/Documents/cicool/application/controllers/administrator/Doctor.php 1245
ERROR - 2018-06-28 21:38:35 --> Query error: Table 'hpms.doctor_agreed_fee' doesn't exist - Invalid query: SELECT *
FROM `doctor_agreed_fee`
WHERE `DR_CODE` = 'doctor-test25'
ERROR - 2018-06-28 22:23:32 --> Query error: Table 'hpms.docotor_caard' doesn't exist - Invalid query: SELECT *
FROM `docotor_caard`
JOIN `agreed_fee` ON `doctor_card`.`CARD_CODE` = `agreed_fee`.`CARD_CODE`
LEFT JOIN `doctor_special_fee` ON `doctor_special_fee`.`CARD_CODE` = `agreed_fee`.`CARD_CODE` and `doctor_special_fee`.`CLASS_CODE` = `agreed_fee`.`CLASS_CODE`
JOIN `center` ON `doctor_special_fee`.`CENTER_CODE` = `center`.`CENTER_CODE`
WHERE `DR_CODE` = 'doctor-test25'
ERROR - 2018-06-28 22:23:44 --> Query error: Table 'hpms.docotor_card' doesn't exist - Invalid query: SELECT *
FROM `docotor_card`
JOIN `agreed_fee` ON `doctor_card`.`CARD_CODE` = `agreed_fee`.`CARD_CODE`
LEFT JOIN `doctor_special_fee` ON `doctor_special_fee`.`CARD_CODE` = `agreed_fee`.`CARD_CODE` and `doctor_special_fee`.`CLASS_CODE` = `agreed_fee`.`CLASS_CODE`
JOIN `center` ON `doctor_special_fee`.`CENTER_CODE` = `center`.`CENTER_CODE`
WHERE `DR_CODE` = 'doctor-test25'
ERROR - 2018-06-28 22:24:25 --> Query error: Column 'DR_CODE' in where clause is ambiguous - Invalid query: SELECT *
FROM `doctor_card`
JOIN `agreed_fee` ON `doctor_card`.`CARD_CODE` = `agreed_fee`.`CARD_CODE`
LEFT JOIN `doctor_special_fee` ON `doctor_special_fee`.`CARD_CODE` = `agreed_fee`.`CARD_CODE` and `doctor_special_fee`.`CLASS_CODE` = `agreed_fee`.`CLASS_CODE`
JOIN `center` ON `doctor_special_fee`.`CENTER_CODE` = `center`.`CENTER_CODE`
WHERE `DR_CODE` = 'doctor-test25'
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$FEE /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 895
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 896
ERROR - 2018-06-28 22:40:32 --> Severity: Notice --> Undefined property: stdClass::$PAY /Library/WebServer/Documents/cicool/application/views/backend/standart/administrator/doctor/doctor_view.php 898
ERROR - 2018-06-28 23:11:08 --> Query error: Table 'hpms.docor' doesn't exist - Invalid query: SELECT *
FROM `docor`
WHERE `DR_CODE` = 'doctor-test24'
ERROR - 2018-06-28 23:11:31 --> Query error: Table 'agreed_fee.type' doesn't exist - Invalid query: SELECT `doctor_card`.`COM_ID` as `d_COM_ID`, `doctor_card`.`CARD_CODE` as `d_CARD_CODE`, `agreed_fee`.`CLASS_CODE` as `c_CLASS_CODE`, `agreed_fee`.`TYPE` as `c_TYPE`, `agreed_fee`.`MED_DAYS` as `c_MED_DAYS`, `agreed_fee`.`CO_PAY` as `c_CO_PAY`, `agreed_fee`.`FEE` as `c_FEE`, `agreed_fee`.`PAY` as `c_PAY`, `doctor_special_fee`.`SPECIAL_FEE` as `SP_FEE`, `doctor_card`.`CENTER_CODE` as `c_CENTER_CODE`, `center`.`E_NAME` as `c_E_NAME`, `center`.`E_DISTRICT` as `c_E_DISTRICT`, `doctor_special_fee`.`REMARK` as `d_REMARK`, `doctor_special_fee`.`LAST_UPDATE` as `d_LAST_UPDATE`
FROM (`doctor_card`, `agreed_fee`.`TYPE`)
LEFT JOIN `agreed_fee` ON `doctor_card`.`CARD_CODE` = `agreed_fee`.`CARD_CODE`
LEFT JOIN `doctor_special_fee` ON `doctor_special_fee`.`CARD_CODE` = `agreed_fee`.`CARD_CODE` and `doctor_special_fee`.`CLASS_CODE` = `agreed_fee`.`CLASS_CODE` and `agreed_fee`.`TYPE` = `doctor_special_fee`.`TYPE`
LEFT JOIN `center` ON `doctor_card`.`CENTER_CODE` = `center`.`CENTER_CODE`
WHERE `doctor_card`.`DR_CODE` = 'doctor-test24'
AND `agreed_fee`.`TYPE` IN('CM', 'GP', 'SP')
ORDER BY `doctor_card`.`COM_ID`, `doctor_card`.`CARD_CODE`
