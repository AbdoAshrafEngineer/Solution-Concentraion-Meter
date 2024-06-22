#include "app.h"

const char* ssid = "Omda";
const char* password = "omda1999";

AsyncWebServer server(80);
AsyncWebSocket ws("/ws");

LiquidCrystal_I2C lcd(0x27, 16, 2);

virtuabotixRTC myRTC(23, 4, 15); // clk, dat, cs

volatile boolean c1 = 0;
volatile unsigned int pt1 = millis();

const int sense_24V_pin = 33, sense_5V_pin = 32, lean_pin = 34, sense_3v_pin = 35;
int n_5v = 0, l = 0, n_24v = 0, n_3v = 0, op;
float sense_5v = 0, sense_24v = 0, sense_3v = 0;
String sen_5v, ln, sen_24v, con, sen_3v;

String sense_state_24, sense_state_5, sense_state_sol1;
String message = "";

String direction = "STOP";
String steps;
String chickmotor;
bool newRequest = false;

double len, conc;
String time_now;

String SolConc;



void setup() {
    Serial.begin(115200);
    myRTC.setDS1302Time(00, 34, 10, 7, 22, 7, 2022); 
    LcdSetup();
	StepperMotorInit();
    initWiFi();
    initWebSocket();
    initSPIFFS();

    server.on("/", HTTP_GET, [](AsyncWebServerRequest *request){
        request->send(SPIFFS, "/index.php", "text/html");
    });

    server.on("/style.css", HTTP_GET, [](AsyncWebServerRequest *request){
        request->send(SPIFFS, "/style.css", "text/css");
    });

    server.serveStatic("/", SPIFFS, "/");
    server.begin();
    GetSolConcentration(&SolConc);
    myRTC.updateTime();
    DisplayLastRecordedDataOnLcd();
}

void loop() {
    DisplayLastRecordedDataOnLcd();
    
    if (newRequest) {
        if (direction == "CW") {
            stepper_motor(steps.toInt(), 1, chickmotor);
        } else {
            stepper_motor(steps.toInt(), 0, chickmotor);
        }
        newRequest = false;
        notifyClients("stop");


        /* take the reading and its time stamp */
        GetSolConcentration(&SolConc);
        myRTC.updateTime();
        
    }
    ws.cleanupClients();
}

String get_time() {
    String temp = String(myRTC.dayofmonth);
    time_now = temp;
    time_now = time_now + '/';
    temp = String(myRTC.month);
    time_now = time_now + temp;
    time_now = time_now + '/';
    temp = String(myRTC.year);
    time_now = time_now + temp;
    time_now = time_now + "  ";
    temp = String(myRTC.hours);
    time_now = time_now + temp;
    time_now = time_now + ":";
    temp = String(myRTC.minutes);
    time_now = time_now + temp;
    time_now = time_now + ":";
    temp = String(myRTC.seconds);
    time_now = time_now + temp;
    return time_now;
}
void LcdSetup()
{
	lcd.init();
    lcd.backlight();
    lcd.setCursor(0, 0);
    lcd.print("Concentration Meter Runnig ...");
    delay(2000);
    lcd.clear();
    
}
void StepperMotorInit()
{
	pinMode(step1, OUTPUT);
    pinMode(dir1, OUTPUT);
}
void DisplayLastRecordedDataOnLcd()
{
	lcd.clear();
    PowerSupplyCheck_24v(&sen_24v);
    lcd.print(sen_24v);
    delay(1000);
    lcd.clear();
    PowerSupplyCheck_5v(&sen_5v);
    lcd.print(sen_5v);
    delay(1000);
    lcd.clear();
    PowerSupplyCheck_3v3(&sen_3v);
    lcd.print(sen_3v);
    delay(1000);
    lcd.clear();
    lcd.print(SolConc);
    delay(1000);
    lcd.clear();
    lcd.print(get_time());
    delay(1000);
    lcd.clear();
}
