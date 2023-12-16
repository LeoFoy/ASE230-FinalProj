<?php
require_once('../lib/functions.php');
require_once('../lib/db.php');
require_once('../settings.php');
require_once('../theme/header.php');
?>

<?php
// the user is logged in
if (!isset($_SESSION['user_id'])){
    header('location: index.php');
}
    //display resume 

else{
        $resume_id = $_GET['id'];     
        //get the resume id to insert data into the other tables
        $resume = query($pdo, 'SELECT name,Phone_Number,Linkedin,Github,Personal_Website FROM resume WHERE Resume_ID=?', [$resume_id]);
    
        $resume=$resume->fetch();
                
        $awards=query($pdo,'SELECT Award FROM awards WHERE Resume_ID=?',[$resume_id]);  
        
        $education = query($pdo,'SELECT School_Name,Graduation_Year FROM education WHERE Resume_ID=?',[$resume_id]);
        
        $interests = query($pdo,'SELECT * FROM interests WHERE Resume_ID=?',[$resume_id]);
        
        $languages = query($pdo,'SELECT * FROM languages WHERE Resume_ID=?',[$resume_id]);
        
        $skills = query($pdo,'SELECT * FROM skills WHERE Resume_ID=?',[$resume_id]);
        
        $workExperience = query($pdo,'SELECT * FROM work_experience WHERE Resume_ID=?',[$resume_id]);
        //start of contact table
        echo '<div class="container px-4 px-lg-5 my-5">';
        echo '<div class="text-center text-white">';
        echo '<h2>Contact</h2><table>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th>Phone Number</th>';
        echo '<th>LinkedIn</th>';
        echo '<th>GitHub</th>';
        echo '<th>Personal Website</th>';
        echo '<th>Email</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo "<tr><td>".$resume['name']."</td>";
        echo "<td>".$resume['Phone_Number']."</td>";
        echo "<td>".$resume['Linkedin']."</td>";
        echo "<td>".$resume['Github']."</td>";
        echo "<td>".$resume['Personal_Website']."</td></tr></tbody></table>";
        //end of contact table
        //start of Education table
        echo '<h2>Education</h2><table>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>School Name</th>';
        echo '<th>Graduation Year</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($school=$education->fetch()) {
        echo "<tr><td>".$school['School_Name']."</td><td>".$school['Graduation_Year']."</tr>";
        }
        echo "</tbody></table>";
        //end of Education table
        //start of Work Experience table
        echo '<h2>Work Experience</h2><table>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Job Name</th>';
        echo '<th>Company Name</th>';
        echo '<th>Achievement</th>';
        echo '<th>Technology Used</th>';
        echo '<th>Start Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($work=$workExperience->fetch()) {
        echo "<tr><td>".$work['Job_Name']."</td><td>".$work['Company_Name']."</td><td>".$work['Achievement']."</td><td>".$work['Technology_Used']."</td><td>".$work['Start_Date']."</td></tr>";
        }
        echo "</tbody></table>";
                //end of work experience table
        //start of Awards table
        echo '<h2>Awards</h2><table>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Award Name</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($award=$awards->fetch()) {
        echo "<tr><td>".$award['Award']."</td></tr>";
        }
        echo "</tbody></table>";
        //end of awards table
        //start language table
        echo '<h2>Languages</h2><table>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
		echo '<tr>';
        echo '<th>Languages</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($language=$languages->fetch()) {
        echo "<tr><td>".$language['Language']."</td></tr>";
        }
        echo "</tbody></table>";
        //end of language table
        //start of skills table
        echo '<h2>Skills</h2><table>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
		echo '<tr>';
        echo '<th>Skills</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($skill=$skills->fetch()) {
        echo "<tr><td>".$skill['Skill']."</td></tr>";
        }
        echo "</tbody></table>";
                //start of skills table
        echo '<h2>Interests</h2><table>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead>';
		echo '<tr>';
        echo '<th>Interests</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($interest=$interests->fetch()) {
        echo "<tr><td>".$interest['Interest']."</td></tr>";
        }
        echo "</tbody></table>";
        echo '</div>';
        echo '</div>';
        echo '</header>';
    }
    
?>
