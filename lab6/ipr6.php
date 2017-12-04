<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			IPR-6
		</title>
	</head>
	<body>
		<?php 
		include "config-emp.php";

		echo "<p><b>Выбрать из таблицы всех работников, вывести на экран их имена и их
табельный номер:</b></p>";
		$query=mysqli_query($dbcnx,"select name, employeeID from employee");
		while($result = mysqli_fetch_array($query)) {
			echo $result["name"].": ".$result["employeeID"]."<br />";
		};


		echo "<br /><p><b>Выбрать список всех работников, которые работают программистами:</b></p>"
		;
		$query=mysqli_query($dbcnx,"select employeeID, name from employee where job='Программист'");
		while($result = mysqli_fetch_array($query)) {
			echo $result["employeeID"].": ".$result["name"]."<br />";
		};



		echo "<br /><p><b>Выбрать все рабочие дни работника с табельным номером 6651, в которые он работал более 8 ч:</b></p>"
		;
		$query=mysqli_query($dbcnx,"select * from assignment where (employeeID=6651) and (hours > 8)");
		while($result = mysqli_fetch_array($query)) {
			echo $result["employeeID"].": ".$result["workdate"].$result["hours"]."<br />";
		};


		echo "<br /><p><b>Подсчитать количество различных должностей в таблице работников:</b></p>"
		;
		$query=mysqli_query($dbcnx,"select count(distinct job) from employee");
		while($result = mysqli_fetch_array($query)) {
			echo "Количество равно = ".$result[0]."<br />";
		};		


		echo "<br /><p><b>Подсчитать количество работников по должностям в таблице работников:</b></p>"
		;
		$query=mysqli_query($dbcnx,"select count(*), job from employee group by job");
		while($result = mysqli_fetch_array($query)) {
			echo $result[0]." ".$result["job"]."<br />";
		};



		echo "<br /><p><b>Выбрать все записи из таблицы работников, которые единственные работают в своей должности:</b></p>"
		;
		$query=mysqli_query($dbcnx,"select * from employee group by job having count(*)=1");
		while($result = mysqli_fetch_array($query)) {
			echo $result[0]." - ".$result[1]." - ".$result[2]." - ".$result[3]."<br />";
		};


		echo "<br /><p><b>Выбрать все записи из таблицы работников и отсортировать их по должности в алфавитном порядке, а по имени в обратном порядке:</b></p>"
		;
		$query=mysqli_query($dbcnx,"select * from employee order by job asc, name desc");
		while($result = mysqli_fetch_array($query)) {
			echo $result[0]." - ".$result[1]." - ".$result[2]." - ".$result[3]."<br />";
		};


		echo "<br /><p><b>Выбрать первые пять записей из таблицы employeeSkills:</b></p>"
		;
		$query=mysqli_query($dbcnx,"select * from employeeSkills limit 5");
		while($result = mysqli_fetch_array($query)) {
			echo $result["employeeID"]." : ".$result["skill"]."<br />";
		};

		?>
	</body>
</html>