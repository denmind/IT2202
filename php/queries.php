<?php
	$home_t1 = "SELECT p_type, ROUND(SUM(p_price),2) x
				FROM products
				GROUP BY p_type
				ORDER BY x DESC";
	
	$emp_num = "SELECT f_department, COUNT(*) AS x
				FROM faculty 
				GROUP BY f_department
				ORDER BY f_department";
	
	$op_six = "SELECT p_name,p_type,SUM(op_quantity) AS x
			   FROM order_products op 
			   JOIN products p
			   ON p.p_Id = op.p_Id
			   GROUP BY p_name
			   ORDER BY x DESC
			   LIMIT 7";
			   
	$emp_ord = "SELECT f.f_firstName,f.f_lastName, COUNT(*) AS x
				FROM orders o
				JOIN faculty f
				ON f.f_id = o.f_Id
				GROUP BY f.f_id
				ORDER BY x DESC
				LIMIT 7";
	
	/*	
	$f_department = "SELECT f_department
					 FROM faculty
					 GROUP BY f_department
					 ORDER BY f_department";
	
	
	$emp_num_this = "SELECT f_department, COUNT(*) AS x
					FROM faculty 
					WHERE YEAR(f_dateHired) = YEAR(NOW())
					GROUP BY f_department
					ORDER BY f_department";
				
	$emp_num_last = "SELECT f_department, COUNT(*) AS x
					FROM faculty 
					WHERE YEAR(f_dateHired) = (YEAR(NOW())-1)
					GROUP BY f_department
					ORDER BY f_department"
	*/
?>