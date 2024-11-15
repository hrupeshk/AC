// year.js

let Base = "http://localhost/AlumniConnect";

let data = {
  "btech": {
      "yoe": 2010,
      "name": "BTECH",
      "prog_id": "CSB"
  },
  "mtechcse": {
      "yoe": 2019,
      "name": "MTECH (CSE)",
      "prog_id": "CSE"
  },
  "mtechit": {
      "yoe": 2011,
      "name": "MTECH (IT)",
      "prog_id": "CSI"
  },
  "mca": {
      "yoe": 1997,
      "name": "MCA",
      "prog_id": "CSM"
  },
  "phd": {
      "yoe": 1999,
      "name": "PhD",
      "prog_id": "PhD"
  }
}

// function sendRequest(program, year) {
//     var prog_id = data[program]["prog_id"];
//     window.location.href = `http://localhost/AlumniConnect/alumniFamily/profile.php?program=${prog_id}&year=${year}`;
// }
function sendRequest(program, year) {
    console.log("Program:", program);
    var prog_id = data[program]["prog_id"];
    window.location.href = `http://localhost/AlumniConnect/alumniFamily/profile.php?program=${prog_id}&year=${year}`;
}

const urlParams = new URLSearchParams(window.location.search);
const program = urlParams.get('program');

if (data.hasOwnProperty(program.toLowerCase())) {
    document.getElementById('programHeading').textContent = data[program.toLowerCase()]["name"];

    const currentYear = new Date().getFullYear();
    let startYear = data[program.toLowerCase()]["yoe"];
    const yearOptionsContainer = document.getElementById('yearOptionsContainer');

    for (let year = currentYear; year >= startYear; year--) {
        const buttonElement = document.createElement('button');
        buttonElement.textContent = year;
        buttonElement.onclick = () => {
            if (program) {
                sendRequest(program, year);
            } else {
                console.error("Program is undefined");
            }
        };
        yearOptionsContainer.appendChild(buttonElement);
    }
} else {
    console.error("Invalid program key:", program);

}

function sendRequest(program, year) {
    console.log("Program:", program);
    var prog_id = data[program]["prog_id"];
    window.location.href = `http://localhost/AlumniConnect/alumniFamily/profile.php?program=${prog_id}&year=${year}`;
}





