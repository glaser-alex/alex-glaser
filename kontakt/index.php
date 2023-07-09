<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kontakt</title>
    <style>
        body {
          height: 100%;
          position: relative;
          background: linear-gradient(90deg, #000020, #002846, #002c48 80%);
          background-image: url("../img/web-development.jpg");
          background-position: center;
          background-attachment: fixed;
          background-repeat: no-repeat;
          background-size: cover;
          /* backdrop-filter: blur(3px); */
        }
        input:hover, textarea:hover, select:hover {
          border: 0;
        }
        .policy {
          width: 100%;
        }
        .version {
          width: 100%;
          color: white;
          text-align: center;
          font-size: xx-small;
          position: absolute; left: 0; bottom: 5px;
        }
        .anrede {
          height: 40px;
          background-color: #ffffff;
        }
    </style>
</head>
<body>

<?php
  if ($_COOKIE['consent'] == 'all') {
    $vname = $_COOKIE['vname'];
    $nname = $_COOKIE['nname'];
  }
?>

<div class="isolate px-6 py-24 sm:py-32 lg:px-8" style="background-color: #00000080; height: 100%;">
  <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true"></div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-5xl">Kontakt</h2>
  </div>
  <form action="message.php" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div>
        <label for="vname" class="block text-sm font-semibold leading-6 text-white">Vorname*</label>
        <div class="mt-2.5">
          <input required type="text" name="vname" id="first-name" value="<?php echo @$vname ?>" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-0 ring-inset ring-gray-300 placeholder:text-gray-400 hover:ring-2 hover:ring-inset hover:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Vorname">
        </div>
      </div>
      <div>
        <label for="nname" class="block text-sm font-semibold leading-6 text-white">Nachname*</label>
        <div class="mt-2.5">
          <input required type="text" name="nname" id="nname" value="<?php echo @$nname ?>" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-0 ring-inset ring-gray-300 placeholder:text-gray-400 hover:ring-2 hover:ring-inset hover:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Nachname">
        </div>
      </div>
      <div>
        <label for="anrede" class="block text-sm font-semibold leading-6 text-white">Anrede*</label>
        <div class="mt-2.5">
          <select required id="anrede" name="anrede" class="anrede w-full rounded-md border-0 bg-none px-3.5 py-2 pl-4 pr-9 text-gray-900 shadow-sm ring-0 ring-inset ring-gray-300 hover:ring-2 hover:ring-inset hover:ring-indigo-600 sm:text-sm">
            <option value="Sehr geehrter Herr" selected>Herr</option>
              <option value="Sehr geehrte Frau">Frau</option>
              <!-- <option value="Sehr geehrte/r Frau/Herr">Divers</option>
              <option value="Sehr geehrte/r Frau/Herr">keine Angaben</option> -->
          </select>
          <!-- <input type="text" name="vname" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 hover:ring-2 hover:ring-inset hover:ring-indigo-600 sm:text-sm sm:leading-6"> -->
        </div>
      </div>
      <div>
        <label for="firma" class="block text-sm font-semibold leading-6 text-white">Firma</label>
        <div class="mt-2.5">
          <input type="text" name="firma" id="firma" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-0 ring-inset ring-gray-300 placeholder:text-gray-400 hover:ring-2 hover:ring-inset hover:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Firma">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm font-semibold leading-6 text-white">Email*</label>
        <div class="mt-2.5">
          <input required type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-0 ring-inset ring-gray-300 valid:ring-2 valid:ring-green-500 invalid:ring-2 invalid:ring-red-600 placeholder:text-gray-400 hover:ring-2 hover:ring-inset hover:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="you@example.com">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="phone-number" class="w-full block text-sm font-semibold leading-6 text-white">Telefonnummer (Mobile)</label>
        <div class="relative mt-2.5">
          <input type="tel" name="tel" id="phone-number" value="+49 " autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 hover:ring-2 hover:ring-inset hover:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="(+49) 00000-00000">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm font-semibold leading-6 text-white">Nachricht*</label>
        <div class="mt-2.5">
          <textarea required name="message" id="message" rows="5" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-0 ring-inset ring-gray-300 placeholder:text-gray-400 hover:ring-2 hover:ring-inset hover:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
        </div>
      </div>
      <div class="flex gap-x-4 sm:col-span-2">
        <div class="flex h-6 items-center">
          <input required type="checkbox" name="datenschutz" value="true">
        </div>
        <label class="policy text-sm leading-6 text-white" id="switch-1-label">
          Ich stimme den <a href="../alexglaser.php?action=agb" class="font-semibold text-indigo-600">Datenschutzbestimmungen</a> zu.
        </label>
      </div>
      
      
      <div>
          <a href="../alexglaser.php?action=home" type="submit" class="block w-full rounded-md bg-gray-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Zurück</a>
        </div>
        
        <div>
            <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Senden</button>
        </div>
    </div>

        <input type="hidden" name="gesendet" value="true">

  </form>
  <p class="version">Version 1.8</p>
</div>

</body>
</html>