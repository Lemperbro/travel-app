

function ticket (){
    const screenshotTarget = document.getElementById('ticket');


    html2canvas(screenshotTarget).then((canvas) => {
        const base64image = canvas.toDataURL('image/png');
        var anchor = document.createElement('a');
        anchor.setAttribute('href', base64image);
        anchor.setAttribute('download', "ticket.png");
        anchor.click();
        anchor.remove();        
    });
};

const screenshotTarget = document.getElementById('ticket');


html2canvas(screenshotTarget).then((canvas) => {
    const base64image = canvas.toDataURL('image/png');
    document.getElementById('preview').setAttribute('src',base64image);
});
