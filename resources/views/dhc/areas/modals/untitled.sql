



UPDATE people_exit SET last_name = SUBSTRING_INDEX(fullname,' ',-1)

UPDATE people_exit SET middle_name = TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(fullname,last_name,1),' ',-2))
UPDATE people_exit SET middle_name = '' WHERE CHAR_LENGTH(middle_name)>3 
UPDATE people_exit SET first_name = SUBSTRING_INDEX(fullname,concat(middle_name,' ',last_name),1)
UPDATE people_exit SET first_name = middle_name WHERE first_name = ''
UPDATE people_exit SET middle_name = '' WHERE first_name = middle_name


SELECT
    p.fullnames AS 'Fullname',
    SUBSTRING_INDEX(p.fullnames, ' ', 1) AS 'Firstname',
    SUBSTRING(p.fullnames, LOCATE(' ',p.fullnames), 
        (LENGTH(p.fullnames) - (LENGTH(SUBSTRING_INDEX(p.fullnames, ' ', 1)) + LENGTH(SUBSTRING_INDEX(p.fullnames, ' ', -1))))
    ) AS 'Middlename',
    SUBSTRING_INDEX(p.fullnames, ' ', -1) AS 'Lastname',
    (LENGTH(p.fullnames) - LENGTH(REPLACE(p.fullnames, ' ', '')) + 1) AS 'Name Qt'
FROM people AS p;

UPDATE people SET surname = SUBSTRING_INDEX(people.fullnames, ' ', 1);
UPDATE people SET middle_name = SUBSTRING_INDEX(people.fullnames, ' ', -2);
UPDATE people SET othernames = SUBSTRING_INDEX(people.fullnames, ' ', -1);

