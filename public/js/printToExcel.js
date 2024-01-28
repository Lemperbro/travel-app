function downloadToExcel(data_id, fileName = ''){
    
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(data_id);
    var tableHTML = tableSelect.outerHTML.replace(/ /g,'%20');

    fileName = fileName?fileName+'.xls':'excel_data.xls';

    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
    }else{
        downloadLink.href = 'data:' + dataType + ','+tableHTML;

        downloadLink.download = fileName;

        downloadLink.click();
    }
}