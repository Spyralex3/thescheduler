<?php
$xmlstr = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<schedule student_id='5220'>
	<timeframes>
		<timeframe tf_id='105'>
			<courses>
				<course cs_id='3' duration='2'>
					<official_course_id>EE-1021</official_course_id>
					<course_title>ΕΙΣΑΓΩΓΗ ΣΤΑ ΗΛΕΚΤΡΟΝΙΚΑ</course_title>
					<semester>1</semester>
					<course_type>lecture</course_type>
					<professor_name>Κωσταντίνος Φανουράκης</professor_name>
					<classroom>K16-113</classroom>
				</course>
			</courses>
		</timeframe>
		<timeframe tf_id='106'>
			<courses>
				<course cs_id='3' duration='2'>
					<official_course_id>EE-1021</official_course_id>
					<course_title>ΕΙΣΑΓΩΓΗ ΣΤΑ ΗΛΕΚΤΡΟΝΙΚΑ</course_title>
					<semester>1</semester>
					<course_type>lecture</course_type>
					<professor_name>Κωσταντίνος Φανουράκης</professor_name>
					<classroom>K16-113</classroom>
				</course>
			</courses>
		</timeframe>
		<timeframe tf_id='205'>
			<courses>
				<course cs_id='3' duration='2'>
					<official_course_id>EE-1021</official_course_id>
					<course_title>ΕΙΣΑΓΩΓΗ ΣΤΑ ΗΛΕΚΤΡΟΝΙΚΑ</course_title>
					<semester>1</semester>
					<course_type>lecture</course_type>
					<professor_name>Κωσταντίνος Φανουράκης</professor_name>
					<classroom>K16-113</classroom>
				</course>
			</courses>
		</timeframe>
		<timeframe tf_id='206'>
			<courses>
				<course cs_id='3' duration='2'>
					<official_course_id>EE-1021</official_course_id>
					<course_title>ΕΙΣΑΓΩΓΗ ΣΤΑ ΗΛΕΚΤΡΟΝΙΚΑ</course_title>
					<semester>1</semester>
					<course_type>lecture</course_type>
					<professor_name>Κωσταντίνος Φανουράκης</professor_name>
					<classroom>K16-113</classroom>
				</course>
			</courses>
		</timeframe>
		<timeframe tf_id='303'>
			<courses>
				<course cs_id='39' duration='2'>
					<official_course_id>EE-5011</official_course_id>
					<course_title>ΣΥΣΤΗΜΑΤΑ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ</course_title>
					<semester>5</semester>
					<course_type>lecture</course_type>
					<professor_name>Γρηγόρης Κουλούρας</professor_name>
					<classroom>K16-114</classroom>
				</course>
			</courses>
		</timeframe>
		<timeframe tf_id='304'>
			<courses>
				<course cs_id='39' duration='2'>
					<official_course_id>EE-5011</official_course_id>
					<course_title>ΣΥΣΤΗΜΑΤΑ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ</course_title>
					<semester>5</semester>
					<course_type>lecture</course_type>
					<professor_name>Γρηγόρης Κουλούρας</professor_name>
					<classroom>K16-114</classroom>
				</course>
			</courses>
		</timeframe>
		<timeframe tf_id='406'>
			<courses>
				<course cs_id='39' duration='2'>
					<official_course_id>EE-5011</official_course_id>
					<course_title>ΣΥΣΤΗΜΑΤΑ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ</course_title>
					<semester>5</semester>
					<course_type>lecture</course_type>
					<professor_name>Γρηγόρης Κουλούρας</professor_name>
					<classroom>K16-114</classroom>
				</course>
			</courses>
		</timeframe>
		<timeframe tf_id='407'>
			<courses>
				<course cs_id='39' duration='2'>
					<official_course_id>EE-5011</official_course_id>
					<course_title>ΣΥΣΤΗΜΑΤΑ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ</course_title>
					<semester>5</semester>
					<course_type>lecture</course_type>
					<professor_name>Γρηγόρης Κουλούρας</professor_name>
					<classroom>K16-114</classroom>
				</course>
			</courses>
		</timeframe>
	</timeframes>
	<pending_courses>
		<course cs_id='11'>
			<official_course_id>EE-2012</official_course_id>
			<course_title>ΑΝΑΛΟΓΙΚΑ ΗΛΕΚΤΡΟΝΙΚΑ</course_title>
			<semester>2</semester>
			<course_type>lab</course_type>
			<professor_name>Ηλίας Ζώης</professor_name>
			<classroom>K15-101</classroom>
			<tf_choices>
				<choice>
					<tf>101</tf>
					<tf>102</tf>
				</choice>
				<choice>
					<tf>201</tf>
					<tf>202</tf>
				</choice>
				<choice>
					<tf>203</tf>
					<tf>204</tf>
				</choice>
				<choice>
					<tf>205</tf>
					<tf>206</tf>
				</choice>
			</tf_choices>
		</course>
		<course cs_id='22'>
			<official_course_id>EE-3022</official_course_id>
			<course_title>ΨΗΦΙΑΚΑ ΗΛΕΚΤΡΟΝΙΚΑ</course_title>
			<semester>3</semester>
			<course_type>lab</course_type>
			<professor_name>Σπύρος Αθηναίος</professor_name>
			<classroom>K15-201</classroom>
			<tf_choices>
				<choice>
					<tf>401</tf>
					<tf>402</tf>
				</choice>
				<choice>
					<tf>403</tf>
					<tf>404</tf>
				</choice>
				<choice>
					<tf>405</tf>
					<tf>406</tf>
				</choice>
			</tf_choices>
		</course>
		<course cs_id='34'>
			<official_course_id>EE-4042</official_course_id>
			<course_title>ΤΑΛΑΝΤΩΤΕΣ ΚΑΙ ΦΙΛΤΡΑ - ΧΡΟΝΟΚΥΚΛΩΜΑΤΑ</course_title>
			<semester>4</semester>
			<course_type>lab</course_type>
			<professor_name>Γρηγόρης Κουλούρας</professor_name>
			<classroom>K15-203</classroom>
			<tf_choices>
				<choice>
					<tf>401</tf>
					<tf>402</tf>
				</choice>
				<choice>
					<tf>501</tf>
					<tf>502</tf>
				</choice>
				<choice>
					<tf>503</tf>
					<tf>504</tf>
				</choice>
				<choice>
					<tf>505</tf>
					<tf>506</tf>
				</choice>
			</tf_choices>
		</course>
	</pending_courses>
</schedule>
XML;
?>