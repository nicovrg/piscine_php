#!/usr/bin/php
<?php

function check_day ($day)
{
    if (preg_match("/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)$/", $day))
        return (true);
    return (false);
}

function check_day_num ($day_num)
{
    if (preg_match("/^([0-9]{1,2})$/", $day_num))
        return (true);
    return (false);
}

function check_month ($month)
{
    if (preg_match("/^[Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]oût|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]écembre$/", $month))
        return (true);
    return (false);
}

function check_year ($year)
{
    if (preg_match("/^[0-9]{1,4}$/", $year))
        return (true);
    return (false);
}

function check_time ($time)
{
    if (preg_match("/^[0-2][0-9]:[0-5][0-9]:[0-5][0-9]$/", $time))
        return (true);
    return (false);
}

function get_month ($month)
{
    if ($month == "Janvier" || $month == "janvier")
        return (1);
    if ($month == "Février" || $month == "février")
        return (2);
    if ($month == "Mars" || $month == "mars")
        return (3);
    if ($month == "Avril" || $month == "avril")
        return (4);
    if ($month == "Mai" || $month == "mai")
        return (5);
    if ($month == "Juin" || $month == "juin")
        return (6);
    if ($month == "Juillet" || $month == "juillet")
        return (7);
    if ($month == "Août" || $month == "août")
        return (8);
    if ($month == "Septembre" || $month == "septembre")
        return (9);
    if ($month == "Octobre" || $month == "octobre")
        return (10);
    if ($month == "Novembre" || $month == "novembre")
        return (11);
    if ($month == "Décembre" || $month == "décembre")
        return (12);
}

function get_time ($day, $day_num, $month, $year, $time) 
{
    $hour = substr($time, 0, -6);
    $minute = substr($time, 0, -3); 
    $minute = strrev($minute);
    $minute = substr($minute, 0, -3); 
    $minute = strrev($minute);
    $second = $time;
    $second = strrev($second);
    $second = substr($second, 0, -6);
    $second = strrev($second);
    $month = get_month ($month);
    echo (mktime($hour, $minute, $second, $month, $day_num, $year));
}

function main ($argv)
{
    $date = explode (" ", (trim(preg_replace("/[ \t]{1,}/", " ", $argv))));
    if (check_day($date[0]) === true)
    {
        if (check_day_num($date[1]) === true)
        {
            if (check_month($date[2]) === true)
            {
                if (check_year($date[3]) === true)
                {
                    if (check_time($date[4]) === true)
                        get_time ($date[0], $date[1], $date[2], $date[3], $date[4]);
                    else
                        print ("Wrong Format\n");
                        return (0);
                }
                else
                    print ("Wrong Format\n");
                    return (0);
            }
            else
                print ("Wrong Format\n");
                return (0);
        }
        else
            print ("Wrong Format\n");
            return (0);
    }
    else
        print ("Wrong Format\n");
        return (0);
    return (0);
}


if ($argc == 2)
{
    date_default_timezone_set('Europe/Paris');
    main ($argv[1]);
}
?>