var tags = [];

// vyuzil jsem na to fontawesome.com ale mohou tam byt fotky to je na vas treba api
var pexesoVypln = [
    '<i class="fa-solid fa-fire"></i>',
    '<i class="fa-solid fa-tree"></i>',
    '<i class="fa-solid fa-compass"></i>',
    '<i class="fa-solid fa-binoculars"></i>',
    '<i class="fa-solid fa-mountain-sun"></i>',
    '<i class="fa-solid fa-route"></i>',
    '<i class="fa-solid fa-signs-post"></i>',
    '<i class="fa-solid fa-person-hiking"></i>',
    '<i class="fa-solid fa-mosquito"></i>',
    '<i class="fa-solid fa-map-location-dot"></i>',
    '<i class="fa-solid fa-kit-medical"></i>',
    '<i class="fa-solid fa-frog"></i>',
    '<i class="fa-solid fa-caravan"></i>',
    '<i class="fa-solid fa-campground"></i>',
    '<i class="fa-solid fa-bucket"></i>',
    '<i class="fa-solid fa-bottle-water"></i>',
    '<i class="fa-solid fa-hippo"></i>',
    '<i class="fa-solid fa-feather"></i>',
    '<i class="fa-solid fa-fish"></i>',
    '<i class="fa-solid fa-dragon"></i>',
    '<i class="fa-solid fa-otter"></i>',
    '<i class="fa-solid fa-shrimp"></i>',
    '<i class="fa-solid fa-paw"></i>',
    '<i class="fa-solid fa-locust"></i>',
    '<i class="fa-solid fa-horse"></i>',
    '<i class="fa-solid fa-dog"></i>',
    '<i class="fa-solid fa-cat"></i>',
    '<i class="fa-solid fa-bath"></i>',
    '<i class="fa-solid fa-gamepad"></i>',
    '<i class="fa-solid fa-school"></i>',
    '<i class="fa-solid fa-robot"></i>',
    '<i class="fa-solid fa-child"></i>',
    '<i class="fa-solid fa-puzzle-piece"></i>',
    '<i class="fa-solid fa-cookie-bite"></i>',
    '<i class="fa-solid fa-snowman"></i>',
    '<i class="fa-solid fa-shapes"></i>',
    '<i class="fa-solid fa-person-biking"></i>',
    '<i class="fa-solid fa-mitten"></i>',
    '<i class="fa-solid fa-ice-cream"></i>',
    '<i class="fa-solid fa-cubes-stacked"></i>',
    '<i class="fa-solid fa-cake-candles"></i>',
    '<i class="fa-solid fa-baseball-bat-ball"></i>',
    '<i class="fa-solid fa-apple-whole"></i>',
    '<i class="fa-solid fa-paint-roller"></i>',
    '<i class="fa-solid fa-brush"></i>',
    '<i class="fa-solid fa-pencil"></i>',
    '<i class="fa-solid fa-wrench"></i>',
    '<i class="fa-solid fa-hammer"></i>',
    '<i class="fa-solid fa-toolbox"></i>',
    '<i class="fa-solid fa-poo"></i>',
]

function Size(){
    event.preventDefault();
    const height = document.forms['size']['height'];
    const width = document.forms['size']['width'];

    const form = document.getElementById('size');
    form.style.visibility = 'hidden';
    const table = document.getElementById('table');

    

    var sudy = true;

    if ((height.value*width.value)%2==1) {
        sudy = false;
        TagsCreate(height.value*width.value-1)
    }
    else {
        TagsCreate(height.value*width.value);
    }

    for (let i = 0; i < height.value; i++) {
        const tr = document.createElement('tr');
        table.appendChild(tr);
        for (let j = 0; j < width.value; j++) {
            if  (!sudy && i==height.value-1 && j==width.value-1) {

            }
            else {
                tr.innerHTML+= `<td onclick="Otoc(this)" tag="${RandomTag()}">`
            }
            

        }
    }

}
function TagsCreate(count){
    var tags2 = [];
    for (let i = 0; i < count/2; i++) {
        tags2.push(i);
        tags2.push(i);
    }
    tags=tags2;
}

function RandomTag(){
    var index = Math.floor(Math.random()*tags.length);
    var tag = tags[index];
    tags.splice(index,1);
    return tag;
    
}

var prvniBool;
var tag1;
var karta1;

function Otoc(componet){
    const tagValue = componet.getAttribute('tag');
    componet.innerHTML = pexesoVypln[tagValue]

    if (prvniBool)
    {
        if (intValue == tag1)
        {
            prvni = false;
            componet.style.visibility = 'hidden';
            karta1.style.visibility = 'hidden';
        }
        else
        {
            componet.innerHTML = ' ';
            karta1.innerHTML = ' ';
            prvni = false;
        }
    }
    else
    {
        tag1 = tagValue;
        prvni = true;
        karta1= componet;
    }
}