CREATE OR REPLACE PROCEDURE drop_user(p_username IN VARCHAR2)
IS
BEGIN
    EXECUTE IMMEDIATE 'DROP USER "'||p_username||'"';
END;
/