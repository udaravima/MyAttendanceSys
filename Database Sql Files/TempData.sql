select * from uoj_user;
select * from uoj_lecturer;
select * from uoj_student;
delete from uoj_user where user_id = 21;
alter table uoj_user modify column user_salt varchar(40) unique not null;
describe uoj_user;
UPDATE uoj_user 
SET 
    user_password = '$2y$10$JN5UosoxwymLVafJXO7.jea6ejRdMlWbkOIr1YPBT2/0YtM.kpet.',
    user_salt = '341ab18b3569d2d043125149c4ecdeae'
WHERE
    user_id = 20;
delete from uoj_user where username = '2020csc052';
SELECT 
    users.user_id, urd.*, users.user_role, users_user_status
FROM
    $table AS urd
        INNER JOIN
    $userTable AS users ON urd.user_id = users.user_id
WHERE
    users.user_id = 20;

SELECT 
    COUNT(*)
FROM
    uoj_lecturer;
    
SELECT 
    users.user_id, lecr.*, users.user_role, users.user_status
FROM
    uoj_lecturer AS lecr
        INNER JOIN
    uoj_user AS users ON users.user_id = lecr.user_id