function autoCalcSetup() {
    $('form[name=cart]').jAutoCalc('destroy');
    $('form[name=cart] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces : 2, emptyAsZero: true});
    $('form[name=cart]').jAutoCalc({decimalPlaces: 2});
}