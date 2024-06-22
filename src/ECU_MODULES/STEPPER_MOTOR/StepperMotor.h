#ifndef STEPPER_MOTOR_H
#define STEPPER_MOTOR_H

#include <Arduino.h>

#define dir1 14
#define step1 12
#define step2 13

extern volatile boolean c1;
extern volatile unsigned int previous_time_stepper;


void stepper_motor(int steps, int direction, String num);

#endif
