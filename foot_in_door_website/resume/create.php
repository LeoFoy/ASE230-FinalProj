<?php
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: ../errors/error_must_be_signedin_to_access_page.php');
	exit();
}
if ($_SESSION['role']!=1){
	header('location: ../errors/error_not_authorized_in_this_area.php');
}

if (count($_POST)>0){
		$name = isset($_POST['name']) ? $_POST['name'] : null;
		$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : null;
		$email = isset($_POST['email']) ? $_POST['email'] : null;
		$linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : null;
		$github = isset($_POST['github']) ? $_POST['github'] : null;
		$website = isset($_POST['website']) ? $_POST['website'] : null;
		$summary = isset($_POST['summary']) ? $_POST['summary'] : null;
		$award = isset($_POST['award']) ? $_POST['award'] : null;
		$school_name = isset($_POST['school_name']) ? $_POST['school_name'] : null;
		$grad_year = isset($_POST['grad_year']) ? $_POST['grad_year'] : null;
		$interest = isset($_POST['interest']) ? $_POST['interest'] : null;
		$language = isset($_POST['language']) ? $_POST['language'] : null;
		$skill = isset($_POST['skill']) ? $_POST['skill'] : null;
		$job_name = isset($_POST['job_name']) ? $_POST['job_name'] : null;
		$company_name = isset($_POST['company_name']) ? $_POST['company_name'] : null;
		$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
		$achievement = isset($_POST['achievement']) ? $_POST['achievement'] : null;
		$technology = isset($_POST['technology']) ? $_POST['technology'] : null;
		
		
		$date_created = date('Y-m-d');
        query($pdo,'INSERT INTO resume (Name,User_ID,Phone_Number,Email,Linkedin,Github,Personal_Website,Summary,Date_Created) VALUES(?,?,?,?,?,?,?,?,?)',[$name,$_POST['selectedUser'],$phone_number,$email,$linkedin,$github,$website,$summary, $date_created]);
		//get the resume id to insert data into the other tables
		$resume_id = query($pdo, 'SELECT Resume_ID FROM resume WHERE Name=? AND Date_Created=? ', [$name, $date_created]);
		$resume_id=$resume_id->fetch();
		$resume_id = $resume_id['Resume_ID'];
		
		if (!empty($award)){
			query($pdo,'INSERT INTO awards (Resume_ID, Award) VALUES(?,?)',[$resume_id,$award]);
		} 
		if (!empty($school_name)){
			query($pdo,'INSERT INTO education (School_Name,Graduation_Year,Resume_ID) VALUES(?,?,?)',[$school_name,$grad_year,$resume_id]);
		}
		if (!empty($interest1)){
			query($pdo,'INSERT INTO interests (Resume_ID, Interest) VALUES(?,?)',[$resume_id,$interest]);
		}
		if (!empty($language)){
			query($pdo,'INSERT INTO languages (Resume_ID,Language) VALUES(?,?)',[$resume_id, $language]);
		}
		if (!empty($job1Skill1)){
			query($pdo,'INSERT INTO skills (Resume_ID,Skill) VALUES(?,?)',[$resume_id,$skill]);
		}
		if (!empty($job1Title)){
			query($pdo,'INSERT INTO work_experience (Resume_ID,Job_Name,Company_Name,Start_Date,Achievement,Technology_Used) VALUES(?,?,?,?,?,?)',[$resume_id,$job_name,$company_name,$start_date,$achievement,$technology]);
        }
}


?>
<?php
require_once('../../lib/db.php');
$users = query($pdo, 'SELECT User_ID, Username FROM users');
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
			<h1>Create Resume</h1>
				<form method="POST">
					<h4>Name</h4>
					<input type="text" name="name" />
					<h4>Choose a User to create Resume for:<h4>
					<select name="selectedUser">
					<?php 
					while($user=$users->fetch()){
						echo '<option  value="'.$user['User_ID'].'">'.$user['Username'].'</option>';
					}?>
					</select>
					<h4>Email</h4>
					<input type="email" name="email" />
					<h4>Phone Number</h4>
					<input type="text" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
					<p>
					<h4>Linkedin</h4>
					<input type="text" name="linkedin" />
					<h4>Personal Website</h4>
					<input type="text" name="website" />
					<h4>Summary</h4>
					<input type="text" name="summary" /><br />
					
					<h4>Job Name</h4>
					<input type="text" name="job_name" /><br />
					<h4>Company Name</h4>
					<input type="text" name="company_name" /><br />
					<h4>Start Date</h4>
					<input type="text" name="start_date" /><br />
					<h4>Achievement</h4>
					<input type="text" name="achievement" /><br />
					<h4>Technology Used</h4>
					<input type="text" name="technology" /><br />
					
					
					<h4>Skill</h4>
					<input type="text" name="skill" /><br />
					
					<h4>Language</h4>
					<input type="text" name="language" /><br />
					
					<h4>Interest</h4>
					<input type="text" name="interest" /><br />
					
					<h4>School Name</h4>
					<input type="text" name="school_name" /><br />
					<h4>Graduation Year</h4>
					<input type="text" name="grad_year" /><br />
					
					<h4>Award</h4>
					<input type="text" name="award" /><br />
					
					<button type="submit">Create Resume</button>
					</p>
				</form>
		</div>
    </div>
</header>
<?php
require_once("../../theme/footer.php");
?>