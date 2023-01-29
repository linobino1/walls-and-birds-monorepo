
var roots = [			
  "A", "A", 
  "A#", "Bb",
  "B", "B",
  "C", "C",
  "C#", "Db",
  "D", "D",
  "D#", "Eb",
  "E", "E",
  "F", "F",
  "F#", "Gb",
  "G", "G",
  "G#", "Ab"
]; 

var qualities = [" ", "&nbsp;", "\n", "maj", "m", "maj7", "7", "min7", "dim", "m7b5", "7b5", "7#5", "7b9", "6", "6/9", "sus2", "sus4"];



function allPartners(arrayA, arrayB) {
  var result = new Array(arrayA.length * arrayB.length);
  for (let a = 0; a < arrayA.length; a++) {
    for (let b = 0; b < arrayB.length; b++) {
      result[(a*arrayB.length) + b] = arrayA[a].concat(arrayB[b]); 
    }
  }
  
  return result;
}

function setUpMappingTable (array, steps) {
  if (Math.abs(steps) <= 12) {
    var absoluteSteps = (steps + 12) % 12;			//ein halbton runter = 11 halbtöne hoch
    var shift = absoluteSteps * (roots.length / 12) * qualities.length;
    var result = {};
    for (let i = 0; i < array.length; i++) {
      result[array[i]] = array[(i + shift) % array.length]; //objects vom typ A:"A#"
    }
    console.log(result);
    return result;
  }
  return array;
}

function transpose(steps) {
  
  const allChords = allPartners(roots, qualities); //bastelt ein array aus allen möglichen vorkommenden Akkorden
  
  const mappingTable = setUpMappingTable(allChords, steps);
  
  //austauschen der Strings aus allChords anhand der Tabelle mit den Zuordnungspaaren
  const reg = new RegExp(Object.keys(mappingTable).join("|"),"g");

  document.querySelectorAll('[data-transpose]').forEach((elem) => {
    elem.innerHTML = elem.innerHTML.replace(reg, (matched) => mappingTable[matched])
  });
}

export {
  transpose,
}