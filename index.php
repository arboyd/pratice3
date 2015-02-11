<?php

//student: array grades average letter grade p/f

class Student {
    public $grades;  //array of grades
    public $averageGrade = -1; //average, default state -1
    public $letterGrade = 'n/a'; //letter grade 
    public $passFail = 'Student does not have a grade.' ; //pass fail
    
    //set grades, array
    public function setGrades( $a ){
        $this->grades = $a;
    }    
    
    //add grade to grades array
    public function addGrade( $a ){
        if ( !empty( $this->grades ) ) {
            array_push( $this->grades, $a );
        }
        else {
            $this->grades = array($a);
        }
    }
    
    //calculate all info from $grades
    public function calcGrade (){
        if ( !empty( $this->grades ) ) {
            $this->calcAverage();
            $this->calcLetterGrade();
            $this->calcPassFail();
        }
    }
    
    //calculate average, does nothing if grades array is empty
    public function calcAverage (){
        if ( !empty( $this->grades ) ) {
            $averageGrade = ( array_sum( $this->grades )/( count( $this->grades ) ) );
            $this->averageGrade = (int) round( $averageGrade, 0, PHP_ROUND_HALF_UP) ;
        }
    }
    
    //calulate letter grade from average
    public function calcLetterGrade (){
        if ( $this->averageGrade >= 90 ) {
            $this->letterGrade = 'A' ;   
        }
        elseif ( $this->averageGrade >= 80 ) {
            $this->letterGrade = 'B' ;
        }
        elseif ( $this->averageGrade >= 70 ) {
            $this->letterGrade = 'C' ;
        }
        elseif ( $this->averageGrade >= 60 ) {
            $this->letterGrade = 'D' ;
        }
        elseif ( $this->averageGrade == -1 ) {
            $this->letterGrade = 'n/a' ;
        }
        else {
            $this->letterGrade = 'F';
        }      
    }
    
    //calculate p/f from letter grade 
    public function calcPassFail () {
        if (( $this->letterGrade >= 'A' ) && ( $this->letterGrade < 'F' )){
            $this->passFail = 'Student is passing.' ;
        }
        elseif ( $this->letterGrade == 'F' ){
            $this->passFail = 'Student is failing.' ;
        }
    }
    
    //display student report (all fields)
    public function outputReport () {
        if ( !empty( $this->grades ) ){
            echo '<ul>' ;
            echo '<li>Exams: ' ;
            $count = count( $this->grades ); //count down grades while iterating in order to know when to place a comma
            foreach ($this->grades as $grade) {
                $count--;
                echo $grade;
                if ( $count > 0 ) {
                    echo ', ' ;
                }
                else {
                    echo '</li>';
                }
            }
            echo '<li>Average: ' . $this->averageGrade . '</li>';
            echo '<li>Grade: ' .  $this->letterGrade . '</li>';
            echo '<li>' . $this->passFail . '</li>';            
            echo '</ul>';
        }
        else {
            echo 'Nothing to report.' ;
        }
    }    
}

$student1 = new Student;
$student1->setGrades(array(89,90,90));
$student1->calcGrade();
$student1->outputReport();

$student2 = new Student;
$student2->setGrades(array(50,51,0));
$student2->calcGrade();
$student2->outputReport();

$counter = 1;
while ($counter < 100) {
    if ($counter % 3 == 0) {
        echo "Fizz" ;
        
        //maybe a better way to do this...? 
        if ( $counter % 5 == 0) {
            echo "Buzz" ;
        }
    } 
    elseif ( $counter % 5 == 0) {
        echo "Buzz" ;
    }
    else {
        echo $counter ;
    }    
    echo ' ';    
    $counter++;
}




?>

