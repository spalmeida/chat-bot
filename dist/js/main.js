function JsonToCSV(){
    var csvStr = JsonFields.join(",") + "\n";

    JsonArray.forEach(element => {
        AccountNumber = element.AccountNumber;
        AccountName   = element.AccountName;
        port          = element.port
        source        = element.source

        csvStr += AccountNumber + ',' + AccountName + ','  + port + ',' + source + "\n";
    })
    return csvStr;
}

function downloadCSV(csvStr) {

    var hiddenElement = document.createElement('a');
    hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csvStr);
    hiddenElement.target = '_blank';
    hiddenElement.download = 'output.csv';
    hiddenElement.click();
}


//downloadCSV(JsonToCSV());