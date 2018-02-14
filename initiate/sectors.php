<?php

/**
 *  Build Sectors
 */

die();

  include('rb.php');
  //R::setup( 'sqlite:/tmp/dbfile.db' );
  R::setup('mysql:host=localhost;dbname=sectorsearch','root', 'root');

  R::wipe('sector');


// Define how many sectors in system
$ii = 10;

$x = 0;
$y = 0;
$z = 0;

// Loop through all the coordinates and build sector
  for ($x=0; $x < $ii; $x++){
    for ($y=0; $y < $ii; $y++){
      for ($z=0; $z < $ii; $z++){
        $sector = [];
        $sector['coordinates'] = $x . '-' . $y . '-' . $z;
        buildSector($sector);
      }
    }
  }


/**
 *  Build Sector Details
 */
function buildSector($sector) {

  $name = createName();
  $system = createSystem();
  $sector['name'] = $name;
  $sector['detail']['sun'] = $system['sun'];
  $sector['detail']['planets'] = $system['planets'];
  $sector['detail']['moons'] = $system['moons'];
  $sector['detail']['belts'] = $system['belts'];

  // Reduce chances for danger
  $dangers = ['blackhole', 'neutron', 'nova'];
  foreach ($dangers as $danger) {
     $sector['detail']['danger'][$danger] = ($system['danger'][$danger] > 92 ? 1 : 0);
  }

  saveSector($sector);
}

/**
 *  Save Sector
 */
function saveSector($sectorData) {
  // print_r($sectorData);
  // exit();
  $sector = R::dispense('sectors');
  $sector->coordinates = $sectorData['coordinates'];
  $sector->name = $sectorData['name'];
  $sector->sun = $sectorData['detail']['sun'];
  $sector->goldilocks_planets = $sectorData['detail']['planets']['goldilocks'];
  $sector->rocky_planets = $sectorData['detail']['planets']['rock'];
  $sector->gas_planets = $sectorData['detail']['planets']['gas'];
  $sector->moons = $sectorData['detail']['moons'];
  $sector->belts = $sectorData['detail']['belts'];
  $sector->danger_blackhole = $sectorData['detail']['danger']['blackhole'];
  $sector->danger_neutron = $sectorData['detail']['danger']['neutron'];
  $sector->danger_nova = $sectorData['detail']['danger']['nova'];
   $id = R::store($sector);
   print $id .  "\n";
   return $id;
}

/**
 * Unused
 */
function checkName($name) {
  // $file_path = "../db/sectors.lst";
  // $file = fopen($file_path, "r");
  // while ($line = fgets($file)) {
  //   $line = explode('::', $line);
  //   echo  $line[1]['name'] . "\n";
  // }
}

/**
 *  Randomly Set Items in Sector
 */
function createSystem() {
  $system['sun'] = rand(0, 2);
  $system['planets']['goldilocks'] = rand(0, 3);
  $system['planets']['rock'] = rand(0, 6);
  $system['planets']['gas'] = rand(0, 6);
  $system['moons'] = rand(11, 25);
  $system['belts'] = rand(0, 3);
  $system['danger']['blackhole'] = rand(0,100);
  $system['danger']['neutron'] = rand(0,100);
  $system['danger']['nova'] = rand(0,100);
  return $system;
}

/**
 * Unused
 */
function createCoordinates() {
  $cor['x'] = rand(0, 10);
  $cor['y'] = rand(0, 10);
  $cor['z'] = rand(0, 10);
  return $cor;
}

/**
 *  Create Random Name
 */
