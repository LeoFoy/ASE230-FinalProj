<?php 
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

if (!isset($_SESSION['user_id']) and !isset($_SESSION['username']) and !isset($_SESSION['role'])){
	header('location: ../errors/error_must_be_signedin_to_access_page.php');
	exit();
}
if ($_SESSION['role']==0 && $_SESSION['user_id']!=$_GET['user_id']){
	header('location: ../errors/error_not_authorized_in_this_area.php');
	exit();
}
#checking to see if a user with that given id owns the resume -> since anyone could use their id to see any resume if they change resume_id value in query
if ($_SESSION['role']!=1){	
	$results = query($pdo,'SELECT Resume_ID FROM resume WHERE User_ID=?',[$_GET['user_id']]);
	$owned_resumes = array();
	while($owned_resume=$results->fetch()){
		$owned_resumes[] = $owned_resume['Resume_ID'];
	}
	if (!in_array($_GET['resume_id'], $owned_resumes)){
		header('location: ../errors/error_not_authorized_in_this_area.php');
		exit();
	}
}

#code checks if a given resume_id has created an entity or not (since you can enter null values in on create resume), if no row exists with the given entity you want to 
#update, it creates a row in the table, else it updates the row value(s).
if (count($_POST)>0){
	
		$date_created = date('Y-m-d');
        query($pdo,'UPDATE resume SET Name=?, Phone_Number=?, Email=?, Linkedin=?,Github=?, Personal_Website=?, Summary=? WHERE Resume_ID=?',[$_POST['name'],$_POST['phone_number'],$_POST['email'],$_POST['linkedin'],$_POST['github'],$_POST['website'],$_POST['summary'],$_GET['resume_id']]);
		
		if (!empty($_POST['award'])){
			$results = query($pdo,'SELECT * FROM awards join resume ON resume.Resume_ID = awards.Resume_ID WHERE resume.Resume_ID=?',[$_GET['resume_id']]);
			if ($results->rowCount()==0){
				query($pdo,'INSERT INTO awards (Resume_ID, Award) VALUES(?,?)',[$_GET['resume_id'],$_POST['award']]);
			}
			else query($pdo,'UPDATE awards SET Award=? WHERE Resume_ID=?',[$_POST['award'],$_GET['resume_id']]);
		}
		
		if (!empty($_POST['school_name'])){
			$results = query($pdo,'SELECT * FROM education join resume ON resume.Resume_ID = education.Resume_ID WHERE resume.Resume_ID=?',[$_GET['resume_id']]);
			if ($results->rowCount()==0){
				query($pdo,'INSERT INTO education (Resume_ID, School_Name, Graduation_Year) VALUES(?,?,?)',[$_GET['resume_id'],$_POST['school_name'],$_POST['grad_year']]);
			}
			else query($pdo,'UPDATE education SET School_Name=?, Graduation_Year=? WHERE Resume_ID=?',[$_POST['school_name'],$_POST['grad_year'],$_GET['resume_id']]);
		}
		
		if (!empty($_POST['interest'])){
			$results = query($pdo,'SELECT * FROM interests join resume ON resume.Resume_ID = interests.Resume_ID WHERE resume.Resume_ID=?',[$_GET['resume_id']]);
			if ($results->rowCount()==0){
				query($pdo,'INSERT INTO interests (Resume_ID, Interest) VALUES(?,?)',[$_GET['resume_id'],$_POST['interest']]);
			}
			else query($pdo,'UPDATE interests SET Interest=? WHERE Resume_ID=?',[$_POST['interest'],$_GET['resume_id']]);
		}
		
		if (!empty($_POST['language'])){
			$results = query($pdo,'SELECT * FROM languages join resume ON resume.Resume_ID = languages.Resume_ID WHERE resume.Resume_ID=?',[$_GET['resume_id']]);
			if ($results->rowCount()==0){
				query($pdo,'INSERT INTO languages (Resume_ID, Language) VALUES(?,?)',[$_GET['resume_id'],$_POST['language']]);
			}
			else query($pdo,'UPDATE languages SET Language=? WHERE Resume_ID=? ',[$_POST['language'],$_GET['resume_id']]);
		}
		
		if (!empty($_POST['skill'])){
			$results = query($pdo,'SELECT * FROM skills join resume ON resume.Resume_ID = skills.Resume_ID WHERE resume.Resume_ID=?',[$_GET['resume_id']]);
			if ($results->rowCount()==0){
				query($pdo,'INSERT INTO skills (Resume_ID, Skill) VALUES(?,?)',[$_GET['resume_id'],$_POST['skill']]);
			}
			else query($pdo,'UPDATE skills SET Skill=? WHERE Resume_ID=?',[$_POST['skill'],$_GET['resume_id']]);
		}
		
		if (!empty($_POST['job_name'])){
			$results = query($pdo,'SELECT * FROM work_experience join resume ON resume.Resume_ID = work_experience.Resume_ID WHERE resume.Resume_ID=?',[$_GET['resume_id']]);
			if ($results->rowCount()==0){
				query($pdo,'INSERT INTO work_experience (Resume_ID, Job_Name,Company_Name,Start_Date,Achievement,Technology_Used) VALUES(?,?,?,?,?,?)',[$_GET['resume_id'],$_POST['job_name'],$_POST['company_name'],$_POST['start_date'],$_POST['achievement'],$_POST['technology']]);
			}
			else query($pdo,'UPDATE work_experience SET Job_Name=?, Company_Name=?, Start_Date=?, Achievement=?, Technology_Used=? WHERE Resume_ID=?',[$_POST['job_name'],$_POST['company_name'],$_POST['start_date'],$_POST['achievement'],$_POST['technology'],$_GET['resume_id']]);
        }
}
$resumes=query($pdo, 'SELECT * FROM resume 
    LEFT JOIN work_experience ON resume.Resume_ID = work_experience.Resume_ID  
    LEFT JOIN skills ON resume.Resume_ID = skills.Resume_ID 
    LEFT JOIN languages ON resume.Resume_ID = languages.Resume_ID 
    LEFT JOIN interests ON resume.Resume_ID = interests.Resume_ID 
    LEFT JOIN education ON resume.Resume_ID = education.Resume_ID 
    LEFT JOIN awards ON resume.Resume_ID = awards.Resume_ID 
    WHERE resume.Resume_ID=?', [$_GET['resume_id']]);
$resume=$resumes->fetch();
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
			<h1>Edit Resume</h1>
				<form method="POST">
					<h4>Name</h4>
					<input type="text" name="name" value="<?= $resume['Name'] ?>"/>
					<h4>Email</h4>
					<input type="email" name="email" value="<?= $resume['Email'] ?>"/>
					<h4>Phone Number</h4>
					<input type="text" name="phone_number" value="<?= $resume['Phone_Number'] ?>"/>
					<p>
					<h4>Linkedin</h4>
					<input type="text" name="linkedin" value="<?= $resume['Linkedin'] ?>"/>
					<h4>Github</h4>
					<input type="text" name="github" value="<?= $resume['Github'] ?>"/>
					<h4>Personal Website</h4>
					<input type="text" name="website" value="<?= $resume['Personal_Website'] ?>"/>
					<h4>Summary</h4>
					<input type="text" name="summary" value="<?= $resume['Summary'] ?>"/><br />
					
					<h4>Job Name</h4>
					<input type="text" name="job_name" value="<?= $resume['Job_Name'] ?>"/><br />
					<h4>Company Name</h4>
					<input type="text" name="company_name" value="<?= $resume['Company_Name'] ?>"/><br />
					<h4>Start Date</h4>
					<input type="text" name="start_date" value="<?= $resume['Start_Date'] ?>"/><br />
					<h4>Achievement</h4>
					<input type="text" name="achievement" value="<?= $resume['Achievement'] ?>"/><br />
					<h4>Technology Used</h4>
					<input type="text" name="technology" value="<?= $resume['Technology_Used'] ?>"/><br />
					
					
					<h4>Skill</h4>
					<input type="text" name="skill" value="<?= $resume['Skill'] ?>"/><br />
					
					<h4>Language</h4>
					<h4>Language</h4>
					<input type="text" name="language" value="<?= $resume['Language'] ?>" /><br />
					
					<h4>Interest</h4>
					<input type="text" name="interest" value="<?= $resume['Interest'] ?>"/><br />
					
					<h4>School Name</h4>
					<input type="text" name="school_name" value="<?= $resume['School_Name'] ?>"/><br />
					<h4>Graduation Year</h4>
					<input type="text" name="grad_year" value="<?= $resume['Graduation_Year'] ?>"/><br />
					
					<h4>Award</h4>
					<input type="text" name="award" value="<?= $resume['Award'] ?>"/><br />
					<p>
					<br /><button type="submit" class="btn btn-primary mb-3">Edit Resume</button>
					</p>
				</form>
		</div>
    </div>
</header>
<?php
require_once("../../theme/footer.php");
?>