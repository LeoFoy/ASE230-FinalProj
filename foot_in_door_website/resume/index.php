
<?php
require_once("../../settings.php");
require_once("../../lib/db.php");
require_once("../../theme/header.php");

# Credits - ChatGPT helped me create the select statement to diplay the all the resumes properly after running into the issue of some resumes showing up duplicated and some resume id's not displaying properly(Julianna Truitt)
# Sorry for complexity in query statement! but this is the only way I could get table to properly display with all the values without duplication.
if ($_SESSION['role']!=0){
	$resumes = query($pdo, 'SELECT resume.Resume_ID,
		resume.User_ID,
		resume.Phone_Number,
		resume.Email,
		resume.Linkedin,
		resume.Github,
		resume.Personal_Website,
		resume.Summary,
		resume.Date_Created,
		resume.Name,
		GROUP_CONCAT(DISTINCT work_experience.Job_ID) AS Job_ID,
		GROUP_CONCAT(DISTINCT work_experience.Job_Name) AS Job_Name,
		GROUP_CONCAT(DISTINCT work_experience.Company_Name) AS Company_Name,
		GROUP_CONCAT(DISTINCT work_experience.Start_Date) AS Start_Date,
		GROUP_CONCAT(DISTINCT work_experience.Achievement) AS Achievement,
		GROUP_CONCAT(DISTINCT work_experience.Technology_Used) AS Technology_Used,
		GROUP_CONCAT(DISTINCT skills.Skill_ID) AS Skill_ID,
		GROUP_CONCAT(DISTINCT skills.Skill) AS Skill,
		GROUP_CONCAT(DISTINCT languages.Lang_ID) AS Lang_ID,
		GROUP_CONCAT(DISTINCT languages.Language) AS Language,
		GROUP_CONCAT(DISTINCT interests.Interest_ID) AS Interest_ID,
		GROUP_CONCAT(DISTINCT interests.Interest) AS Interest,
		GROUP_CONCAT(DISTINCT education.Education_ID) AS Education_ID,
		GROUP_CONCAT(DISTINCT education.School_Name) AS School_Name,
		GROUP_CONCAT(DISTINCT education.Graduation_Year) AS Graduation_Year,
		GROUP_CONCAT(DISTINCT awards.Awards_ID) AS Awards_ID,
		GROUP_CONCAT(DISTINCT awards.Award) AS Award
		FROM resume
		LEFT JOIN work_experience ON resume.Resume_ID = work_experience.Resume_ID
		LEFT JOIN skills ON resume.Resume_ID = skills.Resume_ID
		LEFT JOIN languages ON resume.Resume_ID = languages.Resume_ID
		LEFT JOIN interests ON resume.Resume_ID = interests.Resume_ID
		LEFT JOIN education ON resume.Resume_ID = education.Resume_ID
		LEFT JOIN awards ON resume.Resume_ID = awards.Resume_ID
		GROUP BY
			resume.Resume_ID, 
			resume.User_ID, 
			resume.Phone_Number, 
			resume.Email, 
			resume.Linkedin, 
			resume.Github, 
			resume.Personal_Website, 
			resume.Summary, 
			resume.Date_Created, 
			resume.Name');
	

	
	echo '<div class="container mt-5">';
	echo '<h1>Resume Index</h1>';
	echo '<a href="create.php" class="btn btn-primary mb-3">Create a new resume</a>';
	echo '<div class="table-responsive">';
	echo '<table class="table table-bordered table-striped">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Resume_ID</th>';
	echo '<th>Name</th>';
	echo '<th>User ID</th>';
	echo '<th>Resume Phone Number</th>';
	echo '<th>Email</th>';
	echo '<th>LinkedIn</th>';
	echo '<th>GitHub</th>';
	echo '<th>Website</th>';
	echo '<th>Date Created</th>';
	echo '<th>Job ID</th>';
	echo '<th>Job Name</th>';
	echo '<th>Company Name</th>';
	echo '<th>Start Date</th>';
	echo '<th>Achieverment</th>';
	echo '<th>Technology Used</th>';
	echo '<th>Skill ID</th>';
	echo '<th>Skill</th>';
	echo '<th>Lang_ID</th>';
	echo '<th>Language</th>';
	echo '<th>Intrest ID</th>';
	echo '<th>Intrest</th>';
	echo '<th>Education ID</th>';
	echo '<th>School Name</th>';
	echo '<th>Grauduation Year</th>';
	echo '<th>Awards ID</th>';
	echo '<th>Award</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	while ($resume=$resumes->fetch()){
		echo '<tr>';
		echo '<td><a href="detail.php?id='.$resume['Resume_ID'].'">'.$resume['Resume_ID'].'</a></td>';
		echo '<td><a href="../users/detail.php?id='.$resume['User_ID'].'">'.$resume['Name'].'</a></td>';
		echo '<td><a href="../users/detail.php?id='.$resume['User_ID'].'">'.$resume['User_ID'].'</td>';
		echo '<td>'.$resume['Phone_Number'].'</td>';
		echo '<td>'.$resume['Email'].'</td>';
		echo '<td>'.$resume['Linkedin'].'</td>';
		echo '<td>'.$resume['Github'].'</td>';
		echo '<td>'.$resume['Personal_Website'].'</td>';
		echo '<td>'.$resume['Date_Created'].'</td>';
		echo '<td>'.$resume['Job_ID'].'</td>';
		echo '<td>'.$resume['Job_Name'].'</td>';
		echo '<td>'.$resume['Company_Name'].'</td>';
		echo '<td>'.$resume['Start_Date'].'</td>';
		echo '<td>'.$resume['Achievement'].'</td>';
		echo '<td>'.$resume['Technology_Used'].'</td>';
		echo '<td>'.$resume['Skill_ID'].'</td>';
		echo '<td>'.$resume['Skill'].'</td>';
		echo '<td>'.$resume['Lang_ID'].'</td>';
		echo '<td>'.$resume['Language'].'</td>';
		echo '<td>'.$resume['Interest_ID'].'</td>';
		echo '<td>'.$resume['Interest'].'</td>';
		echo '<td>'.$resume['Education_ID'].'</td>';
		echo '<td>'.$resume['School_Name'].'</td>';
		echo '<td>'.$resume['Graduation_Year'].'</td>';
		echo '<td>'.$resume['Awards_ID'].'</td>';
		echo '<td>'.$resume['Award'].'</td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
	echo '</div>';
}
else if($_SESSION['role']==0 && isset($_SESSION['user_id'])){
	#direct resume users to the detail page to view thier resumes.
	#since users can have mutliple resumes, The users detail page is where they are redirected, and if they click on their resume ids
	#they can go to the details of the resume
	header('location: ../users/detail.php?id='.$_SESSION['user_id']);
	exit();
	
}
else {
	header('location: ../errors/error_must_be_signedin_to_access_page');
	exit();

}	

require_once("../../theme/footer.php");
	
?>