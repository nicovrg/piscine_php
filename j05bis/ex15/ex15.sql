SELECT REVERSE(SUBSTR( CAST(`phone_number` as CHAR), 2)) as rebmunenohp
FROM distrib 
WHERE `phone_number` LIKE "05%";