TCSS 445 
Team 7                                
Gabriel Summers ghs9@uw.edu       
Tzu-Chien Lu tclu82@uw.edu 


1. Summary_team7: Login info


2. PHP source code: A front end login page
http://staff.washington.edu/ghs9/TCSS445/Nutri_login.php
Username:        jilarson@uw.edu
Password:        jilarsonTCSS445$$%


3. SQL source code: A .sql file export from vergil.u.washington.edu (port:8787) using MySQLWorkbench.
Username:        jilarson
Password:        jilarsonTCSS445$$%


Following query can find individual calories record for single meal:


SELECT mh.m_date, u.fname, m.name, f.name,
mh.serving_size * f.protein_g  AS 'protain(g)',
mh.serving_size * f.carb_g  AS 'carb(g)', mh.serving_size * f.fat_g  AS 'fat(g)',
mh.serving_size * f.calories_cal AS 'cal'

FROM ((user u JOIN meal m) JOIN meal_has_food mh) JOIN food f
WHERE u.id = m.id AND mh.id = m.id AND mh.id = m.id AND mh.m_id = m.m_id AND f.food_id = mh.food_id
############# adjust name, date, and meal name here ###################
AND u.fname = 'Gabriel' AND mh.m_date = '2016-12-02' AND m.name = 'lunch'
#################################################################
ORDER BY mh.m_date, u.id, m.name


Another sample query:


SELECT mh.m_date AS 'date', mh.m_id, u.fname, m.name AS 'meal_name', f.name AS 'food_name',                        SUM(mh.serving_size * f.protein_g)  AS 'protein_g',
SUM(mh.serving_size * f.carb_g)  AS 'carb_g', SUM(mh.serving_size * f.fat_g)  AS 'fat_g',
SUM(mh.serving_size * f.calories_cal) AS 'cal' 
                          
FROM user u, meal m, meal_has_food mh, food f 
############# adjust name, date, and meal name here ###################
WHERE u.id = m.id AND mh.id = m.id AND mh.id = m.id AND mh.m_id = m.m_id AND f.food_id = mh.food_id 
#################################################################
AND u.id = 1 
GROUP BY mh.m_date, mh.m_id


4. Tableau report: Directly link to vergil.u.washington.edu:87887, download the software and file then login with the same credential provided inside summary_team7.
Username:        jilarson
Password:        jilarsonTCSS445$$%


※ 3 & 4 need Husky OnNet for off-campus connection