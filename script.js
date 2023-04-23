var tags = [];

// vyuzil jsem na to fontawesome.com ale mohou tam byt obrazky to je na vas 
var pexesoVypln = [
    '<i class="fa-solid fa-fire"></i>',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
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
                const td = document.createElement('td');
                td.setAttribute('tag', RandomTag());    
                tr.appendChild(td);
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