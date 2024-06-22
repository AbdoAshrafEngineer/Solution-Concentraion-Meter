#include "StepperMotor.h"

volatile unsigned int previous_time_stepper = 0;

void stepper_motor(int steps, int direction, String num) {
  int motornum;
  
  if (num == "M1") {
    motornum = step1;
  } else if (num == "M2") {
    motornum = step2;
  }
  
  unsigned long current_time_stepper = millis();
  
  while (steps > 0) {
    if ((current_time_stepper - previous_time_stepper > 50) && c1 == 1) {
      digitalWrite(dir1, direction);
      digitalWrite(motornum, HIGH);
      c1 = 0;
      Serial.print(previous_time_stepper);
      Serial.print(" ");
      previous_time_stepper = current_time_stepper;
    }
    
    if (current_time_stepper - previous_time_stepper > 50 && c1 == 0) {
      digitalWrite(motornum, LOW);
      c1 = 1;
      steps--;
      previous_time_stepper = current_time_stepper;
    }
  }
}

