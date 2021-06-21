function calculate(){
    let basePrice = 0;
    let range1 = document.getElementById('calculator_value1').value;
    let range1El = document.getElementById('calculator_range1');
    let minValue = 40;
    if(range1El !== undefined){
        let min = Number.parseInt(range1El.getAttribute('min'));
        if(min !== NaN) minValue = min;
    }
    let range2 = document.getElementById('calculator_value2').value;
    basePrice = Number.parseInt(basePrice);
    range1 = Number.parseInt(range1);
    range2 = Number.parseInt(range2);
    if(basePrice === NaN) basePrice = 0;
    if(range1 === NaN) range1 = 0;
    if(range2 === NaN) range2 = 0;
    if(range1 <= 101) basePrice = 680;
    if(range1 >= 101 && range1 <= 200) basePrice = 650;
    if(range1 >= 201) basePrice = 600;
    let extraCharge = 0;
    if((range2 - 6) > 0) extraCharge = ((range2 - 6) * 30);
    if(basePrice > 0 && range1 > 0 && range2>0){
        let price =  basePrice + extraCharge;
        let totalPrice = price * range1;
        document.querySelector(".calculator_row .calculator_price span.calculator_number").textContent =  Math.floor(price).toLocaleString();
        document.querySelector(".calculator_row .calculator_total span.calculator_number").textContent =  Math.floor(totalPrice).toLocaleString();
    }
}
function updateRangeValue(val, targetInput) {
    let rangeValueNode = document.getElementById(targetInput);
    let value = Number.parseInt(val);
    if(rangeValueNode !== undefined && rangeValueNode !== false && value !== NaN){
        rangeValueNode.value = value;
        calculate();
    }
}
document.addEventListener("DOMContentLoaded", function(event) {
    calculate();
});