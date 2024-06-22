# Solution-Concentraion-Meter

We are developing a concentration meter that accurately measures substance concentrations in solutions. The device uses a single Printed Circuit Board (PCB) with an ESP32 microcontroller, integrating several key functions:
    Light-based Measurement: A laser emits light through the solution, which is detected by a Light Dependent Resistor (LDR) for measurement.
    Real-Time Clock (RTC): Provides timestamps for each concentration reading, ensuring accurate time tracking.
    Calibration Features: Ensures precise measurements across different types of samples.
    LCD Display: Shows concentration readings and timestamps immediately.
    WiFi Module: Enables real-time data transmission for remote monitoring.
The device operates within a rectangular box and follows a two-step process: first, it measures the concentration of a reference solution. Then, a (stepper motor) rotates the laser assembly by 90 degrees to direct the laser towards a mirror, allowing measurement of the target solution's concentration at the LDR, positioned at the opposite corner. This design ensures comprehensive measurement capabilities while maintaining compact integration on a single PCB.
