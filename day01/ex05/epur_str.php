#!/usr/bin/php
<?php
	function ft_split($str)
    {
        $arr = explode(" ",$str);
        $rra = array();
        foreach($arr as $key)
        {
            if (!empty($key))
                $rra[] = $key;
        }
        unset ($arr);
        return ($rra);
    }
	$bla = ft_split($argv[1]);
	for ($i = 0;$i < sizeof($bla);$i++)
        if ($i != sizeof($bla) - 1)
            echo "$bla[$i] ";
        else
            echo "$bla[$i]";
?>