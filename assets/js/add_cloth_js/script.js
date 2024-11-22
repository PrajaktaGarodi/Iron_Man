$(document).ready(function() {
    // Listen for changes in 'clothCount' and 'costPerCloth' inputs
    $('#clothCount, #costPerCloth').on('input', function() {
        // Get the input values
        const clothCount = parseFloat($('#clothCount').val()) || 0;
        const costPerCloth = parseFloat($('#costPerCloth').val()) || 0;

        // Calculate the total amount
        const totalAmount = clothCount * costPerCloth;

        // Set the calculated value in the 'totalAmount' field
        $('#totalAmount').val(totalAmount.toFixed(2));
    });
});