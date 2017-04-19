`Powered by Zend Server	
 Zend Server Z-Ray - Queries list
 http://localhost:10088/lw_monitor/web/z/zabbix.php?action=problem.view&ddreset=1
 Total rows: 123
 #	Query	Time (ms)	Rows	Result	Message	Actions
 1	
 SET NAMES utf8
 	1.14	0	OK		
 2	
 SHOW TABLES LIKE 'dbversion'
 	7.78	1	OK		
 3	
 SELECT dv.mandatory,dv.optional FROM dbversion dv
 	1.03	1	OK		
 4	
 SELECT NULL FROM config c
 	0.88	1	OK		
 5	
 BEGIN
 	1.85 (98.03)	0 (1088)	OK		
 6	
 SELECT u.userid,u.autologout,s.lastaccess FROM sessions s,users u WHERE s.sessionid='607285ea481e22c9f5ed897e8e7d7014' AND s.status=0 AND s.userid=u.userid AND (s.lastaccess+u.autologout>1490585878 OR u.autologout=0)
 	2.02 (98.03)	1 (1088)	OK		
 7	
 SELECT g.usrgrpid FROM usrgrp g,users_groups ug WHERE ug.userid='1' AND g.usrgrpid=ug.usrgrpid AND g.users_status=1 LIMIT 1 OFFSET 0
 	1.95 (98.03)	0 (1088)	OK		
 8	
 UPDATE sessions SET lastaccess=1490585878 WHERE userid='1' AND sessionid='607285ea481e22c9f5ed897e8e7d7014'
 	2.06 (98.03)	1 (1088)	OK		
 9	
 SELECT MAX(g.gui_access) AS gui_access FROM usrgrp g,users_groups ug WHERE ug.userid='1' AND g.usrgrpid=ug.usrgrpid
 	3.87 (98.03)	1 (1088)	OK		
 10	
 SELECT u.userid,u.alias,u.name,u.surname,u.url,u.autologin,u.autologout,u.lang,u.refresh,u.type, u.theme,u.attempt_failed,u.attempt_ip,u.attempt_clock,u.rows_per_page FROM users u WHERE u.userid='1'
 	2.54 (98.03)	1 (1088)	OK		
 11	
 SELECT ug.userid FROM usrgrp g,users_groups ug WHERE ug.userid='1' AND g.usrgrpid=ug.usrgrpid AND g.debug_mode=1
 	4.57 (98.03)	0 (1088)	OK		
 12	
 COMMIT
 	3.53 (98.03)	0 (1088)	OK		
 13	
 SELECT p.* FROM profiles p WHERE p.userid=1 ORDER BY p.userid,p.profileid
 	6.53	553	OK		
 14	
 SELECT c.* FROM config c
 	2.26	1	OK		
 15	
 BEGIN
 	4.57 (640.39)	0 (1143)	OK		
 16	
 SELECT e.eventid,e.objectid,e.clock,e.ns FROM events e WHERE e.source='0' AND e.object='0' AND e.clock>='1427513878' AND e.clock<='1490585878' AND e.value='1' ORDER BY e.eventid DESC LIMIT 1001 OFFSET 0
 	588.22 (640.39)	1001 (1143)	OK		
 17	
 COMMIT
 	5.61 (640.39)	0 (1143)	OK		
 18	
 BEGIN
 	1.03 (98.03)	0 (1088)	OK		
 19	
 SELECT t.triggerid,t.description,t.expression,t.recovery_mode,t.recovery_expression,t.priority,t.url,t.flags FROM triggers t WHERE (t.triggerid BETWEEN '16389' AND '16395' OR t.triggerid IN ('14294','14478','14497','14749','14770','14779','14785','14787','14881','14893','14914','14941','14960','14979','15038','15077','15083','15095','15101','15108','15117','15119','15125','15210','15664','15665','15666','15667','15677','15678','15686','15687','15688','15729','15731','15733','15735','15737','15739','15745','15747','15749','15751','15755','15958','15965','15967','15973','15974','16026','16100','16239','16240','16241','16242','16257','16258','16259','16260','16271','16281','16283','16285','16301','16303','16305','16309','16311','16313','16315','16317','16321','16323','16325','16329','16331','16333','16339','16399','16411','16412','16413','16414','16418','16436','16453','16457','16461','16471')) AND NOT EXISTS (SELECT NULL FROM functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND (i.status<>0 OR h.status<>0)) AND t.status=0 AND NOT EXISTS (SELECT NULL FROM functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND h.maintenance_status=1) AND t.flags IN ('0','4')
 	7.49 (98.03)	56 (1088)	OK		
 20	
 SELECT d.triggerid_down,d.triggerid_up,t.value FROM trigger_depends d,triggers t WHERE d.triggerid_up=t.triggerid AND d.triggerid_down IN ('14478','14497','14749','14770','14779','14785','14787','14881','14914','14941','14960','14979','15108','15664','15665','15666','15667','15677','15678','15729','15731','15733','15737','15747','15749','15755','15958','15965','15967','15973','15974','16026','16100','16239','16240','16241','16242','16257','16258','16259','16260','16323','16325','16329','16331','16389','16390','16391','16411','16412','16413','16414','16418','16436','16457','16471')
 	1.31 (98.03)	8 (1088)	OK		
 21	
 SELECT d.triggerid_down,d.triggerid_up,t.value FROM trigger_depends d,triggers t WHERE d.triggerid_up=t.triggerid AND d.triggerid_down IN ('16257','16258','16259','16260','16389','16411','16412')
 	1.04 (98.03)	0 (1088)	OK		
 22	
 SELECT t.triggerid FROM triggers t,functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND (i.status=1 OR h.status=1 OR t.status=1) AND t.triggerid IN ('16257','16258','16259','16260','16389','16411','16412')
 	1.53 (98.03)	0 (1088)	OK		
 23	
 SELECT f.triggerid,i.hostid FROM functions f,items i WHERE f.triggerid IN ('14478','14497','14749','14770','14779','14785','14787','14881','14914','14941','14960','14979','15108','15664','15665','15666','15667','15677','15678','15729','15731','15733','15737','15747','15749','15755','15958','15965','15967','15973','15974','16026','16100','16257','16258','16259','16260','16323','16325','16329','16331','16389','16390','16391','16411','16412','16418','16436','16457','16471') AND f.itemid=i.itemid
 	2.25 (98.03)	62 (1088)	OK		
 24	
 SELECT h.hostid,h.name,h.status FROM hosts h WHERE h.flags IN (0,4) AND (h.hostid BETWEEN '10162' AND '10166' OR h.hostid IN ('10108','10160','10177','10179','10181','10182','10183','10188','10189','10223','10225','10229','10231','10253','10256','10257','10258','10260')) AND h.status IN (0,1,3)
 	1.62 (98.03)	23 (1088)	OK		
 25	
 SELECT t.functionid,t.triggerid,t.itemid FROM functions t WHERE t.triggerid IN ('14478','14497','14749','14770','14779','14785','14787','14881','14914','14941','14960','14979','15108','15664','15665','15666','15667','15677','15678','15729','15731','15733','15737','15747','15749','15755','15958','15965','15967','15973','15974','16026','16100','16257','16258','16259','16260','16323','16325','16329','16331','16389','16390','16391','16411','16412','16418','16436','16457','16471')
 	9.09 (98.03)	62 (1088)	OK		
 26	
 SELECT i.itemid,i.hostid,i.name,i.key_,i.value_type FROM items i WHERE i.flags IN (0,4) AND i.itemid IN ('27997','27998','28003','28004','28009','28010','28015','28016','28052','28448','28496','28551','28552','29238','29265','29267','29279','29288','29294','29296','29535','29647','29775','29823','29871','30318','30415','30429','30479','30527','30528','31080','31081','31086','31087','31290','31291','31721','31724','31727','31730','31736','31739','32251','32254','32257','32260','32349','32350','32419','32420','32581','32582','32583','32627','32628','32644','32693','32733','32734','32803')
 	8.23 (98.03)	61 (1088)	OK		
 27	
 COMMIT
 	1.02 (98.03)	0 (1088)	OK		
 28	
 BEGIN
 	1.09 (44.09)	0 (1051)	OK		
 29	
 SELECT e.eventid,e.objectid,e.clock,e.ns FROM events e WHERE e.source='0' AND e.object='0' AND e.clock>='1427513878' AND e.clock<='1490585878' AND e.eventid<='76870' AND e.value='1' ORDER BY e.eventid DESC LIMIT 1001 OFFSET 0
 	17.46 (44.09)	1001 (1051)	OK		
 30	
 COMMIT
 	1.06 (44.09)	0 (1051)	OK		
 31	
 BEGIN
 	9.24 (640.39)	0 (1143)	OK		
 32	
 SELECT t.triggerid,t.description,t.expression,t.recovery_mode,t.recovery_expression,t.priority,t.url,t.flags FROM triggers t WHERE t.triggerid IN ('14250','14252','14282','14340','14352','14490','14491','14492','14509','14511','14668','14674','14680','14767','14774','14830','14832','14836','14840','14846','14895','14909','14955','14985','14993','15004','15009','15060','15062','15064','15066','15068','15070','15073','15161','15162','15199','15200','15201','15202','15204','15205','15219','15220','15222','15223','15225','15226','15228','15229','15235','15256','15257','15259','15260','15268','15269','15272','15273','15276','15281','15282','15285','15303','15304','15306','15307','15309','15310','15321','15327','15332','15333','15344','15349','15350','15352','15353','15355','15356','15358','15359','15362','15367','15368','15370','15371','15373','15374','15382','15386','15396','15397','15400','15406','15412','15417','15418','15438','15464','15466','15468','15470','15472','15474','15476','15483','15485','15487','15502','15504','15506','15508','15511','15514','15517','15520','15521','15529','15543','15549','15555','15565','15576','15578','15580','15624','15631','15642','15689','15691','15693','15695') AND NOT EXISTS (SELECT NULL FROM functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND (i.status<>0 OR h.status<>0)) AND t.status=0 AND NOT EXISTS (SELECT NULL FROM functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND h.maintenance_status=1) AND t.flags IN ('0','4')
 	2.78 (640.39)	17 (1143)	OK		
 33	
 SELECT d.triggerid_down,d.triggerid_up,t.value FROM trigger_depends d,triggers t WHERE d.triggerid_up=t.triggerid AND d.triggerid_down IN ('14767','14774','15370','15371','15396','15397','15400','15406','15412','15417','15418','15520','15521','15529','15543','15549','15555')
 	1.25 (640.39)	4 (1143)	OK		
 34	
 SELECT d.triggerid_down,d.triggerid_up,t.value FROM trigger_depends d,triggers t WHERE d.triggerid_up=t.triggerid AND d.triggerid_down IN ('15370','15396','15417','15520')
 	1.24 (640.39)	0 (1143)	OK		
 35	
 SELECT t.triggerid FROM triggers t,functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND (i.status=1 OR h.status=1 OR t.status=1) AND t.triggerid IN ('15370','15396','15417','15520')
 	1.25 (640.39)	0 (1143)	OK		
 36	
 SELECT f.triggerid,i.hostid FROM functions f,items i WHERE f.triggerid IN ('14767','14774','15370','15396','15400','15406','15412','15417','15520','15529','15543','15549','15555') AND f.itemid=i.itemid
 	1.24 (640.39)	20 (1143)	OK		
 37	
 SELECT h.hostid,h.name,h.status FROM hosts h WHERE h.flags IN (0,4) AND (h.hostid BETWEEN '10223' AND '10229' OR h.hostid IN ('10108','10231','10232','10233','10234')) AND h.status IN (0,1,3)
 	7.39 (640.39)	12 (1143)	OK		
 38	
 SELECT t.functionid,t.triggerid,t.itemid FROM functions t WHERE t.triggerid IN ('14767','14774','15370','15396','15400','15406','15412','15417','15520','15529','15543','15549','15555')
 	3.92 (640.39)	20 (1143)	OK		
 39	
 SELECT i.itemid,i.hostid,i.name,i.key_,i.value_type FROM items i WHERE i.flags IN (0,4) AND i.itemid IN ('29276','29283','31071','31095','31159','31160','31221','31222','31283','31284','31285','31369','31433','31434','31501','31502','31567','31568','31629','31630')
 	8.15 (640.39)	20 (1143)	OK		
 40	
 COMMIT
 	1.44 (640.39)	0 (1143)	OK		
 41	
 BEGIN
 	1.89 (98.03)	0 (1088)	OK		
 42	
 SELECT e.eventid,e.objectid,e.clock,e.ns FROM events e WHERE e.source='0' AND e.object='0' AND e.clock>='1427513878' AND e.clock<='1490585878' AND e.eventid<='15386' AND e.value='1' ORDER BY e.eventid DESC LIMIT 1001 OFFSET 0
 	9.16 (98.03)	810 (1088)	OK		
 43	
 COMMIT
 	5.63 (98.03)	0 (1088)	OK		
 44	
 BEGIN
 	1.03 (1,437.86)	0 (58)	OK		
 45	
 SELECT t.triggerid,t.description,t.expression,t.recovery_mode,t.recovery_expression,t.priority,t.url,t.flags FROM triggers t WHERE t.triggerid IN ('13470','13486','13491','14160','14219','14237','14238','14305','14319','14329','14331','14333','14354','14363','14380','14386','14394','14399','14522','14534','14536','14553','14572','14592','14596','14603','14609','14627','14630','14649','14691','14713','14715','14723','14742','14744','14746','14794','14802','14804','14806','14810','14812','14814','14816','14818','14820','14822','14824','14826','14842','14844','14851','14860','14861','14872','14899','14902') AND NOT EXISTS (SELECT NULL FROM functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND (i.status<>0 OR h.status<>0)) AND t.status=0 AND NOT EXISTS (SELECT NULL FROM functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND h.maintenance_status=1) AND t.flags IN ('0','4')
 	1.78 (1,437.86)	1 (58)	OK		
 46	
 SELECT d.triggerid_down,d.triggerid_up,t.value FROM trigger_depends d,triggers t WHERE d.triggerid_up=t.triggerid AND d.triggerid_down='14713'
 	1.08 (1,437.86)	0 (58)	OK		
 47	
 SELECT t.triggerid FROM triggers t,functions f,items i,hosts h WHERE t.triggerid=f.triggerid AND f.itemid=i.itemid AND i.hostid=h.hostid AND (i.status=1 OR h.status=1 OR t.status=1) AND 1=0
 	20.34 (1,437.86)	0 (58)	OK		
 48	
 SELECT f.triggerid,i.hostid FROM functions f,items i WHERE f.triggerid='14713' AND f.itemid=i.itemid
 	1.43 (1,437.86)	2 (58)	OK		
 49	
 SELECT h.hostid,h.name,h.status FROM hosts h WHERE h.flags IN (0,4) AND h.hostid='10160' AND h.status IN (0,1,3)
 	1.70 (1,437.86)	1 (58)	OK		
 50	
 SELECT t.functionid,t.triggerid,t.itemid FROM functions t WHERE t.triggerid='14713'
 	1.52 (1,437.86)	2 (58)	OK		
 51	
 SELECT i.itemid,i.hostid,i.name,i.key_,i.value_type FROM items i WHERE i.flags IN (0,4) AND i.itemid IN ('28881','28885')
 	1.52 (1,437.86)	2 (58)	OK		
 52	
 COMMIT
 	7.37 (1,437.86)	0 (58)	OK		
 53	
 BEGIN
 	1.18 (44.09)	0 (1051)	OK		
 54	
 SELECT e.eventid,er1.r_eventid FROM events e LEFT JOIN event_recovery er1 ON er1.eventid=e.eventid LEFT JOIN event_recovery er2 ON er2.r_eventid=e.eventid WHERE e.source='0' AND e.object='0' AND e.eventid IN ('439230','439480','439642','439692','439724','439828','440422','440666','440784','440900','440902','442974','443548','443638','443900','444016','445056','446562','446908','447374','447478','449258','456638','457216','457450','457684','457896','459746','460120','460650','460696','460928','461018','461694','462776','464142','471552','472474','473050','473956','474094','474644','475610','475726','476652','478052','478174','478416','478522','478536')
 	5.47 (44.09)	50 (1051)	OK		
 55	
 SELECT a.acknowledgeid,a.userid,a.clock,a.message,a.action,a.eventid FROM acknowledges a WHERE a.eventid IN ('439230','439480','439642','439692','439724','439828','440422','440666','440784','440900','440902','442974','443548','443638','443900','444016','445056','446562','446908','447374','447478','449258','456638','457216','457450','457684','457896','459746','460120','460650','460696','460928','461018','461694','462776','464142','471552','472474','473050','473956','474094','474644','475610','475726','476652','478052','478174','478416','478522','478536') ORDER BY a.clock DESC
 	3.70 (44.09)	0 (1051)	OK		
 56	
 SELECT t.eventtagid,t.tag,t.value,t.eventid FROM event_tag t WHERE t.eventid IN ('439230','439480','439642','439692','439724','439828','440422','440666','440784','440900','440902','442974','443548','443638','443900','444016','445056','446562','446908','447374','447478','449258','456638','457216','457450','457684','457896','459746','460120','460650','460696','460928','461018','461694','462776','464142','471552','472474','473050','473956','474094','474644','475610','475726','476652','478052','478174','478416','478522','478536')
 	7.19 (44.09)	0 (1051)	OK		
 57	
 COMMIT
 	6.94 (44.09)	0 (1051)	OK		
 58	
 BEGIN
 	1.30 (640.39)	0 (1143)	OK		
 59	
 SELECT e.eventid,e.clock,er2.correlationid,er2.userid FROM events e LEFT JOIN event_recovery er1 ON er1.eventid=e.eventid LEFT JOIN event_recovery er2 ON er2.r_eventid=e.eventid WHERE e.source='0' AND e.object='0' AND e.eventid IN ('439441','439607','439681','439723','439827','440417','440665','440757','440887','440901','442973','443539','443599','443887','444003','445043','446549','446907','447371','447477','449229','456637','457215','457449','457683','457881','459711','460119','460579','460695','460927','461005','461673','462775','464123','471551','472473','473049','473895','474091','474629','475579','475713','476651','478051','478171','478415','478521','478535')
 	1.84 (640.39)	49 (1143)	OK		
 60	
 COMMIT
 	0.94 (640.39)	0 (1143)	OK		
 61	
 BEGIN
 	5.62 (98.03)	0 (1088)	OK		
 62	
 SELECT h.hostid,h.name,h.status,h.maintenanceid,h.maintenance_status,h.maintenance_type FROM hosts h WHERE h.flags IN (0,4) AND h.hostid='10253' AND h.status IN (0,1)
 	2.39 (98.03)	1 (1088)	OK		
 63	
 SELECT DISTINCT COUNT(DISTINCT g.graphid) AS rowscount,i.hostid FROM graphs g,graphs_items gi,items i WHERE i.hostid='10253' AND gi.graphid=g.graphid AND i.itemid=gi.itemid AND g.flags IN ('0','4') GROUP BY i.hostid
 	3.72 (98.03)	0 (1088)	OK		
 64	
 SELECT ht.* FROM hosts_templates ht WHERE hostid='10253'
 	3.02 (98.03)	1 (1088)	OK		
 65	
 SELECT ht.* FROM hosts_templates ht WHERE hostid='10104'
 	6.57 (98.03)	0 (1088)	OK		
 66	
 SELECT COUNT(DISTINCT s.screenid) AS rowscount,s.templateid FROM screens s WHERE s.templateid IS NOT NULL AND s.templateid IN ('10104','10253') GROUP BY s.templateid
 	1.89 (98.03)	0 (1088)	OK		
 67	
 COMMIT
 	1.16 (98.03)	0 (1088)	OK		
 68	
 SELECT a.eventid,a.mediatypeid,a.userid,a.esc_step,a.clock,a.status,a.alerttype,a.error FROM alerts a WHERE a.eventid IN ('439230','439441','439480','439607','439642','439681','439692','439723','439724','439827','439828','440417','440422','440665','440666','440757','440784','440887','440900','440901','440902','442973','442974','443539','443548','443599','443638','443887','443900','444003','444016','445043','445056','446549','446562','446907','446908','447371','447374','447477','447478','449229','449258','456637','456638','457215','457216','457449','457450','457683','457684','457881','457896','459711','459746','460119','460120','460579','460650','460695','460696','460927','460928','461005','461018','461673','461694','462775','462776','464123','464142','471551','471552','472473','472474','473049','473050','473895','473956','474091','474094','474629','474644','475579','475610','475713','475726','476651','476652','478051','478052','478171','478174','478415','478416','478521','478522','478535','478536') AND a.alerttype IN (0,1) ORDER BY a.alertid DESC
 	2.11	0	OK		
 69	
 BEGIN
 	1.05 (17.30)	0 (5)	OK		
 70	
 SELECT DISTINCT g.groupid FROM groups g,hosts_groups hg WHERE hg.hostid='10253' AND hg.groupid=g.groupid
 	3.73 (17.30)	1 (5)	OK		
 71	
 SELECT s.* FROM scripts s WHERE (s.groupid='14' OR s.groupid IS NULL) ORDER BY s.name
 	1.69 (17.30)	3 (5)	OK		
 72	
 SELECT h.hostid FROM hosts h WHERE h.flags IN (0,4) AND h.hostid='10253' AND h.status IN (0,1)
 	7.95 (17.30)	1 (5)	OK		
 73	
 COMMIT
 	2.88 (17.30)	0 (5)	OK		
 74	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	5.98 (1,437.86)	1 (58)	OK		
 75	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1,128.66 (1,437.86)	1 (58)	OK		
 76	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	7.94 (1,437.86)	1 (58)	OK		
 77	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	9.85 (1,437.86)	1 (58)	OK		
 78	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.71 (1,437.86)	1 (58)	OK		
 79	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.21 (1,437.86)	1 (58)	OK		
 80	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.95 (1,437.86)	1 (58)	OK		
 81	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.18 (1,437.86)	1 (58)	OK		
 82	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.13 (1,437.86)	1 (58)	OK		
 83	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	7.31 (1,437.86)	1 (58)	OK		
 84	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	4.53 (1,437.86)	1 (58)	OK		
 85	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.79 (1,437.86)	1 (58)	OK		
 86	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.46 (1,437.86)	1 (58)	OK		
 87	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.00 (1,437.86)	1 (58)	OK		
 88	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	7.54 (1,437.86)	1 (58)	OK		
 89	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.49 (1,437.86)	1 (58)	OK		
 90	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	5.45 (1,437.86)	1 (58)	OK		
 91	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	6.28 (1,437.86)	1 (58)	OK		
 92	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	13.01 (1,437.86)	1 (58)	OK		
 93	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.75 (1,437.86)	1 (58)	OK		
 94	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	14.74 (1,437.86)	1 (58)	OK		
 95	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.11 (1,437.86)	1 (58)	OK		
 96	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.17 (1,437.86)	1 (58)	OK		
 97	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	7.29 (1,437.86)	1 (58)	OK		
 98	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	5.92 (1,437.86)	1 (58)	OK		
 99	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	3.85 (1,437.86)	1 (58)	OK		
 100	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	10.08 (1,437.86)	1 (58)	OK		
 101	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	22.56 (1,437.86)	1 (58)	OK		
 102	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	4.39 (1,437.86)	1 (58)	OK		
 103	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	44.13 (1,437.86)	1 (58)	OK		
 104	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.57 (1,437.86)	1 (58)	OK		
 105	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	4.63 (1,437.86)	1 (58)	OK		
 106	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.40 (1,437.86)	1 (58)	OK		
 107	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.11 (1,437.86)	1 (58)	OK		
 108	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	17.19 (1,437.86)	1 (58)	OK		
 109	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	11.07 (1,437.86)	1 (58)	OK		
 110	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	4.15 (1,437.86)	1 (58)	OK		
 111	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.48 (1,437.86)	1 (58)	OK		
 112	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.62 (1,437.86)	1 (58)	OK		
 113	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.08 (1,437.86)	1 (58)	OK		
 114	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.10 (1,437.86)	1 (58)	OK		
 115	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.73 (1,437.86)	1 (58)	OK		
 116	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.41 (1,437.86)	1 (58)	OK		
 117	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	2.75 (1,437.86)	1 (58)	OK		
 118	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.49 (1,437.86)	1 (58)	OK		
 119	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.74 (1,437.86)	1 (58)	OK		
 120	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	3.48 (1,437.86)	1 (58)	OK		
 121	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.08 (1,437.86)	1 (58)	OK		
 122	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	3.08 (1,437.86)	1 (58)	OK		
 123	
 SELECT f.triggerid,f.functionid,h.hostid,h.host,h.name FROM functions f JOIN items i ON f.itemid=i.itemid JOIN hosts h ON i.hostid=h.hostid WHERE f.functionid='16746'
 	1.52 (1,437.86)	1 (58)	OK		
`