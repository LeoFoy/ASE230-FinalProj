<?php
require_once('../lib/functions.php');
    //if the resume has been sumbitted
    if (count($_POST)>0){
        //username is set, user is logged on, save resume and view it
            $filename = createNewJsonfileFromArray($_POST);
            //send the filename through GET to display resume
            header("location: display_resume.php?resume=".$filename);
        }
    
        
    else{
?>
<?php
require_once('../theme/header.php');
?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"><?="Enter the information to create your resume"?></h1>
                </div>
<?php  if (!isset($_SESSION['username'])){
        ?>
        <div class="alert alert-dark" role="alert">
            <?="You are not logged in!"?> <a href="signup_or_login.php" class="alert-link">Login here to create resume.</a></div>
        <?php 
        }else{?>
    <form method="POST" >

    <article class="resume-wrapper text-center position-relative">
        <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
            <header class="resume-header pt-4 pt-md-0">
                <div class="row">
                    <div class="col">
                        
                            <div class="primary-info col-auto">

                                <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase"><input type="text" name="name" placeholder="Name"></input></h1>
                        
                                <ul class="list-unstyled">
                                    <li class="mb-2"><a class="text-link"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i><input type="email" name="email" placeholder="Email Address"></input></a></li>
                                <li><a class="text-link"><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i><input type="text" name="phone" placeholder="Phone Number"></input></a></li>
                              
                                </ul>
                            </div><!--//primary-info-->
                            <div class="secondary-info col-auto mt-2">
                                
                                <ul class="resume-social list-unstyled">
                                    <li class="mb-3"><span class="fa-container text-center me-2"><i class="fab fa-linkedin-in fa-fw"></i></span><input type="text" name="linkedin" placeholder="Linkedin Link"></input></a></li>
                                    <li class="mb-3"><a class="text-link" ><span class="fa-container text-center me-2"><i class="fab fa-github-alt fa-fw"></i></span><input type="text" name="github" placeholder="Github Link"></input></a></li>
                                    <li><a><span class="fa-container text-center me-2"><i class="fas fa-globe"></i></span><input type="text" name="website" placeholder="Website Link"></input></a></li>
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
                        <p class="mb-0"><input type="textbox" name="summary" placeholder="Summary of Yourself"></input></p>
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
                                                <h3 class="resume-position-title font-weight-bold mb-1"><input type="text" name="job1Title" placeholder="Last Job"></input></h3>
                                                <div class="resume-company-name ms-auto"><input type="text" name="job1Company" placeholder="Last Job Company"></div>
                                            </div><!--//row-->
                                            <div class="resume-position-time"><input type="text" name="job1Tenure" placeholder="Start Month and Year - End Month and Year"></div>
                                        </div><!--//resume-timeline-item-header-->
                                        <div class="resume-timeline-item-desc">
                                            <p><input type="text" name="job1Desc" placeholder="description"></p>
                                            <h4 class="resume-timeline-item-desc-heading font-weight-bold"><?='Achievements:'?></h4>
                                            <ul>
                                                <li><input type="text" name="job1Achieve" placeholder="achievement"></li>
                                            
                                            </ul>
                                        
                                            <h4 class="resume-timeline-item-desc-heading font-weight-bold"><?php 'Technologies used:'?></h4>
                                            <ul class="list-inline">
                                            
                                                <li class="list-inline-item"><span class="badge bg-secondary badge-pill"><input type="text" name="job1Tech1" placeholder="Tech used"></span></li>
                                        
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
                                            <div class="resume-skill-name"><input type="text" name="job1Skill1" placeholder="Skill"></div>
                                        
                                        </li>
                                    
                                    </ul>
                                </div><!--//resume-skill-item-->

                                <div class="resume-skill-item">
                                    <h4 class="resume-skills-cat font-weight-bold"><?='Others'?></h4>
                                    <ul class="list-inline">
                        
                                        <li class="list-inline-item "><span class="badge badge-light"><input type="text" name="job1OtherSkill1" placeholder="Other Skill"></span></li>
                                        

                                    </ul>
                                </div><!--//resume-skill-item-->
                            </div><!--resume-section-content-->
                        </section><!--//skills-section-->
                        <section class="resume-section education-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Education'?></h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled">
                        
                                    <li class="mb-2">
                                        <div class="resume-degree-org"><input type="text" name="Highschool" placeholder="Higschool Name`"></div>
                                        <div class="resume-degree-time"><input type="text" name="Highschoolyears" placeholder="Year - Year"></div>
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

                                        <div class="resume-award-name"><input type="text" name="award"></input></div>
                                        <div class="resume-award-desc"><input type="text" name="awardDesc"></input></div>
                                    </li>
                                  
                                </ul>
                            </div>
                        </section><!--//interests-section-->
                   
                        <section class="resume-section language-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Languages'?></h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled resume-lang-list">
                                    
                                    <li class="mb-2"><span class="resume-lang-name font-weight-bold"><input type="text" name="language"><input/></span></small></li>
                                    
                                </ul>
                            </div>
                        </section><!--//language-section-->
                        <section class="resume-section interests-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3"><?='Interests'?></h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled">
                                   
                                    <li class="mb-1"><input type="text" name="interest1" placeholder="Interest One"></li>
                                    <li class="mb-1"><input type="text" name="interest2" placeholder="Interest Two"></li>
                                </ul>
                            </div>
                        </section><!--//interests-section-->
                        
                    </div>
                </div><!--//row-->
               
            </div><!--//resume-body-->
            
        </div>
    </article>

         <button  type="submit"><?="Create Resume"?></button>
     <p id="demo"></p>
    </form>

    
  
            </div>
        </header>

        <?php
        require_once('../theme/footer.php');
        ?>
    </body>
</html>
<?php }}?>