#ifndef APP_H
#define APP_H
/* ----------------- Includes -----------------*/
#include"WIFI_SETUP\Wifi_Setup.h"
#include"ECU_MODULES\STEPPER_MOTOR\StepperMotor.h"
#include"SOLUTION_CONCENTRATION\GetConcentration.h"
#include "ECU_MODULES\rtcds1302\virtuabotixRTCx.h"
#include "ECU_MODULES\LiquidCrystal_I2C-master\LiquidCrystal_I2C.h"
#include "Wire.h"
/* ----------------- Macro Declarations -----------------*/

/* ----------------- Macro Functions Declarations -----------------*/

/* ----------------- Data Type Declarations -----------------*/

/* ----------------- Data Type Declarations -----------------*/
extern LiquidCrystal_I2C lcd;
extern volatile boolean c1;
extern volatile unsigned int pt1;
extern virtuabotixRTC myRTC;
extern const int sense_24V_pin, sense_5V_pin, lean_pin, sense_3v_pin;
extern double len, conc;
extern int n_5v, l, n_24v, n_3v, op;
extern float sense_5v, sense_24v, sense_3v;
extern String sen_5v, ln, sen_24v, con, sen_3v;
extern String time_now;
extern String SolConc;
extern String message;
extern const char* ssid;
extern const char* password;
extern AsyncWebServer server;
extern AsyncWebSocket ws;
extern String direction;
extern String steps;
extern String chickmotor;
extern bool newRequest;
/* ----------------- Software Interfaces Declarations -----------------*/
String get_time();
void LcdSetup();	
void StepperMotorInit();
void DisplayLastRecordedDataOnLcd();
void setup();
void loop();

#endif 

