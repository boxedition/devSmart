<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Grow API Documentation</title>

  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }

    header {
      background-color: #4CAF50;
      color: white;
      padding: 1em;
      text-align: center;
    }

    main {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    h1 {
      color: #333;
    }

    section {
      margin-bottom: 20px;
      background-color: #f9f9f9;
      padding: 15px;
      border-radius: 5px;
    }

    code {
      background-color: #f0f0f0;
      padding: 2px 4px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 10px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>

  <header>
    <h1>API Documentation</h1>
  </header>

  <main>
  <section>
      <h2>POST /api/arduino/create</h2>
      <p>Create a new Arduino device.</p>
      <code>POST /api/arduino/create</code>

      <h3>Request</h3>
      <p>The request should include the following parameters in the request body:</p>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>imei</td>
            <td>string</td>
            <td>Mac Address of the Arduino device.</td>
          </tr>
        </tbody>
      </table>

      <h3>Response</h3>
      <p>Returns a JSON response with information about the created Arduino device.</p>
    </section>

    <section>
        <h2>POST /api/arduino/log</h2>
        <p>Log sensor data for an Arduino device.</p>
        <code>POST /api/arduino/log</code>

        <h3>Request</h3>
        <p>The request should include the following parameters in the request body:</p>
        <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>imei</td>
            <td>string</td>
            <td>Mac Address of the Arduino device.</td>
        </tr>
        <tr>
            <td>temperature</td>
            <td>string</td>
            <td>The temperature value recorded by the Arduino sensor.</td>
        </tr>
        <tr>
            <td>humidity</td>
            <td>string</td>
            <td>The humidity value recorded by the Arduino sensor.</td>
        </tr>
        <tr>
            <td>soil_value</td>
            <td>string</td>
            <td>The soil moisture value recorded by the Arduino sensor.</td>
        </tr>
        <tr>
            <td>soil_percentage</td>
            <td>string</td>
            <td>The soil moisture percentage recorded by the Arduino sensor.</td>
        </tr>
        </tbody>
        </table>

        <h3>Response</h3>
        <p>Returns a JSON response with information about the logged sensor data.</p>
    </section>

    <section>
    <h2>POST /api/arduino/water</h2>
    <p>Information about override irrigation for an Arduino device.</p>
    <code>POST /api/arduino/water</code>

    <h3>Request</h3>
    <p>The request should include the following parameters in the request body:</p>
    <table>
    <thead>
        <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>imei</td>
        <td>string</td>
        <td>Mac Address of the Arduino device.</td>
        </tr>
    </tbody>
    </table>

    <h3>Response</h3>
    <p>Returns a JSON response with JUST the information about the water override status.</p>
    </section>

    <section>
    <h2>POST /api/arduino/water/on</h2>
    <p>Turn on override irrigation for an Arduino device.</p>
    <code>POST /api/arduino/water/on</code>

    <h3>Request</h3>
    <p>The request should include the following parameters in the request body:</p>
    <table>
    <thead>
        <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>imei</td>
        <td>string</td>
        <td>Mac Address of the Arduino device.</td>
        </tr>
    </tbody>
    </table>

    <h3>Response</h3>
    <p>Returns a JSON response with information about the Arduino device after turning on override irrigation.</p>
    </section>

    <section>
    <h2>POST /api/arduino/water/off</h2>
    <p>Turn off override irrigation for an Arduino device.</p>
    <code>POST /api/arduino/water/off</code>

    <h3>Request</h3>
    <p>The request should include the following parameters in the request body:</p>
    <table>
    <thead>
        <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>imei</td>
        <td>string</td>
        <td>Mac Address of the Arduino device.</td>
        </tr>
    </tbody>
    </table>

    <h3>Response</h3>
    <p>Returns a JSON response with information about the Arduino device after turning off override irrigation.</p>
    </section>
  </main>

</body>

</html>