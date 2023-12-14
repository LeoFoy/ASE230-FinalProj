<?php
require_once('../lib/functions.php');
?>

<?php
//the page is not accessible without a json path sent to it to display
if (!isset($_GET['resume'])){
    header('location: ../foot_in_door_website/index.php');
}
    //display the resume
else{
	$resumeArray = jsonFiletoArray($_GET['resume']);
	?>

<?php
require_once('../theme/header.php');
?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">

<article class="resume-wrapper text-center position-relative">
        <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
            <header class="resume-header pt-4 pt-md-0">
                <div class="row">
                    <div class="col">
                      
                            <div class="primary-info col-auto">

                                <h1 class="name mt-0 mb-1 text-black text-uppercase text-uppercase"><?=$resumeArray["name"]?></h1>
                        
                                <ul class="list-unstyled">
                                    <li class="mb-2"><a class="text-link" href="#"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i><?=$resumeArray["email"]?></a></li>
                                <li><a class="text-link" href="#"><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i><?=$resumeArray["phone"]?></a></li>
                              
                                </ul>
                            </div><!--//primary-info-->
                            <div class="secondary-info col-auto mt-2">
                                
                                <ul class="resume-social list-unstyled">
                                    <li class="mb-3"><span class="fa-container text-center me-2"><i class="fab fa-linkedin-in fa-fw"></i></span><?=$resumeArray["linkedin"]?></a></li>
                                    <li class="mb-3"><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fab fa-github-alt fa-fw"></i></span><?=$resumeArray["github"]?></a></li>
                                    <li><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fas fa-globe"></i></span><?=$resumeArray["website"]?></a></li>
                                </ul>
                            </div><!--//secondary-info-->
                        <!--//row-->
                    </div><!--//col-->
                </div><!--//row-->
            </header>
            <div class="resume-body p-5">
                <section class="resume-section summary-section mb-5">
                    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Summary'?></h2>
                    <div class="resume-section-content">
                        <p class="mb-0"><?=$resumeArray["summary"]?></p>
                    </div>
                
                </section><!--//summary-section-->
                <div class="row">
                    <div class="col-lg-9">
                        <section class="resume-section experience-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Work Experience'?></h2>
                            <div class="resume-section-content">
                                <div class="resume-timeline position-relative">
                                    
                                    <article class="resume-timeline-item position-relative pb-5">
                                        <div class="resume-timeline-item-header mb-2">
                                            <div class="d-flex flex-column flex-md-row">
                                                <h3 class="resume-position-title font-weight-bold mb-1"><?=$resumeArray["job1Title"]?></h3>
                                                <div class="resume-company-name ms-auto"><?=$resumeArray["job1Company"]?></div>
                                            </div><!--//row-->
                                            <div class="resume-position-time"><?=$resumeArray["job1Tenure"]?></div>
                                        </div><!--//resume-timeline-item-header-->
                                        <div class="resume-timeline-item-desc">
                                            <p><?=$resumeArray["job1Desc"]?></p>
                                            <h4 class="resume-timeline-item-desc-heading font-weight-bold"><?='Achievements:'?></h4>
                                            <ul>
                                                <li><?=$resumeArray["job1Achieve"]?></li>
                                            
                                            </ul>
                                        
                                            <h4 class="resume-timeline-item-desc-heading font-weight-bold"><?php 'Technologies used:'?></h4>
                                            <ul class="list-inline">
                                            
                                                <li class="list-inline-item"><span class="badge bg-secondary badge-pill"><?=$resumeArray["job1Tech1"]?></span></li>
                                        
                                            </ul>
                                        </div><!--//resume-timeline-item-desc-->

                                    </article><!--//resume-timeline-item-->

                                </div><!--//resume-timeline-->
                                
                            </div>
                        </section><!--//projects-section-->
                    </div>
                    <div class="col-lg-3">
                        <section class="resume-section skills-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Skills &amp; Tools' ?></h2>
                            <div class="resume-section-content">
                                <div class="resume-skill-item">
                                    <ul class="list-unstyled mb-4">
                                    
                                        <li class="mb-2">
                                            <div class="resume-skill-name"><?=$resumeArray["job1Skill1"]?></div>
                                        </li>
                                    
                                    </ul>
                                </div><!--//resume-skill-item-->

                                <div class="resume-skill-item">
                                    <h4 class="resume-skills-cat font-weight-bold"><?='Other Skills'?></h4>
                                    <ul class="list-inline">
                        
                                        <li class="list-inline-item"><span class="badge badge-light text-black"><?=$resumeArray["job1OtherSkill1"]?></span></li>
                                    </ul>
                                </div><!--//resume-skill-item-->
                            </div><!--resume-section-content-->
                        </section><!--//skills-section-->
                        <section class="resume-section education-section mb-5">
                            <h2 class="resume-section-title text-uppercase text-black font-weight-bold pb-3 mb-3"><?='Education'?></h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled">
                        
                                    <li class="mb-2">
                                        <div class="resume-degree-org"><?=$resumeArray["Highschool"]?></div>
                                        <div class="resume-degree-time"><?=$resumeArray["Highschoolyears"]?></div>
                                    </li>
                                
                                </ul>
                            </div>
                        </section><!--//education-section-->
                        <section class="resume-section reference-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Awards'?></h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled resume-awards-list">
                                   
                                    <li class="mb-2 ps-4 position-relative">
                                        <i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>

                                        <div class="resume-award-name"><?=$resumeArray["award"]?></div>
                                        <div class="resume-award-desc"><?=$resumeArray["awardDesc"]?></div>
                                    </li>
                                  
                                </ul>
                            </div>
                        </section><!--//interests-section-->
                   
                        <section class="resume-section language-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Languages'?></h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled resume-lang-list">
                                    
                                    <li class="mb-2"><span class="resume-lang-name font-weight-bold"><?=$resumeArray["language"]?></span></small></li>
                                    
                                </ul>
                            </div>
                        </section><!--//language-section-->
                        <section class="resume-section interests-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Interests'?></h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled">
                                   
                                    <li class="mb-1"><?=$resumeArray["interest1"]?></li>
                                    <li class="mb-1"><?=$resumeArray["interest2"]?></li>
                                </ul>
                            </div>
                        </section><!--//interests-section-->
                        
                    </div>
                </div><!--//row-->
               
            </div><!--//resume-body-->
            
        </div>
    </article> 


            </div>
        </header>

        <?php
        require_once('../theme/footer.php');
        ?>
    </body>
</html>
<?php }?>