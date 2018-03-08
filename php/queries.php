<?php
	$home_t1 = "SELECT
				  p_type,
				  ROUND(
					(
					  (
						(SUM(p_price)) /(
						  SELECT
							SUM(p_price)
						  FROM
							products
						)
					  ) * 100
					),
					2
				  ) x
				FROM
				  products
				GROUP BY
				  p_type
				ORDER BY
				  x DESC
				";
?>