function createName() {
  $latin = ['Feronia','Minerva','Novensides','Pales','Salus','Fortuna','Fons','Fides[10]','Ops','Flora','Vediovis','Saturn','Sol','Luna','Vulcan','Summanus','Larunda','Terminus','Quirinus','Vortumnus','Lares','Diana','Lucina','Janus','Jupiter','Saturn','Genius','Mercury','Apollo','Mars','Vulcan','Neptune','Sol','Orcus','Liber','Tellus','Ceres','Juno','Luna','Diana','Minerva','Venus','Vesta','Carmentis','Ceres','Falacer','Flora','Furrina','Palatua','Pomona','Portunus','Vulcan','Volturnus','Jupiter','Mars','Quirinus'];

  $greek = ['Acrion','Adrastus','Aedesia','Aedesius','Aeneas','Aenesidemus','Aesara','Aeschines','Aetius','Agapius','Agathobulus','Agathosthenes','Agrippa','Albinus','Alcinous','Alcmaeon','Alexamenus','Alexander','Alexicrates','Alexinus','Amelius','Ammonius','Anaxagoras','Anaxarchus','Anaxilaus','Anaximander','Anaximenes','Androcydes','Andronicus','Anniceris','Antiochus','Antipater','Antisthenes','Antoninus','Apollodorus','Apollonius','Arcesilaus','Archedemus','Archelaus','Archytas','Arete','Arignote','Aristarchus','Aristippus','Aristoclea','Aristocles','Aristocreon','Aristo','Aristotle','Aristoxenus','Arius','Asclepiades','Asclepigenia','Asclepiodotus','Aspasius','Athenaeus','Athenodoros','Athenodorus','Attalus','Atticus','Basilides','Batis','Bion','Boethus','Bolus','Brontinus','Bryson','Callicles','Calliphon','Callistratus','Carneades','Carneiscus','Cassius','Cebes','Celsus','Cercidas','Cercops','Chaerephon','Chamaeleon','Charmadas','Chrysanthius','Chrysippus','Cleanthes','Clearchus','Cleinias','Cleomedes','Cleomenes','Clinomachus','Clitomachus','Colotes','Crantor','Crates','Cratippus','Cratylus','Crescens','Crinis','Critolaus','Cronius','Damascius','Damis','Damo','Dardanus','Demetrius','Democrates','Democritus','Demonax','Dexippus','Diagoras','Dicaearchus','Dio','Diocles','Diodorus','Diodotus','Diogenes','Dionysius','Dio','Diotima','Diotimus','Domninus','Echecrates','Ecphantus','Empedocles','Epicharmus','Epictetus','Epicurus','Eubulides','Euclid','Eudemus','Eudorus','Eudoxus','Euenus','Euphantus','Euphraeus','Euphrates','Eurytus','Eusebius','Eustathius','Evander','Favorinus','Gaius','Geminus','Gorgias','Hagnon','Hecataeus','Hecato','Hegesias','Hegesinus','Hegias','Heliodorus','Heraclides','Heraclitus','Heraclius','Herillus','Hermagoras','Hermarchus','Hermias','Herminus','Hermippus','Hermotimus','Hicetas','Hierius','Hierocles','Hieronymus','Himerius','Hipparchia','Hippasus','Hippias','Hippo','Horus','Hypatia','Iamblichus','Ichthyas','Idomeneus','Ion','Isidore','Jason','Lacydes','Leonteus','Leontion','Leucippus','Lyco','Lycophron','Lysis','Marinus','Maximus','Meleager','Melissus','Menedemus','Menippus','Metrocles','Metrodorus','Mnesarchus','Moderatus','Monimus','Myia','Nausiphanes','Nicarete','Nicolaus','Nicomachus','Numenius','Nymphidianus','Ocellus','Oenomaus','Olympiodorus','Onasander','Onatas','Origen','Panaetius','Pancrates','Panthoides','Parmenides','Pasicles','Patro','Peregrinus','Persaeus','Phaedo','Phaedrus','Phanias','Phanto','Philip','Philiscus','Philo','Philodemus','Philolaus','Philonides','Philostratus','Phintys','Plato','Plotinus','Plutarch','Polemarchus','Polemon','Polus','Polyaenus','Polystratus','Porphyry','Posidonius','Potamo','Praxiphanes','Priscian','Priscus','Proclus','Prodicus','Protagoras','Ptolemy-el-Garib','Pyrrho','Pythagoras','Sallustius','Satyrus','Secundus','Sextus','Simmias','Simon','Simplicius','Siro','Socrates','Sopater','Sosigenes','Sosipatra','Sotion','Speusippus','Sphaerus','Stilpo','Strato','Syrianus','Telauges','Telecles','Teles','Thales','Theagenes','Theano','Themista','Themistius','Theodorus','Theon','Theophrastus','Thrasymachus','Timaeus','Timon','Timycha','Tisias','Xenarchus','Xeniades','Xenocrates','Xenophanes','Xenophilus','Zenobius','Zenodotus','Zeno'];


  // Need to build function that does not repeat names

  $buildname = $greek[array_rand($greek, 1)] . '-' .
               $latin[array_rand($latin, 1)] . '-' .
               $greek[array_rand($greek, 1)];

  return $buildname;
}
