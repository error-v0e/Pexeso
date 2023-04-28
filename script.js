var tags = [];
var pocetDvojicCelkem;
var pocetDvojicAktualne = 0
var kod;
var heightp;
var widthp;

// vyuzil jsem na to barvy ale mohou tam byt fotky to je na vas treba api
var pexesoVypln = [
    '#639300',
    '#ff7100',
    '#ffcc26',
    '#da0000',
    '#ff795b',
    '#a1ff46',
    '#00ffc6',
    '#6fd6ff',
    '#008bde',
    '#0059a8',
    '#243fcd',
    '#badfff',
    '#0000f0',
    '#8a6bff',
    '#a76bff',
    '#d100ff',
    '#ff00fc',
    '#9a0061',
    '#481a1d',
    '#864840',
    '#3c2016',
    '#352c04',
    '#908259',
    '#445927',
    '#27594d',
    '#275459',
    '#152e41',
    '#273159',
    '#2d2759',
    '#473260',
    '#593b59',
    '#63494a',
    '#1d1b0f',
    '#120f1e',
    '#0e1900',
    '#474a45',
    '#25342d',
    '#353f46',
    '#414141',
    '#737373',
    '#ff7200',
    '#460004',
    '#460020',
    '#270046',
    '#a85791',
    '#b56c5b',
    '#e6b667',
    '#4e584b',
    '#584b54',
    '#0c1519',
]

function Size() {
    event.preventDefault();
    const height = document.forms['size']['height'];
    const width = document.forms['size']['width'];

    const form = document.getElementById('size');
    form.style.visibility = 'hidden';
    const table = document.getElementById('table');


    heightp = height.value;
    widthp = width.value;



    var sudy = true;

    if ((height.value * width.value) % 2 == 1) {
        sudy = false;
        TagsCreate(height.value * width.value - 1)
        pocetDvojicCelkem = (height.value * width.value - 1) / 2;
    }
    else {
        TagsCreate(height.value * width.value);
        pocetDvojicCelkem = (height.value * width.value) / 2;
    }

    for (let i = 0; i < height.value; i++) {
        const tr = document.createElement('tr');
        table.appendChild(tr);
        for (let j = 0; j < width.value; j++) {
            if (!sudy && i == height.value - 1 && j == width.value - 1) {

            }
            else {
                tr.innerHTML += `<td onclick="Otoc(this)" id="${i}${j}" class="td" tag="${RandomTag()}">`
            }


        }
    }
    kod = height.value * 10;
    kod += width.value;

}
function TagsCreate(count) {
    var tags2 = [];
    for (let i = 0; i < count / 2; i++) {
        tags2.push(i);
        tags2.push(i);
    }
    tags = tags2;
}

function RandomTag() {
    var index = Math.floor(Math.random() * tags.length);
    var tag = tags[index];
    tags.splice(index, 1);
    return tag;

}
var pocetTahu = 0;

var id1;
var prvniBool = false;
var druhyBool = false;
var tag1;
var karta1;

function Otoc(componet) {

    if (druhyBool == true && prvniBool == true) {

    }
    else if (id1 != componet.id) {
        if (prvniBool == true) {
            druhyBool = true
        }
        const tagValue = componet.getAttribute('tag');
        componet.style.backgroundColor = pexesoVypln[tagValue]

        if (prvniBool == true) {
            id1 = "1111";
        }
        else {
            id1 = componet.id;
        }

        if (prvniBool == true) {

            setTimeout(function () {
                pocetTahu++;
                document.getElementById('score').innerHTML = `Score: ${pocetTahu}`;
                if (tagValue == tag1) {
                    componet.style.visibility = 'hidden';
                    karta1.style.visibility = 'hidden';
                    prvniBool = false;
                    pocetDvojicAktualne++;
                    if (pocetDvojicAktualne >= pocetDvojicCelkem) {
                        window.location.href = "leadeboard.php?score=" + pocetTahu + "&kod=" + kod + "&height=" + heightp + "&width=" + widthp;
                        //Swindow.location.replace("leadeboard.php");
                    }
                }
                else {
                    componet.style.backgroundColor = 'black';
                    karta1.style.backgroundColor = 'black';
                    prvniBool = false;
                }
                druhyBool = false;
            }, 1500);
        }
        else {
            tag1 = tagValue;
            prvniBool = true;
            karta1 = componet;
        }

    }



}