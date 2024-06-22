# Solution-Concentration-Meter

We are developing a concentration meter designed for accurate measurement of substance concentrations in solutions. This device utilizes a single Printed Circuit Board (PCB) with an ESP32 microcontroller, integrating several essential functions:

    Light-based Measurement: A laser emits light through the solution, detected by a Light Dependent Resistor (LDR) for concentration measurement.

    Real-Time Clock (RTC): Provides precise timestamps for each concentration reading, ensuring accurate time tracking.

    Calibration Features: Ensures measurement precision across various sample types.

    LCD Display: Shows concentration readings and timestamps in real-time.

    WiFi Module: Enables instant data transmission for remote monitoring and client access.

The device operates within a rectangular enclosure and follows a two-step process:

    First, it measures the concentration of a reference solution.
    Then, a stepper motor rotates the laser assembly 90 degrees to direct the laser towards a mirror.
    This setup allows measurement of the target solution's concentration at the LDR, positioned at the opposite corner of the enclosure.

This design ensures comprehensive measurement capabilities while maintaining compact integration on a single PCB, making it efficient for both laboratory and field applications.
