const decreaseButton = document.getElementById('decrease');
const increaseButton = document.getElementById('increase');
const quantityInput = document.getElementById('quantity');

decreaseButton.addEventListener('click', () => {
    event.preventDefault();
    const currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

increaseButton.addEventListener('click', () => {
    event.preventDefault();
    const currentValue = parseInt(quantityInput.value);
    if (currentValue < 10) {
        quantityInput.value = currentValue + 1;
    }
});