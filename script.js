function Size(){
    event.preventDefault();
    const height = document.forms['size']['height'];
    const width = document.forms['size']['width'];

    const form = document.getElementById('size');
    form.remove();
    const table = document.getElementById('table');
    for (let i = 0; i < height.value; i++) {
        const tr = document.createElement('tr');
        table.appendChild(tr);
        for (let j = 0; j < width.value; j++) {
            const td = document.createElement('td');
            tr.appendChild(td);

        }
    }

}